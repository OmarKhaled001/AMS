<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">
<title class="fw-bold">AMS</title>
<link rel="apple-touch-icon" href="{{asset("app-assets/images/ico/apple-icon-120.png")}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset("app-assets/images/ico/favicon.ico")}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
<!-- BEGIN: Theme CSS-->

@if (App::getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/vendors-rtl.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/select/select2.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/bootstrap.min.css")}}">
    @yield('css')

    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/bootstrap-extended.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/colors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/components.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/themes/dark-layout.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/themes/bordered-layout.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/themes/semi-dark-layout.min.css")}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css")}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/custom-rtl.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/style-rtl.css")}}">
    <!-- END: Custom CSS-->
@else
        <!-- BEGIN: Vendor CSS-->

        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/vendors.min.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/forms/select/select2.min.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/charts/apexcharts.css")}}">
        <!-- BEGIN: Theme CSS-->
        @yield('css')

        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/colors.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/components.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/themes/dark-layout.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/themes/bordered-layout.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/themes/semi-dark-layout.min.css">
    
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/core/menu/menu-types/vertical-menu.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/pages/dashboard-ecommerce.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/css/plugins/charts/chart-apex.min.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets")}}/style.css">
@endif
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
