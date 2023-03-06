<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function list()
    {
        $search = request('search');
        $clients = Client::where('status', '!=', 99)->sortable()->paginate(15);
        $page = 'clients';

        if ($search != "") {
            $clients = Client::where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')->orWhere('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('country', 'like', '%' . $search . '%')->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')->orWhere('zip', 'like', '%' . $search . '%');
            })
                ->where('status', '!=', 99)->sortable()->paginate(15);
            $clients->appends(['search' => $search]);
        }
        return view('admin.src.clients.list', compact('clients', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-client';
        return view('admin.src.clients.add', compact('page'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $page = 'edit-client';
        return view('admin.src.clients.add', compact('client', 'page'));
    }

    public function store()
    {
        request()->validate([
            'first_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        if (\request('client_id') == 0){
            $client = new Client();
            $client->user_id = 0;
        }
         else
             $client = Client::findOrFail(\request('page_id'));

         //check unique email
        if (!LibHelper::check_client_email((int)request('client_id'), request('email')))
            return redirect()->back()->with('error', __('website.this-email-has-already-been-taken'));

        $client->first_name = \request('first_name');
        $client->last_name = \request('last_name');
        $client->city = \request('city');
        $client->address = \request('address');
        $client->zip = \request('zip');
        $client->phone = \request('phone');
        $client->email = \request('email');
        $client->country = \request('country');

        $client->save();
        return redirect('/admin/clients')->with('success', 'Action performed successfully!');
    }

    public function change_status($id, $status)
    {
        $client = Client::findOrFail($id);
        $redirect_page = 'clients';
        return LibHelper::change_status($client, $status, $redirect_page);
    }
}
