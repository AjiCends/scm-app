<div>
    <div class="modal fade" id="createBahanBaku" tabindex="-1" aria-labelledby="createBahanBakuLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">                              
                    <div class="modal-header">
                        <h5 class="modal-title" id="createBahanBakuLabel">Tambah Bahan Baku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>                                                                        
                <form wire:submit.prevent='store'>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Nama Bahan Baku</label>
                            <input wire:model.lazy='name' type="text" class="form-control" name="name">
                        </div>

                        {{-- <div class="mb-3">
                            <label for="image">Gambar</label>
                            <input wire:model.lazy='image' type="file" name="image" class="form-control">
                        </div>
                        <p>Photo Preview:</p>
                        <div wire:loading wire:target='image'>
                            <img src="{{ asset('gif/loading.gif') }}" alt="" width="100px" class="">
                        </div>
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                        @endif --}}
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
