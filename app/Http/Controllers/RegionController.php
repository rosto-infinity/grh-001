<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\RegionRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegionExport;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        // 1  Utilisation de la méthode filter du modèle regions
        $regionsQuery = Region::filter($request);

        // 2 -- Pagination
        $regions = $regionsQuery->paginate(4);

        return view('admin.regions.list', compact('regions'));
    }

    public function add()
    {
        return view('admin.regions.add');
    }

    /**
     * -Summary of store
     * @param \App\Http\Requests\RegionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegionRequest $request)
    {
        // 1. -- Valider la requête
        Region::create($request->validated());

        // 2. -- Rediriger ou retourner une réponse
        return redirect()->route('admin.regions')->with('success', 'Région ajoutée avec succès.');
    }

    public function view($id)
    {
        // 1 -- Récupérer les données de la région par ID
        $region = Region::findOrFail($id); // Trouver ou échouer

        return view('admin.regions.view', compact('region'));
    }

    public function edit($id)
    {
        // 1 -è Récupérer la région par ID
        $region = Region::findOrFail($id);

        // 2 - Retourner la vue avec les données de la région
        return view('admin.regions.edit', compact('region'));
    }

    public function update(RegionRequest $request, $id)
    {
        $region = Region::findOrFail($id); // Trouver la région ou échouer
        // 1 - Mettre à jour la région avec les données validées
        $region->update($request->validated());

        return redirect()->route('admin.regions')->with('success', 'Région mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // 1 - Supprimer la région par ID
        $region = Region::findOrFail($id); // Trouver la région ou échouer
        $region->delete(); // Supprimer la région

        // 2 - Rediriger ou retourner une réponse
        return redirect()
              ->route('admin.regions')
              ->with('success', 'Région supprimée avec succès.');
    }

    public function excel()
    {
        $fileName = now()->format('d-m-Y H.i.s');
        return Excel::download(new RegionExport, 'Regions_' . $fileName . '.xlsx');
    }
}
