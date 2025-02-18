<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        return view("Frontend.Pages.home", $data);
    }
    public function contact_page()
    {
        $data = [];
        return view("Frontend.Pages.contact", $data);
    }


}
