<?= $this->extend('template/indexhome'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Daftar Anggota</h3>
                            <form action="" method="post" style="margin-bottom: 20px;">
                                <input type="text" class="form-control" placeholder="Masukkan Keywork Pencarian Anggota" name="keywork">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-custom">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nomor ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor HP(+62)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($anggota as $a) : ?>
                                    <tr>
                                        <td><img src="/img/<?= $a['foto']; ?>" alt="" class="foto"></td>
                                        <td><?= $a['nomor']; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['kelas']; ?></td>
                                        <td><?= $a['gender']; ?></td>
                                        <td><?= $a['alamat']; ?></td>
                                        <td>0<?= $a['nomorhp']; ?></td>
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