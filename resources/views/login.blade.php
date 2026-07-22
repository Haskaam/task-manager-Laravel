<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <form method="POST" action="/login">
                    @csrf
                    <h3>Zaloguj się</h3>
                    <p>Witaj w TaskManager. Zaloguj się aby kontynuować.</p>

                    <label><span class="helptext">Nazwa użytkownika:</span><br>
                        <input type="text" name="user" value="{{old('user')}}" placeholder="Wpisz login">
                    </label>

                    <label><span class="helptext">Hasło:</span><br>
                        <input type="password" name="password" placeholder="Wpisz hasło">
                    </label>

                    @if ($errors->any())
                <div class="error-box">
                    @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach
                </div>
                @endif
                    <a href="/login">Nie pamiętasz hasła?</a>

                    <button type="submit" name="login">Zaloguj się</button>
                </form>

                <div class="divider">
                    <span>lub</span>
                </div>

                <p>Nie masz jeszcze konta? <a href="/register">Zarejestruj się</a></p>
            </section>
        </main>

        <footer>
            <p>2026 TaskManager. Wszystkie prawa zastrzeżone.</p>
        </footer>
    </body>
</html>
