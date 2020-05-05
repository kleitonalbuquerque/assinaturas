<!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>                      
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- <img class="avatar user-thumb" src="{{URL::asset('assets/images/author/avatar.png')}}" alt="avatar"> -->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="">Message</a> -->
                                <!-- <a class="dropdown-item" href="">Settings</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}                 
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-sm-2 pull-right">
                            <ul class="notification-area pull-left">
                                <!-- <li id="full-view"><i class="ti-fullscreen"></i></li> -->
                                <!-- <li id="full-view-exit"><i class="ti-zoom-out"></i></li> -->
                                <li class="dropdown">
                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                        @inject('notifications', 'App\Http\Controllers\DashController')

                                        <span>{{ $notifications->notifications() }}</span>
                                    </i>
                                    <div class="dropdown-menu bell-notify-box notify-box">
                                        <span class="notify-title">Você tem {{ $notifications->notifications() }} novos pedidos <a href="{{route('dashbord.index')}}">Ver todas</a></span>
                                        <div class="nofity-list">
                                        @inject('pedidos', 'App\Http\Controllers\DashController')  
                                        @if(count($pedidos->pedidos()) > 0)
                                            @foreach($pedidos->pedidos() as $pedido)
                                                <a href="{{route('employees.show', $pedido->id)}}" class="notify-item">
                                                    <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                                    <div class="notify-text">
                                                        <p>{{$pedido->name}}</p>
                                                        <span>{{$pedido->created_at}}/span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @else
                                            <div class="container"><div class="col-md-12"><p class="">Não há novas solicitações</p></div></div>
                                        @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->