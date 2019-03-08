@extends("layouts.app")

@section("content")
      <h1><?php echo $title; ?></h1>
      <p><strong>AustinEats</strong> is a food application created to share information, personal experience, or tips at restaurants in the Austin location.</p>

      <p>The application began as a way to document nearby restaurants  and alleviate time to make quick decisions on what to eat. The application now helps visitors and locals on places to dine</p>

      <p><strong>AustinEats</strong> contains a series of posts that nonmembers and members can view. Members can create, edit, and remove their posts.
        <strong>AustinEats</strong> is a laravel application which runs via <a href="https://heroku.com/apps" target="_blank">Heroku</a> deployment and uses <a href="https://elements.heroku.com/addons/jawsdb" target="_blank">JawsDB</a> SQL database.</p>

@endsection
