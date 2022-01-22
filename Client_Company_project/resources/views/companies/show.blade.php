<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Companies</title>
</head>
<body>
    <div class="container">
        
    <h1>Companies Show</h1>

    <h2> {{$company->name}}   </h2>
        <p>Id : {{$company->id}}</p>
        <p>Name : {{$company->name}}</p>
        <p>Surname : {{$company->type}}</p>
        <p>Username : {{$company->description}}</p>

        @if(count($company->companyClients) == 0) 
            <p>There is no clients </p>
        @else 
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            @foreach ($company->companyClients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->surname}}</td>
                    <td><img src='{{$client->image_url}}' alt='{{$client->name}}' width="200" height="200"/></td>
                    <td>
                        <form method="post" action='{{route('client.destroy', [$client])}}''>
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        @endif    
        <form method="post" action="{{route('company.destroy', [$company])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        <a class="btn btn-secondary" href="{{route('company.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>