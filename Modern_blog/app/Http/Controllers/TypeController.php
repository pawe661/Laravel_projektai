<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Validator;

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

    public function indexAjax() {


        $types = Type::sortable()->get();


        $types_array = array(
            'types' => $types
        );

        $json_response =response()->json($types_array); 

        return $json_response;
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


        $input = [
            'type_title'=> $request->type_title,
            'type_description'=> $request->type_description,

        ];

        $rules = [
            'type_title'=> 'required|string|max:16',
            'type_description'=> 'required|min:10',
        ];

        $customMessages = [
            'required' => "This field is required"
        ];

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $errors = $validator->messages()->get('*'); //pasiima visu ivykusiu klaidu sarasa
            $type_array = array(
                'errorMessage' => "validator fails",
                'errors' => $errors
            );
        } else {
        $type = new Type();

        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();

        $sort = $request->sort ;
        $direction = $request->direction ;

        $types = Type::sortable([$sort => $direction ])->get();

        $type_array = array(
            'successMessage' => "Type stored succesfuly",
            'typeID' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
            'types' => $types

        );
        }
        

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
            $response_array = array(
                'errorMessage' => "Type cannot be deleted ". $type->id . " because it has articles",
                'logicTest' => false
            );
        } else {
            $type->delete();

            $response_array = array(
                'successMessage' => "Type deleted successfuly". $type->id,
                'logicTest' => true
            );
        }

        // 
        $json_response =response()->json($response_array);

        return $json_response;
    }

    // sito type neturi buuti kuris skliausteliuose
    public function massdestroyAjax(Request $request)
    {
        $ids = $request->type;
        
        // dd($ids);
        $ids_array = explode(",", $ids);
        
        $types = Type::whereIn('id',$ids_array)->get();
        $errorMessage=[];
        $successMessage=[];
         //    to be fixed
        foreach ($types as $i => $type) {
        //    to be fixed
            if(count($type->typeArticles) > 0) {
                $response_array= [
                    $errorMessage[$i] => "Type cannot be deleted because ".$ids ."it has articles",
                    'logicTest' => false
                ];
                 //    to be fixed
            } else {
                $type->delete();
                $response_array = [
                    $successMessage[$i] => "Type deleted successfuly". $type->id,
                           'logicTest' => true
                ];
            }
        }
         
        $json_response =response()->json($response_array);

        return $json_response;
    }
    public function searchAjax(Request $request) {

        $searchValue = $request->searchValue;
        $typesAll = Type::all();
        $types = Type::query()
        ->where('title', 'like', "%{$searchValue}%")
        ->orWhere('description', 'like', "%{$searchValue}%")
        ->get();

        
        if(empty($searchValue)){   
            $types_array = array(
                'types' => $typesAll
            );
        }elseif(count($types) > 0) {
            $types_array = array(
                'types' => $types
            );
        } else {
            $types_array = array(
                'errorMessage' => 'No types found'
            );
        }

        

        $json_response =response()->json($types_array);

        return $json_response;

    }
}
