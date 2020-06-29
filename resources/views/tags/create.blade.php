@extends('layouts.app')


@section('content')


    <div class="card card-default">
    
    
        <div class="card-header"> {{isset($tag) ? 'Update Tag' : 'Add Tag'}} </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger text-red">
                
                    <ul class="list-group">
                    
                        @foreach($errors->all() as $error)

                            <li class="list-group-item">

                                {{$error}}
                            
                            </li>

                        @endforeach
                    
                    </ul>
                
                </div>

            @endif
        
            <form action="{{ isset($tag) ? route('tags.update',  $tag->id) : route('tags.store')}}" method="post">

                @csrf

                @if(isset($tag))

                    @method('PUT')

                @endif
            
                <div class="form-group">
                

                    <label for="title">Name</label>

                    <input type="text" name="name" id="title" class="form-control" value = "{{ isset($tag) ? $tag->name : '' }}">
                
                
                </div>

                <div class="form-group">
                
                
                    <button type="submit" class="btn btn-outline-success">{{isset($tag) ? 'Update Tag' : 'Add Tag' }}</button>
                
                </div>
            
            </form>
        
        </div>
    
    </div>

@endsection
