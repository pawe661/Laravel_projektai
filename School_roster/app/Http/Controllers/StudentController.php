<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\AttendanceGroup;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use Illuminate\Http\Request;
use PhpParser\Node\AttributeGroup;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $groups = AttendanceGroup::all();
        return view('students.index',['students' => $students, 'groups'=> $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AttendanceGroup::all();
        return view('students.create',['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $table->id();
        // $table->string('name');
        // $table->string('surname');
        // $table->unsignedBigInteger('group_id');
        // $table->foreign('group_id')->references('id')->on('attendance_groups');
        
        // $table->string('image_url');
        // $table->timestamps();
        $student = new Student;

        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->group_id = $request->student_group_id;
        $student->image_url = $request->student_image_url;

        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $groups = AttendanceGroup::all();
        return view('students.show', ['student'=> $student, 'groups'=> $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = AttendanceGroup::all();
        return view('students.edit',['student' => $student, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->group_id = $request->student_group_id;
        $student->image_url = $request->student_image_url;

        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }
}
