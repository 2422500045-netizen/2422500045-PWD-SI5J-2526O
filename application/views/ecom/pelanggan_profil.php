<div class="container mb-3 mt-4">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1 text-center">
            <h4>Profil Saya</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-small">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">profil</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="row justify-content-center">
            <div class="col-lg-10"><?= $this->session->flashdata('message') ?></div>
        </div>
    <?php endif ?>

    <form method="POST" id="formProfil">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?= $pelanggan['email'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama', $pelanggan['nama_pelanggan']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nopon" class="form-label">No Telpon</label>
                    <input type="number" name="nopon" id="nopon" class="form-control" value="<?= set_value('nopon', $pelanggan['telp_pelanggan']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Jalan</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= set_value('alamat', $pelanggan['alamat']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" name="kota" id="kota" class="form-control" value="<?= set_value('kota', $pelanggan['kota']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kodepos" class="form-label">Kode Pos</label>
                    <input type="number" name="kodepos" id="kodepos" class="form-control" value="<?= set_value('kodepos', $pelanggan['kode_pos']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control" value="<?= set_value('provinsi', $pelanggan['provinsi']) ?>" required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <button type="submit" class="w-100 btn btn-lg btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>