<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
  <div class="col">
    <h2 class="mt-2">Detail Buku</h2>
    <div class="card mb-12" style="max-width: 1200px;">
      <div class="row">
        <div class="col-md-3">
          <div class="card-body">
            <img src="/img/<?= $buku['gambar']; ?>" class="card-img" alt="..." height="300px">
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <div class="card-body">
                <h3 id="judulBuku"><?= $buku['judul']; ?></h3>
                <p class="card-text"><span id="penulis"><b>Penulis : </b><?= $buku['penulis']; ?></span></p>
                <p class="card-text"><span id="penerbit"><b>Penerbit : </b><?= $buku['penerbit']; ?></span></p>
                <p class="card-text"><span id="jenis"><b>Jenis Buku : </b><?= $buku['jenis']; ?></span></p>
                <p class="card-text"><span id="tahun"><b>Tahun Terbit : </b><?= $buku['tahun']; ?></span></p>
                <p class="card-text"><span id="halaman"><b>Jumlah Halaman : </b><?= $buku['halaman']; ?></span></p>
                <p class="card-text"><span id="jumlah"><b>Jumlah Buku : </b><?= $buku['jumlah']; ?></span></p>
                <td><a href="/buku/" class="btn btn-danger">Kembali</a></td>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <img id="qrCode" src="<?= $qrCode ?>" alt="QR Code">
                <button id="toggleButton" class="btn btn-info" onclick="toggleDetails()">Tampilkan Informasi Buku</button>
                <h4 id="bookInfo" class="hidden">Informasi Buku</h4>
                <h4 id="jumlahPeminjaman" class="hidden">Jumlah Peminjaman: <?= $jumlahPeminjaman; ?></h4>
                <h4 id="jumlahStok" class="hidden">Jumlah Stok Tersisa: <?= $jumlahStok; ?></h4>
                <h4 id="lokasi" class="hidden">Lokasi Buku : <?= $buku['lokasi']; ?></h4>
                <h4 id="daftarPeminjam" class="hidden">Daftar Peminjam:</h4>
                <?php if (!empty($daftarPeminjam)) : ?>
                  <ul id="peminjamList" class="hidden">
                    <?php foreach ($daftarPeminjam as $peminjam) : ?>
                      <li>Nama : <?= $peminjam['nama']; ?><br>
                        Kelas : <?= $peminjam['kelas']; ?><br>
                        Tanggal Pinjam : <?= $peminjam['tgl_pinjam']; ?><br>
                        Tanggal Kembali : <?= $peminjam['tgl_kembali']; ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php else : ?>
                  <p id="noPeminjam" class="hidden">Tidak ada peminjam untuk buku ini.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>