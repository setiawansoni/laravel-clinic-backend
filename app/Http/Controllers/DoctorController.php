<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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

    //create
    public function create() {
        return view('pages.doctors.create');
    }

    //store
    public function store(Request $request) {
        $request->validate([
            'doctor_name'   => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone'      => 'required',
            'doctor_email'      => 'required',
            'address'           => 'required',
            'sip'               => 'required',
        ]);

        $doctor = new Doctor();
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->doctor_specialist  = $request->doctor_specialist;
        $doctor->doctor_phone       = $request->doctor_phone;
        $doctor->doctor_email       = $request->doctor_email;
        $doctor->address            = $request->address;
        $doctor->sip                = $request->sip;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success','Doctor created successfully');
    }

    //show detail
    public function show($id) {
        $doctor = Doctor::find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id) {
        $doctor = Doctor::find($id);
        return view('pages.doctors.edit', compact('doctor'));
    }

    //update
    public function update(Request $request, $id) {
        $request->validate([
            'doctor_name'   => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone'      => 'required',
            'doctor_email'      => 'required|email',
            'address'           => 'required',
            'sip'               => 'required',
        ]);

        $doctor = Doctor::find($id);
        $doctor->doctor_name        = $request->doctor_name;
        $doctor->doctor_specialist  = $request->doctor_specialist;
        $doctor->doctor_phone       = $request->doctor_phone;
        $doctor->doctor_email       = $request->doctor_email;
        $doctor->address            = $request->address;
        $doctor->sip                = $request->sip;
        $doctor->save();

        return redirect()->route('doctors.index')->with('success','Doctor updated successfully');
    }

    //destroy
    public function destroy($id){
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('info', 'Doctor deleted successfully.');
    }
}
