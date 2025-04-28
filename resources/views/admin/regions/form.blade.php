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
                  <h3>Ajouter une nouvelle region</h3>
              </div>
              <div class="text-right col-sm-6">
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

                                  {{-- --region_name --}}
                                  <div class="form-group col-md-6">
                                      <label for="region_name">region_name<span class="text-red-600">*</span> </label>
                                      <input type="text" class="form-control @error('region_name') is-invalid @enderror"
                                          value="{{ old('region_name')}}" id="region_name" name="region_name"
                                          placeholder="region_name">

                                      <!-- __Affichage de l'erreur pour name -->
                                      @error('region_name')
                                          <div class="text-red-600">{{ $message }}</div>
                                      @enderror
                                  </div>

                              </div>
                          </div>

                          <div class="card-footer">
                              <a href="{{ route('admin.regions') }}" class="btn btn-secondary">Annuler</a>
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