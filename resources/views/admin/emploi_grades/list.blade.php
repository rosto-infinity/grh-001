@extends('layouts.application')

@section('content')

    <!-- --Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- ---Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Listes des emplois(Total :
                            <span class="bg-green-600 rounded-full text-white">
                                {{ $emploi_grades->total() }}
                            </span>)
                        </h3>
                    </div>
                    <div class="text-right col-sm-6">
                        <a href="#" class='btn btn-success'>
                            <i class="fas fa-file-excel" aria-hidden="true"></i> Export Exel
                        </a>
                        <a href="{{ route('admin.emplois_grades.add') }}" class="btn btn-primary">Ajouter une nouvelle emplois</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @include('_message')
        <!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mr-2 card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Rechercher une emplois</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- --form start -->
                                <form method="get" action="#">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label for="grade_level">grade_level
                                                </label>
                                                <input type="text" class="form-control" id="grade_level" name="grade_level" placeholder="Entrez votre grade_level" value="{{ Request::get('grade_level') }}">
                                            </div>
                                
                                            {{-- --Filtrer par lowest_salary --}}
                                            <div class="form-group col-md-3">
                                                <label for="lowest_salary">lowest_salary</label>
                                                <input type="number" class="form-control" id="lowest_salary" name="lowest_salary" placeholder="Entrez votre lowest_salary" value="{{ Request::get('lowest_salary') }}">
                                            </div>
                                
                                            {{-- --Filtrer par Highest Salary --}}
                                            <div class="form-group col-md-3">
                                                <label for="highest_salary">Highest Salary</label>
                                                <input type="number" class="form-control" id="highest_salary" name="highest_salary" placeholder="highest_salary" value="{{ Request::get('highest_salary') }}">
                                            </div>
                                
                                            {{-- Filtrer par Date de création --}}
                                            <div class="form-group col-md-3">
                                                <label for="date">Date de création</label>
                                                <input type="date" class="form-control" id="date" name="date" value="{{ Request::get('date') }}">
                                            </div>
                                
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="mt-8 mr-2 btn btn-primary">
                                                    <i class="nav-icon fas fa-search"></i> Recherche
                                                </button>
                                                <a href="#" class='mt-8 btn btn-success'>
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
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="bg-green-400 ">grade_level</th>
                                            <th>lowest_salary</th>
                                            <th>highest_salary</th>
                
                                            <th>Date de création</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if ($emploi_grades->isEmpty()) 
                                        <tr>
                                            <td  colspan="6" class="text-center"> 
                                                 Aucun emploi_grade... 
                                         </td>
                                        </tr>
                                        @else
                                        @foreach ($emploi_grades as $emploi_grade)
                                            <tr> 
                                                <td>{{ $emploi_grade->grade_level}}</td>
                                                <td>{{ $emploi_grade->lowest_salary }}</td>
                                                <td>{{ $emploi_grade->highest_salary }}</td>
                                               
                                                <td>{{ $emploi_grade->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td>
                                                <td>
                                                    <a href="#"" class="btn btn-info btn-sm">
                                                        <i class="nav-icon fas fa-eye mr-1"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-warning btn-sm">
                                                        <i class="nav-icon fas fa-pencil-alt mr-1"></i>
                                                    </a>
                                                    
                                                    <!-- 5---Formulaire pour la suppression -->
                                                    <form action="{{ route('admin.emplois_grades.destroy', $emploi_grade->id )}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet emploi grade ?');">
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
                                    {{ $emploi_grades->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    </div>
@endsection