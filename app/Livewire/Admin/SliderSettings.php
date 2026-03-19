<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SliderSettings extends Component
{
    use WithFileUploads;

    public $sliderImage1 = null;
    public ?string $existingSliderImage1 = null;

    public $sliderImage2 = null;
    public ?string $existingSliderImage2 = null;

    public $sliderImage3 = null;
    public ?string $existingSliderImage3 = null;

    public function mount()
    {
        $settings = SiteSetting::instance();
        $this->existingSliderImage1 = $settings->slider_image1;
        $this->existingSliderImage2 = $settings->slider_image2;
        $this->existingSliderImage3 = $settings->slider_image3;
    }

    public function save()
    {
        $this->validate([
            'sliderImage1' => 'nullable|image|max:4096',
            'sliderImage2' => 'nullable|image|max:4096',
            'sliderImage3' => 'nullable|image|max:4096',
        ]);

        $settings = SiteSetting::instance();
        $data = [];

        foreach ([1, 2, 3] as $n) {
            $prop    = "sliderImage{$n}";
            $column  = "slider_image{$n}";
            if ($this->$prop) {
                if ($settings->$column && Storage::disk('public')->exists($settings->$column)) {
                    Storage::disk('public')->delete($settings->$column);
                }
                $data[$column] = $this->$prop->store('slider', 'public');
            }
        }

        if (!empty($data)) {
            $settings->update($data);
        }

        $fresh = $settings->fresh();
        $this->existingSliderImage1 = $fresh->slider_image1;
        $this->existingSliderImage2 = $fresh->slider_image2;
        $this->existingSliderImage3 = $fresh->slider_image3;
        $this->sliderImage1 = null;
        $this->sliderImage2 = null;
        $this->sliderImage3 = null;

        session()->flash('success', 'Slider images saved successfully.');
    }

    public function removeSliderImage(int $n)
    {
        $column = "slider_image{$n}";
        $prop   = "existingSliderImage{$n}";

        $settings = SiteSetting::instance();
        if ($settings->$column && Storage::disk('public')->exists($settings->$column)) {
            Storage::disk('public')->delete($settings->$column);
        }
        $settings->update([$column => null]);
        $this->$prop = null;
    }

    public function render()
    {
        return view('livewire.admin.slider-settings');
    }
}
