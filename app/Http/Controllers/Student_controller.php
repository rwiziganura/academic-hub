<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class Student_controller extends Controller
{
    public function getAllStudents(){
        return view('studunt',[
            'data' => Student::all()
        ]);
    }

    public function createStudent(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
        ]);

        Student::create($data);
        return redirect('/')->with('success', 'Student created successfully!');
    }

    public function updateStudent(Request $request, $id){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date|before:today',
        ]);

        $student = Student::find($id);
        $student->update($data);
        return redirect('/')->with('success', 'Student updated successfully!');
    }
    public function deleteStudent($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('/');
    }
}
