<?php

namespace App\Livewire\Admin;

use App\Models\GalleryPhoto;
use Livewire\Component;

class GalleryList extends Component
{
    public $confirmingDelete = null;

    public function deletePhoto($id)
    {
        $photo = GalleryPhoto::findOrFail($id);

        if ($photo->image && \Storage::disk('public')->exists($photo->image)) {
            \Storage::disk('public')->delete($photo->image);
        }

        $photo->delete();
        session()->flash('success', 'Photo deleted successfully.');
        $this->confirmingDelete = null;
    }

    public function render()
    {
        return view('livewire.admin.gallery-list', [
            'photos' => GalleryPhoto::orderBy('sort_order')->orderBy('id')->get(),
        ]);
    }
}
