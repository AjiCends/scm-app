<div>
    <div class="modal fade" id="createOrderCost" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Order Cost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='store'>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="">Nama Biaya Pemesanan</label>
                            <input wire:model='name' type="text" class="form-control">
                        </div>
                        <form action="">
                            <div class="mb-3">
                                <label for="">Biaya</label>
                                <input wire:model='cost' type="number" class="form-control">
                            </div>
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
