@extends('admin.layouts.app')
@section('content')
<div class="">  
    <h3 class="wf-bold">Dashboard</h3>    
</div>
<div class="row">
    <div class="col-6 p-3">
        <div class="shadow p-3">
            <h5>Jadwal Pembelian Bahan Baku</h5>
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama Bahan Baku</th>
                    <th>Tanggal Pembelian</th>
                    <th>Jam</th>
                    <th>Kuantitas</th>                
                </thead>
                <tbody>
                    @foreach ($schedules as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>                        
                            <td>{{ $item->eoq->material->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->order_date)) }}</td>
                            <td>{{ date('H:i', strtotime($item->order_date)) }}</td>
                            <td>{{ $item->eoq->eoq }} Kg</td>
                        </tr>
                    @endforeach                
                </tbody>
            </table>
        </div>
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