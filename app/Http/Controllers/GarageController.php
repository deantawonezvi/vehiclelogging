<?php

namespace App\Http\Controllers;

use App\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GarageController extends Controller
{
    public function addGarage(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required | unique:garages,name',
            'contact_person' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'bank_account_number' => 'required | numeric | unique:garages,bank_account',
        ])->validate();

        $values = $request->all();

        Garage::create($values);

        return 'Garage Added Successfully!';

    }

    public function deleteGarage(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:garages,id',
        ])->validate();

        if (Garage::destroy($request->id)) {
            return 'garage Deleted';
        }
        return 'Operation failed';


    }

    public function updateGarage(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:garages,id',
            'bank_account_number' => 'numeric',
        ])->validate();

        Garage::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Garage Updated Successfully';


    }

    public function getGarage(Request $request)
    {
        return Garage::get();
    }
}
