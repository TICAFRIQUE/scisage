<?php

namespace App\Http\Controllers\frontend;

use App\Models\Service;
use App\Mail\ContactMail;
use App\Models\Portfolio;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function accueil()
    {
        // 
        return view('index');
    }
}
