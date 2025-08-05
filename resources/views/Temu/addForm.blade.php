@extends('app')
@section('content')
<div class="d-flex justify-content-center">
  <div class="card" style="width: 40%">
    <div class="card-header">
      Form Tambah Bertemu
    </div>
    <div class="card-body">
      <div class="form-group">
        <form action="{{route('temu.store')}}" method="post">
          @csrf
          <label for="temu">Bertemu</label>
          <input type="text" class="form-control @error('temu_type') is-invalid @enderror" name="temu_type"
            id="temu_type" aria-describedby="nama" placeholder="Silahkan isi tujuan bertemu siapa...">
          @error('temu_type')
          <small class="text-danger">Data Temu masih kosong, silahkan diisi!</small>
          @enderror
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      </form>
      <br><br>
      <div class="button-right">
        <a href="{{ route('temu.index')}}" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
