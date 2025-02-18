<?php

namespace App\Http\Controllers;
use App\Action\File;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('Frontend.Pages.Dashboard.pages.subscription_page');
    }

}