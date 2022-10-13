@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('inventory.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $inventory->nama }}</td>
                    <td>{{ $inventory->harga }}</td>
                    <td>{{ $inventory->stok }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
