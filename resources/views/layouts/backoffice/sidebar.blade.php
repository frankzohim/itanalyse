   <!-- Page Sidebar Start-->
   <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="{{route('dashboard')}}"><img class="blur-up lazyloaded" src="/assets/backend/images/dashboard/logo.png" alt=""></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="/assets/backend/images/dashboard/anonymous.jpg" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{{auth()->user()->name}}</h6>
                    <p></p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{route('dashboard')}}"><i data-feather="home"></i><span>Tableau de bord</span></a></li>
                    </li>
                    <li><a class="sidebar-header" href="{{route('turnover.index')}}"><i data-feather="dollar-sign"></i> <span>Chiffre d'affaires</span></a>
                    </li>
                    <li><a class="sidebar-header" href="{{route('return.index')}}"><i data-feather="log-in"></i><span>Retours</span></a>
                    </li>
                    <li><a class="sidebar-header" href="{{route('company.index')}}"><i data-feather="codepen"></i><span>Entreprises</span></a>
                    </li>
                    <li><a class="sidebar-header" href="{{route('provider.index')}}"><i data-feather="codepen"></i><span>Fournisseurs</span></a>
                    </li>
		    <li><a class="sidebar-header" href="{{route('store.index')}}"><i data-feather="codepen"></i><span>Magasin</span></a>
                    </li>
                     <li><a class="sidebar-header" href="{{route('command')}}"><i data-feather="archive"></i><span>Suivi Commande</span></a>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="codepen"></i><span>Parc Entreprise</span></a>
                    </li>
                   
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Taux Conversion</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="#"><i class="fa fa-circle"></i>Entreprise</a></li>
                            <li><a href="#"><i class="fa fa-circle"></i>Famille Produit</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="camera"></i><span>Récurrence</span></a></li>
                    @if(auth()->user()->role_id == 1)
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Utilisateurs</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="#"><i class="fa fa-circle"></i>Liste Utilisateurs</a></li>
                                <li><a href="#"><i class="fa fa-circle"></i>Créer Utilisateur</a></li>
                            </ul>
                        </li>
                    @endif
                   
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->