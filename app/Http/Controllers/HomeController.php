<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function about(){
    //     $title="About us - Online Store";
    //     $subtitle="About us Page";
    //     $description="This is an about Page";
    //     $author="Developed by Berhan Bekele";
    //     return view('home.about')
    //             ->with('title',$title)
    //             ->with('subtitle',$subtitle)
    //             ->with('description',$description)
    //             ->with('author',$author);
    // }

    // public function index(){
    //     $title="Home  - Online Store";
    //     $subtitle="Major Categories in ourShop";
    //     $imageUrls=['https://placehold.co/350',
    //               'https://placehold.co/350',
    //               'https://placehold.co/350'];

    //     // $imageUrls=['src="{{asset('images/game.png')}}"',
    //     //            'src="{{asset('images/game.png')}}"',
    //     //            'src="{{asset('images/game.png')}}"'];

    //     return view('home.index')
    //     ->with('title',$title)
    //     ->with('subtitle',$subtitle)
    //     ->with('imageUrls',$imageUrls);
    //     }

    public function index(){
        $viewData = [];
        $viewData["title"] = "Military Court Case Managment System";
        return view('home.index')->with("viewData", $viewData);
    }
    // public function about() {
    //     $data1 = "About us - Online Store";
    //     $data2 = "About us";
    //     $description = "This is an about page ...";
    //     $author = "Developed by: Berhan Bekele";
    //     return view('home.about')
    //                 ->with("title", $data1)
    //                 ->with("subtitle", $data2)
    //                 ->with("description", $description)
    //                 ->with("author", $author);
    //         }
        public function about(){
            $viewData = [];
            $viewData["title"] = "About us - Online Military Court Case Mgmt Sys";
            $viewData["subtitle"] = "About us";
            $viewData["description"] = "This is an about page Military Court Managment System...";
            $viewData["author"] = "Developed by: Member Of Group 4(Lt. Col Berhan Bekele, Maj. Debebe Shibeshi, Capt. Bahiru Megersa, and Sgt. Michael Bob)";
            return view('home.about')->with("viewData", $viewData);
    }


    }

