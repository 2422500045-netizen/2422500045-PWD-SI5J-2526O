<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        // Load model
        $this->load->model('produk_model');
        $this->load->model('produk_kategori_model');
        $this->load->model('produk_gambar_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['list_produk'] = $this->produk_model->get_all();
        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/produk/index');
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_produk()
    {
        $data['title'] = 'Tambah Produk';
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');
        if ($this->form_validation->run() !== FALSE) {
            $this->__simpan_produk();
        } else {
            $data['list_kategori'] = $this->produk_kategori_model->get_all();
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/produk/tambah_produk', $data);
            $this->load->view('administrator/templates/footer');
        }
    }

    public function ubah_produk($id)
    {
        $data['title'] = 'Ubah Produk';
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $this->__update_produk($id);
        } else {
            $data['produk'] = $this->produk_model->get_by_id($id);
            // Jika produk tidak ditemukan, kembali ke daftar produk
            if (empty($data['produk'])) {
                redirect('administrator/produk');
            }
            $data['list_kategori'] = $this->produk_kategori_model->get_all();
            $data['gambar_model'] = $this->produk_gambar_model;

            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/produk/ubah_produk', $data);
            $this->load->view('administrator/templates/footer');
        }
    }

    // Menyusun data produk dari form (dipakai tambah & ubah)
    private function __data_produk()
    {
        return [
            'nama' => ucwords($this->input->post('nama_produk')),
            'id_kategori' => $this->input->post('kategori_produk'),
            'harga' => $this->input->post('harga_produk'),
            'stok' => $this->input->post('stok_produk'),
            'deskripsi' => ucfirst($this->input->post('deskripsi_produk'))
        ];
    }

    private function __simpan_produk()
    {
        $data = $this->__data_produk();

        # simpan dan return id_produk yang disimpan
        $id_produk = $this->produk_model->tambah($data);

        # upload gambar (jika ada)
        $count = count($_FILES['gambar_produk']['name']);
        if ($count > 0) {
            $this->__produk_gambar_upload($count, $id_produk);
        }

        $this->__flash_sukses('Berhasil menambahkan produk!!');
        redirect('administrator/produk');
    }

    private function __update_produk($id)
    {
        $data = $this->__data_produk();

        # update data produk
        $this->produk_model->ubah($data, $id);

        # jika user memilih gambar baru, gambar lama diganti
        if ($this->__ada_gambar_dipilih()) {
            // simpan dulu daftar gambar lama
            $gambar_lama = $this->produk_gambar_model->get_by_produk_id($id);
            $count = count($_FILES['gambar_produk']['name']);
            // upload gambar baru, hasilnya = jumlah gambar yang berhasil diupload
            $berhasil = $this->__produk_gambar_upload($count, $id);
            // gambar lama dihapus hanya jika minimal 1 gambar baru berhasil
            if ($berhasil > 0) {
                $this->__hapus_gambar($gambar_lama);
            }
        }

        $this->__flash_sukses('Berhasil mengubah produk!!');
        redirect('administrator/produk');
    }

    // Cek apakah user memilih minimal 1 file pada input gambar
    private function __ada_gambar_dipilih()
    {
        if (empty($_FILES['gambar_produk']['name'])) {
            return false;
        }
        foreach ($_FILES['gambar_produk']['name'] as $nama) {
            if (!empty($nama)) {
                return true;
            }
        }
        return false;
    }

    // Hapus gambar (database + file) dari daftar gambar
    private function __hapus_gambar($list_gambar)
    {
        foreach ($list_gambar as $gambar) {
            $this->produk_gambar_model->hapus($gambar['id_gambar']);
            $path = './uploads/produk/' . $gambar['nama_gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    public function hapus_produk($id)
    {
        // cek apakah produk ada
        $produk = $this->produk_model->get_by_id($id);
        if ($produk) {
            // ambil semua gambar milik produk
            $list_gambar = $this->produk_gambar_model->get_by_produk_id($id);
            $this->__hapus_gambar($list_gambar);
            // hapus produk di database
            $this->produk_model->hapus($id);
            $this->__flash_sukses('Berhasil menghapus produk!!');
        } else {
            $this->__flash_gagal('Produk tidak ditemukan!!');
        }
        redirect('administrator/produk');
    }

    public function hapus_gambar($id_gambar, $id_produk)
    {
        // cari gambar di dalam daftar gambar milik produk ini
        $list_gambar = $this->produk_gambar_model->get_by_produk_id($id_produk);
        $ditemukan = [];
        foreach ($list_gambar as $gambar) {
            if ($gambar['id_gambar'] == $id_gambar) {
                $ditemukan[] = $gambar;
            }
        }

        if (!empty($ditemukan)) {
            $this->__hapus_gambar($ditemukan);
            $this->__flash_sukses('Berhasil menghapus gambar!!');
        } else {
            $this->__flash_gagal('Gambar tidak ditemukan!!');
        }
        redirect('administrator/produk/ubah/' . $id_produk);
    }

    private function __flash_gagal($pesan)
    {
        $this->session->set_flashdata('message', '
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    ' . $pesan . '
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
    }

    private function __flash_sukses($pesan)
    {
        $this->session->set_flashdata('message', '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    ' . $pesan . '
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
    }

    private function __produk_gambar_upload($count, $id_produk)
    {
        $berhasil = 0;
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['gambar_produk']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['gambar_produk']['name'][$i];
                $_FILES['file']['type'] = $_FILES['gambar_produk']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar_produk']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['gambar_produk']['error'][$i];
                $_FILES['file']['size'] = $_FILES['gambar_produk']['size'][$i];

                $config['upload_path'] = 'uploads/produk/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                // uniqid() supaya gambar lama tidak tertimpa saat mengubah produk
                $config['file_name'] = "produk-" . $id_produk . '-' . $i . '-' . uniqid();

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data = [
                        'nama_gambar' => $filename,
                        'produk_id' => $id_produk
                    ];
                    $this->produk_gambar_model->tambah($data);
                    $berhasil++;
                }
            }
        }
        return $berhasil;
    }
}