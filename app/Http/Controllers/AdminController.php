<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobRecruiter;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function create_recruiter(Request $request)
    {
        $request->validate([
            'recruiter_name' => ['required', 'string', 'min:1', 'max:30'],
            'email' => 'required | unique:users,email',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/',
            ],
            'phone' => [
                'required',
                'digits_between:7,11'
            ],
            'company_name' => ['required', 'string', 'min:1', 'max:30'],
        ]);

        $user = User::create([
            'name' => $request->recruiter_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 3
        ]);

        $user_id = $user -> id;

        JobRecruiter::create([
            'user_id' => $user_id,
            'phone' => $request->phone,
            'company_name' => $request->company_name
        ]);

        return redirect()->back()->with('success', 'Recruiter added successfully!');
    }

    public function create_teacher(Request $request)
    {
        $request->validate([
            'teacher_name' => ['required', 'string', 'min:1', 'max:30'],
            'email' => 'required | unique:users,email',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,20}$/',
            ],
            'phone' => [
                'required',
                'digits_between:7,11'
            ],
            'department_name' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->teacher_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);

        $user_id = $user -> id;

        Teacher::create([
            'user_id' => $user_id,
            'phone' => $request->phone,
            'department_id' => $request -> department_name
        ]);

        return redirect()->back()->with('success', 'Teacher added successfully!');
    }

    public function upgrade_major($id){
        $student = Student::where('id', $id)->first();

        if (in_array($student->major_id, [3, 4])) {
            $student->update([
                'major_id' => $student->major_id + 1,
                'status' => 'In progress'
            ]);
        } else {
            $student->update([
                'major_id' => $student->destinationation_major_id,
                'status' => 'In progress'
            ]);
        }

        return redirect()->back()->with('success', 'Student upgraded successfully!');
    }

    public function delete_user($id){
        $student = Student::where('id', $id)-> first();
        $delete_student_id = $student->user_id;
        $user = User::where('id', $delete_student_id)-> first();

        $student->delete();
        $user->delete();
        return redirect()->back()->with('success', 'Student deleted successfully!');
    }
}
