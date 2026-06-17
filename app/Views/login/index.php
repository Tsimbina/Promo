<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD authentication page">
    <title>Login | adminHMD</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="auth-body">
    <button class="icon-button theme-toggle auth-theme-toggle" type="button" data-theme-toggle
        aria-label="Switch color theme" title="Switch color theme">
        <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
    </button>
    <main class="auth-page">
        <section class="auth-card">
            <a class="auth-brand" href="index.html"><span class="brand-icon"><i class="bi bi-grid-1x2-fill"
                        aria-hidden="true"></i></span><span><strong>Promo</strong><small>Connectez-vous à votre page de gestion d'achat.</small></span></a>
            <form class="needs-validation" novalidate>
                <div class="mb-4">
                    <p class="eyebrow mb-1">Accès de Sécurité</p>
                    <h1 class="h3 mb-1">Login</h1>
                    <p class="text-muted mb-0">Login pour la gestion d'achat</p>
                </div>
                <div class="mb-3"><label class="form-label" for="login">Email address</label><input class="form-control"
                        id="login" type="text" required>
                    <div class="invalid-feedback">Enter a valid email.</div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between"><label class="form-label" for="loginPassword">Mot de
                            passe : </label><a class="small fw-semibold" href="forgot-password.html">Forgot?</a></div>
                    <input class="form-control" id="loginPassword" type="password" minlength="6" required>
                    <div class="invalid-feedback">Password must be at least 6 characters.</div>
                </div>
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-box-arrow-in-right"
                        aria-hidden="true"></i> Sign In</button>
            </form>

        </section>
    </main>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>