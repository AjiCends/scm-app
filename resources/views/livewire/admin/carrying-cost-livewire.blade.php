<div>
    <div class="shadow mt-3 p-3">
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Biaya</th> 
                <th scope="col">Aksi</th> 

              </tr>
            </thead>
            <tbody>
                @foreach ($carrying_costs as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->cost }}</td>
                        <td class="d-flex">
                            <button class="btn btn-dark" wire:click="displayDeleteDialog('{{$item->name}}','{{$item->id}}')">-</button>
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
                    <p>Apakah anda yakin untuk menghapus <span class="fw-bold">{{ $deletedName }}</span> ?</p>            
                </div>
                <div class="d-flex justify-content-end align-items-center bcarrying-top pt-3">
                    <button class="btn btn-secondary mx-2" wire:click='closeDeleteDialog'>Batal</button>
                    <button class="btn btn-dark mx-2" wire:click='deleteCarryingCost'>Ya</button>
                </div>
            </div>        
        @endif        
    </div>
</div>
