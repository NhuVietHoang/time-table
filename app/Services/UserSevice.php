<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;

class UserService
{
   public function getUserGroup()
   {
     return Auth::user()->groups->all();
   } 
}