<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Painel de administração</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <!-- App css -->
    <link href="{{url(mix('admin/assets/css/bootstrap.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/icons.min.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/app.css'))}}" rel="stylesheet" type="text/css" />
    <link href="{{url(mix('admin/assets/css/main.css'))}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">
@if(Session::has('success'))
    <script>
        $(document).ready(function(){
            $.NotificationApp.send("Sucesso!", "{{Session::get('success')}}", "top-right", "#5ba035", "success")
        });
    </script>
@endif
@if(Session::has('error'))

    <script>
        $(document).ready(function() {
            $.NotificationApp.send("Erro!", "{{Session::get('error')}}", "top-right", "#bf441d", "error");
        });
    </script>

@endif
@if(Session::has('info'))

    <script>
        $(document).ready(function(){
            $.NotificationApp.send("Heads up!", "{{Session::get('info')}}", "top-right", "#3b98b5", "info");
        });
    </script>

@endif

@if(count($errors)>0)
    <ul class="list-group">
        @foreach($errors->all() as $error)

            <script>
                $(document).ready(function(){
                    $.NotificationApp.send("Erro!", "{{$error}}", "top-right", "#bf441d", "error");
                    {{--demo.showNotification('top','center','{{$error}}','warning');--}}
                });
            </script>

        @endforeach
    </ul>
@endif

@yield('content')

<!-- Vendor js -->
<script src="{{url(mix('admin/assets/js/vendor.min.js'))}}"></script>

<!-- App js -->
<script src="{{url(mix('admin/assets/js/app.min.js'))}}"></script>

</body>
</html>
