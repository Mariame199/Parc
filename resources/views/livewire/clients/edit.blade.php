<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Modifier Clients</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateClient()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="editClient.nom"
                                class="form-control @error('editClient.nom') is-invalid @enderror">

                            @error('editClient.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="editClient.prenom"
                                class="form-control @error('editClient.prenom') is-invalid @enderror">

                            @error('editClient.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" class="form-control @error('editClient.email') is-invalid @enderror"
                            wire:model="editClient.email">
                        @error('editClient.email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control @error('editClient.adresse') is-invalid @enderror"
                            wire:model="editClient.adresse">
                        @error('editClient.adresse')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone </label>
                            <input type="text" class="form-control @error('editClient.telephone') is-invalid @enderror"
                                wire:model="editClient.telephone">
                            @error('editClient.telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    <div class="form-group">
                        <label>NumeroCni</label>
                        <input type="text"

                         class="form-control @error('editClient.numeroCni') is-invalid @enderror"
                            wire:model="editClient.numeroCni">


                        @error('editClient.numeroCni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListClient()" class="btn btn-danger">Retouner à la liste des
                        clients</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>
