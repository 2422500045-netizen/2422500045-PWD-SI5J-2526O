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
                            <h5 class="card-title">Ubah Ekspedisi</h5>
                            <div class="mt-4">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="nama_ekspedisi045" class="form-label">Nama Ekspedisi</label>
                                        <input type="text" class="form-control" name="nama_ekspedisi045" id="nama_ekspedisi045" maxlength="11" value="<?= set_value('nama_ekspedisi045', $ekspedisi2422500045['nama_ekspedisi045']) ?>">
                                        <small class="text-danger"><?= form_error('nama_ekspedisi045') ?></small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_layanan045" class="form-label">Jenis Layanan</label>
                                        <input type="text" class="form-control" name="jenis_layanan045" id="jenis_layanan045" maxlength="30" value="<?= set_value('jenis_layanan045', $ekspedisi2422500045['jenis_layanan045']) ?>">
                                        <small class="text-danger"><?= form_error('jenis_layanan045') ?></small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tarif_per_kg045" class="form-label">Tarif per Kg</label>
                                        <input type="text" class="form-control" name="tarif_per_kg045" id="tarif_per_kg045" maxlength="10" value="<?= set_value('tarif_per_kg045', $ekspedisi2422500045['tarif_per_kg045']) ?>">
                                        <small class="text-danger"><?= form_error('tarif_per_kg045') ?></small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status045" class="form-label">Status</label>
                                        <input type="text" class="form-control" name="status045" id="status045" maxlength="15" value="<?= set_value('status045', $ekspedisi2422500045['status045']) ?>">
                                        <small class="text-danger"><?= form_error('status045') ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <a href="<?= base_url('administrator/ekspedisi2422500045') ?>" class="btn btn-danger">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
