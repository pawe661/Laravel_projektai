@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Image Update</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('articleimage.update', [$articleImage])}}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>
    
                                <div class="col-md-6">
                                    <input id="image_alt" type="text" class="form-control" value='{{$articleImage->alt}}' name="image_alt" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_src" class="col-md-4 col-form-label text-md-end">Image</label>
    
                                <div class="col-md-6">
                                    <input id="image_src" type="file" class="form-control" name="image_src" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_width" class="col-md-4 col-form-label text-md-end">Image Width</label>
    
                                <div class="col-md-6">
                                    <input id="image_width" type="number" min="0" max="200" step="10" value='{{$articleImage->width}}' class="form-control" name="image_width" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>
    
                                <div class="col-md-6">
                                    <input id="image_height" type="number" min="0" max="200" step="10" value='{{$articleImage->height}}' class="form-control" name="image_height" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>
    
                                <div class="col-md-6">
                                    <input id="image_class" type="text" class="form-control" name="image_class" value='{{$articleImage->class}}' required autofocus>
    
                                </div>
                            </div>
    
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{route('articleimage.index')}}">Back</a>
            </div>
        
        </div>
    </div>

    </div>
    @endsection