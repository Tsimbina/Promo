<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h3>Liste des achats</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($achats as $a): ?>
      <tr>
        <td>#<?= $a['id'] ?></td>
        <td><?= $a['date_achat'] ?></td>
        <td><?= $a['prix_total'] ?></td>
        <td>
          <a class="btn btn-primary btn-sm"
             href="<?= site_url('/achat/' . $a['id']) ?>">
             Voir
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?= $this->endSection() ?>