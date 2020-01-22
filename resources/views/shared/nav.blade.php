<ul class="nav">
    <!--ONLY ADMINISTRADOR-->
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('/')) class="active" @endif>
            <a href="{{asset('/')}}">
                <i class="ti-home"></i>
                <p>inicio</p>
            </a>
        </li>
    @endif
        <li @if(Request::is('vender')) class="active" @endif>
            <a href="{{asset('/vender')}}">
                <i class="ti-shopping-cart"></i>
                <p>VENDER</p>
            </a>
        </li>
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/ventas')) class="active" @endif>
            <a href="{{asset('administrador/ventas')}}">
                <i class="ti-money"></i>
                <p>VENTAS</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/clientes')) class="active" @endif>
            <a href="{{asset('administrador/clientes')}}">
                <i class="ti-user"></i>
                <p>CLIENTES</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/creditos')) class="active" @endif>
            <a href="{{asset('administrador/creditos')}}">
                <i class="ti-user"></i>
                <p>CREDITOS</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/productos')) class="active" @endif>
            <a href="{{asset(Auth::user()->rol.'/productos')}}">
                <i class="ti-bag"></i>
                <p>INVENTARIO</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/proveedores')) class="active" @endif>
            <a href="{{asset(Auth::user()->rol.'/proveedores')}}">
                <i class="ti-user"></i>
                <p>PROVEEDORES</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
    <li @if(Request::is('reportes')) class="active" @endif>
        <a href="{{asset('reportes')}}">
            <i class="ti-file"></i>
            <p>REPORTES</p>
        </a>
    </li>
    @endif
    <li @if(Request::is('compras')) class="active" @endif>
        <a href="{{asset('/compras')}}">
            <i class="ti-share"></i>
            <p>COMPRAS</p>
        </a>
    </li>
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/sucursales')) class="active" @endif>
            <a href="{{asset(Auth::user()->rol.'/sucursales')}}">
                <i class="ti-home"></i>
                <p>SUCURSALES</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/usuarios')) class="active" @endif>
        <a href="{{asset('administrador/usuarios')}}">
            <i class="ti-user"></i>
            <p>EMPLEADOS</p>
        </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/traspasos')) class="active" @endif>
            <a href="{{asset('administrador/traspasos')}}">
                <i class="ti-share"></i>
                <p>TRASPASOS</p>
            </a>
        </li>
    @endif
    <li @if(Request::is('devoluciones')) class="active" @endif>
        <a href="/">
            <i class="ti-share-alt"></i>
            <p>DEVOLUCIONES</p>
        </a>
    </li>
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/categorias')) class="active" @endif>
            <a href="{{asset(Auth::user()->rol.'/categorias')}}">
                <i class="ti-rss"></i>
                <p>CATEGORIAS</p>
            </a>
        </li>
    @endif
    @if(Auth::user()->rol == 'administrador')
        <li @if(Request::is('administrador/marcas')) class="active" @endif>
            <a href="{{asset('administrador/marcas')}}">
                <i class="ti-rss"></i>
                <p>MARCAS</p>
            </a>
        </li>
    @endif
    <li @if(Request::is('mi-sucursal')) class="active" @endif>
        <a href="{{asset('mi-sucursal')}}">
            <i class="ti-home"></i>
            <p>mi sucursal</p>
        </a>
    </li>
</ul>