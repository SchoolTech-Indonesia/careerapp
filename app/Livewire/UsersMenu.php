<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Hash;

class UsersMenu extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $isHome = true;
    public $isCreate = false;
    public $isEdit = false;
    public $isShow = false;
    public $search = '';
    public $id, $name, $email, $phone_number, $password;

    public function render()
    {
        return view('livewire.users-menu', ['users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(5)]);
    }

    public function newuser(){
        $this->isHome = false;
        $this->isCreate = true;
        $this->isEdit = false;
        $this->isShow = false;
    }

    public function edit($id){
        $this->isHome = false;
        $this->isCreate = false;
        $this->isEdit = true;
        $this->isShow = false;
        $user = User::find($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;

    }

    public function show($id){
        $this->isHome = false;
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isShow = true;
        $user = User::find($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->password = '******';
    }

    public function back(){
        $this->isHome = true;
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isShow = false;

        $this->reset('id', 'name', 'email', 'phone_number', 'password');
    }

    public function save(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:3',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'password' => Hash::make('password')
        ]);

        session()->flash('success', 'User created successfully.');
        $this->reset('name', 'email', 'phone_number', 'password');
        $this->back();
    }

    public function setUpdate($id){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:3',
            'password' => 'nullable |min:8'
        ]);

        $user = User::find($id);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number
        ];
        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        session()->flash('success', 'User updated successfully.');
        $this->reset('name', 'email', 'phone_number', 'password');
        $this->back();
    }

    public function destroy($id) {
        $user = User::find($id);
    
        if ($user) {
            $user->forceDelete();
            session()->flash('success', 'User deleted permanently.');
        }else{
            $this->back();
        }
    }
}
