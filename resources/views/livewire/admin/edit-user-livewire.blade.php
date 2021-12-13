<div>
    <div class="modal fade" id="{{ $modalName }}" tabindex="-1" aria-hidden="true"  wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                    
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input wire:model.lazy='name' type="text" class="form-control" value="{{ $name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email">email</label>
                        <input wire:model.lazy='email' type="text" class="form-control" value="{{ $email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password">password</label>
                        <input wire:model.lazy='password' type="password" class="form-control" value="{{ $password }}">
                    </div>
                    <div class="mb-3">
                        <label for="password">konfirmasi password</label>
                        <input wire:model.lazy='confirm_password' type="password" class="form-control" value="{{ $confirm_password }}">
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" wire:click='store'>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
