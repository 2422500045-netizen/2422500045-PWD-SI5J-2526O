<!-- Content wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ekspedisi</h5>
                            <p class="card-text">
                                <a href="<?= base_url('administrator/ekspedisi2422500045/tambah') ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-plus"></i> Tambah Ekspedisi
                                </a>
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <?= $this->session->flashdata('message') ?>
                                    <?php endif ?>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Jenis Layanan</th>
                                                <th>Tarif peKg</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($list_ekspedisi2422500045 as $ekspedisi2422500045) : ?>
                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                    <td><?= $no ?></td>
                                                    <td><?= $ekspedisi2422500045['id_ekspedisi045'] ?></td>
                                                    <td><?= $ekspedisi2422500045['nama_ekspedisi045'] ?></td>
                                                    <td><?= $ekspedisi2422500045['jenis_layanan045'] ?></td>
                                                    <td><?= $ekspedisi2422500045['tarif_per_kg045'] ?></td>
                                                    <td><?= $ekspedisi2422500045['status045'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('administrator/ekspedisi2422500045/ubah/') ?><?= $ekspedisi2422500045['id_ekspedisi045 '] ?>">
                                                            <span class="badge bg-success">Ubah</span>
                                                        </a>
                                                        <a href="<?= base_url('administrator/ekspedisi2422500045/hapus/') ?><?= $ekspedisi2422500045['id_ekspedisi045 '] ?>">
                                                            <span class="badge bg-danger">Hapus</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $no++; endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>