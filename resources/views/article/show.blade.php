<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
</head>
<body>
    
    <table>
        <thead>
            <th>
                <td>Id</td>
                <td>Title </td>
                <td>Desc</td>
                <td>Created At</td>
            </th>
        </thead>

        <tbody>
            
            <tr>

                <td>{{$article->id}}</td>
                <td><b>{{$article->title}}</b></td>
                <td>{{$article->description}}</td>
                <td>{{$article->created_at}}</td>
                
                 
        </tbody>
    </table>

</body>
</html>