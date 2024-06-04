@include('layouts.header')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title mt-3 mb-3">Cicilan</h1>
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-3">Cicilan</h4>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Angsuran Perbulan</th>
                            <th>Sisa Bulan Angsuran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cicilan as $index => $c)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">{{$c->peminjaman->user->nama}}
                                </td>
                                <td class="text-center">{{ $c->tanggal_jatuhtempo }}</td>
                                <td class="text-center">{{ $c->tanggal_pembayaran ?? '-' }}</td>
                                <td>{{ 'Rp ' . number_format($c->jumlah_angsuran) }}</td>
                                <td>{{ $c->sisa_bulan . ' Bulan' }}</td>
                                <td>{{ $c->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>

