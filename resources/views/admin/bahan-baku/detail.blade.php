@extends('admin.layouts.app')
@push('styles')
    <link rel="stylesheet" href="/tamplate/admin/css/order-detail.css" type="text/css">
@endpush
@section('content')
<div class="">    
    <div class="row mb-4">
        <div class="col-12 col-lg-6">
            <h3 class="fw-bold mb-2">Detail Bahan Baku</h3>
            <h5 class="fw-bold">Nama Bahan Baku : {{ $material->name }}</h5>
        </div>    
    </div>

    @livewire('admin.eoq-livewire', [$material])

        
</div>
@endsection