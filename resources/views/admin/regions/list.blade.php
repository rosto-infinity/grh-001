@extends('layouts.application')

@section('content')

<!-- --Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- ---Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Listes des regions (Total :
                        <span class="bg-green-600 rounded-full text-white">
                            {{ $regions->total() }}
                        </span>)
                    </h3>
                </div>
                <div class="text-right col-sm-6">
                    <a href="{{ route('admin.regions.excel') }}" class='btn btn-success'>
                        <i class="fas fa-file-excel" aria-hidden="true"></i> Exporter vers Excel
                    </a>
                    <a href="{{ route('admin.regions.add') }}" class="btn btn-primary">Ajouter une nouvelle region</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('_message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mr-2 card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Rechercher une region</h3>
                            </div>
                            <form method="get" action="#">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="region_name">nom de la Region</label>
                                            <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Entrez le niveau de grade" value="{{ Request::get('region_name') }}">
                                        </div>

                                       

                                        <div class="form-group col-md-3">
                                            <label for="date">Date de création</label>
                                            <input type="date" class="form-control" id="date" name="date" value="{{ Request::get('date') }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="dateUpdate">Date de Mise à jour</label>
                                            <input type="date" class="form-control" id="dateUpdate" name="dateUpdate" value="{{ Request::get('dateUpdate') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <button type="submit" class="mt-8 mr-2 btn btn-primary">
                                                <i class="nav-icon fas fa-search"></i> Recherche
                                            </button>
                                            <a href="{{ route('admin.regions') }}" class='mt-8 btn btn-success'>
                                                <i class="fas fa-sync-alt"></i> Réinitialiser
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listes des emplois</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-green-400">Nom de la Région</th>
                                    <th>Date de création</th>
                                    <th>Date de mise à jour</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @if ($regions->isEmpty()) 
                                <tr>
                                    <td colspan="4" class="text-center">Aucune région...</td>
                                </tr>
                                @else
                                @foreach ($regions as $region)
                                    <tr> 
                                        <td>{{ $region->region_name }}</td>
                                        <td>{{ $region->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                        <td>{{ $region->updated_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.regions.view', $region->id) }}" class="btn btn-info btn-sm">
                                                <i class="nav-icon fas fa-eye mr-1"></i>
                                            </a>
                                            <a href="{{ route('admin.regions.edit', $region->id) }}" class="btn btn-warning btn-sm">
                                                <i class="nav-icon fas fa-pencil-alt mr-1"></i>
                                            </a>
                                            <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emploi?');">
                                                    <i class="nav-icon fas fa-trash-alt mr-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="pr-5 py-5 flex float-right">
                            {{ $regions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /.content-wrapper -->

@endsection
