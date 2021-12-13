<div>
    <table class="table" id="daftarBahanBaku">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                {{-- <th scope="col">Password</th> --}}
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody wire:ignore.self>            
            @foreach ($users as $item)                               
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>{{ Crypt::decryptString($item->password) }}</td> --}}
                    <td>
                        {{-- <button class="btn btn-dark mx-2">
                            <a class="text-decoration-none text-white" href="{{ route('pengguna.show',$item->id) }}"><i class="fas fa-eye"></i> Detail</a>
                        </button> --}}
                        @can('edit employee')
                            <button class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#modalUserEdit{{ $item->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>                             
                        @endcan
                        @can('delete employee')
                            <button class="btn btn-danger mx-2" wire:click="displayDeleteDialog('{{$item->name}}','{{$item->id}}')">
                            <i class="fas fa-trash"></i> Hapus
                            </button>                                                       
                        @endcan
                    </td>
                </tr>                    
                <div>
                    @livewire('admin.edit-user-livewire', [$item], key($item->id))                             
                </div>                                                                                                                        
            @endforeach            
            <div wire:loading wire:target='store'>
                loading new data ...
            </div>
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
            <div class="d-flex justify-content-end align-items-center border-top pt-3">
                <button class="btn btn-secondary mx-2" wire:click='closeDeleteDialog'>Batal</button>
                <button class="btn btn-dark mx-2" wire:click='deleteBahanBaku'>Ya</button>
            </div>
        </div>        
    @endif
        
</div>
