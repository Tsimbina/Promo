<nav class="navbar admin-navbar navbar-expand bg-white">
  <div class="container-fluid px-3 px-lg-4">

    <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">
      ADMIN PROMO
    </a>

    <div class="ms-3">
      <a class="btn btn-outline-primary btn-sm" href="<?= site_url('/') ?>">Caisses</a>
      <a class="btn btn-outline-primary btn-sm" href="<?= site_url('/achat') ?>">Achats</a>
      <a class="btn btn-outline-primary btn-sm" href="<?= site_url('/achat/saisie') ?>">Saisie</a>
    </div>

    <div class="ms-auto d-flex gap-2">
      <a class="btn btn-sm btn-dark" href="<?= site_url('/check-caisse') ?>">
        Check caisse
      </a>
    </div>

  </div>
</nav>