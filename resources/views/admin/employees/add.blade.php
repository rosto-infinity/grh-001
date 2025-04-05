
 @extends('layouts.application')

 @section('content')
 
 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Ajouter une nouvelle année scolaire</h2>
          </div>
          <div class="text-right col-sm-6">
            <a href="{{ route('admin.employees') }}" class="btn btn-secondary">Retour à la liste</a>
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
                <h3 class="card-title">Informations sur l'Employees</h3>
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
                        
                        {{-- 32 First Name --}}
                        <div class="form-group col-md-6">
                            <label for="first_mane">First Name<span class="text-red-600">*</span> </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ old('name')}}" 
                            id="first_mane" name="name"
                            placeholder="First Name">
                            
                            <!-- Affichage de l'erreur pour name -->
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- 4-Last Name --}}
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name <span class="text-red-600">*</span> </label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                            value="{{ old('last_name')}}" 
                            id="last_name" name="last_name"
                            placeholder="Entrez Last Name">
                            
                            <!-- Affichage de l'erreur pour last_name -->
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- 2--Email--}}
                        <div class="form-group col-md-6">
                            <label for="email">Last Name <span class="text-red-600">*</span> </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email')}}" 
                            id="email" name="email"
                            placeholder="Entrez Last Name">
                            
                            <!-- Affichage de l'erreur pour email -->
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        {{-- Phone--}}
                        <div class="form-group col-md-6">
                            <label for="phone">Phone number <span class="text-red-600">*</span> </label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                            value="{{ old('phone')}}" 
                            id="phone" name="phone"
                            placeholder="Phone number">
                            
                            <!-- Affichage de l'erreur pour phone -->
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Hire Date--}}
                        <div class="form-group col-md-6">
                            <label for="hire_date">Hire Date <span class="text-red-600">*</span> </label>
                            <input type="date" class="form-control @error('hire_date') is-invalid @enderror" 
                            value="{{ old('hire_date')}}" 
                            id="hire_date" name="hire_date"
                            placeholder="Entrez Last Name">
                            
                            <!-- Affichage de l'erreur pour hire_date -->
                            @error('hire_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
  
                        {{-- Job Title --}}
                        <div class="form-group col-md-6">
                            <label for="est_actuelle">Statut</label>
                            <select class="form-control @error('est_actuelle') is-invalid @enderror" name="est_actuelle" id="est_actuelle">
                            <option value="">Sélectionnez le Type UE</option>
                                
                              <option value="1" {{ old('est_actuelle') == '1' ? 'selected' : '' }}>Activer</option>
                              <option value="0" {{ old('est_actuelle') == '0' ? 'selected' : '' }}>Inactif </option>
                            </select>
  
                    
  
                            <!-- Affichage de l'erreur pour est_actuelle -->
                            @error('est_actuelle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
  
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
 
 
 
 
