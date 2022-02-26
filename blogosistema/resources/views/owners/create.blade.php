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
            <input class="form-control" type='text' name="owner_name" placeholder="Owner naem"/>
            <input class="form-control" type='text' name="owner_surname" placeholder="Owner surname"/>
            <input class="form-control" type='text' name="owner_email" placeholder="Owner email"/>
            <input class="form-control" type='text' name="owner_phone" placeholder="Owner phone"/>
        </div>
            @csrf
            <!-- 'taskTitle.*.title' => 'required|alpha|min:6|max:225',
                    'taskDescriptios.*.description' => 'required|max:1500',
                    'taskSDate.*.start_date' => 'required|date',
                    'taskEDate.*.end_date' => 'required|date|after:start_date',
                    'taslLogo.*.logo' => 'image',
                     -->
        @for ($i = 0; $i< $tasksCount; $i++)
                <div class="row author">
                    <div class="form-group col-md-3">
                        <label for="author_name">Name</label>
                        <input class="form-control @error("taskTitle.".$i.".title") is-invalid @enderror " type='text' name='taskTitle[][title]' value="{{old("taskTitle.".$i.".title") }}" />
                        @error("taskTitle.".$i.".title")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="author_surname">Surname</label>
                        <input class="form-control @error("taskDescriptios.".$i.".description") is-invalid @enderror" type='text' name='taskDescriptios[][description]' value="{{ old("taskDescriptios.".$i.".description") }}" />
                        @error("taskDescriptios.".$i.".description")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="author_username">Username</label>
                        <input class="form-control @error("taskSDate.".$i.".start_date") is-invalid @enderror" type='text' name='taskSDate[][start_date]' value="{{ old("taskSDate.".$i.".start_date") }}"  />
                        @error("taskSDate.".$i.".start_date")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
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