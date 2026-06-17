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
                                <h1 class="h3 mb-1"> Choisissez votre Produit  : </h1>
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
                                        <div class="form-text mt-1">Prix unitaire: <strong id="productPriceLabel">-</strong></div>
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
                                    <div class="mt-2 text-end"><strong>Total (€): <span id="cartTotal">0.00</span></strong></div>
                                </div>
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
        const CART_KEY = 'achat_cart_v1';
        const PRICES = {
            <?php foreach ($produits as $produit): ?>
                <?= json_encode($produit['id']) ?>: <?= json_encode((float)$produit['prix_unitaire']) ?>,
            <?php endforeach; ?>
        };

        function getCart() {
            try { return JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }
            catch (e) { return []; }
        }

        function saveCart(cart) { localStorage.setItem(CART_KEY, JSON.stringify(cart)); }

        function renderCart() {
            const tbody = document.getElementById('cartTableBody');
            if (!tbody) return;
            tbody.innerHTML = '';
            const cart = getCart();
            cart.forEach((item, i) => {
                const unitPrice = Number(item.unitPrice) || 0;
                const qty = Number(item.qty) || 0;
                const lineTotal = unitPrice * qty;
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${item.designation}</td>
                    <td>${qty}</td>
                    <td>${unitPrice.toFixed(2)} Ar</td>
                    <td>${lineTotal.toFixed(2)} Ar</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-danger remove-btn" data-index="${i}">Supprimer</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            // Gestion des boutons "Supprimer"
            Array.from(document.getElementsByClassName('remove-btn')).forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const idx = Number(e.currentTarget.getAttribute('data-index'));
                    const c = getCart();
                    c.splice(idx, 1);
                    saveCart(c);
                    renderCart();
                });
            });

            // Mise à jour du total
            const totalPrice = cart.reduce((s, it) => {
                const unitPrice = Number(it.unitPrice) || 0;
                const qty = Number(it.qty) || 0;
                return s + unitPrice * qty;
            }, 0);
            const totalEl = document.getElementById('cartTotal');
            if (totalEl) totalEl.textContent = totalPrice.toFixed(2) + ' Ar';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const addBtn = document.getElementById('addProductBtn');
            const clearBtn = document.getElementById('clearCartBtn');
            const productSelect = document.getElementById('productSelect');
            const qtyInput = document.getElementById('productQty');
            const priceLabel = document.getElementById('productPriceLabel');

            // Mise à jour du prix affiché lors du changement de produit
            if (productSelect) {
                productSelect.addEventListener('change', () => {
                    const id = productSelect.value;
                    if (id && PRICES[id] != null) {
                        priceLabel.textContent = PRICES[id].toFixed(2) + ' Ar';
                    } else {
                        priceLabel.textContent = '-';
                    }
                });
            }

            // Ajout d'un produit
            if (addBtn) {
                addBtn.addEventListener('click', () => {
                    const id = productSelect.value;
                    const qty = parseInt(qtyInput.value, 10) || 0;

                    if (!id) { alert('Veuillez choisir un produit.'); return; }
                    if (qty < 1) { alert('Quantité invalide.'); return; }

                    // Récupération de la désignation depuis l'option sélectionnée
                    const selectedOption = productSelect.options[productSelect.selectedIndex];
                    const designation = selectedOption ? selectedOption.text : id;

                    const unitPrice = PRICES[id];
                    if (unitPrice == null) { alert('Prix non trouvé pour ce produit.'); return; }

                    const cart = getCart();
                    cart.push({
                        id: id,
                        designation: designation,
                        qty: qty,
                        unitPrice: unitPrice
                    });
                    saveCart(cart);
                    renderCart();

                    // Réinitialisation du formulaire
                    productSelect.value = '';
                    qtyInput.value = 1;
                    priceLabel.textContent = '-';
                });
            }

            // Vider le panier
            if (clearBtn) {
                clearBtn.addEventListener('click', () => {
                    if (confirm('Vider le panier ?')) {
                        localStorage.removeItem(CART_KEY);
                        renderCart();
                    }
                });
            }

            renderCart();
        });
    })();
</script>
      <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>