<?php
namespace App\Http\Controllers;

use App\Exports\EmploiGradeExport;
use App\Models\EmploiGrade;
use App\Http\Requests\EmploiGradeRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmploiGradeController extends Controller
{
    public function index(Request $request)
    {
        // // 1 - Utilisation de la méthode filter du modèle emploi grades
        // $gradesQuery = EmploiGrade::filter($request);

        // // 2 - Pagination
        // $grades = $gradesQuery->paginate(4);
        $emploi_grades =EmploiGrade::paginate(4);

        return view('admin.emploi_grades.list', compact('emploi_grades'));
    }

    public function add()
    {
        return view('admin.emploi_grades.add');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\EmploiGradeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmploiGradeRequest $request)
    {
        // 1. -Valider la requête
        EmploiGrade::create($request->validated());

        // 2.- Rediriger ou retourner une réponse
        return redirect()->route('admin.emplois_grades')->with('success', 'Grade ajouté avec succès.');
    }

    public function view($id)
    {
        // 1 - -Récupérer les données du grade par ID
        $grade = EmploiGrade::findOrFail($id); // Trouver ou échouer

        // return view('admin.emplois_grades.view', compact('grade'));
    }

    public function edit($id)
    {
        // 1 -- Récupérer le grade par ID
        $grade = EmploiGrade::findOrFail($id);

        // 2 - -Retourner la vue avec les données du grade
        // return view('admin.emplois_grades.edit', compact('grade'));
    }

    public function update(EmploiGradeRequest $request, $id)
    {
        $grade = EmploiGrade::findOrFail($id); // -Trouver le grade ou échouer
        // 1 - Mettre à jour le grade avec les données validées
        $grade->update($request->validated());

        return redirect()->route('admin.emplois_grades')->with('success', 'Grade mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // 1 - Supprimer le grade par ID
        $grade = EmploiGrade::findOrFail($id); // Trouver le grade ou échouer
        $grade->delete(); // Supprimer le grade

        // 2 - Rediriger ou retourner une réponse
        return redirect()->route('admin.emplois_grades')->with('success', 'Grade supprimé avec succès.');
    }

    public function excel()
    {
        $fileName = now()->format('d-m-Y H.i.s');
        return Excel::download(new EmploiGradeExport, 'EmploisGrades_' . $fileName . '.xlsx');
    }
}
