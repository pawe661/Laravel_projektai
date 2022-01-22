<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Clients</title>
</head>
<body>
    <div class="container">
    <h1>Clients Index</h1>

    @if (count($clients) == 0)
    <p>There is no Clients</p>
    @endif


    <a class="btn btn-primary" href="{{route('client.create')}}">Create new Client</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Company_id</th>
            <th>Image</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>


        @foreach ($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surname}}</td>
            <td>{{$client->username}}</td>
            <td>{{$client->company_id}}</td>
            <td>{{$client->image_url}}</td>
            <td>{{$client->phone}}</td> 
            <td>
                <a class="btn btn-primary" href="{{route('client.edit', [$client])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('client.show', [$client])}}">Show</a>

                <form method="post" action="{{route('client.destroy', [$client])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <a class="btn btn-secondary" href="{{route('home')}}">Back</a>


    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>