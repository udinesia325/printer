@extends("template.index")
@section("content")

<form class="row mx-1">
    <div class="form-group col-4">
        <input class="form-control" name="bulan" type="number" placeholder="bulan" />
    </div>
    <div class="form-group col-4">
        <input class="form-control" name="tahun" type="number" placeholder="tahun" />
    </div>
    <input type="submit" value="terapkan" class="btn btn-sm btn-primary col-4" />
</form>

@if(count($printers) > 0 )
<form method="POST" action="{{ route('rekapan.excel') }}" class="m-2">
    @csrf
    <input name="bulan" type="hidden" value="{{ request()->query('bulan')}}" />
    <input name="tahun" type="hidden" value="{{ request()->query('tahun')}}" />
    <input type="submit" value="Export Excel" class="btn btn-sm btn-success">
</form>
<?php
$total = 0;
?>
@endif
<div class="table-responsive">
    <table id="table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Biaya</th>
                <th>Admin</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($printers as $printer)
            <?php $total += $printer->biaya; ?>
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $printer->nama}}</td>
                <td>{{ $printer->kelas}}</td>
                <td>Rp. {{ number_format($printer->biaya,2)}}</td>
                <td>{{ $printer->user->username}}</td>
                <td>{{ $printer->created_at}}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<h4>Total : Rp. {{ number_format($total,2)}}</h4>
@endSection()
@once
@push("script")
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"
            }
        });

    });
</script>
@endpush
@endonce
