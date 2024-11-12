<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Department;
use App\Models\Major;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create departments
        $fcs = Department::create(['name' => 'Faculty of Computer Science']);
        $fis = Department::create(['name' => 'Faculty of Information Science']);
        $fcst = Department::create(['name' => 'Faculty of Computer System and Technology']);
        $year1 = Department::create(['name' => 'Faculty 1st Year']);
        $year2 = Department::create(['name' => 'Faculty 2nd Year']);
        $extra = Department::create(['name' => 'Extra']);

        // Create majors
        Major::create(['name' => 'Extra Courses For Computer Science', 'department_id' => $extra->id]);
        Major::create(['name' => 'Extra Courses For Business Management Administration', 'department_id' => $extra->id]);
        Major::create(['name' => 'Extra Courses For Languages', 'department_id' => $extra->id]);
        Major::create(['name' => 'First Year', 'department_id' => $year1->id]);
        Major::create(['name' => 'Second Year', 'department_id' => $year2->id]);
        Major::create(['name' => 'Third Year CS', 'department_id' => $fcs->id]);
        Major::create(['name' => 'Third Year CT', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fourth Year Software Engineering', 'department_id' => $fcs->id]);
        Major::create(['name' => 'Fourth Year Business Information Systems', 'department_id' => $fcs->id]);
        Major::create(['name' => 'Fourth Year Knowledge Engineering', 'department_id' => $fis->id]);
        Major::create(['name' => 'Fourth Year High Performance Computing', 'department_id' => $fis->id]);
        Major::create(['name' => 'Fourth Year Computer Networking', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fourth Year Embedded Computing', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fourth Year Cyber Security', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fifth Year Software Engineering', 'department_id' => $fcs->id]);
        Major::create(['name' => 'Fifth Year Business Information Systems', 'department_id' => $fcs->id]);
        Major::create(['name' => 'Fifth Year Knowledge Engineering', 'department_id' => $fis->id]);
        Major::create(['name' => 'Fifth Year High Performance Computing', 'department_id' => $fis->id]);
        Major::create(['name' => 'Fifth Year Computer Networking', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fifth Year Embedded Computing', 'department_id' => $fcst->id]);
        Major::create(['name' => 'Fifth Year Cyber Security', 'department_id' => $fcst->id]);


        Batch::create(['name' => '1st Batch', 'end_year' => '2029']);
        Batch::create(['name' => '2nd Batch', 'end_year' => '2030']);

        // Course::create(['title' => 'Introduction to Software Engineering', 'chapters' => 10, 'thumbnail' => 'https://www.codewithantonio.com/_next/image?url=https%3A%2F%2Futfs.io%2Ff%2F4c0b775c-bafa-47f5-9df7-a43ff714b83a-2xy2q2.png&w=1920&q=75', 'major_id' => 1]);
        // Course::create(['title'=>'Build a Smart Contract','chapters'=>10,'thumbnail'=>'https://www.codewithantonio.com/_next/image?url=https%3A%2F%2Futfs.io%2Ff%2F4984f8a5-fe83-4429-b154-972bb15d39f2-czdgic.png&w=1920&q=75','major_id'=>1]);
        // Course::create(['title' => 'Duolingo course', 'chapters' => 10, 'thumbnail' => 'https://www.codewithantonio.com/_next/image?url=https%3A%2F%2Futfs.io%2Ff%2F6f5ddbbe-cf91-44d4-bd10-5fdb235889df-tt9026.png&w=1920&q=75', 'major_id' => 1]);
        // Course::create(['title'=>'Learn Python','chapters'=>10,'thumbnail'=>'https://www.codewithantonio.com/_next/image?url=https%3A%2F%2Futfs.io%2Ff%2F3fd4e9e6-8489-4005-a6a7-29f0338745b1-jbkgcj.jpg&w=1920&q=75','major_id'=>1]);

        // Student::create([
        //     'user_id' => 1,
        //     'batch_id' => 1,
        //     'major_id' => 1
        // ]);

        // Create roles
        $roles = [
            ['name' => 'admin'],
            ['name' => 'teacher'],
            ['name' => 'job_recruiter'],
            ['name' => 'student'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Test1234$'),
            'role_id' => 1
        ]);




    }
}
