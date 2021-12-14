@extends('admin.layouts.app')
@section('content')
<div class="">  
    <h3 class="wf-bold">Dashboard</h3>    
</div>
<div class="row">
    <div class="col-6 p-3">
        @livewire('admin.schedule-livewire')
    </div>
    <div class="col-6 p-3">
        <div class="shadow p-3">
            <h5>Daftar Bahan Baku</h5>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama Bahan Baku</th>             
                </thead>
                <tbody>
                    @foreach ($materials as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>                        
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach                
                </tbody>
            </table>
        </div>
    </div>        
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#jadwal').DataTable();
        } )
    </script>
@endpush