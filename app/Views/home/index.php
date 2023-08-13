<?= $this->extend('template/indexhome'); ?>
<?= $this->section('page-content'); ?>

<div class="content">

    <!-- Page Heading -->
    <h2>Selamat Datang Anggota Perpustakaan SMP Barunawati, Semarang</h2>
    <p class="mb-3"><?= $hari ?>, <?= $tanggal ?></p>

    <div class="row">

        <div class="col-md-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Buku </div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?= $jumlah_buku ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-success shadow h-100 py-2 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?= $jumlah_anggota ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-default">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1 ">Jumlah Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-white"><?= $jumlah_transaksi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<?= $this->endSection(); ?>