<div>
    <div class="row">
        <div class="col-12 col-md-6 p-3">
            <div class="d-flex shadow p-3">
                <p class="fw-bold">Biaya Pemesanan (OC)</p>
                <button class="btn btn-dark ms-auto" data-bs-toggle="modal" data-bs-target="#createOrderCost">
                    +
                </button>
                <div>
                    @livewire('admin.create-order-cost-livewire',[$material->id])
                </div>
            </div>
            <div>
                @livewire('admin.order-cost-livewire', [$material])
            </div>
        </div>        
        <div class="col-12 col-md-6 p-3">
            <div class="d-flex shadow p-3">
                <p class="fw-bold">Biaya Perawatan (CC)</p>
                <button class="btn btn-dark ms-auto" data-bs-toggle="modal" data-bs-target="#createCarryingCost">
                    +
                </button>
                <div>
                    @livewire('admin.create-carrying-cost-livewire',[$material->id])
                </div>
            </div>
            <div>
                @livewire('admin.carrying-cost-livewire', [$material])
            </div>
        </div>
    </div>    
    <form class="row" wire:submit.prevent="saveEoq">
        <div class="col-12 col-md-4">
            <div class="shadow p-3">
                <label for="amount" class="form-label fw-bold">Jumlah Kebutuhan</label>
                <input wire:model='amount' id="amount" type="number" step="any" class="form-control">            
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="shadow p-3">
                <label for="eoq" class="form-label fw-bold">EOQ</label>
                <input wire:model='eoq' id="eoq" type="number" class="form-control" disabled style="background: white">                            
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="shadow p-3">
                <label for="frekwensi" class="form-label fw-bold">Frekwensi Beli</label>
                <input wire:model='frekwensi' id="frekwensi" type="number" class="form-control" disabled style="background: white">                                        
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-dark shadow mt-3 w-100" wire:>Simpan Perhitungan</button>            
        </div>        
    </form>

    <div class="shadow p-3 mt-4 table-responsive">
        <p class="fw-bold">Daftar Eoq</p>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jumlah Kebutuhan</th>
                    <th scope="col">EOQ</th>
                    <th scope="col">Frekwensi Beli</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eoqList as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->material_need }}</td>
                        <td>{{ $item->eoq }}</td>
                        <td>{{ $item->frekwensi }}</td>
                        <td class="d-flex">
                            <button class="btn btn-dark mx-2">Buat Jadwal</button>
                            <button class="btn btn-dark mx-2" wire:click="deleteEoq('{{ $item->id }}')"><i class="fas fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>