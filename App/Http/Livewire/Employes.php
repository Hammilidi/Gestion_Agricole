<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use App\Models\Tarif;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Employes extends Component
{
    public $isOpen = 0;
    public $employe, $tarif, $emp_nss, $emp_nom, $emp_prn, $emp_tarif;
    public function render()
    {
        $this->employe = Employe::all();
        $this->tarif = DB::table('tarifs')->get();

        return view('livewire.employes');
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
        $this->emp_nss = '';
        $this->emp_nom = '';
        $this->emp_prn = '';
        $this->emp_tarif = '';
    }

    private function resetInputFields()
    {
        $this->emp_nss = '';
        $this->emp_nom = '';
        $this->emp_prn = '';
        $this->emp_tarif = '';
    }
    public function store()
    {
        $this->validate([
            'emp_nss' => 'required',
            'emp_nom' => 'required',
            'emp_prn' => 'required',
            'emp_tarif' => 'required'
        ]);

        Employe::updateOrCreate(['emp_nss' => $this->emp_nss, 'emp_nom' => $this->emp_nom, 'emp_prn' => $this->emp_prn, 'emp_tarif' => $this->emp_tarif]);
        session()->flash(
            'message',
            $this->emp_nss ? 'Employe Updated Successfully.' : 'Employe Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $Emp = Employe::findOrFail($id);
        $this->emp_nss = $id;
        $this->emp_nom = $Emp->emp_nom;
        $this->emp_prn = $Emp->emp_prn;
        $this->emp_tarif = $Emp->emp_tarif;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'emp_nss' => 'required',
            'emp_nom' => 'required',
            'emp_prn' => 'required',
            'emp_tarif' => 'required'
        ]);

        Employe::find($this->emp_nss)->update([
            'emp_nom' => $this->emp_nom,
            'emp_prn' => $this->emp_prn,
            'emp_tarif' => $this->emp_tarif
        ]);
    }
    public function delete($id)
    {
        if ($id) {
            Employe::find($id)->delete();
            session()->flash('message', 'Employe Deleted Successfully.');
        }
    }
}
