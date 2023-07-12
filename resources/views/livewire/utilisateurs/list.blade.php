

 <div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-dark d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3>

          <div class="card-tools d-flex align-items-center ">
          <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser"><i class="fas fa-user-plus"></i> Nouvel utilisateur</a>
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
            <th style="width: 5%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
            <th style="width: 25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utilisateur</font></font></th>
            <th style="width: 20%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Roles</font></font></th>
            <th style="width: 20%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date de creation</font></font></th>
            <th style="width: 30%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mise a jour</font></font></th>
            </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user)


            <tr>
            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $user->id}}</font></font></td>
            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $user->name}}</font></font></td>
            <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                @foreach ($user->roles as $role)
                {{$role->nom}}

                @endforeach
            </font></font></td>
            <td class="text-center"><span class="tag tag-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $user->created_at->diffForHumans() }}</font></font></span></td>
            <td class="text-center">
                  <button class="btn btn-link" wire:click="goToEditUser({{$user->id}})"> <i class="far fa-edit"></i> </button>
                  <button class="btn btn-link" wire:click="confirmDelete('{{ $user->name }}', {{$user->id}})"> <i class="far fa-trash-alt"></i> </button>
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



