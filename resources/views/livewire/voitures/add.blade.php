<div class="row p-4 pt-5">
    <div class="col-10">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout de voiture</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="ajoutVoiture()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="my-4 bg-gray-light p-3 flex-grow-1">
                        <div class="form-group">
                            <label>Marque</label>
                            <input type="text" wire:model="addVoiture.marque"
                                class="form-control @error('addVoiture.marque') is-invalid @enderror">

                            @error('addVoiture.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" wire:model="addVoiture.matricule"
                                class="form-control @error('addVoiture.matricule') is-invalid @enderror">

                            @error('addVoiture.matricule')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" >
                            <label>Etat</label>
                        <select  class="form-control">
                            <option value=""></option>
                            <option value="1">Disponible</option>
                            <option value="0">Indisponible</option>
                        </select>
                    </div>
                </div class="form-group">
                <input type="file">
            </div>
              <div class="flex-grow-1 p-4">
                <div>
                           <div style="border: 1px solid #eee; border-radius: 20px; height: 80%;width:50%;" >

                           </div>

</div>
            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter Voiture</button>
                    <button type="button" wire:click="goToListVoiture()" class="btn btn-danger">Retouner à la liste des
                        voitures</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
