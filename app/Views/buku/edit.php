<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h3>Ubah Data Buku</h3>
        </div>
        <div class="card-body">
          <form action="/buku/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $buku['gambar']; ?>">
            <div class="mb-3">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="text" class="form-control" id="isbn" name="isbn" autofocus value="<?= (old('isbn')) ? old('isbn') : $buku['isbn'] ?>">
            </div>
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control <?= (validation_show_error("judul")) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $buku['judul'] ?>">
              <div class="invalid-feedback">
                <?= validation_show_error('judul'); ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ?>">
            </div>
            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ?>">
            </div>
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis</label>
              <input type="text" class="form-control" id="jenis" name="jenis" value="<?= (old('jenis')) ? old('jenis') : $buku['jenis'] ?>">
            </div>
            <div class="mb-3">
              <label for="tahun" class="form-label">Tahun</label>
              <input type="text" class="form-control" id="tahun" name="tahun" value="<?= (old('tahun')) ? old('tahun') : $buku['tahun'] ?>">
            </div>
            <div class="mb-3">
              <label for="halaman" class="form-label">Jumlah Halaman</label>
              <input type="text" class="form-control" id="halaman" name="halaman" value="<?= (old('halaman')) ? old('halaman') : $buku['halaman'] ?>">
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah Buku</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= (old('jumlah')) ? old('jumlah') : $buku['jumlah'] ?>">
            </div>
            <div class="mb-3">
              <label for="lokasi" class="form-label">Lokasi Buku</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= (old('lokasi')) ? old('lokasi') : $buku['lokasi'] ?>">
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <div class="col-sm-2">
                <img src="/img/<?= $buku['gambar']; ?>" class="img-thumbnail img-preview">
              </div>
              <input type="file" class="form-control<?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewGambar()">
            </div>
            <label class="input-group-text" for="gambar" hidden><?= $buku['gambar']; ?></label>
            <td><a href="/buku/" class="btn btn-danger">Kembali</a></td>
            <button type="submit" class="btn btn-success">Ubah Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>