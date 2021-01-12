<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    protected $rules = [
        'photo' => 'required|image|max:1024'
    ];

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate();

        $user = auth()->user();
        $fileName = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();

        if($path = $this->photo->storeAs('users', $fileName)) {
            $user->update([
                'profile_photo_path' => $path
            ]);
        }

        return redirect()->route('tweets.index');
    }
}
