<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa"></i> Formulaire d'ajout d'un employe</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="addEmploye()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="addEmploye.nom"
                                class="form-control @error('addEmploye.nom') is-invalid @enderror">

                            @error('addEmploye.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addEmploye.prenom"
                                class="form-control @error('addEmploye.prenom') is-invalid @enderror">

                            @error('addEmploye.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('addEmploye.address') is-invalid @enderror"
                            wire:model="addEmploye.address">
                        @error('addEmploye.address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone </label>
                            <input type="text" class="form-control @error('addEmploye.telephone') is-invalid @enderror"
                                wire:model="addEmploye.telephone">
                            @error('addEmploye.telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label>Poste actuel</label>
                    <input type="text" class="form-control @error('addEmploye.poste actuel') is-invalid @enderror"
                        wire:model="addEmploye.poste actuel">
                    @error('addEmploye.poste actuel')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter Employe</button>
                    <button type="button" wire:click="goToListEmploye()" class="btn btn-danger">Retouner à la liste des
                        employes</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
