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
<form method="POST" action="{{('podcasts.store')}}" enctype="multipart/form-data">
    <label for="avatar">Choisi ton fichier:</label>

    <input type="file"
           id="avatar" name="avatar"
           accept="image/png, image/jpeg">

    <button type="submit">Créer</button></form>
</body>
</html>
