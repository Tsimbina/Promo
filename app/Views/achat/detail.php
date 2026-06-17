<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<h3>Achat #<?= $achat['id'] ?></h3>

<p>Date : <?= $achat['date_achat'] ?></p>
<p>Total : <?= $achat['prix_total'] ?></p>

<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Produit</th>
      <th>Quantité</th>
      <th>Prix</th>
      <th>Total</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($lignes as $l): ?>
      <tr>
        <td><?= $l['produit_id'] ?></td>
        <td><?= $l['quantite'] ?></td>
        <td><?= $l['prix_unitaire'] ?></td>
        <td><?= $l['quantite'] * $l['prix_unitaire'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?= site_url('/achat') ?>" class="btn btn-secondary">
  Retour
</a>

<?= $this->endSection() ?>