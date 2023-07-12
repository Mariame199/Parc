<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout de client</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="addClient()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="addClient.nom"
                                class="form-control @error('addClient.nom') is-invalid @enderror">

                            @error('addClient.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="addClient.prenom"
                                class="form-control @error('addClient.prenom') is-invalid @enderror">

                            @error('addClient.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" class="form-control @error('addClient.email') is-invalid @enderror"
                            wire:model="addClient.email">
                        @error('addClient.email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('addClient.adresse') is-invalid @enderror"
                            wire:model="addClient.adresse">
                        @error('addClient.adresse')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone </label>
                            <input type="text" class="form-control @error('addClient.telephone') is-invalid @enderror"
                                wire:model="addClient.telephone">
                            @error('addClient.telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                    <div class="form-group">
                        <label>NumeroCni</label>
                        <input type="text"
                            class="form-control @error('addClient.numeroCni') is-invalid @enderror"
                            wire:model="addClient.numeroCni">
                        @error('addClient.numeroCni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter Client</button>
                    <button type="button" wire:click="goToListClient()" class="btn btn-danger">Retouner à la liste des
                        clients</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
