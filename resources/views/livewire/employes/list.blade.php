

<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-dark d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des Employés</h3>

          <div class="card-tools d-flex align-items-center ">
          <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddEmploye()"><i class="fas fa-user-plus"></i> Nouveau Employé</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
            <th style="width: 25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></th>
            <th style="width: 20%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Prenom</font></font></th>
            <th style="width: 20%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adresse</font></font></th>
            <th style="width: 20%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telephone</font></font></th>
            <th style="width: 20%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Poste</font></font></th>
            <th style="width: 20%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date de creation</font></font></th>
            <th style="width: 30%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mise a jour</font></font></th>
            </tr>
            </thead>
            <tbody>
                @foreach($employes as $employe)


            <tr>
            <td style="text-center"><font style="vertical-align: inherit;">{{ $employe->Nom}}</font></font></td>
            <td><font style="text-center"><font style="vertical-align: inherit;">{{ $employe->prenom}}</font></font></td>
            <td><font style="text-center"><font style="vertical-align: inherit;">{{ $employe->Adresse}}</font></font></td>
            <td><font style="text-center"><font style="vertical-align: inherit;">{{ $employe->Telephone}}</font></font></td>
            <td><font style="text-center"><font style="vertical-align: inherit;">{{ $employe->Poste}}</font></font></td>
            <td><font style="text-center"><font style="vertical-align: inherit;">
            <td class="text-center"><span class="tag tag-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $employe->created_at }}</font></font></span></td>
            <td class="text-center">
                  <button class="btn btn-link" wire:click="goToEditEmploye({{$employe->id}})"> <i class="far fa-edit"></i> </button>
                  <button class="btn btn-link" wire:click="confirmDelete('{{ $employe->prenom }} {{ $employe->nom }}', {{$employe->id}})"> <i class="far fa-trash-alt"></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->


      </div>
      <!-- /.card -->
    </div>
  </div>

</div>



