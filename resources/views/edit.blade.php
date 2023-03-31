<x-app-layout>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 class="font-semibold mt-6 ml-3 text-xl mb-4">Modifier {{$podcast->title}} :</h1>

<form class=" ml-3"action="{{route('podcast.update', $podcast)}}" method="POST">
    @csrf
    @method('PUT')
<div>
    <label>Titre
        <input type="text" name="title" value="{{$podcast->title}}">
    </label>
    @error('title')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Description
        <input type="text" name="file_name" value="{{$podcast->file_name}}">
    </label>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Image
        <input type="text" name="cover_file" value="{{$podcast->cover_file}}">
    </label>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Audio
        <input type="text" name="audio_file" value="{{$podcast->audio_file}}">
    </label>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror


    <button type="submit">Modifier les informations</button>

</form>

<form action="{{route('podcast.destroy', $podcast)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>
</body>
</html>
</x-app-layout>
