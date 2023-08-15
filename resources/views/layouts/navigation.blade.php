<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a {{ Request::is('pos*') ? 'active' : '' }}" href="{{ route('pos.index') }}" class="nav-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <p>
                        {{ __('PDV') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Commandes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a {{ Request::is('orders/complete*') ? 'active' : '' }}" href="{{ route('order.completeOrders') }}" class="nav-link">
                            <i class="fa-solid fa-circle-check"></i>
                            <p>Complet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {{ Request::is('orders/due*') ? 'active' : '' }}" href="{{ route('order.dueOrders') }}" class="nav-link">
                            <i class="fa-solid fa-credit-card"></i>
                            <p>Dû</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {{ Request::is('orders/pending*') ? 'active' : '' }}" href="{{ route('order.pendingOrders') }}" class="nav-link">
                            <i class="fa-solid fa-clock"></i>
                            <p>En attente</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Achats
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a {{ Request::is('purchases', 'purchase/create*', 'purchases/details*') ? 'active' : '' }}" href="{{ route('purchases.allPurchases') }}" class="nav-link">
                            <i class="fa-solid fa-cash-register"></i>
                            <p>Tous</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {{ Request::is('purchases/approved*') ? 'active' : '' }}" href="{{ route('purchases.approvedPurchases') }}" class="nav-link">
                            <i class="fa-solid fa-circle-check"></i>
                            <p>Approbation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {{ Request::is('purchases/report*') ? 'active' : '' }}" href="{{ route('purchases.dailyPurchaseReport') }}" class="nav-link">
                            <i class="fa-solid fa-flag"></i>
                            <p>Rapport quotidien des achats</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Client') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Fournisseurs') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                   <i class="fa-solid fa-boxes-stacked"></i>
                    <p>
                        {{ __(' Produits') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                   <i class="fa-solid fa-folder"></i>
                    <p>
                        {{ __('Categories') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('units*') ? 'active' : '' }}" href="{{ route('units.index') }}">
                   <i class="fa-solid fa-folder"></i>
                    <p>
                        {{ __('Unités') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->