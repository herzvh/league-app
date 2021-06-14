<?php


namespace App\Api\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseController extends Controller
{
    use ValidatesRequests;
}
