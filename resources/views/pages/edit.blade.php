@extends('layouts.main-layout')

@section('content')

<h2>Modifica il post!</h2>

    <form action="{{ route('update', $post -> id) }}" method="post">

        @method("post")
        @csrf

        <label for="title">Titolo:</label>
        <input type="text" name="title" value="{{$post -> title}}" placeholder="Titolo"><br>

        <label for="subtitle">Sottotitolo:</label>
        <input type="text" name="subtitle" value="{{$post -> subtitle}}" placeholder="Sottotitolo"><br>

        <label for="date">Data:</label>
        <input type="date" value="{{$post -> date}}" name="date"><br>

        <label for="description">Descrizione:</label>
        <input type="text" name="description" value="{{$post -> description}}" placeholder="Descrizione"><br>

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}"
                    @if (($category -> id == $post -> category -> id))
                        selected
                    @endif
                    >{{$category -> name}}</option>
            @endforeach
        </select><br>

        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag -> id}}"
            @foreach ($post -> tags as $postTag)
                @if ($tag -> id == $postTag -> id)
                    checked
                @endif
            @endforeach
            >{{$tag -> name}} <br>
        @endforeach
        <br>

        <input type="submit" value="UPDATE">
    </form>
    
@endsection