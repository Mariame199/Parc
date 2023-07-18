<div class="row p-4 pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-gradient-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des articles</h3>

          <div class="card-tools d-flex align-items-center ">
          <a class="btn btn-link text-white mr-4 d-block" wire:click="goToAddVoiture()"><i class="fas fa-user-plus"></i> Ajouter une voiture</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" >
          <div class="d-flex justify-content-end p-4 bg-indigo">


              <div class="form-group">
                  <label for="filtreEtat">Filtrer par etat</label>
                  <select  id="filtreEtat" wire:model="filtreEtat" class="form-control">
                      <option value=""></option>
                      <option value="1">Disponible</option>
                      <option value="0">Indisponible</option>
                  </select>
              </div>
          </div>
          <div style="height:350px;">
              <table class="table table-head-fixed">
              <thead>
                  <tr>
                  <th></th>
                  <th >Marque</th>
                  <th class="text-center">Etat</th>
                  <th  class="text-center">Ajouté</th>
                  <th  class="text-center">Action</th>
                  </tr>
              </thead>
              <tbody>

                      @forelse ($voitures as $voiture)
                          <tr>
                              <td>
                                  <img src="{{asset($voiture->imageUrl)}}" alt="" style="width:60px;height:60px;">

                              </td>
                              <td>{{ $voiture->marque }} </td>

                              <td class="text-center">
                                  @if($voiture->estDisponible)
                                      <span class="badge badge-success">Disponible</span>
                                  @else
                                      <span class="badge badge-danger">Indisponible</span>
                                  @endif
                              </td>
                              <td class="text-center">{{ optional($voiture->created_at)->diffForHumans() }}</td>
                              <td class="text-center">

                                  <a
                                  title="Tarifs {{ $voiture->nom }}"
                                   class="btn btn-link" > <i class="fas fa-money-check"></i> </a>

                                  <button class="btn btn-link" wire:click="editVoiture({{$voiture->id}})"> <i class="far fa-edit"></i> </button>

                                  <button class="btn btn-link" wire:click="confirmDelete({{$voiture->id}})"> <i class="far fa-trash-alt"></i> </button>

                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="6">
                                  <div class="alert alert-danger">

                                      <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                      Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                      </div>
                              </td>
                          </tr>
                      @endforelse
              </tbody>
              </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="float-right">
              {{ $voitures->links() }}
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>
