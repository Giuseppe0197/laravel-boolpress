@extends('layouts.main-layout')
@section('content')

    <h1>Registrati o Accedi per vedere il tuo nome e i post</h1>

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

@endsection