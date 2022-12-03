@extends("template.index")

@section("content")
<form class="mt-5" method="POST" action="{{ route('printer.update', [ 'printer' => $printer])}}">
    <h3 class="text-center">Edit Data</h3>
    <div class="mb-3">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Siswa" name="nama" value="{{@old('nama') ? @old('nama') :  $printer->nama  }}">
            <div class="invalid-feedback">@error('nama'){{$message}}@enderror</div>
        </div>
        <select class="form-select mb-3" name="kelas">
            @foreach($kelas as $k)
            <option value="{{ $k->nama_kelas }}" @if($printer->kelas == $k->nama_kelas) selected @endif>{{ $k->nama_kelas}}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <input type="number" class="form-control  @error('biaya') is-invalid @enderror " placeholder="Biaya" name="biaya" value="{{@old('biaya') ? @old('biaya') : $printer->biaya }}">
            <div class="invalid-feedback">@error('biaya'){{$message}}@enderror</div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" value="{{@old('deskripsi') ? @old('deskripsi') : $printer->deskripsi }}">
            <div class="invalid-feedback">@error('deskripsi'){{$message}}@enderror</div>
        </div>
        <div class="mb-3">
            <input type="submit" class="form-control btn btn-success" value="Perbarui">
        </div>
</form>
</form>
@endsection
