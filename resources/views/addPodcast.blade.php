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
<div class="ml-4">
user: {{auth()->user()->id}}
<form method="POST" action="{{route('podcast.store', $podcast)}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="mb-6 mt-6">
    <label>Titre
        <input type="text" name="title">
    </label>
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
<div class="mb-6">
    <label>Description
        <input type="text" name="file_name">
    </label>
</div>
    @error('file_name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
<div class="mb-6">
    <label>Pochette
        <input type="file" name="cover_file">
    </label>
</div>
    <div class="mb-6">
    <label>Audio
        <input type="file" name="audio_file">
    </label>
    </div>
    <button class="font-semibold" type="submit">Ajouter</button>
</div>
</body>
</html>
</x-app-layout>
