<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SiteSettings extends Component
{
    use WithFileUploads;

    public $logo = null;
    public ?string $existingLogo = null;

    public $banner = null;
    public ?string $existingBanner = null;

    public function mount()
    {
        $settings = SiteSetting::instance();
        $this->existingLogo   = $settings->logo;
        $this->existingBanner = $settings->banner;
    }

    public function save()
    {
        $this->validate([
            'logo'   => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:4096',
        ]);

        $settings = SiteSetting::instance();
        $data = [];

        if ($this->logo) {
            if ($settings->logo && Storage::disk('public')->exists($settings->logo)) {
                Storage::disk('public')->delete($settings->logo);
            }
            $data['logo'] = $this->logo->store('settings', 'public');
        }

        if ($this->banner) {
            if ($settings->banner && Storage::disk('public')->exists($settings->banner)) {
                Storage::disk('public')->delete($settings->banner);
            }
            $data['banner'] = $this->banner->store('settings', 'public');
        }

        if (!empty($data)) {
            $settings->update($data);
        }

        $fresh = $settings->fresh();
        $this->existingLogo   = $fresh->logo;
        $this->existingBanner = $fresh->banner;
        $this->logo   = null;
        $this->banner = null;

        session()->flash('success', 'Site settings saved successfully.');
    }

    public function removeLogo()
    {
        $settings = SiteSetting::instance();
        if ($settings->logo && Storage::disk('public')->exists($settings->logo)) {
            Storage::disk('public')->delete($settings->logo);
        }
        $settings->update(['logo' => null]);
        $this->existingLogo = null;
        $this->logo = null;
    }

    public function removeBanner()
    {
        $settings = SiteSetting::instance();
        if ($settings->banner && Storage::disk('public')->exists($settings->banner)) {
            Storage::disk('public')->delete($settings->banner);
        }
        $settings->update(['banner' => null]);
        $this->existingBanner = null;
        $this->banner = null;
    }

    public function render()
    {
        return view('livewire.admin.site-settings');
    }
}
