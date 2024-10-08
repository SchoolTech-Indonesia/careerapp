<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;


class UsersMenu extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $isHome = true;
    public $isCreate = false;
    public $isEdit = false;
    public $isShow = false;
    public $search = '';
<<<<<<< HEAD
    public $id, $name, $email,$password,$phone_number;
=======
    public $id, $name, $email, $phone_number, $password;
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c

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
<<<<<<< HEAD
        $this->password = $user->password;
        $this->phone_number = $user->phone_number;


=======
        $this->phone_number = $user->phone_number;

>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c
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
<<<<<<< HEAD
        
=======
        $this->password = '******';
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c
    }

    public function back(){
        $this->isHome = true;
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isShow = false;

<<<<<<< HEAD
        $this->reset('id', 'name', 'email','password','phone_number');
    }

    public function save()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => ['required', Password::min(1)],
        'phone_number' => 'required|string|max:15',
    ]);
=======
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
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c

    User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'phone_number' => $this->phone_number,
    ]);
        session()->flash('success', 'User created successfully.');
<<<<<<< HEAD
        $this->reset('name', 'email','password','phone_number');
=======
        $this->reset('name', 'email', 'phone_number', 'password');
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c
        $this->back();
    }

    public function setUpdate($id) {
        // Validasi input
        $this->validate([
<<<<<<< HEAD
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Unique email validation kecuali ID saat ini
            'password' => ['nullable', Password::min(8)], // Password opsional, minimal 8 karakter jika diisi
            'phone_number' => 'required|string|max:15',
=======
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:3',
            'password' => 'nullable |min:8'
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c
        ]);

        $user = User::find($id);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
<<<<<<< HEAD
            'password' => $this->password,
            'phone_number' => $this->phone_number

        ]);

        session()->flash('success', 'User updated successfully.');
        $this->reset('name', 'email','password','phone_number');
=======
            'phone_number' => $this->phone_number
        ];
        if($this->password){
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);

        session()->flash('success', 'User updated successfully.');
        $this->reset('name', 'email', 'phone_number', 'password');
>>>>>>> a1f328d52c95bbd904b4de25bd613377947c099c
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
