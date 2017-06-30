<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function addDriver(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'contact_number' => 'required | unique:drivers,contact_number'
        ])->validate();

        $values = $request->all();

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
            'name' => 'required',
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
