<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AboutSettings extends Component
{
    use WithFileUploads;

    public $aboutImage1 = null;
    public ?string $existingAboutImage1 = null;

    public $aboutImage2 = null;
    public ?string $existingAboutImage2 = null;

    public function mount()
    {
        $settings = SiteSetting::instance();
        $this->existingAboutImage1 = $settings->about_image1;
        $this->existingAboutImage2 = $settings->about_image2;
    }

    public function save()
    {
        $this->validate([
            'aboutImage1' => 'nullable|image|max:4096',
            'aboutImage2' => 'nullable|image|max:4096',
        ]);

        $settings = SiteSetting::instance();
        $data = [];

        if ($this->aboutImage1) {
            if ($settings->about_image1 && Storage::disk('public')->exists($settings->about_image1)) {
                Storage::disk('public')->delete($settings->about_image1);
            }
            $data['about_image1'] = $this->aboutImage1->store('about', 'public');
        }

        if ($this->aboutImage2) {
            if ($settings->about_image2 && Storage::disk('public')->exists($settings->about_image2)) {
                Storage::disk('public')->delete($settings->about_image2);
            }
            $data['about_image2'] = $this->aboutImage2->store('about', 'public');
        }

        if (!empty($data)) {
            $settings->update($data);
        }

        $fresh = $settings->fresh();
        $this->existingAboutImage1 = $fresh->about_image1;
        $this->existingAboutImage2 = $fresh->about_image2;
        $this->aboutImage1 = null;
        $this->aboutImage2 = null;

        session()->flash('success', 'About Us images saved successfully.');
    }

    public function removeAboutImage1()
    {
        $settings = SiteSetting::instance();
        if ($settings->about_image1 && Storage::disk('public')->exists($settings->about_image1)) {
            Storage::disk('public')->delete($settings->about_image1);
        }
        $settings->update(['about_image1' => null]);
        $this->existingAboutImage1 = null;
        $this->aboutImage1 = null;
    }

    public function removeAboutImage2()
    {
        $settings = SiteSetting::instance();
        if ($settings->about_image2 && Storage::disk('public')->exists($settings->about_image2)) {
            Storage::disk('public')->delete($settings->about_image2);
        }
        $settings->update(['about_image2' => null]);
        $this->existingAboutImage2 = null;
        $this->aboutImage2 = null;
    }

    public function render()
    {
        return view('livewire.admin.about-settings');
    }
}
