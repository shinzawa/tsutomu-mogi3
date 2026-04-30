<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>店舗代表者画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="styleshe\
et">
</head>

<body>
    @include('components.owner-sidebar')

    <div class="main-content" style="margin-left: 220px; padding: 20px;">
        @yield('content')
    </div>
</body>

</html>
