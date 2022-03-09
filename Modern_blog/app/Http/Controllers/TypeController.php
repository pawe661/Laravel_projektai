<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('types.index', ['types'=> $types]);
    
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
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type();

        $type->title = $request->type_title;
        $type->description = $request->type_description;
        
        $type->save();

        return redirect()->route('type.index');
    }

    public function storeAjax(Request $request) {

        $type = new Type();

        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();

        $type_array = array(
            'successMessage' => "Type stored succesfuly",
            'typeID' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,

        );

        // 
        $json_response =response()->json($type_array); //javascript masyvas


        return $json_response;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }
    public function showAjax(Type $type) {
        
        $type_array = array(
            'successMessage' => "Type stored succesfuly",
            'typeID' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        );

        $json_response =response()->json($type_array); 

        return $json_response;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }
    public function updateAjax(Request $request, Type $type)
    {
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();

        $type_array = array(
            'successMessage' => "Type stored succesfuly",
            'typeID' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        );

        // 
        $json_response =response()->json($type_array); //javascript masyva

        return $json_response;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('type.index');
    }
    public function destroyAjax(Type $type)
    {
        //sitoje zinuteje pvz gali apsirasyti if
        
        if(count($type->typeArticles) > 0) {
            $success_array = array(
                'successMessage' => "Type cannot be deleted ". $type->id . " because it has articles",
                'logicTest' => false
            );
        } else {
            $type->delete();

            $success_array = array(
                'successMessage' => "Type deleted successfuly". $type->id,
                'logicTest' => true
            );
        }

        // 
        $json_response =response()->json($success_array);

        return $json_response;
    }
}
