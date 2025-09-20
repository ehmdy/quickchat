<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilePictureUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $user;

    protected $rules = [
        'photo' => 'required|image|max:2048', // 2MB Max
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function updatedPhoto()
    {
        $this->validate();
    }

    public function save()
    {
        $this->validate();

        // Delete old profile picture if exists
        if ($this->user->profile_picture) {
            Storage::disk('public')->delete($this->user->profile_picture);
        }

        // Store new profile picture
        $filename = 'profile-pictures/' . Str::uuid() . '.' . $this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs('profile-pictures', $filename, 'public');

        // Update user profile picture
        $this->user->update([
            'profile_picture' => $path
        ]);

        // Reset photo
        $this->photo = null;

        session()->flash('message', 'Profile picture updated successfully!');
    }

    public function remove()
    {
        if ($this->user->profile_picture) {
            Storage::disk('public')->delete($this->user->profile_picture);
            $this->user->update(['profile_picture' => null]);
            session()->flash('message', 'Profile picture removed successfully!');
        }
    }

    public function render()
    {
        return view('livewire.profile-picture-upload');
    }
}