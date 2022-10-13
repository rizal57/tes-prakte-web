@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('pembelian.store') }}" method="post">
            @csrf
            <label for="barang">Barang</label>
            <select class="form-select" aria-label="Default select example" id="barang" name="inventory_id">
                @foreach ($barang as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Item</label>
                <input type="number" class="form-control @error('jumlah')
                    is-invalid
                @enderror" id="jumlah" placeholder="jumlah" name="jumlah">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
