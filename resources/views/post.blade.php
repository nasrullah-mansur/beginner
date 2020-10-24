<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
</head>

<body>
    
   

    @foreach($post as $value)
        {{ $value->title}} - {{ $value->description}}
        <br>
    @endforeach


    <br>
    <br>
    <br>
    <br>
    <br>

    <form action="/post" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title">
        <br>
        <label for="description">description</label>
        <input type="text" name="description">
        <br>
        <input type="submit">
    </form>

</body>

</html>