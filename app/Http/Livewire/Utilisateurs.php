<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Withpagination;

class Utilisateurs extends Component
{
    use Withpagination;

    protected $paginationTheme = 'bootstrap';

    public  $currentPage = PAGELIST;

    public $BtnAjouter = false;
    public $newUser = [];
    public $editUser = [];
    public $role = [];




             //   protected $messages = [
                   // 'newUser.nom.required' => "nom de l'utilisateur est requis",
                    //'newUser.prenom.required' => "Le prenom de l'utilisateur est requis",
                   // 'newUser.email.required'=> "L'email de l'utilisateur est requis"
               // ];
             //   protected $validationAttributes = [
                 //   'newUser.prenom' => 'firstname',
               // ];

    public function render()
    {

        return view('livewire.utilisateurs.index',[
            "users" => User::Latest()->paginate(10)
        ])

        ->extends("layouts.master")
       ->section("contenu");

    }
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,

            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',

        ];
    }


public function goToAddUser(){
    $this->currentPage = PAGECREATEFORM;
}

public function goToEditUser($id){
    $this->editUser = User::find($id)->toArray();

    $this->currentPage =PAGEEDITFORM;

    $this->populateRole();

}

public function populateRole(){
    $this->role["roles"] = [];


$mapForCB = function($value){
    return $value["id"];

};
    $roles = User::find($this->editUser['id'])->roles;

    $roles = array_map($mapForCB, User::find($this->editUser['id'])->roles->toArray());

    foreach(Role::all() as $role){
        if(in_array($role->id,$roles)){
            array_push($this->role["roles"],["role_id"=>$role->id, "role_nom" =>$role->nom, "active"=>true]);
        }else{
            array_push($this->role["roles"],["role_id"=>$role->id, "role_nom" =>$role->nom, "active"=>false]);
        }

    }


}




public function goToListUser(){

    $this->currentPage = PAGELIST;
    $this->editUser = [];
}
public function addUser(){
// Vérifier que les informations envoyées par le formulaire sont correctes

$validationAttributes = $this->validate();

    $validationAttributes["newUser"]["password"] = "password";
    //  ajout
   //User::create($validationAttributes["newUser"]);
 // Ajouter un nouvel utilisateur

 User::create($validationAttributes["newUser"]);

    $this->newUser = [];

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);

}


public function confirmDelete($name, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "user_id" => $id
        ]
    ]]);
}
public function deleteUser($id){
    User::destroy($id);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);

}

public function updateUser(){

    $validationAttributes = $this->validate();

        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);

}


}
