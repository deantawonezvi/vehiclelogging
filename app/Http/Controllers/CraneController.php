<?php

namespace App\Http\Controllers;

use App\Crane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CraneController extends Controller
{
    public function addCrane(Request $request){
        Validator::make($request->all(), [
            'name' => 'required',
            'model' => 'required',
            'driver_id'=>'integer | exists:drivers,id',
        ])->validate();

        $values = $request->all();

        Crane::create($values);

        return 'Crane Added Successfully!';

    }
    public function deleteCrane(Request $request){
        Validator::make($request->all(), [
            'id'=>'required  | exists:cranes,id',
        ])->validate();

        if(Crane::destroy($request->id)){
            return 'Crane Deleted';
        }
            return 'Operation failed';


    }
    public function updateCrane(Request $request){

        Validator::make($request->all(), [
            'id'=>'required  | exists:cranes,id',
        ])->validate();

        Crane::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Crane Updated Successfully';


    }
    public function getCrane(Request $request){
        return Crane::with('driver')
                            ->get();
    }
}
