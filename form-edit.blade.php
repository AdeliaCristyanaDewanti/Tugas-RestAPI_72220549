@extends('layouts.main')
@section('id', 'Form Add Kelontong')
@section('kategori')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <!-- FORM ADD KELONTONG 549 DISINI -->
            <form action="/update/{{ $kl->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="from-group">
                    <label>Nama Produk</label>
                    <input typ="text" name="produk" class="form-control" value="{{ $kl -> produk }}" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="0">Pilih Kategori</option>
                <option value="Sembako" {{ ($kl->genre == "Sembako") ? "selected":"" }}>Sembako</option>
                <option value="Alat Tulis" {{ ($kl->genre == "Alat Tulis") ? "selected":"" }}>Alat Tulis</option>
                <option value="Makanan Ringan" {{ ($kl->genre == "Makanan Ringan") ? "selected":"" }}>Makanan Ringan</option>
                <option value="Sabun Cuci" {{ ($kl->genre == "Sabun Cuci") ? "selected":"" }}>Sabun Cuci</option>
        </select>
        </div>
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="pelanggan" class="form-control" value="{{ $kl -> pelanggan }}" required>
        </div>
        <div class="form-group">
            <label>Foto Pesanan</label>
            <input type="file" name="pesanan" class="form-control-file" accept="image/*">
        </div>
        <div class="form-group">
            <img src="{{ asset('/storage/' .$kl->pesanan) }}" alt="{{ $kl->pesanan }}" height="80" width="80">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
        </form>
        </div>
@endsection