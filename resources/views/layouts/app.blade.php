<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>@yield('title') : : BulletinBoard</title>
    <link href="/resources/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header class="header">
        <div class="header__container">
            <div class="header__logo">
                <h1 class="h1">МояОбъява.RU</h1>
            </div>
            @auth
            <div class="header__burger">
                <a href="{{ route('product') }}" class="header__burger__item h1">Лента</a>
                <a href="{{ route('my_product') }}" class="header__burger__item h1">Мои объявления</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="header__burger__item h1" value="Выход">
                </form>
            </div>
            @endauth
        </div>
    </header>
<main class="main">

    @yield('content')

</main>

</body>
</html>
