<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThienController extends Controller
{
    /**
     * Get Login function
     *
     * @return void
     */
    public function index()
    {

            $data = [];
            
            return view('backend.dashboard', $data);

        }
    }

