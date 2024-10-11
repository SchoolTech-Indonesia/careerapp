<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Applicant extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';

    public $isHome = true;
    public $isCreate = false;
    public $isEdit = false;
    public $isShow = false;
    public $search = '';
    public $userId, $name, $email, $password, $phone_number;

    public function render()
    {
        return view('comingsoon');  // Ubah sesuai dengan view yang benar
    }

    public function newuser()
    {
        $this->resetForm();
        $this->isHome = false;
        $this->isCreate = true;
    }

    public function edit($id)
    {
        $this->resetForm();
        $this->isHome = false;
        $this->isEdit = true;
        $user = User::find($id);

        if ($user) {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone_number = $user->phone_number;
        }
    }

    public function show($id)
    {
        $this->resetForm();
        $this->isHome = false;
        $this->isShow = true;
        $user = User::find($id);

        if ($user) {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone_number = $user->phone_number;
        }
    }

    public function back()
    {
        $this->isHome = true;
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isShow = false;
        $this->resetForm();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', Password::min(8)],
            'phone_number' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone_number' => $this->phone_number,
        ]);

        session()->flash('success', 'User created successfully.');
        $this->back();
    }

    public function setUpdate($id)
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => ['nullable', Password::min(8)],  // Password hanya validasi jika ada
            'phone_number' => 'required|string|max:15',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
                'phone_number' => $this->phone_number,
            ]);

            session()->flash('success', 'User updated successfully.');
            $this->back();
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->forceDelete();
            session()->flash('success', 'User deleted permanently.');
        }

        $this->back();
    }

    private function resetForm()
    {
        $this->reset(['userId', 'name', 'email', 'password', 'phone_number']);
    }
}
