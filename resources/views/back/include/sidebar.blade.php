<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="#" alt=""
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Blog</span>
        <br>
        <span style="font-size: 14px;">Ariful Islam(administrator)</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Centers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.center.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Center</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.center.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Center List</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Contents
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.content.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Content</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.content.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Content List</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team Member
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.team-member.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Team Member</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.team-member.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Team Member List</p>

                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Client
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.our-client.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Our Client</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.our-client.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Our Client List</p>

                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-link"></i>
                        <p>
                            Social Link
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.social-link.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Social Link</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.social-link.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Social Link</p>

                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.page.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Page</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Page List</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Service
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.service.create') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Add Service</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.service.index') }}" class="nav-link">
                                <i class="far fa-plus nav-icon"></i>
                                <p>Service List</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
