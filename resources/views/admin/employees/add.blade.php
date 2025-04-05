
 @extends('layouts.application')

 @section('content')
 
 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Ajouter une nouvelle  Employees</h3>
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
                                <label for="email">Email <span class="text-red-600">*</span> </label>
                                <input type="mail" class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email')}}" 
                                id="email" name="email"
                                placeholder="Entrez Last Name">
                                
                                <!-- Affichage de l'erreur pour email -->
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            {{-- 5-phone_number--}}
                            <div class="form-group col-md-6">
                                <label for="phone_number">Phone number <span class="text-red-600">*</span> </label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" 
                                value="{{ old('phone_number')}}" 
                                id="phone_number" name="phone_number"
                                placeholder="Phone number">
                                
                                <!-- 7-Affichage de l'erreur pour phone_number -->
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{--8- Hire Date--}}
                            <div class="form-group col-md-6">
                                <label for="hire_date">Hire Date <span class="text-red-600">*</span> </label>
                                <input type="date" class="form-control @error('hire_date') is-invalid @enderror" 
                                value="{{ old('hire_date')}}" 
                                id="hire_date" name="hire_date"
                                placeholder="Entrez Hire Date" >
                                
                                <!-- Affichage de l'erreur pour hire_date -->
                                @error('hire_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            {{--10- Job Title --}}
                            <div class="form-group col-md-6">
                                <label for="job_id">Job Title <span class="text-red-600">*</span> </label>
                                <select class="form-control @error('job_id') is-invalid @enderror" name="job_id" id="job_id">
                                <option value="">Sélectionnez Job Title</option>
                                    
                                <option value="1" {{ old('job_id') == '1' ? 'selected' : '' }}>Php</option>
                                <option value="0" {{ old('job_id') == '2' ? 'selected' : '' }}>Vue </option>
                                <option value="0" {{ old('job_id') == '3' ? 'selected' : '' }}>Laravel</option>
                                <option value="0" {{ old('job_id') == '4' ? 'selected' : '' }}>postgreSQL</option>
                                </select>
    
                        
    
                                <!-- Affichage de l'erreur pour job_id -->
                                @error('job_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            {{--11- Salary --}}
                            <div class="form-group col-md-6">
                                <label for="salary">Salary <span class="text-red-600">*</span> </label>
                                <input type="text" class="form-control @error('salary') is-invalid @enderror" 
                                value="{{ old('salary')}}" 
                                id="salary" name="salary"
                                placeholder="Entrez Salary">
                                
                                <!-- Affichage de l'erreur pour salary -->
                                @error('salary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{--11- Commission PCT --}}
                            <div class="form-group col-md-6">
                                <label for="commission_pct">Commission PCT <span class="text-red-600">*</span> </label>
                                <input type="text" class="form-control @error('commission_pct') is-invalid @enderror" 
                                value="{{ old('commission_pct')}}" 
                                id="commission_pct" name="commission_pct"
                                placeholder="Entrez Commission PCT">
                                
                                <!-- Affichage de l'erreur pour commission_pct -->
                                @error('commission_pct')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            {{--13- Manager Name --}}
                            <div class="form-group col-md-6">
                                <label for="manager_name">Manager Name <span class="text-red-600">*</span> </label>
                                <select class="form-control @error('manager_name') is-invalid @enderror" name="manager_id" id="manager_name">
                                <option value="">Sélectionnez Manager Name</option>
                                    
                                <option value="1" {{ old('manager_name') == '1' ? 'selected' : '' }}>Php</option>
                                <option value="0" {{ old('manager_name') == '2' ? 'selected' : '' }}>Vue </option>
                                <option value="0" {{ old('manager_name') == '3' ? 'selected' : '' }}>Laravel</option>
                                <option value="0" {{ old('manager_name') == '4' ? 'selected' : '' }}>postgreSQL</option>
                                </select>

                        

                                <!-- Affichage de l'erreur pour manager_name -->
                                @error('manager_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            {{--14- Departement Name --}}
                            <div class="form-group col-md-6">
                                <label for="departement_name">Departement Name <span class="text-red-600">*</span> </label>
                                <select class="form-control @error('departement_name') is-invalid @enderror" name="departement_id" id="departement_name">
                                <option value="">Sélectionnez Departement Name</option>
                                    
                                <option value="1" {{ old('departement_name') == '1' ? 'selected' : '' }}>Php</option>
                                <option value="0" {{ old('departement_name') == '2' ? 'selected' : '' }}>Vue </option>
                                <option value="0" {{ old('departement_name') == '3' ? 'selected' : '' }}>Laravel</option>
                                <option value="0" {{ old('departement_name') == '4' ? 'selected' : '' }}>postgreSQL</option>
                                </select>

                        

                                <!-- Affichage de l'erreur pour departement_name -->
                                @error('departement_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
  
                    <div class="card-footer">
                        <a href="{{ route('admin.employees') }}" class="btn btn-secondary">Annuler</a>
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
 
 
 
 
