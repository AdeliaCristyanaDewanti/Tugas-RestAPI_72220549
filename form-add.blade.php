@extends('layouts.main')
@section('id', 'Form Add Kelontong')
@section('kategori')
    <div class="card-header"></div>
    <div class="card-body">
        {{-- Form Add Kelontong disini : memasukkan data ke database --}}
        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="0">Pilih Kategori</option>
                    <option value="Sembako">Sembako</option>
                    <option value="Alat Tulis">Alat Tulis</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                    <option value="Sabun Cuci">Sabun Cuci</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="produk" class="form-control" required>
            </div>


            <div class="form-group">
                <label> Nama Pelanggan</label>
                <input type="text" name="pelanggan" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Foto Pesanan</label>
                <input type="file" name="pesanan" class="form-control-file" accept="image/*">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
