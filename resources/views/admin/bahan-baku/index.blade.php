@extends('admin.layouts.app')
@section('content')
<div class="">    
    <div class="row mb-4">
        <div class="col-12 col-lg-6">
            <h3 class="fw-bold mb-3">Daftar Bahan Baku</h3>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="ms-lg-auto">
                <button class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#createBahanBaku">
                    Tambah
                </button>
            </div>
        </div>
    </div>
    @livewire('admin.bahan-baku-livewire')        
    {{-- @livewire('admin.create-bahan-baku-livewire') --}}
</div>
@endsection