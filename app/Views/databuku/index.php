<?= $this->extend('template/indexhome'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Daftar Buku</h3>
                            <form action="" method="post" style="margin-bottom: 20px;">
                                <input type="text" class="form-control" placeholder="Masukkan Keywork Pencarian Buku" name="keywork">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-custom">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Jenis Buku</th>
                                    <th scope="col">Jumlah Buku</th>
                                    <th scope="col">Lokasi Buku</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buku as $b) : ?>
                                    <tr>
                                        <td><img src="/img/<?= $b['gambar']; ?>" alt="" class="gambar"></td>
                                        <td><?= $b['isbn']; ?></td>
                                        <td><?= $b['judul']; ?></td>
                                        <td><?= $b['jenis']; ?></td>
                                        <td><?= $b['jumlah']; ?></td>
                                        <td><?= $b['lokasi']; ?></td>
                                        <div class="btn-container">
                                            <td>
                                                <a href="/databuku/<?= $b['slug']; ?>" class="btn btn-info"><i class="tim-icons icon-notes"></i></a>
                                            </td>
                                        </div>
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