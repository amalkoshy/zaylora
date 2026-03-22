<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class HomepageContent extends Component
{
    use WithFileUploads;

    // ── Why Choose Us ─────────────────────────────────────────────
    public $whyImage = null;
    public ?string $existingWhyImage = null;

    public string $whyDesc1 = '';
    public string $whyDesc2 = '';

    // Feature 1
    public $whyFeature1Image = null;
    public ?string $existingWhyFeature1Image = null;
    public string $whyFeature1Title = '';
    public string $whyFeature1Desc  = '';

    // Feature 2
    public $whyFeature2Image = null;
    public ?string $existingWhyFeature2Image = null;
    public string $whyFeature2Title = '';
    public string $whyFeature2Desc  = '';

    // Feature 3
    public $whyFeature3Image = null;
    public ?string $existingWhyFeature3Image = null;
    public string $whyFeature3Title = '';
    public string $whyFeature3Desc  = '';

    // ── Spice Processing ──────────────────────────────────────────
    public $process1Image = null;
    public ?string $existingProcess1Image = null;
    public string $process1Title = '';
    public string $process1Desc  = '';

    public $process2Image = null;
    public ?string $existingProcess2Image = null;
    public string $process2Title = '';
    public string $process2Desc  = '';

    public $process3Image = null;
    public ?string $existingProcess3Image = null;
    public string $process3Title = '';
    public string $process3Desc  = '';

    public $process4Image = null;
    public ?string $existingProcess4Image = null;
    public string $process4Title = '';
    public string $process4Desc  = '';

    public function mount(): void
    {
        $s = SiteSetting::instance();

        $this->existingWhyImage = $s->why_image;
        $this->whyDesc1 = $s->why_desc1 ?? '';
        $this->whyDesc2 = $s->why_desc2 ?? '';

        $this->existingWhyFeature1Image = $s->why_feature1_image;
        $this->whyFeature1Title = $s->why_feature1_title ?? '';
        $this->whyFeature1Desc  = $s->why_feature1_desc  ?? '';

        $this->existingWhyFeature2Image = $s->why_feature2_image;
        $this->whyFeature2Title = $s->why_feature2_title ?? '';
        $this->whyFeature2Desc  = $s->why_feature2_desc  ?? '';

        $this->existingWhyFeature3Image = $s->why_feature3_image;
        $this->whyFeature3Title = $s->why_feature3_title ?? '';
        $this->whyFeature3Desc  = $s->why_feature3_desc  ?? '';

        $this->existingProcess1Image = $s->process1_image;
        $this->process1Title = $s->process1_title ?? '';
        $this->process1Desc  = $s->process1_desc  ?? '';

        $this->existingProcess2Image = $s->process2_image;
        $this->process2Title = $s->process2_title ?? '';
        $this->process2Desc  = $s->process2_desc  ?? '';

        $this->existingProcess3Image = $s->process3_image;
        $this->process3Title = $s->process3_title ?? '';
        $this->process3Desc  = $s->process3_desc  ?? '';

        $this->existingProcess4Image = $s->process4_image;
        $this->process4Title = $s->process4_title ?? '';
        $this->process4Desc  = $s->process4_desc  ?? '';
    }

    public function save(): void
    {
        $this->validate([
            'whyImage'           => 'nullable|image|max:4096',
            'whyDesc1'           => 'nullable|string|max:2000',
            'whyDesc2'           => 'nullable|string|max:2000',
            'whyFeature1Image'   => 'nullable|image|max:4096',
            'whyFeature1Title'   => 'nullable|string|max:100',
            'whyFeature1Desc'    => 'nullable|string|max:500',
            'whyFeature2Image'   => 'nullable|image|max:4096',
            'whyFeature2Title'   => 'nullable|string|max:100',
            'whyFeature2Desc'    => 'nullable|string|max:500',
            'whyFeature3Image'   => 'nullable|image|max:4096',
            'whyFeature3Title'   => 'nullable|string|max:100',
            'whyFeature3Desc'    => 'nullable|string|max:500',
            'process1Image'      => 'nullable|image|max:4096',
            'process1Title'      => 'nullable|string|max:100',
            'process1Desc'       => 'nullable|string|max:500',
            'process2Image'      => 'nullable|image|max:4096',
            'process2Title'      => 'nullable|string|max:100',
            'process2Desc'       => 'nullable|string|max:500',
            'process3Image'      => 'nullable|image|max:4096',
            'process3Title'      => 'nullable|string|max:100',
            'process3Desc'       => 'nullable|string|max:500',
            'process4Image'      => 'nullable|image|max:4096',
            'process4Title'      => 'nullable|string|max:100',
            'process4Desc'       => 'nullable|string|max:500',
        ]);

        $settings = SiteSetting::instance();
        $data = [];

        // Helper to store an uploaded image
        $store = function ($newFile, $oldPath, string $folder) use (&$data, $settings) {
            if ($newFile) {
                if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
                return $newFile->store($folder, 'public');
            }
            return $oldPath;
        };

        $data['why_image']          = $store($this->whyImage,         $settings->why_image,          'homepage');
        $data['why_feature1_image'] = $store($this->whyFeature1Image, $settings->why_feature1_image, 'homepage');
        $data['why_feature2_image'] = $store($this->whyFeature2Image, $settings->why_feature2_image, 'homepage');
        $data['why_feature3_image'] = $store($this->whyFeature3Image, $settings->why_feature3_image, 'homepage');
        $data['process1_image']     = $store($this->process1Image,    $settings->process1_image,     'homepage');
        $data['process2_image']     = $store($this->process2Image,    $settings->process2_image,     'homepage');
        $data['process3_image']     = $store($this->process3Image,    $settings->process3_image,     'homepage');
        $data['process4_image']     = $store($this->process4Image,    $settings->process4_image,     'homepage');

        $data = array_merge($data, [
            'why_desc1'           => $this->whyDesc1,
            'why_desc2'           => $this->whyDesc2,
            'why_feature1_title'  => $this->whyFeature1Title,
            'why_feature1_desc'   => $this->whyFeature1Desc,
            'why_feature2_title'  => $this->whyFeature2Title,
            'why_feature2_desc'   => $this->whyFeature2Desc,
            'why_feature3_title'  => $this->whyFeature3Title,
            'why_feature3_desc'   => $this->whyFeature3Desc,
            'process1_title'      => $this->process1Title,
            'process1_desc'       => $this->process1Desc,
            'process2_title'      => $this->process2Title,
            'process2_desc'       => $this->process2Desc,
            'process3_title'      => $this->process3Title,
            'process3_desc'       => $this->process3Desc,
            'process4_title'      => $this->process4Title,
            'process4_desc'       => $this->process4Desc,
        ]);

        $settings->update($data);

        // Refresh existing image state
        $fresh = $settings->fresh();
        $this->existingWhyImage         = $fresh->why_image;
        $this->existingWhyFeature1Image = $fresh->why_feature1_image;
        $this->existingWhyFeature2Image = $fresh->why_feature2_image;
        $this->existingWhyFeature3Image = $fresh->why_feature3_image;
        $this->existingProcess1Image    = $fresh->process1_image;
        $this->existingProcess2Image    = $fresh->process2_image;
        $this->existingProcess3Image    = $fresh->process3_image;
        $this->existingProcess4Image    = $fresh->process4_image;

        // Clear pending uploads
        $this->whyImage = $this->whyFeature1Image = $this->whyFeature2Image = $this->whyFeature3Image = null;
        $this->process1Image = $this->process2Image = $this->process3Image = $this->process4Image = null;

        session()->flash('success', 'Homepage content saved successfully.');
    }

    public function removeImage(string $column, string $existingProp): void
    {
        $settings = SiteSetting::instance();
        $path = $settings->$column;
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        $settings->update([$column => null]);
        $this->$existingProp = null;
    }

    public function render()
    {
        return view('livewire.admin.homepage-content');
    }
}
