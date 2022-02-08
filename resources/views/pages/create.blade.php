@extends('layouts.main-layout')

@section('content')

<h2>Crea il tuo post personalizzato!</h2>

    <form action="{{ route('store') }}" method="post">

        @method("post")
        @csrf

        <label for="title">Titolo:</label>
        <input type="text" name="title" placeholder="Titolo"><br>

        <label for="subtitle">Sottotitolo:</label>
        <input type="text" name="subtitle" placeholder="Sottotitolo"><br>

        <label for="date">Data:</label>
        <input type="date" name="date"><br>

        <label for="description">Descrizione:</label>
        <input type="text" name="description" placeholder="Descrizione"><br>

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}">{{$category -> name}}</option>
            @endforeach
        </select><br>

        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag -> id}}">{{$tag -> name}} <br>
        @endforeach
        <br>

        <input type="submit" value="CREATE">
    </form>
    
@endsection