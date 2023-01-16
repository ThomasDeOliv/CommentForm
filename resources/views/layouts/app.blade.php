<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/app.css') }}">
        <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favico.png') }}">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#comment',
                width: 'calc(100% - 180px)',
                height: '300px',
                resize: false
            });
        </script>
    </head>
    <body>
        @include('components.header')
        <main>            
            @yield('content')
            @yield('scripts')
        </main>
        @include('components.footer')
    </body>
</html>
