<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post edit</title>
</head>

<body>



    <form action="/postupdate" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$post->id}}">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{$post->title}}">
        <br>
        <label for="description">description</label>
        <input type="text" name="description" value="{{$post->description}}">
        <br>
        <input type="submit">
        <!-- <a href="{{url("/post/$post->id/delete")}}">Delete</a> -->
        <a href="{{route('delete', $post->id)}}">Delete</a>
    </form>

</body>

</html>