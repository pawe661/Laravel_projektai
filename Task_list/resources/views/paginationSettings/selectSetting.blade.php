@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Edit </h1>
        @foreach ($paginationSettings as $setting)
        <form method="POST" onSubmit="actionOnSubmit()" action="{{route('paginationSetting.update', [$setting->id])}}" >
        <input class="form-control" type='text' name="pagination_settings_title" value='{{$setting->title}}' />
        <input class="form-control" type='text' name="pagination_settings_value" value='{{$setting->value}}' />
        <input class="form-control" type='text' name="pagination_settings_visible" value='{{$setting->visible}}' /> 
        <select class="form-control" name="pagination_settings_default_value" placeholder="Product category">
            
                @if ($setting->default_value == 1)
                    <option value="1" selected>{{$setting->title}}{{$setting -> default_value}}</option>
                @else 
                    <option value="1" >{{$setting->title}}{{$setting -> default_value}}</option>
                @endif
            
        </select>
           
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('task.index')}}">Back to tasks</a>
        </form>
        @endforeach
        <form name ="form1" onSubmit="actionOnSubmit()" method ="post" target="_blank">

        <select id="formchoice" name="formchoice">

        <option value="/formaction1">function 1</option>
        <option value="/formaction2">function 2</option>
        <option value ="/formaction3">function 3</option>

        </select>
        <input type="submit" value="Go" class="button">
        </form>

        <script>

        function actionOnSubmit()
        {

        //Get the select select list and store in a variable
        var e = document.getElementById("formchoice");

        //Get the selected value of the select list
        var formaction = e.options[e.selectedIndex].value;

        //Update the form action
        document.paginationSetting.update = formaction;

        }
        </script>
    </div>
    @endsection