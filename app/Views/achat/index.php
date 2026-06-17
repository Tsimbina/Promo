<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Forms | adminHMD</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
                                <h1 class="h3 mb-1">Choisissez votre Produit :</h1>
                                <p class="text-muted mb-0">Formulaire pour choisir le Produit pour l'achat</p>
                            </div>
                        </div>
                    </div>

                    <section class="row g-3">
                        <div class="col-12 col-xl-7">
                            <form class="panel" id="addProductForm">
                                <div class="panel-header">
                                    <div>
                                        <h2 class="h5 mb-1 section-title"><i class="bi bi-bag-plus"
                                                aria-hidden="true"></i><span>Ajout de produits</span></h2>
                                        <p class="text-muted mb-0">Sélectionnez un produit et sa quantité, puis cliquez sur <strong>Ajouter</strong>.</p>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label class="form-label" for="productSelect">Produit</label>
                                        <select class="form-select" id="productSelect" required>
                                            <option value="">-- Choisir un produit --</option>
                                            <?php foreach ($produits as $produit): ?>
                                                <option value="<?= esc($produit['id']) ?>"><?= esc($produit['designation']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="form-text mt-1">Prix unitaire : <strong id="productPriceLabel">-</strong></div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="productQty">Quantité</label>
                                        <input class="form-control" id="productQty" type="number" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="btn btn-primary" type="button" id="addProductBtn"><i class="bi bi-plus" aria-hidden="true"></i> Ajouter</button>
                                    <button class="btn btn-danger ms-2" type="button" id="clearCartBtn">Vider</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-xl-12 mt-4">
                            <section class="panel">
                                <div class="panel-header">
                                    <div>
                                        <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>Panier</span></h2>
                                        <p class="text-muted mb-0">Liste des produits ajoutés.</p>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0" id="cartTable">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                                <th>Prix unitaire</th>
                                                <th>Sous-total</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cartTableBody">
                                            <!-- lignes ajoutées dynamiquement -->
                                        </tbody>
                                    </table>
                                    <div class="mt-2 text-end"><strong>Total (Ar) : <span id="cartTotal">0.00</span></strong></div>
                                </div>

                                <!-- Formulaire de clôture -->
                                <form id="cartForm" action="/achat/save" method="POST" class="mt-3">
                                    <input type="hidden" name="cart_data" id="cartData" value="">
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success" id="closeOrderBtn">
                                            <i class="bi bi-check-circle" aria-hidden="true"></i> Clôturer achat
                                        </button>
                                    </div>
                                </form>
                            </section>
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
    <script>
        (function () {
            // ---------- Données et prix depuis PHP ----------
            const PRICES = {
                <?php foreach ($produits as $produit): ?>
                    <?= json_encode($produit['id']) ?>: {
                        designation: <?= json_encode($produit['designation']) ?>,
                        price: <?= json_encode((float)$produit['prix_unitaire']) ?>
                    },
                <?php endforeach; ?>
            };

            // ---------- Panier en mémoire ----------
            let cartItems = []; // chaque élément : { id, qty }

            // ---------- Rendu du panier ----------
            function renderCart() {
                const tbody = document.getElementById('cartTableBody');
                if (!tbody) return;
                tbody.innerHTML = '';

                cartItems.forEach((item, index) => {
                    const product = PRICES[item.id];
                    if (!product) return; // sécurité
                    const unitPrice = product.price;
                    const qty = Number(item.qty) || 0;
                    const lineTotal = unitPrice * qty;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${product.designation}</td>
                        <td>${qty}</td>
                        <td>${unitPrice.toFixed(2)} Ar</td>
                        <td>${lineTotal.toFixed(2)} Ar</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-danger remove-btn" data-index="${index}">Supprimer</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });

                // Événements "Supprimer"
                document.querySelectorAll('.remove-btn').forEach(btn => {
                    btn.addEventListener('click', function (e) {
                        const idx = Number(this.getAttribute('data-index'));
                        cartItems.splice(idx, 1);
                        renderCart();
                    });
                });

                // Mise à jour du total
                const total = cartItems.reduce((sum, it) => {
                    const product = PRICES[it.id];
                    if (!product) return sum;
                    return sum + product.price * it.qty;
                }, 0);
                const totalEl = document.getElementById('cartTotal');
                if (totalEl) totalEl.textContent = total.toFixed(2) + ' Ar';

                // Mise à jour du champ caché (envoi uniquement des IDs et quantités)
                const cartDataInput = document.getElementById('cartData');
                if (cartDataInput) {
                    const payload = cartItems.map(item => ({ id: item.id, qty: item.qty }));
                    cartDataInput.value = JSON.stringify(payload);
                }
            }

            // ---------- Ajout d'un produit ----------
            function addProduct() {
                const select = document.getElementById('productSelect');
                const qtyInput = document.getElementById('productQty');
                const priceLabel = document.getElementById('productPriceLabel');

                const id = select.value;
                const qty = parseInt(qtyInput.value, 10) || 0;

                if (!id) { alert('Veuillez choisir un produit.'); return; }
                if (qty < 1) { alert('Quantité invalide.'); return; }

                // Vérifier que le produit existe dans PRICES
                if (!PRICES[id]) { alert('Produit inconnu.'); return; }

                // Ajouter au panier
                cartItems.push({ id: id, qty: qty });

                renderCart();

                // Réinitialiser le formulaire
                select.value = '';
                qtyInput.value = 1;
                if (priceLabel) priceLabel.textContent = '-';
            }

            // ---------- Vider le panier ----------
            function clearCart() {
                if (confirm('Vider le panier ?')) {
                    cartItems = [];
                    renderCart();
                }
            }

            // ---------- Initialisation ----------
            document.addEventListener('DOMContentLoaded', function () {
                const addBtn = document.getElementById('addProductBtn');
                const clearBtn = document.getElementById('clearCartBtn');
                const productSelect = document.getElementById('productSelect');
                const priceLabel = document.getElementById('productPriceLabel');

                // Mise à jour du prix affiché
                productSelect.addEventListener('change', function () {
                    const id = this.value;
                    if (id && PRICES[id]) {
                        priceLabel.textContent = PRICES[id].price.toFixed(2) + ' Ar';
                    } else {
                        priceLabel.textContent = '-';
                    }
                });

                addBtn.addEventListener('click', addProduct);
                clearBtn.addEventListener('click', clearCart);

                renderCart();
            });
        })();
    </script>
</body>

</html>