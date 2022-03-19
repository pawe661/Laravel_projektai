@extends('layouts.app')

@section('content')

<div class="container">
    <form method="GET" action="{{route('owner.create')}}">
            @csrf
        <input type="number" name="tasksCount" value='{{$tasksCount}}'>
        <button type="submit">Create</button>
    </form>  
    <h1>Create Owner</h1>
        <form method="POST" action="{{route('owner.store')}}" >
        <div class="form-group">
            <input class="form-control @error("owner_name") is-invalid @enderror " type='text' name="owner_name" placeholder="Owner naem" value="{{old("owner_name") }}"/>
                @error("owner_name")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_surname") is-invalid @enderror " type='text' name="owner_surname" placeholder="Owner surname" value="{{old("owner_surname") }}"/>
                @error("owner_surname")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_email") is-invalid @enderror " type='text' name="owner_email" placeholder="Owner email" value="{{old("owner_email") }}"/>
                @error("owner_email")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input class="form-control @error("owner_phone") is-invalid @enderror " type='text' name="owner_phone" placeholder="Owner phone" value="{{old("owner_phone") }}"/>
                @error("owner_phone")
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
            @csrf
                @for ($i = 0; $i< $tasksCount; $i++)
                    <div class="row author">
                        <div class="form-group col-md-3">
                            <label for='taskTitle[][title]'>Task Title</label>
                            <input class="form-control @error("taskTitle.".$i.".title") is-invalid @enderror " type='text' name='taskTitle[][title]' value="{{old("taskTitle.".$i.".title") }}" />
                            @error("taskTitle.".$i.".title")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                            
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskDescriptios[][description]'>Task description</label>
                            <input class="form-control @error("taskDescriptios.".$i.".description") is-invalid @enderror" type='text' name='taskDescriptios[][description]' value="{{ old("taskDescriptios.".$i.".description") }}" />
                            @error("taskDescriptios.".$i.".description")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskSDate[][start_date]'>Task start date</label>
                            <input class="form-control @error("taskSDate.".$i.".start_date") is-invalid @enderror" type='date' name='taskSDate[][start_date]' value="{{ old("taskSDate.".$i.".start_date") }}"  />
                            @error("taskSDate.".$i.".start_date")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskEDate[][end_date]'>Task enddate</label>
                            <input class="form-control @error("taskEDate.".$i.".end_date") is-invalid @enderror" type='date' name='taskEDate[][end_date]' value="{{ old("taskEDate.".$i.".end_date") }}"  />
                            @error("taskEDate.".$i.".end_date")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for='taskLogo[][logo]'>Username</label>
                            <input class="form-control @error("taskLogo.".$i.".logo") is-invalid @enderror" type='text' name='taskLogo[][logo]' value="{{ old("taskLogo.".$i.".logo") }}"  />
                            @error("taskLogo.".$i.".logo")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    </div>
                @endfor
        <div class="form-group">
            <button class="btn btn-primary" type='submit'>Add</button>
        </div>
        </form>
        <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
    </div>
 
    @endsection