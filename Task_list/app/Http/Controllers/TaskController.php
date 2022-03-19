<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\PaginationSetting;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status_id = $request->status_id;
        $sortCollumn  = $request->sortCollumn;
        $sortOrder = $request->sortOrder; 
        $taskStatuses = TaskStatus::all();
        $paginationSettings = PaginationSetting::where('visible', '=', 1)->get();

        $page_limit = $request->page_limit;

        if(empty($sortCollumn) || empty($sortOrder)) {
            $tasks = Task::paginate($page_limit);
           
        } else {
            // atsako už statuso filtravimą
            if($status_id == 'all') {
                // atsako už puslapiavimą
                if($page_limit == 1) {
                    // rikiavimas pagal asocia
                    if($sortCollumn == "status_id") {
                        
                        $tasks = Task::orderBy($sortCollumn, $sortOrder )->get();
                
                        foreach($tasks as $key => $task){
                            $task['status_id'] = $task->taskTaskStatus->title;
                            $tasks[$key] = $task;
                        }
                    } else {
                        $tasks = Task::orderBy($sortCollumn, $sortOrder )->get();
                    }
                }else{
                    if($sortCollumn == "status_id") {
                            
                        $tasks = Task::orderBy($sortCollumn, $sortOrder )->paginate($page_limit);
                
                        foreach($tasks as $key => $task){
                            $task['status_id'] = $task->taskTaskStatus->title;
                            $tasks[$key] = $task;
                        }
                    } else {
                        $tasks = Task::orderBy($sortCollumn, $sortOrder )->paginate($page_limit);
                    }
                }
            } else {
                if($page_limit == 1) {
                    if($sortCollumn == "status_id") {
                            
                        $tasks = Task::where('status_id', '=', $status_id)->orderBy($sortCollumn, $sortOrder )->get();
                
                        foreach($tasks as $key => $task){
                            $task['status_id'] = $task->taskTaskStatus->title;
                            $tasks[$key] = $task;
                        }
                    } else {
                        $tasks = Task::where('status_id', '=', $status_id)->orderBy($sortCollumn, $sortOrder )->get();
                    }
                }else{
                    if($sortCollumn == "status_id") {
                        
                        $tasks = Task::where('status_id', '=', $status_id)->orderBy($sortCollumn, $sortOrder )->paginate($page_limit);
                
                        foreach($tasks as $key => $task){
                            $task['status_id'] = $task->taskTaskStatus->title;
                            $tasks[$key] = $task;
                        }
                    } else {
                        $tasks = Task::where('status_id', '=', $status_id)->orderBy($sortCollumn, $sortOrder )->paginate($page_limit);
                    }
                }
            }
            
        }
        $select_array =  array_keys($tasks->first()->getAttributes());
        return view('tasks.index',['tasks'=> $tasks, 
        'taskStatuses'=>$taskStatuses,
        'select_array'=>$select_array, 
        'sortCollumn'=>$sortCollumn, 
        'sortOrder' => $sortOrder, 
        'status_id'=> $status_id, 
        'paginationSettings' => $paginationSettings, 
        'page_limit' => $page_limit ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
