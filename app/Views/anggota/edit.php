<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="my-3">Ubah Data Anggota</h2>
                </div>
                <div class="card-body">
                    <form action="/anggota/update/<?= $anggota['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" value="<?= $anggota['slug']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $anggota['foto']; ?>">
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor ID</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" autofocus value="<?= (old('nomor')) ? old('nomor') : $anggota['nomor'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control <?= (validation_show_error("nama")) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $anggota['nama'] ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= (old('kelas')) ? old('kelas') : $anggota['kelas'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="<?= (old('gender')) ? old('gender') : $anggota['gender'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $anggota['alamat'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomorhp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomorhp" name="nomorhp" value="<?= (old('nomorhp')) ? old('nomorhp') : $anggota['nomorhp'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= $anggota['foto']; ?>" class="img-thumbnail img-preview">
                            </div>
                            <input type="file" class="form-control<?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewFoto()">
                        </div>
                        <label class="input-group-text" for="foto" hidden><?= $anggota['foto']; ?></label>
                        <td><a href="/anggota/" class="btn btn-danger">Kembali</a></td>
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>