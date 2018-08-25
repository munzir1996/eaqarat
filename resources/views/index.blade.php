<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>عقاري</title>
    @include('_includes._head') 
    @yield('stylesheets')
</head>

<body class="rtl loaded">
    <!-- Preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    @include('_includes._navbar') 
    
    @yield('content') 
    

    @include('_includes._footer') 
    
    @include('_includes._javascript') 
    
    @include('_includes._messages')
    
    @yield('scripts')

</body>

</html>