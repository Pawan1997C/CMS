@extends('layouts.app')


@section('content')


    <div class="card card-default">
    
    
        <div class="card-header"> Site Settings </div>

        <div class="card-body">

            @include('partial.error')
        
            <form action="{{route('settings.update')}}" method="post">

                @csrf

                <div class="form-group">
                
                    <label for="name">Site Name</label>

                     <input type="text" name="site_name" id="name" class="form-control" value = "{{$settings->site_name}}">
                
                </div>

                <div class="form-group">
                
                    <label for="address">Address</label>

                    <input type="text" name="address" id="address" class="form-control" value = "{{$settings->address}}">
                
                </div>


                <div class="form-group">
                
                    <label for="email">Email</label>

                    <input type="text" name="email" id="email" class="form-control" value = "{{$settings->email}}">
                
                </div>


                <div class="form-group">
                
                    <label for="contact">Contact</label>

                    <input type="text" name="contact" id="contact" class="form-control" value = "{{$settings->contact}}">
                
                </div>

                <div class="form-group">
                
                
                    <button type="submit" class="btn btn-outline-success">Update</button>
                
                </div>
            
            </form>
        
        </div>
    
    </div>

@endsection
