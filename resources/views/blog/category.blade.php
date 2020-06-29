@extends('layouts.blog')


@section('header')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category:{{$category->name}}</h1>
    </div>
</div>


@endsection



@section('content')


<div class="row medium-padding120">
    <main class="main">
        
        <div class="row">
            
            @if($category->posts()->count() > 0)

                @foreach($category->posts as $post)

                <div class="case-item-wrap">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{asset('storage/'. $post->image)}}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{route('blog-post', ['slug' => $post->slug])}}">{{$post->title}}</a></h6>
                        </div>
                    </div>
                </div>

            @endforeach

            @else

            <h3 class="text-center">No Posts Yet</h3>

            @endif
        </div>

    

    </main>
</div>



@endsection

