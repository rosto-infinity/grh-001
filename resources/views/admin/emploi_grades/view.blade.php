@extends('layouts.application')

@section('content')

<!-- 01 - Wrapper de contenu principal -->
<div class="content-wrapper">
    <!-- 02 - En-tête de contenu (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Détails du Grade d'Emploi : {{ $emploi_grade->grade_level }}</h3>
                </div>
                <div class="text-right col-sm-6">
                    <a href="{{ route('admin.emplois_grades') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations sur le Grade d'Emploi</h3>
                        </div>
                        <!-- 03 - Tableau affichant les détails du grade d'emploi -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Niveau de Grade</th>
                                <td>{{ $emploi_grade->grade_level }}</td>
                            </tr>
                            <tr>
                                <th>Salaire Minimum</th>
                                <td>{{ $emploi_grade->lowest_salary }} FCFA</td>
                            </tr>
                            <tr>
                                <th>Salaire Maximum</th>
                                <td>{{ $emploi_grade->highest_salary }} FCFA</td>
                            </tr>
                            <tr>
                                <th>Date de Création</th>
                                <td>{{ $emploi_grade->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                            </tr>
                            <tr>
                                <th>Date de Mise à Jour</th>
                                <td>{{ $emploi_grade->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                            </tr>
                        </table>

                        <!-- 04 - Bouton pour retourner à la liste des grades d'emploi -->
                        <a href="{{ route('admin.emplois_grades') }}" class="btn btn-primary">Retour à la liste des grades d'emploi</a>
                    </div>
                    <!-- Fin de la carte -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Fin du wrapper de contenu principal -->

@endsection
