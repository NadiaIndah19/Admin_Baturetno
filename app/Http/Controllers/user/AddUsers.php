<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddUsers extends Controller
{
  public function index()
  {
    return view('content.users.add-user');
  }

  
}

