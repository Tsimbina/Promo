<aside class="admin-sidebar">
  <div class="sidebar-header">
    <a href="<?= site_url('/') ?>" class="brand-mark">
      <span class="brand-icon"><i class="bi bi-grid-1x2-fill"></i></span>
      <span class="brand-title">PROMO</span>
    </a>
  </div>

  <nav class="sidebar-nav">

    <!-- Caisse -->
    <a class="nav-link" href="<?= site_url('/') ?>">
      <span class="nav-icon"><i class="bi bi-cash-stack"></i></span>
      <span class="nav-text">Caisse</span>
    </a>

    <!-- Achats -->
    <a class="nav-link" href="<?= site_url('/achat') ?>">
      <span class="nav-icon"><i class="bi bi-cart-check"></i></span>
      <span class="nav-text">Achats</span>
    </a>

    <!-- STOCK (nouveau) -->
    <a class="nav-link" href="<?= site_url('/stock') ?>">
      <span class="nav-icon"><i class="bi bi-box-seam"></i></span>
      <span class="nav-text">Stock Produits</span>
    </a>

  </nav>
</aside>