<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aplikasi Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
        <a class="nav-link" href="<?= base_url('/buku'); ?>">Data Buku</a>
        <a class="nav-link" href="<?= base_url('/library/edit'); ?>">Data Admin</a>
        <a class="nav-link" href="<?= base_url('/library/pinjam'); ?>">Data Anggota</a>
        <a class="nav-link" href="<?= base_url('/library/delete'); ?>">Transaksi Buku</a>
      </div>
      <a class="nav-link" href="<?= base_url('/logout'); ?>">Logout</a>
    </div>
  </div>
</nav>