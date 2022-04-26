<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agriculteur;
use App\Models\Intervention;
use App\Models\Parcelle;

class Data extends Component
{
    public $search, $n, $m, $from, $to;

    protected $queryString = ['search', 'from', 'to'];
    public $qst_select;
    public $qsts = ["Noms des agriculteurs", "Superficie est supérieure à une valeur", "Parcelles situées à un lieu dont la
    superficie est supérieure est entre 2 valeur", "Parcelles avec le nom de leurs propriétaires", "Interventions effectuées dans une date", "Chaque intervention et le nom de la parcelle concernée", "Chaque intervention le nom de la parcelle concernée et le nom de
    l'employé.", "Interventions d'un employe", "la superficie totale des parcelles", "le nom de la plus grande parcelle", "le nom de la plus petite parcelle"];
    public $question1;
    public $question2;
    public $question3;
    public $question4;
    public $question5;
    public $question6;
    public $question7;
    public $question8;
    public $question9;
    public $question10;
    public $question11;

    public function render()
    {
        $this->question1 = Agriculteur::all("agr_nom")->sortBy("agr_nom");
        $this->question2 = Parcelle::where("par_superficie", ">", "" . $this->search . "")->get();
        $this->question3 = Parcelle::where("emp_lieu", "" . $this->search . "", "and")->whereBetween("par_superficie", [$this->from, $this->to])->get();
        $this->question4 = Parcelle::join('agriculteurs', 'parcelles.par_prop', '=', 'par_id')->get(['parcelles.*', 'agriculteurs.agr_nom']);

        $this->question5 = Intervention::whereBetween("int_debut", [$this->from, $this->to])->get();
        $this->question6 = Intervention::join('parcelles', 'interventions.int_par_id', '=', 'parcelles.par_id')->get(['parcelles.par_nom', 'interventions.*']);
        $this->question7 = Intervention::join('employes', 'interventions.int_emp_nss', '=', 'employes.emp_nss')
            ->join('parcelles', 'interventions.int_par_id', '=', 'parcelles.par_id')
            ->get(['employes.emp_nom', 'parcelles.par_nom', 'interventions.*']);
        $this->question8 = Intervention::join('employes', 'interventions.int_emp_nss', '=', 'employes.emp_nss')
            ->select('employes.emp_nom', 'interventions.*')
            ->where('employes.emp_nom', "" . $this->search . "")
            ->get();

        $this->question9 = Parcelle::sum('par_superficie');
        $this->question10 =  Parcelle::select('par_nom')->orderBy('par_superficie', 'asc')->first();
        $this->question11 = Parcelle::select('par_nom')->orderBy('par_superficie', 'desc')->first();
        return view('livewire.data');
    }
}
