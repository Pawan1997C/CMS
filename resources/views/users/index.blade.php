@extends('layouts.app')

@section('content')

<div class="card card-default">


    <div class="card-header">
        Users
    </div>

    <div class="card-body">
    

        @if($users->count() > 0)


        <table class="table table-hover">
        
        
            <thead>

                <tr>

                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Posts</th>
                    <th>Premission</th>
                    <th>Delete User</th>

                </tr>
            
            </thead>

            <tbody>
            

                @foreach($users as $user)


                    <tr>

                        <td><img src="{{asset('storage/'.$user->profile->avatar)}}" style = "border-radius:50px" height = "50px"></td>

                        <td>{{$user->name}}</td>

                        <td>{{$user->email}}</td>

                        <td>{{$user->posts->count()}}</td>

                        @if(!$user->isAdmin())

                            <td>
                                
                            <form action="{{route('users.make-admin', ['user' => $user->id])}}" method="post">

                                    @csrf

                                    <button type="submit" class="btn btn-outline-success btn-sm">Make Admin</button>

                                </form>
                            
                            </td>

                            <td>
                                
                                <form action="{{route('users.delete-profile', ['user' => $user->id])}}" method="post">
        
                                        @csrf

                                        @method('DELETE')
        
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete User</button>
        
                                </form>
                                
                            </td>

                        @else

                            @if(auth()->user()->id != $user->id)

                            <td>
                                
                                <form action="{{route('users.make-admin', ['user' => $user->id])}}" method="post">
        
                                        @csrf
        
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Remove Permission</button>
        
                                    </form>
                                
                            </td>


                            @endif



                        @endif

                    </tr>


                @endforeach
            
            
            </tbody>


        </table>



        @else

         <h3 class="text-center">No Users Yet</h3>

        @endif
       
    
    
    
    </div>

</div>

@endsection