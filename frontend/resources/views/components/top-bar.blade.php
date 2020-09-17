<div class="collapse navbar-collapse" id="navbar-mobile">
    <ul class="nav navbar-nav mr-auto float-left">
        <li class="nav-item d-none d-md-block " style="padding-left: 10px">
            {{--<a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a>--}}
        </li>
    </ul>
    <ul class="nav navbar-nav float-right" style="z-index: 99999">
        <li class="dropdown dropdown-user nav-item top-bar-user">
            <a href="{{route('auth.logoff')}}" class="dropdown-toggle nav-link dropdown-user-link navbar-menu-top-sandwich" style="color: white" href="#" data-toggle="dropdown">
                <span class="mr-1">
                    <i class="la la-power-off"></i>Sair
                </span>            
            </a>
        </li>
    </ul>
</div>
