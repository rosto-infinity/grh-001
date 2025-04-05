
 @extends('layouts.application')

 @section('content')
 
 
   <!-- 25-Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- 26-Content Header (Page header) -->
     <div class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1 class="m-0">Employees</h1>
           </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employees v1</li>
                  </ol>
                  <!-- Content Wrapper. Contains page content -->
                </div>
           
       
      <div class="container-fluid mt-4">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h2 class="sm:mb-2 text-[1.5rem]">Listes des Employees(Total :
                      <span class="bg-green-600 rounded-full text-white p-1">
                        {{-- {{ $getRecord->total() }} --}}
                      </span>)
                  </h2>
              </div>
              <div class="text-right col-sm-6">
                  <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Ajouter une nouvelle Employees</a>
              </div>
          </div>
      </div><!-- /.container-fluid -->
 

   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="mr-2 card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Rechercher une Employees</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form method="get" action="">
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="form-group col-md-3">
                                              <label for="annee_id">Année Scolaire</label>
                                              <select class="form-control" id="annee_id" name="annee_id">
                                                  <option value="">Sélectionner une année scolaire</option>
                                                  {{-- @foreach ($anneeScolaires as $annee) --}}
                                                      <option
                                                       {{-- value="{{ $annee->id }}" {{ Request::get('annee_id') == $annee->id ? 'selected' : '' }} --}}
                                                       >
                                                          {{-- {{ $annee->nom_annee }} --}}
                                                      </option>
                                                  {{-- @endforeach --}}
                                              </select>
                                          </div>
                              
                                          <div class="form-group col-md-3">
                                              <label for="status">Statut</label>
                                              <select class="form-control" id="status" name="status">
                                                  <option value="">Sélectionner un statut</option>
                                                  <option value="1" >Année actuelle</option>
                                                  <option value="0" >Année inactif</option>
                                              </select>
                                          </div>
                              
                                          <div class="form-group col-md-3">
                                              <label for="date">Date de création</label>
                                              <input type="date" class="form-control" id="date" name="date" value="">
                                          </div>
                              
                                          <div class="form-group col-md-3">
                                              <button type="submit" class="mt-8 mr-2 btn btn-primary">
                                                  <i class="nav-icon fas fa-search"></i> Recherche
                                              </button>
                                              <a href="" class='mt-8 btn btn-success'>
                                                  <i class="fas fa-refresh" aria-hidden="true"></i> Réinitialiser
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
                          <h3 class="card-title">Listes des Années Scolaires</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                          <table class="table table-striped">
                              <thead>
                                  <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Date de création</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 
                                      <tr>
                                          <td>gg</td>
                                          <td>444</td>
                                          <td>deee</td>
                                          <td>ggggggggggggg</td>
                                          {{-- <td>{{ $value->created_at->translatedFormat('l d/m/Y \à H\h:i') }}</td> --}}
                                          <td>
                                              <a href="" class="btn btn-warning btn-sm">
                                                  <i class="nav-icon fas fa-pencil-alt"></i> Modifier
                                              </a>
                                              <!-- Formulaire pour la suppression -->
                                              <form action="" method="POST" style="display:inline;">
                                                  {{-- @csrf
                                                  @method('DELETE') --}}
                                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette année scolaire ?');">
                                                      <i class="nav-icon fas fa-trash-alt"></i> Supprimer
                                                  </button>
                                              </form>
                                          </td>
                                      </tr>
                               
                              </tbody>
                          </table>
                          <div class="pr-5 pt-5 flex float-right">
                              {{-- {!! $anneeScolaires->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
      </div>
    </section>
    
           </div><!-- /.row -->
         </div><!-- /.container-fluid -->
       </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   
   @endsection
 
 
 
 
