@extends("layouts.app")

@section("content")

<div class="row container">

        <h1>POSTS</h1>
  <div class="row ">
    <small>Search by: </small>
     <a class="btn-info label" href="/posts" role="button">All</a>
      <a class="btn-primary label  " href="/resturant" role="button">Local Restaurant</a>
      <a class="btn-success label " href="/coffee" role="button">Local Coffee Shops</a>
      <a class="btn-warning label" href="/event" role="button">Local Events</a>



  </div>
</div>




@if(count($posts)>0)
  @foreach($posts as $post)
    <div class="well ">
      <div class="row">
          <div class=" col-md-4 col-sm-4 ">

              @if($post->topic=="Local Restaurant")
                <img style="width:40%" src="/images/rest.jpg" class="coverImage img-rounded">
              @endif
              @if($post->topic=="Local Event")
                <img style="width:40%" src="/images/event.jpg" class="coverImage img-rounded">
              @endif
              @if($post->topic=="Local Coffee Shop")
                <img style="width:40%" src="/images/coffee.jpg" class="coverImage img-rounded">
              @endif
            <div class= "post-content label label-default"><strong>{{$post->topic}}</strong></div>


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
