@extends('admin.layouts.app')

@section('title', 'Edit Hospital')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/hospitals.css') }}">
@endpush

@section('content')
<header class="admin-header">
    <div>
        <h1 class="header-title">Edit Hospital</h1>
        <p class="header-subtitle">Update hospital information and settings</p>
    </div>
</header>

<div class="form-wrapper">
    <form method="POST" action="{{ route('admin.hospitals.update', $hospital) }}">
        @csrf
        @method('PATCH')
        @include('admin.hospitals._form')
    </form>
</div>
@endsection
