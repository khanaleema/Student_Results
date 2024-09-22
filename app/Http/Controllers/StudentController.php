<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function showResult(Request $request)
    {
        $rollNumber = $request->input('roll_number');
        $student = Student::where('roll_number', $rollNumber)->first();

        if ($student) {
            return view('result', compact('student'));
        } else {
            return redirect('/')->with('error', 'Invalid Roll Number');
        }
    }
}
