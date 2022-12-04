<h4>Rekapan data bulanan printer</h4>
<p><b>Bulan : {{ $bulan }}</b></p>
<p><b>Tahun : {{ $tahun }}</b></p>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Biaya</th>
            <th>Deskripsi</th>
            <th>Admin</th>
            <th>Tanggal</th>
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
            <td>{{ $printer->created_at}}</td>
        </tr>


        @endforeach
        <tr>
            <td colspan="5"></td>
            <td colspan="2">Total : Rp. {{ number_format($printer->biaya,2)}}</td>
        </tr>
    </tbody>
</table>
