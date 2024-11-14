@extends('layouts.layout')

@section('content')
    <h2>Detail Barang</h2>

    <div class="mb-3">
        <label class="form-label">Nama Barang</label>
        <p class="form-control">{{ $barang->nama }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <p class="form-control">{{ $barang->deskripsi }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <p class="form-control">{{ $barang->jumlah }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga</label>
        <p class="form-control">Rp{{ number_format($barang->harga, 2, ',', '.') }}</p>
    </div>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
