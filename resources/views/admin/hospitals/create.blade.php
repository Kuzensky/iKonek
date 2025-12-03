@extends('admin.layouts.app')

@section('title', 'Add Hospital')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/hospitals.css') }}">
@endpush

@section('content')
<header class="admin-header">
    <div>
        <h1 class="header-title">Add Hospital</h1>
        <p class="header-subtitle">Register a new hospital or blood donation center</p>
    </div>
</header>

<div class="form-wrapper">
    <form method="POST" action="{{ route('admin.hospitals.store') }}">
        @csrf
        @include('admin.hospitals._form')
    </form>
</div>
@endsection
