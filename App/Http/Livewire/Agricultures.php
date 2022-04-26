<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agriculteur;

class Agricultures extends Component
{
    public $isOpen = 0;
    public $agriculteur, $agr_id, $agr_nom, $agr_prn, $agr_resid;
    public function render()
    {
        $this->agriculteur = Agriculteur::all();
        return view('livewire.agricultures');
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
        $this->agr_nom = '';
        $this->agr_prn = '';
        $this->agr_resid = '';
    }

    private function resetInputFields()
    {
        $this->agr_nom = '';
        $this->agr_prn = '';
        $this->agr_resid = '';
    }

    public function store()
    {
        $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required'
        ]);

        Agriculteur::updateOrCreate(['agr_nom' => $this->agr_nom, 'agr_prn' => $this->agr_prn, 'agr_resid' => $this->agr_resid]);
        session()->flash(
            'message',
            $this->agr_id ? 'Agr Updated Successfully.' : 'Agr Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Agri = Agriculteur::findOrFail($id);
        $this->agr_id = $id;
        $this->agr_prn = $Agri->agr_prn;
        $this->agr_nom = $Agri->agr_nom;
        $this->agr_resid = $Agri->agr_resid;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required'
        ]);

        Agriculteur::find($this->agr_id)->update([
            'agr_nom' => $this->agr_nom,
            'agr_prn' => $this->agr_prn,
            'agr_resid' => $this->agr_resid
        ]);
    }
    public function delete($id)
    {
        if ($id) {
            Agriculteur::find($id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
