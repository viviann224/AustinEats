@extends("layouts.app")

@section("content")
  <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>This laravel application contains posts by users to learn more about the Austin eateries.</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
  </div>
@endsection
