@extends('layouts.app')


@section('content')


    <div class="card card-default">
    
    
        <div class="card-header"> {{isset($category) ? 'Update Category' : 'Add Category'}} </div>

        <div class="card-body">

            @include('partial.error')
        
            <form action="{{ isset($category) ? route('categories.update',  $category->id) : route('categories.store')}}" method="post">

                @csrf

                @if(isset($category))

                    @method('PUT')

                @endif
            
                <div class="form-group">
                

                    <label for="title">Name</label>

                    <input type="text" name="name" id="title" class="form-control" value = "{{ isset($category) ? $category->name : '' }}">
                
                
                </div>

                <div class="form-group">
                
                
                    <button type="submit" class="btn btn-outline-success">{{isset($category) ? 'Update Category' : 'Add Category' }}</button>
                
                </div>
            
            </form>
        
        </div>
    
    </div>

@endsection
