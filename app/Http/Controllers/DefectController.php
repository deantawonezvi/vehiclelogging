<?php

namespace App\Http\Controllers;

use App\Defect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DefectController extends Controller
{
    public function addDefect(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required  |unique:defects,name',
            'description' => 'required'
        ])->validate();

        $values = $request->all();

        Defect::create($values);

        return 'Defect Added Successfully!';

    }

    public function deleteDefect(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required |exists:defects,id',
        ])->validate();

        if (Defect::destroy($request->id)) {
            return 'Defect Deleted';
        }
        return 'Operation failed';


    }

    public function updateDefect(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:defects,id',
            'name' => 'required',
        ])->validate();

        Defect::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Defect Updated Successfully';


    }

    public function getDefect(Request $request)
    {
        return Defect::get();
    }
}
