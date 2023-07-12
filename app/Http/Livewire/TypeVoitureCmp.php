<?php

namespace App\Http\Livewire;
use App\Models\TypeVoiture;
use Livewire\Component;
use Livewire\Withpagination;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
class TypeVoitureCmp extends Component
{
    use withPagination;

    public $search = "";


    public $isAddTypeVoiture = false;

    public $newTypeVoitureName ="";
    public $newValue = "";
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $searchCriteria = "%".$this->search. "%";
        $data = [
            "typevoitures" => TypeVoiture::where('nom', 'like',$searchCriteria)->latest()->paginate(5)

        ];
        return view('livewire.typevoitures.index' , $data)

        -> extends("layouts.master")
       ->section("contenu");


    }
    public function toggleShowAddTypeVoitureForm(){
         if($this->isAddTypeVoiture){
            $this->isAddTypeVoiture = false;
            $this->newTypeVoitureName = "";

         }else{
            $this->isAddTypeVoiture = true;
         }
    }
    public function addnewTypeVoiture(){
        $validated = $this->validate([
            "newTypeVoitureName" => "required|max:50|unique:type_voitures,nom"
            ]);
            TypeVoiture::create(["nom" =>$validated['newTypeVoitureName']]);
            $this->toggleShowAddTypeVoitureForm();
            $this->dispatchBrowserEvent('showSuccessMessage',["message" => 'Type voiture ajouté avec succés!' ]);
    }

    public function editTypeVoiture($id){
        $typeVoiture = TypeVoiture::find($id);

        $this->dispatchBrowserEvent('showEditForm',["typevoiture" => $typeVoiture]);


    }
    public function updateTypeVoiture($id,$newValue){

        $this->newValue= $newValue;
        $validated = $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("type_voitures", "nom")->ignore($id)]
            ]);
            TypeVoiture::find($id)->update(["nom"=> $validated["newValue"]]);
            $this->dispatchBrowserEvent('showSuccessMessage',["message" => 'Type voiture modifié avec succés!' ]);
    }
    public function confirmDelete($nom, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $nom de la liste des types de voitures. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "type_voiture_id" => $id
            ]
        ]]);
    }

    public function deleteTypeVoiture(TypeVoiture $typeVoiture){
        $typeVoiture->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Le type de voiture a ete supprimé avec succès!"]);
    }

}




//{{setMenuActive('gesvoitures.typevoitures','active')}}
//{{setMenuClass('gesvoitures','menu-open')}}
//{{setMenuClass('gesvoitures','active')}}
