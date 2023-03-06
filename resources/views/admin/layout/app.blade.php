<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/admin/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/my-admin.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/highlight/styles/monokai-sublime.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/file-upload/file-upload-with-preview.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="/assets/admin/plugins/editors/markdown/simplemde.min.css">
    <!-- END PAGE LEVEL STYLE -->
    <!-- Optional theme -->
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/components/cards/card.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/elements/infobox.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/loader.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/plugins.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/scrollspyNav.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/structure.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/contacts.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/invoice.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/mailbox.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/mailing-chat.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/notes.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/scrumboard.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/apps/todolist.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/forms/custom-clipboard.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/forms/switches.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/forms/theme-checkbox-radio.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/css/authentication/form-1.css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    {{--    Sweet alert--}}
    <link href="/assets/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="/assets/admin/css/dashboard/dash_1.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/pages/helpdesk.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/users/user-profile.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/components/custom-modal.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="/assets/admin/css/widgets/modules-widgets.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/dropify/dropify.min.css">
    <link href="/assets/admin/css/users/account-setting.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/table/datatable/dt-global_style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link href='https://css.gg/css' rel='stylesheet'>
    <title>{{$conf->company_name ?? 'Mangopaid'}}</title>
    @yield('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->
@include('admin.layout.menu')
@yield('content')
<script src="/assets/admin/js/libs/jquery-3.1.1.min.js"></script>
<script src="/assets/admin/bootstrap/js/popper.min.js"></script>
<script src="/assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/admin/plugins/blockui/jquery.blockUI.min.js"></script>
<script src="/assets/admin/js/app.js"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="/assets/admin/plugins/dropify/dropify.min.js"></script>
<script src="/assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/admin/js/custom.js"></script>
<script src="/assets/admin/js/loader.js"></script>
<script src="/assets/admin/js/scrollspyNav.js"></script>
<script src="/assets/admin/plugins/highlight/highlight.pack.js"></script>
<script src="/assets/admin/js/custom.js"></script>
<script src="/assets/admin/plugins/select2/select2.min.js"></script>
<script>
    $(".tagging").select2({
        tags: true
    });
</script>
<script src="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/assets/admin/plugins/sweetalerts/promise-polyfill.js"></script>
<script src="/assets/admin/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="/assets/admin/plugins/sweetalerts/custom-sweetalert.js"></script>
<script src="/assets/admin/js/apps/invoice.js"></script>
<script src="/assets/admin/js/apps/contact.js"></script>
<script src="/assets/admin/plugins/editors/markdown/simplemde.min.js"></script>
<script src="/assets/admin/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="/assets/admin/plugins/apex/apexcharts.min.js"></script>
<script src="/assets/admin/js/widgets/modules-widgets.js"></script>
<script src="/assets/admin/js/pages/helpdesk.js"></script>
<script src="/assets/admin/js/users/account-settings.js"></script>
<script src="/assets/admin/js/authentication/form-1.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"/>

<script>
    // $(document).ready(function () {
    //     $('#myTable').DataTable();
    // });

    function showToast(type, message) {
        new Noty({
            type: type,
            theme: 'bootstrap-v4',
            text: message,
        }).show();
    }
</script>
@if(session('success'))
    <script>
        showToast('success', '{{session('success')}}');
    </script>
@endif
@if(session('error'))
    <script>
        showToast('error', '{{session('error')}}');
    </script>
@endif
<script>
    $('.noty_theme__bootstrap-v4.noty_type__error').show(1).delay(2000).hide(1);
    $('.noty_theme__bootstrap-v4.noty_type__success').show(1).delay(1000).hide(1);
</script>
@yield('footer')
</body>
</html>

