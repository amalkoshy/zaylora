<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public ?int $productId = null;
    public string $name = '';
    public string $phone = '';
    public string $whatsapp = '';
    public $image = null;
    public ?string $existingImage = null;

    public function mount($productId = null)
    {
        if ($productId) {
            $product = Product::findOrFail($productId);
            $this->productId     = $product->id;
            $this->name          = $product->name;
            $this->phone         = $product->phone ?? '';
            $this->whatsapp      = $product->whatsapp ?? '';
            $this->existingImage = $product->image;
        }
    }

    public function save()
    {
        $this->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'image'    => $this->productId ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
        ]);

        $data = [
            'name'     => $this->name,
            'phone'    => $this->phone,
            'whatsapp' => $this->whatsapp,
        ];

        if ($this->image) {
            // Delete old image if editing
            if ($this->existingImage && \Storage::disk('public')->exists($this->existingImage)) {
                \Storage::disk('public')->delete($this->existingImage);
            }
            $data['image'] = $this->image->store('products', 'public');
        }

        if ($this->productId) {
            Product::findOrFail($this->productId)->update($data);
            session()->flash('success', 'Product updated successfully.');
        } else {
            Product::create($data);
            session()->flash('success', 'Product created successfully.');
        }

        return redirect()->route('admin.products');
    }

    public function render()
    {
        return view('livewire.admin.product-form');
    }
}
