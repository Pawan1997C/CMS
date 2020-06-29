@extends('layouts.blog')


@section('header')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$post->title}}</h1>
    </div>
</div>


@endsection



@section('content')


<div class="row medium-padding120">
    <main class="main">
        <div class="col-lg-10 col-lg-offset-1">
            <article class="hentry post post-standard-details">

                <div class="post-thumb">
                    <img src="{{asset('storage/'. $post->image)}}" alt="seo">
                </div>

                <div class="post__content">


                    <div class="post-additional-info">

                        <div class="post__author author vcard">
                            Posted by

                            <div class="post__author-name fn">
                                <a href="#" class="post__author-link">{{$post->user->name}}</a>
                            </div>

                        </div>

                        <span class="post__date">

                    <i class="seoicon-clock"></i>

                    <time class="published" datetime="2016-03-20 12:00:00">
                       {{$post->created_at->toFormattedDateString()}}
                    </time>

                </span>

                    <span class="category">
                    <i class="seoicon-tags"></i>
                    <a href="#">{{$post->category->name}}</a>
                </span>

                    </div>

                    <div class="post__content-info">

                        {!!$post->content!!}

                        <div class="widget w-tags">
                            <div class="tags-wrap">
                                @foreach($post->tags as $pt)

                                <a href="{{route('blog.tag', ['id' => $pt->id])}}" class="w-tags-item">{{$pt->name}}</a>

                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div class="socials">

                     <div class="addthis_inline_share_toolbox"></div>

                </div>

            </article>

            <div class="blog-details-author">

                <div class="blog-details-author-thumb">
                    <img src="{{asset('app/img/blog-details-author.png')}}" style="border-radius: 50px" height = "30px" alt="Author">
                </div>

                <div class="blog-details-author-content">
                    <div class="author-info">
                        <h5 class="author-name">{{$post->user->name}}</h5>
                        <p class="author-info">{{$post->user->about}}</p>
                    </div>
                    <p class="text">{{$post->user->about}}
                    </p>
                    <div class="socials">

                        <a href="{{$post->user->profile->facebook}}" target = "_blank" class="social__item">
                            <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                        </a>

                        <a href="{{$post->user->profile->youtube}}" class="social__item" target = "_blank">
                            <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                        </a>

                    </div>
                </div>
            </div>

            <div class="pagination-arrow">

                @if($next)

                <a href="{{route('blog-post', ['slug' => $next->slug])}}" class="btn-prev-wrap">
                    <svg class="btn-prev">
                        <use xlink:href="#arrow-left"></use>
                    </svg>
                    <div class="btn-content">
                        <div class="btn-content-title">Previous Post</div>
                        <p class="btn-content-subtitle">{{$next->title}}</p>
                    </div>
                </a>

                @endif

                @if($prev)

                <a href="{{route('blog-post', ['slug' => $prev->slug])}}" class="btn-next-wrap">
                    <div class="btn-content">
                        <div class="btn-content-title">Next Post</div>
                        <p class="btn-content-subtitle">{{$prev->title}}</p>
                    </div>
                    <svg class="btn-next">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>


                @endif
            </div>

            <div class="comments">

                <div class="heading text-center">
                    <h4 class="h1 heading-title">Comments</h4>
                    <div id="disqus_thread"></div>
                   
                </div>
            </div>

            <div class="row">

            </div>


        </div>

        <!-- End Post Details -->

        <!-- Sidebar-->

    </main>
</div>


@endsection

@section('script')

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5da5e0228b2ed2e1"></script>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = "{{route('blog-post', ['slug' => $post->slug])}}";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "{{$post->slug}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://my-blog-wlsxnba3qk.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                


@endsection
