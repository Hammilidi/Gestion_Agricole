<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public $isOpen = 0;
    public $user, $idu, $name, $role, $email, $password;
    public function render()
    {
        $this->user = User::all();
        return view('livewire.users');
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->password = '';
        $this->name = '';
        $this->role = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::updateOrCreate(['name' => $this->name, 'role' => $this->role, 'email' => $this->email, 'password' => Hash::make($this->password)]);
        session()->flash(
            'message',
            $this->idu ? 'Agr Updated Successfully.' : 'Agr Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Agri = User::findOrFail($id);
        $this->idu = $id;
        $this->role = $Agri->role;
        $this->name = $Agri->name;
        $this->email = $Agri->email;
        $this->password = "";

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::find($this->idu)->update([
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }
    public function delete($id)
    {
        if ($id) {
            User::find($id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
