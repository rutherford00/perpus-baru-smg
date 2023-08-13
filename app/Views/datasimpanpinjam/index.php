<?= $this->extend('template/indexhome'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Daftar Peminjaman Buku</h3>
                            <form action="" method="post" style="margin-bottom: 20px;">
                                <input type="text" class="form-control" placeholder="Masukkan Keywork Pencarian Transaksi Buku" name="keywork">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-custom">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">ID Anggota</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($simpanpinjam as $s) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $s['isbn'] ?></td>
                                        <td><?= $s['judul'] ?></td>
                                        <td><?= $s['nomor'] ?></td>
                                        <td><?= $s['nama'] ?></td>
                                        <td><?= $s['kelas'] ?></td>
                                        <td><?= $s['tgl_pinjam'] ?></td>
                                        <td><?= $s['tgl_kembali'] ?></td>
                                        <td><?= \App\Controllers\Simpanpinjam::calculateDenda($s['tgl_kembali']); ?></td>
                                        </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>