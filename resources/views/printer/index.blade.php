@extends("template.index")
@once
@push("style")
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
@endonce
@section("content")

<h1 class="text-center my-4"> Data Printer Kabasa</h1>
<!-- Modal -->
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Data Baru</h1>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('printer.create')}}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Siswa" name="nama" value="{{@old('nama')}}">
                        <div class="invalid-feedback">@error('nama'){{$message}}@enderror</div>
                    </div>
                    <select class="form-select mb-3" name="kelas">
                        <!--Kelas Sepuluh-->
                        @foreach($kelas as $k)
                        <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas}}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                        <input type="number" class="form-control  @error('biaya') is-invalid @enderror " placeholder="Biaya" name="biaya" value="{{@old('biaya')}}">
                        <div class="invalid-feedback">@error('biaya'){{$message}}@enderror</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" value="{{@old('deskripsi')}}">
                        <div class="invalid-feedback">@error('deskripsi'){{$message}}@enderror</div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-success" value="Tambahkan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#createmodal">
    Tambah Data Baru
</button>
<!-- Modal Delete-->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3> Apakah Anda Yakin Ingin Menghapus</h3>
                <form action="/" method="POST" class="form-delete d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-success">Ya</button>
                </form>
                <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Alert -->
@if(session("sukses"))
<div class="alert alert-success alert-dismissible">
    <div class="btn-close" data-bs-dismiss="alert"></div>
    {{ session("sukses")}}
</div>
@endif
<div class="table-responsive">
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Biaya</th>
                <th>Deskripsi</th>
                <th>Admin</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($printers as $printer)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $printer->nama}}</td>
                <td>{{ $printer->kelas}}</td>
                <td>Rp. {{ number_format($printer->biaya,2)}}</td>
                <td>{{ $printer->deskripsi}}</td>
                <td>{{ $printer->user->username}}</td>
                <td>{{ $printer->created_at}} <br />
                    <small class="text-dark">{{ $printer->created_at->diffForHumans()}}</small>
                </td>
                <td>
@can("edit_delete",$printer)
                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $printer->id}}">hapus</button>
<a href="/edit/{{$printer->id}}" class="btn btn-sm btn-warning">Edit</a>
@else
    -
@endcan
                </td>
            </tr>


            @endforeach
        </tbody>
    </table>
</div>
@endSection()
@once
@push("script")
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    const deleteModal = new bootstrap.Modal('#deletemodal', {
        keyboard: false
    })
    const createModal = new bootstrap.Modal('#createmodal', {
        keyboard: false
    })
    $(document).ready(function() {
        $('#table').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"
            }
        });
        @if($errors->any())
        createModal.show()
        @endif
    });
    $(".btn-delete").click((e) => {
        const id = $(e.target).data("id")
        $(".form-delete").attr("action", "/" + id)
        deleteModal.show()
    })
</script>
@endpush
@endonce
