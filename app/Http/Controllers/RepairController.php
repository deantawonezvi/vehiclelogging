<?php

namespace App\Http\Controllers;

use App\Crane;
use App\Repair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepairController extends Controller
{
    public function addRepair(Request $request)
    {
        Validator::make($request->all(), [
            'crane_id' => 'required | numeric | exists:cranes,id',
            'garage_id' => 'required | numeric | exists:garages,id',
            'defect' => 'required'
        ])->validate();

        $values = array(
            'crane_id'=>$request->crane_id,
            'garage_id'=>$request->garage_id,
            'description'=>$request->description,
            'defect'=>$request->defect,
            'start_date'=>new Carbon($request->start_date),
            'end_date'=>new Carbon($request->end_date)
        );

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
            'crane_id' => 'required | numeric | exists:cranes,id',
        ])->validate();
        if($request->state == 'DONE'){
            Crane::findOrFail($request->crane_id)
                    ->update(array(
                        'defect'=>'No Defect'
                    ));
        }

        Repair::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Repair Updated Successfully';


    }

    public function getRepair(Request $request)
    {
        return Repair::with('crane.driver','garage')
                        ->get();
    }
}
