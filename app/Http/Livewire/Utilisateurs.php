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

    public $BtnAjouter = false;
    public $newUser = [];
    public $editUser = [];


    protected $rules = [

                'newUser.name' => 'required',
                'newUser.email' => 'required|email|',
                ] ;

                protected $messages = [
                    'newUser.name.required'=> "Le nom de l'utilisateur est requis",
                    'newUser.email.required'=> "L'email de l'utilisateur est requis"
                ];

    public function render()
    {

        return view('livewire.utilisateurs.index',[
            "users" => User::paginate(10)
        ])

        ->extends("layouts.master")
       ->section("contenu");

    }


public function goToAddUser(){
    $this->BtnAjouter = true;
}

public function goToListUser(){
    $this->BtnAjouter = false;
}
public function addUser(){

    $this->validate();
    $validationAttributes["newUser"]["password"] = "password";
    //  ajout
   User::create($validationAttributes["newUser"]);
  //  dump($validationAttributes);

   // $this->newUser = [];

   // $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);



}

}


