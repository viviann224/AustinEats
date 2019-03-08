@extends("layouts.app")

@section("content")
<h1>POSTS</h1>

@if(count($posts)>0)
  @foreach($posts as $post)
    <div class="well">
      <div class="row">
          <div class=" col-md-4 col-sm-4 ">

              <img style="width:30%" src="/images/cover_image.jpg" class="coverImage ">

            <br><br>
          </div>
          <div class=" col-md-8 col-sm-8">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written at {{$post->created_at}} by {{$post->user->name}}</small>
          </div>

      </div>

    </div>
  @endforeach
  {{$posts->links()}}
@else
  <p>No Posts found</p>
@endif
@endsection
