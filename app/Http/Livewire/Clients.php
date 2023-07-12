<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class clients extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $addClient = [];
    public $editClient = [];
    public $search = "";

    public function render()
    {

        Carbon::setLocale("fr");


        $query = Client::query();
        $search = $this->search;

        if(isset($search))
            $this->resetPage();

        $query->when($search != "", function($query) use($search){
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("prenom", "like", "%{$search}%");
        });

        return view('livewire.clients.index', [
            "clients" => $query->latest()->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:Clients,email Rule::unique("Clients", "email")->ignore($this->editClient['id'])
            return [
                'editClient.nom' => 'required',
                'editClient.prenom' => 'required',
                'editClient.adresse' => 'required',
                'editClient.telephone' => ['required', Rule::unique("clients", "telephone")->ignore($this->editClient['id']) ]  ,

                'editClient.numeroCni' => ['required', Rule::unique("clients", "numeroCni")->ignore($this->editClient['id']) ],
            ];
        }

        return [
            'addClient.nom' => 'required',
            'addClient.prenom' => 'required',

            'addClient.telephone' => 'required|unique:Clients,telephone',
            'addClient.numeroCni' => 'required',

        ];
    }

    public function goToAddClient(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditClient($id){
        $this->editClient = Client::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }



    public function goToListClient(){
        $this->currentPage = PAGELIST;
        $this->editClient = [];
    }

    public function addClient(){


        $validationAttributes = $this->validate();


        // Ajouter un nouvel utilisateur
        Client::create($validationAttributes["addClient"]);

        $this->addClient = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
    }

    public function updateClient(){

        $validationAttributes = $this->validate();


        Client::find($this->editClient["id"])->update($validationAttributes["editClient"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Client mis à jour avec succès!"]);

    }



    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des clients. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "client_id" => $id
            ]
        ]]);
    }

    public function deleteClient($id){
        Client::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Client supprimé avec succès!"]);
    }
}
