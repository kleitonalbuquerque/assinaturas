        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{URL::asset('assets/images/icon/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                        @if ($active == 'dashbord')
                            <li class="active">
                        @else
                            <li>
                        @endif
                                <a href="{{route('dashbord.index')}}"><i class="ti-dashboard"></i><span>Pedidos</span></a>
                            </li>
                        @if ($active == 'companies')
                            <li class="active">
                        @else
                            <li>
                        @endif
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Empresas</span></a>
                                <ul class="collapse">
                                @if ($active == 'companies' && $activeList == 'Listagem')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('companies.index')}}">Listagem</a></li>
                                @if ($active == 'companies' && $activeList == 'Cadastro')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('companies.create')}}">Cadastro</a></li>
                                </ul>
                            </li>
                        @if ($active == 'employees')
                            <li class="active">
                        @else
                            <li>
                        @endif
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Cooperadores</span></a>
                                <ul class="collapse">
                                @if ($active == 'employees' && $activeList == 'Listagem')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('employees.index')}}">Listagem</a></li>
                                @if ($active == 'employees' && $activeList == 'Cadastro')
                                    <li class="active">
                                @else
                                    <li>
                                @endif
                                        <a href="{{route('employees.create')}}">Cadastro</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->