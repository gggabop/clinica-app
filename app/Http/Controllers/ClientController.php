<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::query();

        // Aplicar filtros si existen en la solicitud
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        // Agregar más filtros según sea necesario
        $clients = $query->get();
        if ($request->has('name')) {
            echo dd($clients);
        }
        return Inertia::render('Clients/ListClients', [
            'clients' => $clients,
            'filters' => $request->all(), // Puedes pasar los filtros para mantener los valores en la vista
        ]);
    }

    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    // public function edit(Client $client)
    // {
    //     return Inertia::render('Clients/Edit', ['client' => $client]);
    // }
}
