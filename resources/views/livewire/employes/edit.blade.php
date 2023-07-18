<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa"></i>Modifier Employes</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateEmploye()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="editEmploye.nom"
                                class="form-control @error('editEmploye.nom') is-invalid @enderror">

                            @error('editEmploye.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="editEmploye.prenom"
                                class="form-control @error('editEmploye.prenom') is-invalid @enderror">

                            @error('editEmploye.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('editEmploye.address') is-invalid @enderror"
                            wire:model="editEmploye.adresse">
                        @error('editEmploye.address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone </label>
                            <input type="text" class="form-control @error('editEmploye.telephone') is-invalid @enderror"
                                wire:model="editEmploye.telephone">
                            @error('editEmploye.telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListEmploye()" class="btn btn-danger">Retouner à la liste des
                        employes</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
