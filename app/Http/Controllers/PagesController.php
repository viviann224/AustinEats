<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
      $title="Welcome to AustinEats!";
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
       "services"=> ["local coffee shops", "local resturants", "local food events"]
     );
    return view("pages.services")-> with($data);
    }

    // public function topics()
    // {
    // // {$title="SERVICES!";
    // // return view("pages.services")-> with("title", $title);
    // $data =array(
    //    "title"=>"Topics",
    //    "category"=> ["coffeeshop", "resturant", "foodevents"]
    //  );
    // return view("posts.index")-> with($data);
    // }
}
