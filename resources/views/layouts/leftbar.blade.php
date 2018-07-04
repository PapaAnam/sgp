<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            {{-- <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a> --}}
            <a class="navbar-brand" href="#"><b>Sistem</b> Gadai</a>
            <a class="navbar-brand hidden" href="#"><b>S</b> G</a>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('barang.index') }}"> <i class="menu-icon fa fa-cube"></i>Barang </a>
                </li>
                <li class="active">
                    <a href="{{ route('konsumen.index') }}"> <i class="menu-icon fa fa-users"></i>Konsumen </a>
                </li>
                <li class="active">
                    <a href="{{ route('order-final.index') }}"> <i class="menu-icon fa fa-credit-card"></i>Order Final </a>
                </li>
                <li class="active">
                    <a href="{{ route('pelunasan.index') }}"> <i class="menu-icon fa fa-paypal"></i>Pelunasan </a>
                </li>
                <li class="active">
                    <a href="{{ route('perpanjangan.index') }}"> <i class="menu-icon fa fa-arrows-h"></i>Perpanjangan </a>
                </li>
                <li class="active">
                    <a target="_blank" href="{{ route('order-final.print-all') }}"> <i class="menu-icon fa fa-print"></i>Laporan Rahn </a>
                </li>
                <li class="active">
                    <a target="_blank" href="{{ route('order-final.due-date') }}"> <i class="menu-icon fa fa-print"></i>Laporan Due Date </a>
                </li>
                <li class="active">
                    <a target="_blank" href="{{ route('order-final.keuangan') }}"> <i class="menu-icon fa fa-print"></i>Laporan Keuangan </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>