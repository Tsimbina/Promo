<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <div class="page-heading-copy">
        <span class="page-icon"><i class="bi bi-ui-checks-grid"></i></span>
        <div>
            <p class="eyebrow mb-1">Inputs</p>
            <h1 class="h3 mb-1">Choisissez votre caisse</h1>
            <p class="text-muted mb-0">Formulaire pour choisir la caisse pour l'achat</p>
        </div>
    </div>
</div>

<section class="row g-3">
    <div class="col-12 col-xl-7">

        <form class="panel needs-validation"
              novalidate
              method="get"
              action="<?= site_url('/check-caisse') ?>">

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title">
                        <i class="bi bi-ui-checks-grid"></i>
                        <span>Validation Form</span>
                    </h2>
                    <p class="text-muted mb-0">Choisir le numéro de caisse :</p>
                </div>
            </div>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Plan</label>

                    <select class="form-select"
                            id="num"
                            name="num"
                            required>

                        <option value="">Choisir numéro de caisse</option>

                        <?php foreach ($caisses as $caisse): ?>
                            <option value="<?= esc($caisse['id']) ?>">
                                <?= esc($caisse['numero_caisse']) ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <div class="invalid-feedback">
                        Choisissez le numéro de caisse
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-send"></i> Valider
                </button>
            </div>

        </form>

    </div>
</section>

<?= $this->endSection() ?>