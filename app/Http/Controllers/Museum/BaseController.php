<?php

namespace App\Http\Controllers\Museum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
   public const EMAIL_ADDRESS = 'museum63rf@gmail.com';

   public function __construct()
   {
       
   }
}
