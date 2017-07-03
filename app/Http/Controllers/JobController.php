<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function addJob(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'jobs_licence_class' => 'required | numeric | between:1,5',
            'crane_operating_licence' => 'required',
            'defensive_licence_expiry_date' => 'required | date',
            'contact_number' => 'required | numeric |unique:jobs,contact_number'
        ])->validate();

        $values = array(
            'name' => $request->name,
            'jobs_licence_class' => $request->jobs_licence_class,
            'crane_operating_licence' => $request->crane_operating_licence,
            'defensive_licence_expiry_date' =>new Carbon($request->defensive_licence_expiry_date),
            'contact_number' => $request->contact_number
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
            'contact_number' => 'numeric',
            'jobs_licence_class' => 'numeric | between:1,5',
            'defensive_licence_expiry_date' => 'date',
        ])->validate();

        Job::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Job Updated Successfully';


    }

    public function getJob(Request $request)
    {
        return Job::get();
    }
}
