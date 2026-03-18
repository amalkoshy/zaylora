@extends('admin.layout')

@section('page-title', isset($productId) ? 'Edit Product' : 'Add Product')

@section('content')
    <livewire:admin.product-form :product-id="$productId ?? null" />
@endsection
