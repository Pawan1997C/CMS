@extends('layouts.blog')

@section('content')

<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
      <article class="hentry post post-standard has-post-thumbnail sticky">

              <div class="post-thumb">
                  <img src="{{asset('storage/'. $first_post->image)}}" alt="seo">
                  <div class="overlay"></div>
                  <a href="{{asset('storage/'. $first_post->image)}}" class="link-image js-zoom-image">
                      <i class="seoicon-zoom"></i>
                  </a>
                  <a href="{{route('blog-post', ['slug' => $first_post->slug])}}" class="link-post">
                      <i class="seoicon-link-bold"></i>
                  </a>
              </div>

              <div class="post__content">

                  <div class="post__content-info">

                          <h2 class="post__title entry-title text-center">
                            <a href="{{route('blog-post', ['slug' => $first_post->slug])}}">{{$first_post->title}}</a>
                          </h2>

                          <div class="post-additional-info">

                              <span class="post__date">

                                  <i class="seoicon-clock"></i>

                                  <time class="published" datetime="2016-04-17 12:00:00">
                                      {{$first_post->created_at->toFormattedDateString()}}
                                  </time>

                              </span>

                              <span class="category">
                                  <i class="seoicon-tags"></i>
                                  <a href="{{route('blog.category', ['id' => $first_post->category->id])}}">{{$first_post->category->name}}</a>
                              </span>

                              <span class="post__comments">
                                  <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                  6
                              </span>

                          </div>
                  </div>
              </div>

      </article>
  </div>
  <div class="col-lg-2"></div>
</div>

<div class="row">
  <div class="col-lg-6">
      <article class="hentry post post-standard has-post-thumbnail sticky">

              <div class="post-thumb">
                <img src="{{asset('storage/'. $second->image)}}" alt="seo">
                  <div class="overlay"></div>
                  <a href="" class="link-image js-zoom-image">
                      <i class="seoicon-zoom"></i>
                  </a>
                  <a href="{{route('blog-post', ['slug' => $second->slug])}}" class="link-post">
                      <i class="seoicon-link-bold"></i>
                  </a>
              </div>

              <div class="post__content">

                  <div class="post__content-info">

                          <h2 class="post__title entry-title text-center">
                              <a href="{{route('blog-post', ['slug' => $second->slug])}}">{{$second->title}}</a>
                          </h2>

                          <div class="post-additional-info">

                              <span class="post__date">

                                  <i class="seoicon-clock"></i>

                                  <time class="published" datetime="2016-04-17 12:00:00">
                                      {{$second->created_at->toFormattedDateString()}}
                                  </time>

                              </span>

                              <span class="category">
                                  <i class="seoicon-tags"></i>
                                  <a href="{{route('blog.category', ['id' => $second->category->id])}}">{{$second->category->name}}</a>
                              </span>

                              <span class="post__comments">
                                  <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                  6
                              </span>

                          </div>
                  </div>
              </div>

      </article>
  </div>
  <div class="col-lg-6">
      <article class="hentry post post-standard has-post-thumbnail sticky">

              <div class="post-thumb">
                  <img src="{{asset('storage/'. $third->image)}}" alt="seo">
                  <div class="overlay"></div>
                  <a href="{{asset('storage/'. $third->image)}}" class="link-image js-zoom-image">
                      <i class="seoicon-zoom"></i>
                  </a>
                  <a href="{{route('blog-post', ['slug' => $third->slug])}}" class="link-post">
                      <i class="seoicon-link-bold"></i>
                  </a>
              </div>

              <div class="post__content">

                  <div class="post__content-info">

                          <h2 class="post__title entry-title ">
                              <a href="{{route('blog-post', ['slug' => $third->slug])}}">{{$third->title}}</a>
                          </h2>

                          <div class="post-additional-info">

                              <span class="post__date">

                                  <i class="seoicon-clock"></i>

                                  <time class="published" datetime="2016-04-17 12:00:00">
                                      {{$third->created_at->toFormattedDateString()}}
                                  </time>

                              </span>

                              <span class="category">
                                  <i class="seoicon-tags"></i>
                                  <a href="{{route('blog.category', ['id' => $third->category->id])}}">{{$third->category->name}}</a>
                              </span>

                              <span class="post__comments">
                                  <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                  6
                              </span>

                          </div>
                  </div>
              </div>

      </article>
  </div>
</div>

<div class="container-fluid">
  <div class="row medium-padding120 bg-border-color">
      <div class="container">
          <div class="col-lg-12">
          <div class="offers">
              <div class="row">
                  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                      <div class="heading">
                          <h4 class="h1 heading-title">{{$cat->name}}</h4>
                            <div class="heading-line">
                              <span class="short-line"></span>
                              <span class="long-line"></span>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="case-item-wrap">
                      
                      @foreach($cat->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{asset('storage/'. $post->image)}}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{route('blog-post', ['slug' => $post->slug])}}">{{$post->title}}</a></h6>
                        </div>
                    </div>


                      @endforeach
                      
                  </div>
              </div>
          </div>
          <div class="padded-50"></div>
      </div>
      </div>
  </div>
</div>


@stop

