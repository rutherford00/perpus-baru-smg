<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="my-3">Tambah Data Anggota</h2>
                </div>
                <div class="card-body">
                    <form action="/anggota/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor ID</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" autofocus value="<?= old('nomor'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control <?= (validation_show_error("nama")) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= old('kelas'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="<?= old('gender'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomorhp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomorhp" name="nomorhp" value="<?= old('nomorhp'); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div class="col-sm-2">
                                <img src="/img/defaultp.jpg" class="img-thumbnail img-preview">
                            </div>
                            <input type="file" class="form-control<?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewFoto()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                            <label class="input-group-text" for="foto" hidden></label>
                        </div>
                        <td><a href="/anggota/" class="btn btn-danger">Kembali</a></td>
                        <button type="submit" class="btn btn-info">Tambah Anggota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>