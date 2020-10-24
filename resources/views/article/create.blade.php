<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('article.store')}}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
        <br>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="desciption">Desc</label>
        <input type="text" name="description" value="{{ old('description') }}"  >
        <br>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit">
    </form>
    
</body>
</html>