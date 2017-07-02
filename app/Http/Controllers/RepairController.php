<?php

namespace App\Http\Controllers;

use App\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepairController extends Controller
{
    public function addRepair(Request $request)
    {
        Validator::make($request->all(), [
            'crane_id' => 'required | numeric',
            'crane_id' => 'required | numeric',
            'contact_number' => 'required | numeric |unique:repairs,contact_number'
        ])->validate();

        $values = $request->all();

        Repair::create($values);

        return 'Repair Added Successfully!';

    }

    public function deleteRepair(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:repairs,id',
        ])->validate();

        if (Repair::destroy($request->id)) {
            return 'Repair Deleted';
        }
        return 'Operation failed';


    }

    public function updateRepair(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:repairs,id',
            'contact_number' => 'numeric',
        ])->validate();

        Repair::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Repair Updated Successfully';


    }

    public function getRepair(Request $request)
    {
        return Repair::get();
    }
}
