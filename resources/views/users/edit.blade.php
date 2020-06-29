@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Update Profile</div>

    <div class="card-body">

        @include('partial.error')

        <form action="{{route('users.update-profile', $user->id)}}" method="post" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="form-group">

                <label for="email">Email</label>

                <input type="email" class="form-control" name="email" id="email" value={{$user->email}}>

            </div>

            <div class="form-group">


                <label for="about">About</label>

                <textarea name="about" id="about" class="form-control" cols="5" rows="5">{{$user->about}}</textarea>


            </div>

            <div class="form-group">

                <label for="youtube">Youtube</label>

                    <input type="text" id="youtube" name="youtube" class="form-control" value={{$user->profile->youtube}}>
            </div>

            <div class="form-group">

                <label for="facebook">Facebook</label>

                <input type="text" name="facebook" id="facebook" class="form-control" value="{{$user->profile->facebook}}">

            </div>

            <div class="form-group">

                <img src="{{asset('storage/'.$user->profile->avatar)}}" height = "100px">

            </div>

            <div class="form-group">

                <label for="avatar">Avatar</label>

                <input type="file" class="form-control" name="avatar" id="avatar">

            </div>

            <button type="submit" class="btn btn-outline-success">Update Profile</button>


        </form>


    </div>

                
</div>
        
   
@endsection
