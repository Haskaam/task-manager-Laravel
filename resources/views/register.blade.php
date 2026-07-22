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
                <form method="POST" action="/register">
                    @csrf
                    <h3>Utwórz konto</h3>
                    <p>Dołącz do nas i zacznij zarządzać swoimi zadaniami!</p>

                    <label><span class="helptext">Nazwa użytkownika:</span><br>
                        <input type="text" name="user" value="{{old('user')}}" placeholder="Nazwa użytkownika">
                    </label>

                    <label><span class="helptext">Hasło:</span><br>
                        <input type="password" name="password" placeholder="Hasło">
                    </label>

                    <label><span class="helptext">Powtórz hasło:</span><br>
                        <input type="password" name="repeated_password" placeholder="Powtórz hasło">
                    </label>

                    <button type="submit" name="register">Zarejestruj się</button>

                     @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>

                <div class="divider">
                    <span>lub</span>
                </div>

                <p>Masz już konto? <a href="/login">Zaloguj się</a></p>
            </section>
        </main>

        <footer>
            <p>2026 TaskManager. Wszystkie prawa zastrzeżone.</p>


        </footer>
    </body>
</html>
