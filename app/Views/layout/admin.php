<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Admin' ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

<div class="admin-shell">

  <?= $this->include('layout/sidebar') ?>

  <div class="admin-main">

    <?= $this->include('layout/navbar') ?>

    <main class="dashboard-content">
      <div class="container-fluid px-3 px-lg-4 py-4">
        <?= $this->renderSection('content') ?>
      </div>
    </main>

    <?= $this->include('layout/footer') ?>

  </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>
</html>