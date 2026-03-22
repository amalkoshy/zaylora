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
    public string $sliderText1 = '';

    public $sliderImage2 = null;
    public ?string $existingSliderImage2 = null;
    public string $sliderText2 = '';

    public $sliderImage3 = null;
    public ?string $existingSliderImage3 = null;
    public string $sliderText3 = '';

    public function mount()
    {
        $settings = SiteSetting::instance();
        $this->existingSliderImage1 = $settings->slider_image1;
        $this->existingSliderImage2 = $settings->slider_image2;
        $this->existingSliderImage3 = $settings->slider_image3;
        $this->sliderText1 = $settings->slider_text1 ?? '';
        $this->sliderText2 = $settings->slider_text2 ?? '';
        $this->sliderText3 = $settings->slider_text3 ?? '';
    }

    public function save()
    {
        $this->validate([
            'sliderImage1' => 'nullable|image|max:4096',
            'sliderImage2' => 'nullable|image|max:4096',
            'sliderImage3' => 'nullable|image|max:4096',
            'sliderText1'  => 'nullable|string|max:2000',
            'sliderText2'  => 'nullable|string|max:2000',
            'sliderText3'  => 'nullable|string|max:2000',
        ]);

        $settings = SiteSetting::instance();
        $data = [];

        foreach ([1, 2, 3] as $n) {
            $imageProp   = "sliderImage{$n}";
            $imageColumn = "slider_image{$n}";
            $textProp    = "sliderText{$n}";
            $textColumn  = "slider_text{$n}";

            if ($this->$imageProp) {
                if ($settings->$imageColumn && Storage::disk('public')->exists($settings->$imageColumn)) {
                    Storage::disk('public')->delete($settings->$imageColumn);
                }
                $data[$imageColumn] = $this->$imageProp->store('slider', 'public');
            }

            $data[$textColumn] = $this->$textProp;
        }

        $settings->update($data);

        $fresh = $settings->fresh();
        $this->existingSliderImage1 = $fresh->slider_image1;
        $this->existingSliderImage2 = $fresh->slider_image2;
        $this->existingSliderImage3 = $fresh->slider_image3;
        $this->sliderText1 = $fresh->slider_text1 ?? '';
        $this->sliderText2 = $fresh->slider_text2 ?? '';
        $this->sliderText3 = $fresh->slider_text3 ?? '';
        $this->sliderImage1 = null;
        $this->sliderImage2 = null;
        $this->sliderImage3 = null;

        session()->flash('success', 'Slider settings saved successfully.');
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
