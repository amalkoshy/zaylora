<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $confirmingDelete = null;

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        session()->flash('success', 'Product deleted successfully.');
        $this->confirmingDelete = null;
    }

    public function render()
    {
        return view('livewire.admin.product-list', [
            'products' => Product::latest()->get(),
        ]);
    }
}
