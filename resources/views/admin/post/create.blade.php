<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/tag-input.css')}}">

    <style>
        .bootstrap-tagsinput .tag{
            color: black!important;
        }
    </style>
</head>
<body>
    
    <form action="{{route('post.store')}}" method="POST">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" placeholder="title">
    <br>
    <label for="description">Description</label>
    <input type="text" name="description" placeholder="description">
    <br>
    <select class="select" name="category[]" id="" multiple>
    @forelse($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
    @empty
        <option value="">No Category</option>
    @endforelse
    </select>

    <label for="tag">tag</label>
    <select name="tag[]" data-role="tagsinput" multiple>
    </select>


    <input type="submit" value="submit">
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/js/tag-input.js')}}"></script>

    <script>
        $(document).ready(function() {
    $('.select').select2();

    $('#tag').tagsinput({
        itemValue: 1,
        itemText: 'text',
        });
});
    </script>
</body>
</html>