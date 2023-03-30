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
user: {{auth()->user()->id}}
<form method="POST" action="{{route('podcast.store', $podcast)}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label>Titre
        <input type="text" name="title">
    </label>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Description
        <input type="text" name="file_name">
    </label>
    @error('file_name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Pochette
        <input type="file" name="cover_file">
    </label>

    <label>Audio
        <input type="file" name="audio_file">
    </label>

    <button type="submit">Ajouter</button>
     
</body>
</html>