@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Owner</h1>
        <form method="POST" action="{{route('owner.update',[$owner])}}" >
        <div class="form-group">
            <input class="form-control @error("owner_name") is-invalid @enderror " type='text' name="owner_name" placeholder="Owner name" value='{{"$owner->name"}}'/>
                @error("owner_name")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_surname") is-invalid @enderror " type='text' name="owner_surname" placeholder="Owner surname" value="{{$owner->surname }}"/>
                @error("owner_surname")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_email") is-invalid @enderror " type='text' name="owner_email" placeholder="Owner email" value="{{$owner->email}}"/>
                @error("owner_email")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_phone") is-invalid @enderror " type='text' name="owner_phone" placeholder="Owner phone" value="{{$owner->phone}}"/>
                @error("owner_phone")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
            @csrf
                @foreach($tasks as $i => $task)
                    <div class="row author">
                        <div class="form-group col-md-3">
                            <label for='taskTitle[][title]'>Task Title</label>
                            <input class="form-control @error("taskTitle.".$i.".title") is-invalid @enderror " type='text' name='taskTitle[][title]' value="{{$task->title}}" />
                            @error("taskTitle.".$i.".title")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskDescriptios[][description]'>Task description</label>
                            <input class="form-control @error("taskDescriptios.".$i.".description") is-invalid @enderror" type='text' name='taskDescriptios[][description]' value="{{$task->description}}" />
                            @error("taskDescriptios.".$i.".description")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskSDate[][start_date]'>Task start date</label>
                            <input class="form-control @error("taskSDate.".$i.".start_date") is-invalid @enderror" type='date' name='taskSDate[][start_date]' value="{{$task->start_date}}"  />
                            @error("taskSDate.".$i.".start_date")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskEDate[][end_date]'>Task enddate</label>
                            <input class="form-control @error("taskEDate.".$i.".end_date") is-invalid @enderror" type='date' name='taskEDate[$i][end_date]' value="{{$task->end_date}}"  />
                            @error("taskEDate.".$i.".end_date")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskLogo[][logo]'>Username</label>
                            <input class="form-control @error("taskLogo.".$i.".logo") is-invalid @enderror" type='text' name='taskLogo[$i][logo]' value="{{$task->logo}}"  />
                            @error("taskLogo.".$i.".logo")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    </div>
                @endforeach
        <div class="form-group">
            <button class="btn btn-primary" type='submit'>Add</button>
        </div>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
    </div>
 
    @endsection