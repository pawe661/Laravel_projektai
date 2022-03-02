<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $owners = Owner:: withCount('ownerTasks')->sortable()->paginate(25);
       
        return view('owners.index',['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tasksCount = $request->tasksCount;

        // if($tasksCount == 0) {
        //     dd($tasksCount);
        // }

        // if(!$tasksCount && $tasksCount != 0) { //sitoje vietoje kadangi 0 ateina kaip false, del to suveikia ifas, ir minimali reiksme 3
        //     $tasksCount = 3;
        // }
        if(!isset($tasksCount) ) {

            $tasksCount = 3;
        }
        return view('owners.create',['tasksCount'=>$tasksCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Owner
        // $table->string('name');
        // $table->string('surname');
        // $table->string('email');
        // $table->string('phone');

        

        $request->validate([
            'owner_name' => 'required|alpha|min:2|max:15',
            'owner_surname' => 'required|alpha|min:2|max:15',
            'owner_email' => 'required|email:rfc',
            'owner_phone' => ["required", 'regex:/(86|\+3706)\d{7}/'],
            
        ]);
        $owner = new Owner;
        
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;
        
        $owner->save();
        
       
            $task_count = count($request->taskTitle);
            
            for($i=0; $i< $task_count; $i++) {
                
                $request->validate( [
                    'taskTitle.*.title' => 'required|alpha|min:6|max:225',
                    'taskDescriptios.*.description' => 'required|max:1500',
                    'taskSDate.*.start_date' => 'required|date',
                    'taskEDate.*.end_date' => 'required|date|after:start_date',
                    'taslLogo.*.logo' => 'image',
                ]);

                $task = new Task();

                $task->title = $request->taskTitle[$i]['title'];
                $task->description = $request->taskDescriptios[$i]['description'];
                $task->start_date = $request->taskSDate[$i]['start_date'];
                $task->end_date = $request->taskEDate[$i]['end_date'];
                $task->logo = $request->taskLogo[$i]['logo'];
                $task->owner_id = $owner->id;

                $task->save();
            }
        

        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner, Task $task)
    {
        
        $tasks = $owner->ownerTasks;
        
        return view('owners.edit',['owner'=>$owner, 'tasks'=> $tasks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner, Task $task)
    {
        $request->validate([
            'owner_name' => 'required|alpha|min:2|max:15',
            'owner_surname' => 'required|alpha|min:2|max:15',
            'owner_email' => 'required|email:rfc',
            'owner_phone' => ["required", 'regex:/(86|\+3706)\d{7}/'],
            
        ]);
        
        
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;
        
        $owner->save();
        
       
            $task_count = count($request->taskTitle);
            
            for($i=0; $i< $task_count; $i++) {
                
                $request->validate( [
                    'taskTitle.*.title' => 'required|alpha|min:6|max:225',
                    'taskDescriptios.*.description' => 'required|max:1500',
                    'taskSDate.*.start_date' => 'required|date',
                    'taskEDate.*.end_date' => 'required|date|after:start_date',
                    'taslLogo.*.logo' => 'image',
                ]);



                $task->title = $request->taskTitle[$i]['title'];
                $task->description = $request->taskDescriptios[$i]['description'];
                $task->start_date = $request->taskSDate[$i]['start_date'];
                $task->end_date = $request->taskEDate[$i]['end_date'];
                $task->logo = $request->taskLogo[$i]['logo'];
                $task->owner_id = $owner->id;

                $task->save();
            }
        

        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
