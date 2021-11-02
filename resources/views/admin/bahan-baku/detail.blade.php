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
    
    <div class="">        
        <div class="row">
            <div class="col-6 p-3">
                <div class="d-flex shadow p-3">
                    <p class="fw-bold">Biaya Pemesanan (OC)</p>
                    <button class="btn btn-dark ms-auto" data-bs-toggle="modal" data-bs-target="#createOrderCost">
                        +
                    </button>
                    @livewire('admin.create-order-cost-livewire',[$material->id])
                </div>

                @livewire('admin.order-cost-livewire', [$material])
            </div>
            <div class="col-6">
                {{-- carrying cost --}}
            </div>
        </div>
    </div>
        
</div>
@endsection