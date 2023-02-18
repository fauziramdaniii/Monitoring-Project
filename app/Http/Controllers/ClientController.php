<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_name' => 'required',
            'client_address' => 'required'
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client has been created successfully!');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'client_name' => 'required',
            'client_address' => 'required'
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client has been updated successfully!');
    }

    public function destroy($client)
{
    $client = Client::find($client);

    if ($client) {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client has been deleted successfully!');
    }

    return redirect()->route('clients.index')->with('error', 'Client not found!');
}

}
