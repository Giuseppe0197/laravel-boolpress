@extends('layouts.main-layout')

@section('content')

<h1>Nome dell'utente: {{ Auth::user() -> name }}</h1>
<a href="{{ route('logout') }}"><button class="logout-button">DISCONNETTITI</button></a>

<h2>Lista dei post:</h2>

    <div class="container-post">

        @foreach ($posts as $post)

        <div class="list-post">

            <p>Titolo: {{$post -> title}}</p>

            <p>Sottotitolo: {{$post -> subtitle}}</p>

            <p>Autore: {{$post -> author}}</p>

            <p>Data: {{$post -> date}}</p>

            <p class="description-post">Descrizione: {{$post -> description}}</p>

            <p>Categoria: {{$post -> category -> name}}</p>
            <span>Lista persone con tag: </span>
            @foreach ($post -> tags as $tag)
                {{$tag -> name}} -
            @endforeach
            <br>
            <a class="btn btn-primary my-1 ml-2" href="{{route('edit', $post -> id)}}">Modifica</a><br>

            <a class="btn btn-danger mb-3 ml-2" href="{{route('delete', $post -> id)}}">Cancella Post</a>
        </div>

        @endforeach

    </div>

    <a class="btn btn-secondary my-1" href="{{route('create')}}">Crea il tuo post</a>
    
@endsection