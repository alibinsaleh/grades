<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // public function downloadFile()
    // {
    //     $myFile = public_path("اوراق عمل مقررات.pdf");
    //     $headers = ['Content-Type: application/pdf'];
    //     $newName = 'itsolutionstuff-pdf-file-'.time().'.pdf';

    //     return response()->download($myFile, $newName, $headers);
    // }
}
