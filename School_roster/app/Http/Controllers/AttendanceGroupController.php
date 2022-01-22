<?php

namespace App\Http\Controllers;

use App\Models\AttendanceGroup;
use App\Models\Difficulty;
use App\Models\School;
use App\Http\Requests\StoreAttendanceGroupRequest;
use App\Http\Requests\UpdateAttendanceGroupRequest;

use Illuminate\Http\Request;

class AttendanceGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = AttendanceGroup::all();
        return view('groups.index',['groups'=> $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $difficulties = Difficulty::all();
        $schools = School::all();
        return view('groups.create',['difficulties'=>$difficulties,'schools'=>$schools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->id();
        // $table->string('name');
        // $table->longText('description');
        // $table->unsignedBigInteger('difficulty_id');
        // $table->foreign('difficulty_id')->references('id')->on('difficulties');

        // $table->unsignedBigInteger('school_id');
        // $table->foreign('school_id')->references('id')->on('schools');
        $group = new AttendanceGroup;
    
        $group->name = $request->group_name;
        $group->description = $request->group_description;
        $group->difficulty_id = $request->group_difficulty_id;
        $group->school_id = $request->group_school_id;

        $group->save();

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceGroup $group)
    {
        return view('groups.show', ['group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceGroup $group)
    {
        $difficulties = Difficulty::all();
        $schools = School::all();
        return view('groups.edit',['group' => $group, 'difficulties'=>$difficulties,'schools'=>$schools]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceGroupRequest  $request
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceGroup $group)
    {
        $group->name = $request->group_name;
        $group->description = $request->group_description;
        $group->difficulty_id = $request->group_difficulty_id;
        $group->school_id = $request->group_school_id;

        $group->save();

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceGroup $group)
    {
        $students = $group->groupStudents; 

        if(count($students) != 0) {
            return redirect()->route('groups.index')->with('error_message', 'Delete is not possible because group has students in it');
        }

        $group->delete();
        return redirect()->route('groups.index')->with('success_message', 'Everything is fine');

    }
}
