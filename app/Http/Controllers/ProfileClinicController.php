<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileClinicController extends Controller
{
    //index
    public function index() {
        return view('pages.profile_clinics.index');
    }
}
