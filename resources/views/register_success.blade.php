<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <header><h1>TaskManager</h1>

        <section id="home">
            <a href="/login">Home</a>
            <a href="/login">O aplikacji</a>
            <a href="/login">Funkcje</a>
        </section>

        <nav>
            <a href="/login" id="loginbtn">Zaloguj się</a>
            <a href="/register" id="regbtn">Zarejestruj się</a>
        </nav>
        </header>

        <main>
            <section id="login">
                <h3><span class="success">Zarejestrowano pomyślnie</span></h3>

                <p><span class="success">Za chwilę nastąpi przekierowanie...</span></p>

                <p>Jeśli nic się nie stanie, <a href="/login">kliknij tutaj</a></p>
            </section>
        </main>

        <script>
            setTimeout(()=> {
                window.location.href = "/login";
            }, 4500);
        </script>

        <footer>
            <p>2026 TaskManager. Wszystkie prawa zastrzeżone.</p>


        </footer>
    </body>
</html>
