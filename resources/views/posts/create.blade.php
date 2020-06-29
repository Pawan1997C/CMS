@extends('layouts.app')


@section('content')

    <div class="card card-default">
    
    
    <div class="card-header">{{ isset($post) ? 'Update Post' : 'Create Post' }}</div>

        <div class="card-body">

        
            @include('partial.error')

            <form action="{{ isset($post) ? route('posts.update', $post->id)  : route('posts.store')}}" method="post" enctype = multipart/form-data>
            
            @csrf

            @if(isset($post))

                @method('PUT')

            @endif

            <div class="form-group">
            
                <label for="title">Title</label>

            <input type="text" name='title' id='title' placeholder='Ex: How Are You?' class="form-control" value = "{{ isset($post) ? $post->title : '' }}">
            
            </div>

            <div class="form-group">
            
                <label for="discruption">Discruption</label>

            <textarea name="discruption" id="" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->discruption : '' }}</textarea>
            
            </div>

            <div class="form-group">
            
            <label for="content">Content</label>

                
            <input id="content" type="hidden" name="content" value = "{{ isset($post) ? $post->content : '' }}">

            <trix-editor input="content"></trix-editor>


            </div>

            <div class="form-group">
            
                <label for="published_at">Published</label>

            <input type="text" name='published_at' id='published_at'  class="form-control" value = "{{ isset($post) ? $post->published_at : '' }}">
            
            </div>

            @if(isset($post))

                <div class="form-group">

                     <img src="{{ asset('storage/'.$post->image) }} " style = 'width:100%'>

                </div>

            @endif

            <div class="form-group">
            
            <label for="image">Image</label>

                <input type="file" name="image" id="image">

            </div>

            <div class="form-group">

                <label for="category">Category</label>

                <select name="category_id" id="category" class="form-control">


                    @foreach($categories as $category)

                        <option value="{{$category->id}}"
                            
                            
                            @if(isset($post))

                                @if($category->id === $post->category->id)

                                    selected

                                @endif

                            @endif
                            
                            
                            
                            >{{$category->name}}</option>

                    @endforeach


                </select>


            </div>

            <div class="form-group">


                <label for="tag">Tags</label>

                <select name="tag[]" id="tag" class="form-control tag-selector" multiple>


                    @foreach($tags as $tag)

                        <option value="{{$tag->id}}"
                            
                                @if(isset($post))


                                    @foreach($post->tags as $pt)

                                        @if($pt->id === $tag->id)

                                            selected

                                        @endif

                                    @endforeach


                                @endif

                            
                            >{{$tag->name}}</option>

                    @endforeach


                </select>


            </div>

            <div class="form-group">
            
            <button type="submit" class="btn btn-outline-success">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
        
            </div>
            
            </form>
        
        
        </div>    
    
    </div>

@endsection


@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>

    flatpickr('#published_at', {

        enableTime : true,
        enableSeconds : true

    });

    $(document).ready(function() {
        $('.tag-selector').select2();
    });

</script>


@endsection