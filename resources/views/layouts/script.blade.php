
<!-- BEGIN: Vendor JS-->

<script src="{{asset("app-assets/vendors/js/vendors.min.js")}}"></script>
<script src="{{asset("app-assets/vendors/js/forms/select/select2.full.min.js")}}"></script>
<script src="{{asset("app-assets/js/core/app-menu.min.js")}}"></script>
<script src="{{asset("app-assets/js/core/app.min.js")}}"></script>
<script src="{{asset("app-assets/js/scripts/customizer.min.js")}}"></script>
<script src="{{asset("app-assets/js/scripts/forms/form-select2.js")}}"></script>

@yield('js')
<script>
    $(window).on('load',  function(){
    if (feather) {
        feather.replace({ width: 14, height: 14 });
    }
    })
</script>
