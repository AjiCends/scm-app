<div>
    <!-- Modal -->
    <div class="modal fade" id="hapusBahanBaku{{ $bahanBaku->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Bahan Baku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin menghapus {{ $bahanBaku->name }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
