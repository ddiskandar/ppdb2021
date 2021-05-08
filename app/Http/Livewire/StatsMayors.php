<?php

namespace App\Http\Livewire;

use App\Models\Ppdb;
use Livewire\Component;

class StatsMayors extends Component
{
    protected $listeners = [
        'saved' => '$refresh',
    ];
    
    public function render()
    {
        $ppdb = Ppdb::select('pilihan_lulus')->get();
        return view('livewire.stats-mayors', [
            'mm' => $ppdb->where('pilihan_lulus', 1)->count(),
            'bdp' => $ppdb->where('pilihan_lulus', 2)->count(),
            'aphp' => $ppdb->where('pilihan_lulus', 3)->count(),
        ]);
    }
}
