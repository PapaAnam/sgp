<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $title }}</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    @include('layouts.link-rel')
</head>
<body>
    @include('layouts.leftbar')
    <div id="right-panel" class="right-panel">
        @include('layouts.header')

        @include('layouts.breadcrumb')

        <div class="content mt-3">
            <div class="animated fadeIn">
                @yield('content')
            </div>
        </div> 
    </div>
    <form id="form-keluar" action="{{ route('logout') }}" method="post">
        @csrf
    </form>
    @include('layouts.js')
</body>

</html>