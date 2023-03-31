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
<h1 class="font-semibold mt-6 ml-3 text-xl mb-4">Mes Podcasts :</h1>


<ul>
    @foreach($podcasts as $podcast)
        <li class="ml-3 mb-6">{{$podcast->title}}
        <a class="ml-4 font-semibold" href="{{route('podcast.edit', $podcast)}}">Modifier</a>
        </li>
    @endforeach
</ul>
<a class="ml-3  font-semibold" href="{{route('podcast.create')}}">Ajouter un podcast</a>

</body>
</html>
</x-app-layout>
