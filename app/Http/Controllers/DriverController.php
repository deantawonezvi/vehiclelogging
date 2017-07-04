<?php

namespace App\Http\Controllers;

use App\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function addDriver(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'drivers_licence_class' => 'required | numeric | between:1,5',
            'crane_operating_licence' => 'required',
            'defensive_licence_expiry_date' => 'required',
            'contact_number' => 'required | numeric |unique:drivers,contact_number'
        ])->validate();

        $values = array(
            'name' => $request->name,
            'drivers_licence_class' => $request->drivers_licence_class,
            'crane_operating_licence' => $request->crane_operating_licence,
            'defensive_licence_expiry_date' =>new Carbon($request->defensive_licence_expiry_date),
            'contact_number' => $request->contact_number
        );

        Driver::create($values);

        return 'Driver Added Successfully!';

    }

    public function deleteDriver(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:drivers,id',
        ])->validate();

        if (Driver::destroy($request->id)) {
            return 'Driver Deleted';
        }
        return 'Operation failed';


    }

    public function updateDriver(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:drivers,id',
            'contact_number' => 'numeric',
            'drivers_licence_class' => 'numeric | between:1,5',
            'defensive_licence_expiry_date' => 'date',
        ])->validate();

        Driver::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Driver Updated Successfully';


    }

    public function getDriver(Request $request)
    {
        return Driver::get();
    }
}
