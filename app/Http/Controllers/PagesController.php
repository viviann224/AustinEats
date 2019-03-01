<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
      $title="Welcome to Laravel!";
      //return view("pages.index", compact("title"));
      return view("pages.index")-> with("title", $title);
    }

    public function about()
    {
      $title="About US!";
      return view("pages.about")-> with("title", $title);
    }

    public function services()
    {
    // {$title="SERVICES!";
    // return view("pages.services")-> with("title", $title);
    $data =array(
       "title"=>"Services",
       "services"=> ["web design", "programming", "SEO"]
     );
    return view("pages.services")-> with($data);
    }
}
