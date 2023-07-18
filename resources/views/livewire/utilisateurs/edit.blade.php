<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user-plus fa"></i> Formulaire d'édition utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="updateUser()" method="POST">
            <div class="card-body">

                <div class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <label >Nom</label>
                        <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror">

                        @error("editUser.nom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group flex-grow-1">
                        <label >Prenom</label>
                        <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror">

                        @error("editUser.prenom")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                <label >Adresse e-mail</label>
                <input type="text" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email">
                @error("editUser.email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
            </div>
            </form>
        </div>
        <!-- /.card -->
<div>
    <div class="col-md-12 mt-4">
    <div class="card card-primary">
        <div class="card-header d-flex align-items-center">
        <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles </h3>
        <button class="btn bg-gradient-success" wire:click=><i class="fas fa-check"></i> Appliquer les modifications</button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div id="accordion">
                @foreach ($role["roles"] as $role)


                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title flex-grow-1">
                                        <a  data-parent="#accordion" href="#"  aria-expanded="true">
                                    {{$role["role_nom"]}}
                                        </a>
                                        </h4>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                            <input type="checkbox" class="custom-control-input"

                                               id ="customSwitch">
                                            <label class="custom-control-label" for="customSwitch">Active</label>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    <div class="card-body">

                    </div>
    </div>
</div>

</div>
