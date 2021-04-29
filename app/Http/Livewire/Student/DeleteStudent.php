<?php

namespace App\Http\Livewire\Student;

use App\Models\User;
use App\Models\Student;
use Livewire\Component;

class DeleteStudent extends Component
{
    public $confirmingUserDeletion = false;

    public $user;

    public function mount(Student $student)
    {
        $this->user = User::where('id', $student->user_id)->first();
    }

    public function confirmUserDeletion()
    {
        $this->resetErrorBag();

        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    public function deleteUser()
    {
        $this->resetErrorBag();

        $this->user->delete();

        session()->flash('flash.banner', 'Yayy, Data pendaftarnya sudah berhasil dihapus!');

        return redirect(route('pendaftaran'));
    }

    public function render()
    {
        return view('livewire.student.delete-student');
    }
}
