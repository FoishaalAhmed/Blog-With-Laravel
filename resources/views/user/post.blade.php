@extends('user.layout.app')
@section('bg-img',Storage::disk('local')->url($slug->image))

@section('title',$slug->title)
@section('sub-title',$slug->sub_title)

@section('main-content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=498433180583550&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <small>created at {{$slug->created_at->diffForHumans()}}</small>
        @foreach ($slug->categories as $category)
          <small class="pull-right" style="margin-right: 10px;"> 
            <a href="{{ route('category',$category->slug) }}">{{$category->name}}</a>
          </small>
        @endforeach
        {!!htmlspecialchars_decode($slug->body)!!}
        <h3>Tags Are</h3>
        @foreach ($slug->tags as $tag)
          <a href="{{ route('tag',$tag->slug) }}"><small class="pull-left" style="margin-right: 10px; border: 1px solid gray; border-radius: 5px; padding: 5px"> 
                      {{$tag->name}}
                    </small></a>
        @endforeach
      </div>
      <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="10"></div>
    </div>
  </div>
</article>
@endsection