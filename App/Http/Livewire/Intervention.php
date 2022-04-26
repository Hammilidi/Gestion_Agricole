<?php

namespace App\Http\Livewire;

use App\Models\Intervention as ModelsIntervention;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Intervention extends Component
{
    public $isOpen = 0;
    public $intervention, $emp, $parc, $int_debut, $int_emp_nss, $int_par_id, $int_nb_jrs;
    public function render()
    {
        $this->intervention = ModelsIntervention::all();
        $this->emp = DB::table('employes')->get();
        $this->parc = DB::table('parcelles')->get();
        return view('livewire.intervention');
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
        $this->int_debut = '';
        $this->int_emp_nss = '';
        $this->int_par_id = '';
        $this->int_nb_jrs = '';
    }

    private function resetInputFields()
    {
        $this->int_debut = '';
        $this->int_emp_nss = '';
        $this->int_par_id = '';
        $this->int_nb_jrs = '';
    }

    public function store()
    {
        $this->validate([
            'int_debut' => 'required',
            'int_emp_nss' => 'required',
            'int_par_id' => 'required',
            'int_nb_jrs' => 'required'
        ]);

        ModelsIntervention::updateOrCreate(['int_debut' => $this->int_debut, 'int_emp_nss' => $this->int_emp_nss, 'int_par_id' => $this->int_par_id, 'int_nb_jrs' => $this->int_nb_jrs]);
        session()->flash(
            'message',
            $this->int_debut ? 'Agr Updated Successfully.' : 'Agr Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Inter = ModelsIntervention::findOrFail($id);
        $this->int_debut = $id;
        $this->int_par_id = $Inter->int_par_id;
        $this->int_emp_nss = $Inter->int_emp_nss;
        $this->int_nb_jrs = $Inter->int_nb_jrs;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'int_debut' => 'required',
            'int_emp_nss' => 'required',
            'int_par_id' => 'required',
            'int_nb_jrs' => 'required'
        ]);

        ModelsIntervention::find($this->int_debut)->update([
            'int_emp_nss' => $this->int_emp_nss,
            'int_par_id' => $this->int_par_id,
            'int_nb_jrs' => $this->int_nb_jrs
        ]);
    }
    public function delete($id)
    {
        if ($id) {
            ModelsIntervention::find($id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
