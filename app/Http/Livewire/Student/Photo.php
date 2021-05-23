<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Photo extends Component
{
    use WithFileUploads;

    public $photo;

    public $student;

    protected $rules = [
        'photo' => 'required|image|max:1024', // 1MB Max
    ];

    protected $listeners = [
        'saved' => '$refresh',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $user = User::find($this->student->user_id);

        $user->photo = $this->photo
            ->storeAs(
                'photo',
                $this->student->user->username . '.' . $this->photo->extension(),
                'public'
            );
        $user->save();
        
        $this->emit('saved');
        $this->reset('photo');
    }

    public function render()
    {
        return view('livewire.student.photo');
    }
}
