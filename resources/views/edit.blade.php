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

<form class="ml-3" method="POST" action="{{route('podcast.update', $podcast)}}  enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div>
    <div class="mb-4 mt-16">
    <label>Titre
        <input type="text" name="title" value="{{$podcast->title}}">
    </label>
    </div>
    @error('title')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror
<div class="mb-6">
    <label>Description
        <input type="text" name="file_name" value="{{$podcast->file_name}}">
    </label>
</div>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror
<div class="mb-6">
    <label>Image
        <input type="file" name="cover_file" value="{{$podcast->cover_file}}">
    </label>
</div class="mb-6">
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror
<div>
    <label>Audio
        <input type="file" name="audio_file" value="{{$podcast->audio_file}}">
    </label>
</div>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p>
    </div>
    @enderror


    <button class="mt-6 font-semibold" type="submit">Modifier les informations</button>

</form>

<form action="{{route('podcast.destroy', $podcast)}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="font-semibold" type="submit">Supprimer</button>
</form>
</body>
</html>
</x-app-layout>
