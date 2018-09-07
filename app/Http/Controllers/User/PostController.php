<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   // for viewing the pages

    public function post(Post $slug)
   {
      
   	return view('user.post',compact('slug'));
   }

   public function about()
   {
   	return view('user.about');
   }
   public function contact()
   {
   	return view('user.contact');
   }



}
