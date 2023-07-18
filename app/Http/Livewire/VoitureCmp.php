<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voiture;
use App\Models\TypeVoiture;
use Livewire\Withpagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class VoitureCmp extends Component
{
    use withPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $isBtnAjouter = false;
    public $search = "";
    public $filtreType = "", $filtreEtat = "";
    public $addVoiture = [];
    public $editVoiture = [];
    public $addPhoto = null;



    protected function rules () {
        return [
            'editVoiture.marque' => ["required", Rule::unique("voitures", "Marque")->ignore($this->editVoiture["id"])],


        ];
    }
    public function goToAddVoiture(){
        $this->isBtnAjouter = true;
    }



    public function render()
    {

        Carbon::setLocale("fr");

        $voitureQuery = Voiture::query();

        if($this->search != ""){
            $this->resetPage();
            $voitureQuery->where("nom", "LIKE",  "%". $this->search ."%")
                         ->orWhere("noSerie","LIKE",  "%". $this->search ."%");
        }

        if($this->filtreType != ""){
            $voitureQuery->where($this->filtreType);
        }

        if($this->filtreEtat != ""){
            $voitureQuery->where("estDisponible", $this->filtreEtat);
        }

        if($this->editVoiture != []){
            $this->showUpdateButton();
        }


        return view('livewire.voitures.index', [
            "voitures" => $voitureQuery->latest()->paginate(5),
            "typevoitures"=> TypeVoiture::orderBy("nom", "ASC")->get()
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
    public function goToListVoiture(){
        $this->isBtnAjouter = false;
        $this->currentPage = PAGELIST;
        $this->editVoiture = [];
    }

public function updated($property){

}


    public function ajoutVoiture(){

$validateArr = [
    "addVoiture.marque" => "string|min:3|required",
    "addVoiture.matricule" =>"string|max:50|min:3|required",
    "addPhoto" =>"image|max:10240"
];

$customErrMessages = [];

$validatedData = $this->validate($validateArr , $customErrMessages) ;

$imagePath = "";

if($this->addPhoto != null){
    $imagePath = $this->addPhoto->store('upload','public');
}




         $voiture = Voiture::create([
            "marque" => $validatedData["addVoiture"]["marque"],
            "matricule" => $validatedData["addVoiture"]["matricule"],
            "imageUrl" => $imagePath
         ]);

         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Voiture ajoutée avec succès!"]);


}



}
