@extends('layouts.app')

@section('content')


<div class="container">



    <table id="types-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Discription</th>
            <th>Action</th>
        </tr>
        @foreach ($types as $type) 
        <tr class="client{{$type->id}}">
            <td class="">{{$type->id}}</td>
            <td class="">{{$type->title}}</td>
            <td class="">{{$type->description}}</td>
            <td>
              

            </td>
        </tr>
        @endforeach
    </table>   
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a> 
</div>


@endsection