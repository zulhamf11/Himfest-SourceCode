<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Team;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $sortBy = 'id';

    public $sortDirection = 'asc';
    public $search = '';
    public $selectedCategory = null;
    public $selectedStatus = null;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $team = Team::query()
        ->when($this->selectedCategory, function($query) {
            $query->where('category', $this->selectedCategory);
        })
        ->when($this->selectedStatus, function($query) {
            $query->where('payment_status', $this->selectedStatus);
        })
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(10);

        return view('livewire.datatable',['team'=>$team]);
    }

    public function sortBy($field)
    {
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
