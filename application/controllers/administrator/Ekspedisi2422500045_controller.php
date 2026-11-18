<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi2422500045_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('ekspedisi2422500045_model');
    }

    public function index()
    {
        $data['list_ekspedisi2422500045'] = $this->ekspedisi2422500045_model->get_all();

        $this->load->view('administrator/templates/header');
        $this->load->view('administrator/templates/sidebar');
        $this->load->view('administrator/ekspedisi2422500045/index', $data);
        $this->load->view('administrator/templates/footer');
    }

    public function tambah_ekspedisi2422500045()
    {
        $data['title'] = 'Tambah Ekspedisi';

        $this->form_validation->set_rules('nama_ekspedisi045', 'Nama Ekspedisi', 'required|max_length[11]');
        $this->form_validation->set_rules('jenis_layanan045', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('tarif_per_kg045', 'Tarif per Kg', 'required|numeric');
        $this->form_validation->set_rules('status045', 'Status', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $this->__simpan_ekspedisi2422500045();
        } else {
            $this->load->view('administrator/templates/header', $data);
            $this->load->view('administrator/templates/sidebar');
            $this->load->view('administrator/ekspedisi2422500045/tambah_ekspedisi2422500045');
            $this->load->view('administrator/templates/footer');
        }
    }

    private function __simpan_ekspedisi2422500045()
    {
        $data = [
            'nama_ekspedisi045' => ucwords($this->input->post('nama_ekspedisi045')),
            'jenis_layanan045'  => $this->input->post('jenis_layanan045'),
            'tarif_per_kg045'   => $this->input->post('tarif_per_kg045'),
            'status045'         => ucfirst($this->input->post('status045'))
        ];

        $simpan = $this->ekspedisi2422500045_model->tambah($data);

        if ($simpan) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Berhasil menambahkan ekspedisi!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Gagal menambahkan ekspedisi!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }

        redirect('administrator/ekspedisi2422500045');
    }

    public function hapus_ekspedisi2422500045($id)
    {
        $ekspedisi2422500045 = $this->ekspedisi2422500045_model->get_by_id($id);

        if ($ekspedisi2422500045) {
            $hapus = $this->ekspedisi2422500045_model->hapus($id);

            if ($hapus) {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            Berhasil menghapus ekspedisi!!
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
            } else {
                $this->session->set_flashdata('message', '
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Gagal menghapus ekspedisi!!
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ');
            }
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Ekspedisi tidak ditemukan!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }

        redirect('administrator/ekspedisi2422500045');
    }

    public function ubah_ekspedisi2422500045($id)
    {
        $ekspedisi2422500045 = $this->ekspedisi2422500045_model->get_by_id($id);

        if ($ekspedisi2422500045) {
            $this->form_validation->set_rules('nama_ekspedisi045', 'Nama Ekspedisi', 'required|max_length[11]');
        $this->form_validation->set_rules('jenis_layanan045', 'Jenis Layanan', 'required');
        $this->form_validation->set_rules('tarif_per_kg045', 'Tarif per Kg', 'required|numeric');
        $this->form_validation->set_rules('status045', 'Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Ubah Ekspedisi';
                $data['ekspedisi2422500045'] = $ekspedisi2422500045;

                $this->load->view('administrator/templates/header', $data);
                $this->load->view('administrator/templates/sidebar');
                $this->load->view('administrator/ekspedisi2422500045/ubah_ekspedisi2422500045', $data);
                $this->load->view('administrator/templates/footer');
            } else {
                $this->__ubah_ekspedisi2422500045($id);
            }
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Ekspedisi tidak ditemukan!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            redirect('administrator/ekspedisi2422500045');
        }
    }

    private function __ubah_ekspedisi2422500045($id)
    {
        $data = [
            'nama_ekspedisi045' => ucwords($this->input->post('nama_ekspedisi045')),
            'jenis_layanan045'  => $this->input->post('jenis_layanan045'),
            'tarif_per_kg045'   => $this->input->post('tarif_per_kg045'),
            'status045'         => ucfirst($this->input->post('status045'))
        ];

        $ubah = $this->ekspedisi2422500045_model->ubah($data, $id);

        if ($ubah) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Berhasil memperbarui Ekspedisi!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        } else {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        Gagal memperbarui Ekspedisi!!
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
        }

        redirect('administrator/ekspedisi2422500045');
    }
}