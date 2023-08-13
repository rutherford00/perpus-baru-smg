<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Data Buku</h3>
        </div>
        <div class="card-body">
          <form action="/buku/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="mb-3">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="text" class="form-control" id="isbn" name="isbn" autofocus value="<?= old('isbn'); ?>">
            </div>
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control <?= (validation_show_error("judul")) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>">
              <div class="invalid-feedback">
                <?= validation_show_error('judul'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
            </div>
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
            </div>
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Buku</label>
              <input type="text" class="form-control" id="jenis" name="jenis" value="<?= old('jenis'); ?>">
            </div>
            <div class="mb-3">
              <label for="tahun" class="form-label">Tahun Terbit</label>
              <input type="text" class="form-control" id="tahun" name="tahun" value="<?= old('tahun'); ?>">
            </div>
            <div class="mb-3">
              <label for="halaman" class="form-label">Jumlah Halaman</label>
              <input type="text" class="form-control" id="halaman" name="halaman" value="<?= old('halaman'); ?>">
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah Buku</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= old('jumlah'); ?>">
            </div>
            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi Buku</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= old('lokasi'); ?>">
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <div class="col-sm-2">
                <img src="/img/default.png" class="img-thumbnail img-preview">
              </div>
              <input type="file" class="form-control<?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewGambar()">
              <div class="invalid-feedback">
                <?= $validation->getError('gambar'); ?>
              </div>
              <label class="input-group-text" for="gambar" hidden></label>
            </div>
            <td><a href="/buku/" class="btn btn-danger">Kembali</a></td>
            <button type="submit" class="btn btn-info">Tambah Buku</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>