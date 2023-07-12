<div>
    <div>

        <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-dark d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-list"></i>Les types de voiture</font></font></h3>
            <div class="card-tools d-flex align-items-center">
     <button type="submit" class="bnt bnt-primary" wire:click ='toggleShowAddTypeVoitureForm'><i class="fas fa-list-plus" ></i> Nouveau type de voiture</button>
     <div class="input-group input-group-sm" style="width: 150px;">

        <div class="input-group-append">
            <button type="submit" class="btn btn-default">

            </button>
            </div>
            </div>
            </div>
            </div>
        </div>
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>

            <th style="width:50%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Type de Voiture</font></font></th>
            <th style="width:20%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date d'ajout</font></font></th>
            <th style="width: 30%;"class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mise a jour</font></font></th>
            </tr>
            </thead>

        <tbody>

            @if ($isAddTypeVoiture)
            <tr>
                <td colspan="2">
                    <input type="text" wire:keydown.enter = 'addnewTypeVoiture' class="form-control" wire:model.lazy = "newTypeVoitureName" />

                </td>
                <td class="text-center">

                    <button type="submit" class="btn btn-success"wire:click ='addnewTypeVoiture' >Valider</button>

                    <button type="submit" class="btn btn-danger"wire:click ='toggleShowAddTypeVoitureForm'>Annuler</button>
                    </td>

            </tr>

            @endif
            @foreach ( $typevoitures as $typevoiture )
            <tr>
                <td>{{$typevoiture->nom}}</td>
                <td class="text-center"><span class="tag tag-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $typevoiture->created_at }}</font></font></span></td>
                <td class="text-center">


                    <button class="btn btn-link" wire:click="editTypeVoiture({{$typevoiture->id}})"><i class="far fa-edit"></i></button>
                    <button class="btn btn-link" wire:click="confirmDelete('{{$typevoiture->nom}}', {{$typevoiture->id}})"> <i class="far fa-trash-alt"></i> </button>
                    </td>
            </tr>

            @endforeach

            </tbody>
            </table>
            </div>
    <div class="card-footer">
    {{ $typevoitures->links() }}
    <div>
            </div>

            </div>

    </div>


</div>
<script>
    window.addEventListener("showEditForm",function(e){
        Swal.fire({
            title: "Modifier le type de voiture",
            input: 'text',
            inputValue: e.detail.typevoiture.nom ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText:'Modifier' ,
            cancelButtonText:'Annuler' ,
            inputValidator: (value) => {
                if (!value) {
                return 'obligatoire'
                }

                @this.updateTypeVoiture(e.detail.typevoiture.id, value)

            }
        })
    })
</script>


<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data.type_voiture_id){
                @this.deleteTypeVoiture(event.detail.message.data.type_voiture_id)
            }

        }
        })
    })

</script>



</body>
