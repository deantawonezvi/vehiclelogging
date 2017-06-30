<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function addClient(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required | unique:clients,contact',
            'email' => 'email | unique:clients,email',
            'address' => 'required'
        ])->validate();

        $values = $request->all();

        Client::create($values);

        return 'Client Added Successfully!';

    }

    public function deleteClient(Request $request)
    {
        Validator::make($request->all(), [
            'id' => 'required  | exists:clients,id',
        ])->validate();

        if (Client::destroy($request->id)) {
            return 'Client Deleted';
        }
        return 'Operation failed';


    }

    public function updateClient(Request $request)
    {

        Validator::make($request->all(), [
            'id' => 'required  | exists:clients,id',
            'name' => 'required',
        ])->validate();

        Client::findOrFail($request->id)
            ->update($request->except('id'));

        return 'Client Updated Successfully';


    }

    public function getClient(Request $request)
    {
        return Client::get();
    }
}
