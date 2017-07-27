<?php

namespace App\Http\Controllers;

use App\Crane;
use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function addJob(Request $request)
    {
        Validator::make($request->all(), [
            'client_id' => 'required | exists:clients,id',
            'crane_id' => 'required | exists:cranes,id',
            'location' => 'required'
        ])->validate();


        $opening_mileage = Crane::select('mileage')
                        ->where('id','=',$request->crane_id)
                        ->get();

        $values = array(
            'client_id' => $request->client_id,
            'crane_id' => $request->crane_id,
            'location' => $request->location,
            'fuel' => $request->fuel,
            'description' => $request->description,
            'opening_mileage'=>$opening_mileage[0]->mileage,
            'start_date' =>new Carbon($request->start_date),
            'end_date' =>new Carbon($request->end_date),
        );

        Job::create($values);

        return 'Job Added Successfully!';

    }

    public function deleteJob(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:jobs,id',
        ])->validate();

        if (Job::destroy($request->id)) {
            return 'Job Deleted';
        }
        return 'Operation failed';


    }

    public function updateJob(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:jobs,id',
            'client_id' => 'required | exists:clients,id',
            'crane_id' => 'required | exists:cranes,id',
        ])->validate();



        $values = array(
            'client_id' => $request->client_id,
            'crane_id' => $request->crane_id,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'closing_mileage' => $request->closing_mileage,
            'start_date' =>new Carbon($request->start_date),
            'end_date' =>new Carbon($request->end_date),
        );
        if(strpos($request->status,'DONE') !== FALSE){
            Crane::findOrFail($request->crane_id)
                ->update(['mileage'=>$request->closing_mileage]);
        }

        Job::findOrFail($request->id)
            ->update($values);


        return 'Job Updated Successfully';


    }

    public function getJob(Request $request)
    {
        return Job::with('crane.driver','client')
                    ->get();
    }
}
