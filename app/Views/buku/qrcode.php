<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>QR Code</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= $qrCode; ?>" alt="QR Code">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>