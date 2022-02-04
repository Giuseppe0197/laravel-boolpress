@extends('layouts.main-layout')
@section('content')

    @auth
        <h1>Nome dell'utente: {{ Auth::user() -> name }}</h1>
        <a href="{{ route('logout') }}"><button class="logout-button">DISCONNETTITI</button></a>
    @else
        <h1>Registrati o Accedi per vedere il tuo nome e i post</h1>
    @endauth

    @guest

    <div class="registration">

        <form action="{{route('register')}}" method="post">
    
            @method('post')
            @csrf
    
            <label for="name">Inserisci il Nome:</label>
            <input type="text" name="name" placeholder="Inserisci il nome"> <br>
    
            <label for="email">Inserisci la Email:</label>
            <input type="text" name="email" placeholder="Inserisci la mail"> <br>
    
            <label for="password">Inserisci la Password:</label>
            <input type="password" name="password" placeholder="Inserisci la password"> <br>
    
            <label for="password_confirmation">Conferma la Password:</label>
            <input type="password" name="password_confirmation" placeholder="Conferma la password"><br>

            <input type="submit" value="REGISTRATI">
    
        </form>

    </div>

    <h2>Accedi</h2>

    <div class="access">

        <form action="{{route('login')}}" method="post">

            @method('post')

            @csrf
        
            <label for="email">Inserisci la Email:</label>
            <input type="text" name="email" placeholder="Inserisci la mail"> <br>

            <label for="password">Inserisci la Password:</label>
            <input type="password" name="password" placeholder="Inserisci la password"><br>

            <input type="submit" value="ACCEDI">

        </form>

    </div>

    @else

    <h2>Lista dei post:</h2>

    <div class="container-post">

        @foreach ($posts as $post)

        <div class="list-post">

            <p>Titolo: {{$post -> title}}</p>

            <p>Sottotitolo: {{$post -> subtitle}}</p>

            <p>Autore: {{$post -> author}}</p>

            <p>Data: {{$post -> date}}</p>

            <p class="description-post">Descrizione: {{$post -> description}}</p>
    
        </div>

        @endforeach

    </div>

    <h2>Crea il tuo post personalizzato!</h2>

    <form action="{{ route('store') }}" method="post">

        @method("post")
        @csrf

        <label for="title">Titolo:</label>
        <input type="text" name="title" placeholder="Titolo"><br>

        <label for="subtitle">Sottotitolo:</label>
        <input type="text" name="subtitle" placeholder="Sottotitolo"><br>

        <label for="author">Autore:</label>
        <input type="text" name="author" placeholder="Autore"><br>

        <label for="date">Data:</label>
        <input type="date" name="date"><br>

        <label for="description">Descrizione:</label>
        <input type="text" name="description" placeholder="Descrizione"><br>

        <input type="submit" value="CREATE">
    </form>

    @endguest

@endsection