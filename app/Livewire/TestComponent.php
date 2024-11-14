<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Students;  // Import User model

class TestComponent extends Component
{
    public $searchName = ''; // To bind the input field
    public $students = [];

    public function updatedSearchName()
    {
        dd('updatedSearchName called with searchName:', $this->searchName);
        // Fire a custom Livewire event to log the searchName on the client side

        // Your existing query logic
        $this->students = Students::where('first_name', 'like', '%' . $this->searchName . '%')->get();
        // dd(count($this->students));
    }
    
    public function render()
    {
        return view('livewire.test-component');
    }
}
