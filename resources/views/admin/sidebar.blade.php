

       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-store"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('admin.dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>{{ __('admin.categories') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{ route('admin.categories.index') }}">{{ __('admin.all categories') }}</a>
                        <a class="collapse-item" href="{{ route('admin.categories.create') }}">{{ __('admin.addnew') }}</a>
                        <a class="collapse-item" href="{{ route('admin.categories.trash') }}">{{ __('admin.trash') }}</a>

                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>{{ __('admin.prodects') }}</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{ route('admin.products.index') }}">{{ __('admin.allProdects') }}</a>
                        <a class="collapse-item" href="{{ route('admin.products.create') }}">{{ __('admin.addNewp') }}</a>
                        <a class="collapse-item" href="{{ route('admin.products.trash') }}">{{ __('admin.trashp') }}</a>

                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>{{ __('admin.orders') }}</span></a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-money-bill"></i>
                        <span>{{ __('admin.payments') }}</span></a>
                    </li>
                    <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>{{ __('admin.users') }}</span></a>
                    </li>



            <!-- Divider -->
            <hr class="sidebar-divider">




            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
