<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Forms | adminHMD</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
            <div class="sidebar-header">
                <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
                    <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
                    <span class="brand-copy">
                        <span class="brand-title">PROMO</span>
                        <span class="brand-subtitle">Admin Template</span>
                    </span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <a class="nav-link" href="tables.html">
                    <span class="nav-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                    <span class="nav-text">Produits</span>
                </a>
            </nav>



            <div class="sidebar-footer">
                <span class="status-dot"></span>
                <span class="sidebar-footer-text">System running smoothly</span>
            </div>
        </aside>

        <div class="admin-main">
            <nav class="navbar admin-navbar navbar-expand bg-white">
                <div class="container-fluid px-3 px-lg-4">
                    <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
                        aria-expanded="true" aria-label="Toggle sidebar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>



                    <div class="navbar-actions ms-auto">
                        <button class="icon-button theme-toggle" type="button" data-theme-toggle
                            aria-label="Switch color theme" title="Switch color theme">
                            <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </nav>

            <main class="dashboard-content">
                <div class="container-fluid px-3 px-lg-4 py-4">
                    <div class="page-heading">
                        <div class="page-heading-copy">
                            <span class="page-icon"><i class="bi bi-ui-checks-grid" aria-hidden="true"></i></span>
                            <div>
                                <p class="eyebrow mb-1">Inputs</p>
                                <h1 class="h3 mb-1"> Choisissez votre caisse : </h1>
                                <p class="text-muted mb-0">Formulaire pour choisir la caisse pour l'achat</p>
                            </div>
                        </div>

                    </div>

                    <section class="row g-3">
                        <div class="col-12 col-xl-7">
                            <form class="panel needs-validation" novalidate>
                                <div class="panel-header">
                                    <div>
                                        <h2 class="h5 mb-1 section-title"><i class="bi bi-ui-checks-grid"
                                                aria-hidden="true"></i><span>Validation Form</span></h2>
                                        <p class="text-muted mb-0">Choisir le numéro de caisse : </p>
                                    </div>
                                </div>
                                <div class="row g-3">
                                   
                                    <div class="col-md-6"><label class="form-label" for="formPlan">Plan</label><select
                                            class="form-select" id="formPlan" required>
                                            <option value="">Choisir numéro de caisse</option>
                                            <option>C001</option>
                                            <option>C002</option>
                                            <option>C003</option>
                                        </select>
                                        <div class="invalid-feedback">Choisisser le numéro de caisse</div>
                                    </div>
                                  
                                  
                                </div>
                                <div class="d-flex justify-content-end mt-4"><button class="btn btn-primary"
                                        type="submit"><i class="bi bi-send" aria-hidden="true"></i>Valider</button>
                                </div>
                            </form>
                        </div>
                      
                    </section>
                </div>
            </main>

            <footer class="admin-footer">
                <div class="container-fluid px-3 px-lg-4">
                    <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success"
                            href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a
                            target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a>
                    </span>
                    <span>Professional dashboard template.</span>
                    <span>Form component examples.</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>