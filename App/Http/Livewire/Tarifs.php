<?php

namespace App\Http\Livewire;

use App\Models\Tarif;
use Livewire\Component;

class Tarifs extends Component
{
    public $isOpen = 0;
    public $tarif, $tar_description, $tar_ero, $type;
    public function render()
    {
        $this->tarif = Tarif::all();
        return view('livewire.tarifs');
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
        $this->tar_description = '';
        $this->tar_ero = '';
    }

    private function resetInputFields()
    {
        $this->tar_description = '';
        $this->tar_ero = '';
    }
    public function store()
    {
        $this->validate([
            'tar_description' => 'required',
            'tar_ero' => 'required',
        ]);

        Tarif::updateOrCreate(['tar_description' => $this->tar_description, 'tar_ero' => $this->tar_ero]);
        session()->flash(
            'message',
            $this->tar_description ? 'tarif Updated Successfully.' : 'tarif Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $Tarif  = Tarif::findOrFail((string)$id);
        $this->tar_description = $id;
        $this->tar_ero = $Tarif->tar_ero;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'tar_description' => 'required',
            'tar_ero' => 'required'
        ]);

        Tarif::find($this->tar_description)->update([
            'tar_ero' => $this->tar_ero
        ]);
    }
    public function delete($id)
    {

        if ($id) {
            // $this->type = gettype($id);
            Tarif::find($id)->delete();
            session()->flash('message', 'tarif Deleted Successfully.');
        }
    }
}
