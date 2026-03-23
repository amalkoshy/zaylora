<?php

namespace App\Livewire\Admin;

use App\Models\GalleryPhoto;
use Livewire\Component;
use Livewire\WithFileUploads;

class GalleryUpload extends Component
{
    use WithFileUploads;

    public ?int $photoId = null;
    public string $caption = '';
    public int $sort_order = 0;
    public $image = null;
    public ?string $existingImage = null;

    public function mount($photoId = null)
    {
        if ($photoId) {
            $photo = GalleryPhoto::findOrFail($photoId);
            $this->photoId       = $photo->id;
            $this->caption       = $photo->caption ?? '';
            $this->sort_order    = $photo->sort_order ?? 0;
            $this->existingImage = $photo->image;
        }
    }

    public function save()
    {
        $this->validate([
            'image'      => $this->photoId ? 'nullable|image|max:4096' : 'required|image|max:4096',
            'caption'    => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'caption'    => $this->caption,
            'sort_order' => $this->sort_order ?? 0,
        ];

        if ($this->image) {
            if ($this->existingImage && \Storage::disk('public')->exists($this->existingImage)) {
                \Storage::disk('public')->delete($this->existingImage);
            }
            $data['image'] = $this->image->store('gallery', 'public');
        }

        if ($this->photoId) {
            GalleryPhoto::findOrFail($this->photoId)->update($data);
            session()->flash('success', 'Photo updated successfully.');
        } else {
            GalleryPhoto::create($data);
            session()->flash('success', 'Photo added successfully.');
        }

        return redirect()->route('admin.gallery');
    }

    public function render()
    {
        return view('livewire.admin.gallery-upload');
    }
}
