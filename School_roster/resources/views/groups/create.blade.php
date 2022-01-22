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
    <h1>Clients Create</h1>

        <form method="POST" action="{{route('client.store')}}" >

            <input class="form-control" type='text' name="client_name" placeholder="Client Name"/>
            <input  class="form-control" type='text' name="client_surname" placeholder="Client Surname"/>
            <input  class="form-control" type='text' name="client_username" placeholder="Client Username"/>
            <!-- <select class="form-control"  name="client_compamy_id" placeholder="Client Company_id">
                <option value="" disabled selected>Please select Company ID</option>
                    @for($i = 1; $i < 250; $i++)
                    <option value="{{$i}}">{{ $i }}</option>
                    @endfor
            </select> -->
            <select class="form-control"  name="client_compamy_id" placeholder="Client Company_id">
                <option value="" disabled selected>Please select Company ID</option>
                @foreach ($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
            </select>
            <input class="form-control" type='text' name="client_image_url" placeholder="Client Image_url"/>
            <input class="form-control" type='text' name="client_phone" placeholder="Client Phone"/>
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('client.index')}}">Back</a>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>