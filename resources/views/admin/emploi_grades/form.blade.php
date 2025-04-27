@extends('layouts.application')
@section('title')
@section('content')

 <!-- 2Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h3>Ajouter une nouvelle emploi Grade</h3>
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
                          <h3 class="card-title">Informations sur l'emploi Grade</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="POST" action="">
                          @csrf <!-- Protection CSRF -->

                          <!--2-Affichage des erreurs globales -->
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
                                          value="{{ old('grade_level')}}" id="grade_level" name="grade_level"
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
                                          value="{{ old('lowest_salary')}}" id="lowest_salary" name="lowest_salary"
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
                                          value="{{ old('highest_salary')}}" id="highest_salary" name="highest_salary"
                                          placeholder="Entrez highest_salary">

                                      <!-- Affichage de l'erreur pour highest_salary -->
                                      @error('highest_salary')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>

                              
                              </div>
                          </div>

                          <div class="card-footer">
                              <a href="{{ route('admin.emplois_grades') }}" class="btn btn-secondary">Annuler</a>
                              <button type="submit" class="btn btn-primary float-right">Ajouter</button>
                          </div>
                      </form>
                  </div>
                  <!-- /.card -->
              </div>
          </div>
      </div>
  </section>
</div>
<!-- /.content-wrapper -->
@endsection