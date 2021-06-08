<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use App\Models\Team;
use Livewire\WithPagination;

class Membertable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $sortBy = 'id';

    public $sortDirection = 'asc';
    public $search = '';
    public $selectedCategory = null;
    public $selectedStatus = null;

    public function render()
    {
        $member = Member::query()
        ->when($this->selectedStatus, function($query) {
            $query->where('verified', $this->selectedStatus);
        })
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate(10);
        
        $team = Team::query()
        ->when($this->selectedCategory, function($query) {
            $query->where('category', $this->selectedCategory);
        });

        return view('livewire.membertable',['member'=>$member,'team'=>$team]);
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

    public function updatingselectedCategory()
    {
        $this->resetPage();
    }
}
