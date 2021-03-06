@extends('admin.layouts.app')
@push('styles')
    <link rel="stylesheet" href="/tamplate/admin/css/bahan-baku.css">
@endpush
@section('content')
<div class="">    
    <div class="row mb-4">
        <div class="col-12 col-lg-6">
            <h3 class="fw-bold mb-3">Daftar Bahan Baku</h3>
        </div>
        <div class="col-12 col-lg-6 d-flex">
            <div class="ms-lg-auto">
                @can('create material',)
                    <button class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#createBahanBaku">
                        Tambah
                    </button>                    
                @endcan
            </div>
        </div>
    </div>    

    <div>
        @livewire('admin.bahan-baku-livewire')      
    </div>
    <div>
        @can('create material')
            @livewire('admin.create-bahan-baku-livewire')                  
        @endcan
    </div>    
</div>
@endsection