<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Users extends Controller
{
  public function index()
  {
    return view('content.users.user-management');
  }

  public function addUsers()
  {
    return view('content.users.add-user');
  }

  public function editUsers()
  {
    return view('content.users.edit-user');
  }

}
