<div>
    <table class="table" id="jadwal">
        <thead>
            <th>No</th>
            <th>Nama Bahan Baku</th>
            <th>Tanggal Pembelian</th>
            <th>Jam</th>
            <th>Kuantitas</th>
            <th></th>                
        </thead>
        <tbody>
            @foreach ($schedules as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>                        
                    <td>{{ $item->eoq->material->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->order_date)) }}</td>
                    <td>{{ date('H:i', strtotime($item->order_date)) }}</td>
                    <td>{{ $item->eoq->eoq }} Kg</td>
                    <td>
                        @can('delete schedule')
                            <button class="btn btn-danger mx-2" wire:click="displayDeleteDialog('{{$item->eoq->material->name.' tanggal '.date('d-m-Y', strtotime($item->order_date))}}','{{$item->id}}')">
                                <i class="fas fa-trash"></i>
                            </button>                                                       
                        @endcan
                    </td>
                </tr>
            @endforeach                
        </tbody>
    </table>

    @if ($closeDelete == 1)
        <div class="position-fixed top-50 start-50 translate-middle bg-white shadow p-3" style="width:400px; height:fit-content;">
            <div class="text-center fw-bold">
                <p>Peringatan !</p>
            </div>
            <div class="text-center align-center">
                <p>Apakah anda yakin untuk menghapus jadwal pembelian <span class="fw-bold">{{ $deletedName }}</span> ?</p>            
            </div>
            <div class="d-flex justify-content-end align-items-center border-top pt-3">
                <button class="btn btn-secondary mx-2" wire:click='closeDeleteDialog'>Batal</button>
                <button class="btn btn-dark mx-2" wire:click='deleteBahanBaku'>Ya</button>
            </div>
        </div>        
    @endif
</div>
