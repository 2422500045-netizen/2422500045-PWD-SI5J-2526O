<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Ekspedisi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Ekspedisi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ekspedisi</h5>
                            <div class="mt-4">
                                <a href="<?= base_url('administrator/ekspedisi2422500045/tambah') ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-plus"></i> Tambah Ekspedisi
                                </a>
                                <?php if ($this->session->flashdata('message')) : ?>
                                    <?= $this->session->flashdata('message') ?>
                                <?php endif ?>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Layanan</th>
                                            <th>Tarif per Kg</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($list_ekspedisi2422500045 as $e) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $e['nama_ekspedisi045'] ?></td>
                                                <td><?= $e['jenis_layanan045'] ?></td>
                                                <td><?= $e['tarif_per_kg045'] ?></td>
                                                <td><?= $e['status045'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('administrator/ekspedisi2422500045/ubah/' . $e['id_ekspedisi045']) ?>">
                                                        <span class="badge bg-success">Ubah</span>
                                                    </a>
                                                    <a href="<?= base_url('administrator/ekspedisi2422500045/hapus/' . $e['id_ekspedisi045']) ?>" onclick="return confirm('Yakin hapus data ini?')">
                                                        <span class="badge bg-danger">Hapus</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
