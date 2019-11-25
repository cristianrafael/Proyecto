<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Images;

class MediaController extends Controller
{
    public function getImage($image_id)
    {
    	$image = Images::getPath($image_id);
    	return response()->file($image);
    }
}
