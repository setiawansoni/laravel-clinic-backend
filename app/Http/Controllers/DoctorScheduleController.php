<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    //index
    public function index(Request $request) {
        $doctorSchedules = DoctorSchedule::with('doctor')
            ->when($request->input('doctor_id'), function ($query, $doctor_id) {
                return $query->where('doctor_id', $doctor_id);
            })
            ->orderBy('doctor_id', 'asc')
            ->paginate(10);
        return view('pages.doctor_schedule.index', compact('doctorSchedules'));
    }

    //create
    public function create() {
        $doctors = Doctor::all();
        return view('pages.doctor_schedule.create', compact('doctors'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
        ]);

        if ($request->senin) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Senin';
            $doctorSchedule->time       = $request->senin;
            $doctorSchedule->save();
        }

        if ($request->selasa) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Selasa';
            $doctorSchedule->time       = $request->selasa;
            $doctorSchedule->save();
        }

        if ($request->rabu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Rabu';
            $doctorSchedule->time       = $request->rabu;
            $doctorSchedule->save();
        }

        if ($request->kamis) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Kamis';
            $doctorSchedule->time       = $request->kamis;
            $doctorSchedule->save();
        }

        if ($request->jumat) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Jumat';
            $doctorSchedule->time       = $request->jumat;
            $doctorSchedule->save();
        }

        if ($request->sabtu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Sabtu';
            $doctorSchedule->time       = $request->sabtu;
            $doctorSchedule->save();
        }

        if ($request->minggu) {
            $doctorSchedule = new DoctorSchedule;
            $doctorSchedule->doctor_id  = $request->doctor_id;
            $doctorSchedule->day        = 'Minggu';
            $doctorSchedule->time       = $request->minggu;
            $doctorSchedule->save();
        }

        return redirect()->route('doctor-schedules.index')->with('success','Data berhasil ditambahkan');
    }
}
