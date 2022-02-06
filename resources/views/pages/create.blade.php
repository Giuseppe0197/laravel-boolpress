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

        <label for="author">Autore:</label>
        <input type="text" name="author" placeholder="Autore"><br>

        <label for="date">Data:</label>
        <input type="date" name="date"><br>

        <label for="description">Descrizione:</label>
        <input type="text" name="description" placeholder="Descrizione"><br>

        <input type="submit" value="CREATE">
    </form>
    
@endsection