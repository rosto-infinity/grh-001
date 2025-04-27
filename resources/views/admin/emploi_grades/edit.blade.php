@extends('layouts.application')

@section('content')

<!-- Wrapper de contenu principal -->
<div class="content-wrapper">
    <!-- En-tête de contenu (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- 9-Titre de la page pour modifier un emploi -->
                    <h3>Modifier une nouvelle emplois</h3>
                </div>
                <div class="text-right col-sm-6">
                    <!-- 10-Bouton pour revenir à la liste des emplois -->
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
                            <!-- 11-Titre de la carte d'informations -->
                            <h3 class="card-title">Informations sur l'emplois</h3>
                        </div>
                        <!-- Fin de l'en-tête de carte -->
                        <!-- 12--Début du formulaire -->
                        <form method="POST" action="{{ route('admin.emplois_grades.update', $emploi_grade->id) }}"
                            enctype="multipart/form-data">  
                            @csrf <!-- Protection CSRF -->
                            @method('PATCH') <!-- Méthode PATCH pour la mise à jour -->
  
                            <!-- 13-Affichage des erreurs globales -->
                            @if ($errors->any())
                                <div class="mx-10 mt-3 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
  
                            <div class="card-body">
                                <div class="row">
  
                                    {{-- grade_level --}}
                                    <div class="form-group col-md-6">
                                        <label for="grade_level">grade_level<span class="text-red-600">*</span> </label>
                                        <input type="text" class="form-control @error('grade_level') is-invalid @enderror"
                                            value="{{ old('grade_level', $emploi_grade->grade_level)}}" id="grade_level" name="grade_level"
                                            placeholder="grade_level">
  
                                        <!-- Affichage de l'erreur pour name -->
                                        @error('grade_level')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                    {{-- lowest_salary --}}
                                    <div class="form-group col-md-6">
                                        <label for="lowest_salary">lowest salary  <span class="text-red-600">*</span> </label>
                                        <input type="number" class="form-control @error('lowest_salary') is-invalid @enderror"
                                            value="{{ old('lowest_salary', $emploi_grade->lowest_salary)}}" id="lowest_salary" name="lowest_salary"
                                            placeholder="Entrez lowest_salary">
  
                                        <!-- Affichage de l'erreur pour lowest_salary -->
                                        @error('lowest_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                    {{-- highest_salary--}}
                                    <div class="form-group col-md-6">
                                        <label for="highest_salary">highest salary <span class="text-red-600">*</span> </label>
                                        <input type="number" class="form-control @error('highest_salary') is-invalid @enderror"
                                            value="{{ old('highest_salary', $emploi_grade->highest_salary)}}" id="highest_salary" name="highest_salary"
                                            placeholder="Entrez highest_salary">
  
                                        <!-- Affichage de l'erreur pour highest_salary -->
                                        @error('highest_salary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                
                                </div>
                            </div>
  
                            <div class="card-footer">
                                <!-- 20--Bouton pour annuler la modification -->
                                <a href="{{ route('admin.emplois_grades') }}" class="btn btn-secondary">Annuler</a>
                                <!-- 21-Bouton pour soumettre le formulaire -->
                                <button type="submit" class="btn btn-primary float-right">Modifier</button>
                            </div>
                        </form>
                    </div>
                    <!-- Fin de la carte -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- 22-Fin du wrapper de contenu principal -->
@endsection
