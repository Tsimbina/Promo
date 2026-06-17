<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h1 class="h3">Stock des Produits</h1>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Désignation</th>
            <th>Prix unitaire</th>
            <th>Stock</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($stocks as $s): ?>
            <tr>
                <td><?= esc($s['designation']) ?></td>
                <td><?= esc($s['prix_unitaire']) ?></td>
                <td>
                    <?php if ($s['stock'] <= 0): ?>
                        <span class="badge text-bg-danger">
                            <?= $s['stock'] ?>
                        </span>
                    <?php else: ?>
                        <span class="badge text-bg-success">
                            <?= $s['stock'] ?>
                        </span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>