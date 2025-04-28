@extends('layouts.application')

@section('content')

<!-- Wrapper de contenu principal -->
<div class="content-wrapper">
    <!-- En-tête de contenu (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- 9-Titre de la page pour modifier un region -->
                    <h3>Modifier une nouvelle region</h3>
                </div>
                <div class="text-right col-sm-6">
                    <!--- 10-Bouton pour revenir à la liste des regions -->
                    <a href="{{ route('admin.regions') }}" class="btn btn-secondary">Retour à la liste</a>
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
                            <h3 class="card-title">Informations sur la region</h3>
                        </div>
                        <!-- Fin de l'en-tête de carte -->
                        <!-- 12--Début du formulaire -->
                        <form method="POST" action="{{ route('admin.regions.update', $region->id) }}"
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
  
                                    {{--- region_name --}}
                                    <div class="form-group col-md-6">
                                        <label for="region_name">region_name<span class="text-red-600">*</span> </label>
                                        <input type="text" class="form-control @error('region_name') is-invalid @enderror"
                                            value="{{ old('region_name', $region->region_name)}}" id="region_name" name="region_name"
                                            placeholder="region_name">
  
                                        <!-- Affichage de l'erreur pour name -->
                                        @error('region_name')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
  
                                   
  
                                
                                </div>
                            </div>
  
                            <div class="card-footer">
                                <!-- 20--Bouton pour annuler la modification -->
                                <a href="{{ route('admin.regions') }}" class="btn btn-secondary">Annuler</a>
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
