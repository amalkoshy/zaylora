@extends('admin.layout')

@section('page-title', isset($photoId) ? 'Edit Photo' : 'Add Photo')

@section('content')
    <livewire:admin.gallery-upload :photo-id="$photoId ?? null" />
@endsection
