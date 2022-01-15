<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    

<table>
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Description</th>
    <th>Phone</th>
    <th>Actions</th>
</tr>

@foreach ($authors as $author)
    <tr>
        <td>{{$author->id}}</td>
        <td>{{$author->name}}</td>
        <td>{{$author->surname}}</td>
        <td>{{$author->description}}</td>
        <td>{{$author->phone}}</td>
        <td>
            <a href="{{route('author.edit', [$author])}}">Edit</a>

        </td>
    </tr>
@endforeach
</table> 
</body>
</html>