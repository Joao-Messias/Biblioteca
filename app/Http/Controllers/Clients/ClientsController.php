<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        if ($q) {
            $clients = Clients::where('name', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%")
                ->get();
        } else {
            $clients = Clients::all();
        }
        return view('clients.index')
            ->with('clients', $clients);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $validated = $request->validated();
        $client = new Clients();
        $client->fill($validated);
        $client->save();
        return redirect()->route('clients.index');
    }

    public function edit(Clients $client)
    {
        return view('clients.edit')
            ->with('client', $client);
    }

    public function update(ClientRequest $request, Clients $client)
    {
        $validated = $request->validated();
        $client->fill($validated);
        $client->save();
        return redirect()->route('clients.index');
    }

    public function destroy(Clients $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
