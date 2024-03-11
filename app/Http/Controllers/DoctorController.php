<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //index
    public function index(Request $request) {
        $doctors = DB::table('doctors')->when(
            $request->input('name'), function($query, $doctor_name){
                return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
            })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctors.index', compact('doctors'));
    }

    //doctor
    function create() {
        return view('pages.doctors.create');
    }
}
