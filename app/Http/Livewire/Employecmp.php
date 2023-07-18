<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employe;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Employecmp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $addEmploye = [];
    public $editEmploye = [];
    public $newEmploye = [];
    public $search = "";

    public function render()
    {

        Carbon::setLocale("fr");


        $query = Employe::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("prenom", "like", "%{$search}%");
        });

        return view('livewire.employes.index', [
            "employes" => $query->latest()->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){


            return [
                'editEmploye.nom' => 'required',
                'editEmploye.prenom' => 'required',
                'editEmploye.address' => 'required',
                'editEmploye.poste actuel' => 'required',
                'editEmploye.telephone' => ['required', Rule::unique("employe", "telephone")->ignore($this->editEmploye['id']) ]  ,

            ];
        }

        return [
            'addEmploye.nom' => 'required',
            'addEmploye.prenom' => 'required',
            'addEmploye.address' => 'required',
            'addEmploye.poste actuel' => 'required',
            'addEmploye.telephone' => 'required|unique:Employes,telephone',

        ];
    }

    public function goToAddEmploye(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditEmploye($id){
        $this->editEmploye = Employe::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }



    public function goToListEmploye(){
        $this->currentPage = PAGELIST;
        $this->editEmploye = [];
    }

    public function addEmploye(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        Employe::create($validationAttributes["addEmploye"]);

        $this->addEmploye = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
    }

    public function updateEmploye(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        Employe::find($this->editEmploye["id"])->update($validationAttributes["editEmploye"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Employé mis à jour avec succès!"]);

    }



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des Employés. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "employe_id" => $id
            ]
        ]]);
    }

    public function deleteEmploye($id){
        Employe::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Employé supprimé avec succès!"]);
    }
}



