<div>        
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>  
        <tbody>
            @foreach ($materials as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{ asset('storage/' . $item->image) }}" target="_blank"><i
                                class="fas fa-image text-dark"></i></a></td>
                    <td>asdf</td>
                </tr>
            @endforeach
            <div wire:loading wire:target='store'>                
                loading new data ...                
            </div>
        </tbody>
    </table>
        <!-- Modal -->
        <div class="modal fade" id="createBahanBaku" tabindex="-1" aria-labelledby="createBahanBakuLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createBahanBakuLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" wire:submit.prevent='store'>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Nama Bahan Baku</label>
                            <input wire:model='name' type="text" class="form-control" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="image">Gambar</label>
                            <input wire:model='image' type="file" name="image" class="form-control">
                        </div> 
                        <p>Photo Preview:</p>                                                
                        <div wire:loading wire:target='image'>                            
                            <img src="{{ asset('gif/loading.gif') }}" alt="" width="100px" class="">                                                                                                    
                        </div>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid">                            
                        @endif                       
                    </div>                                                                              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark" data-bs-dismiss="modal">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>          
</div>
