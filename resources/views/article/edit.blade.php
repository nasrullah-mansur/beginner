<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>

<form action="{{route('article.update', $article->id)}}" method="POST">
    @method('put')
    @csrf
    <input type="text" name="title" value="{{$article->title}}">
        <br>
    <input type="text" name="description" value="{{$article->description}}">
        <br>
        <input type="submit">
    </form>
    
</body>
</html>