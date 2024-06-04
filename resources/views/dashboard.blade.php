@include('layouts.header')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        <h1 class="app-page-title">{{ $title }}</h1>

        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Selamat datang, {{ $nama }}!</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        @if ($role == 'admin')
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Jumlah Kreditur</h4>
                            <div class="stats-figure">{{ $jumlah_kreditur }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Jumlah Peminjaman</h4>
                            <div class="stats-figure">{{ $jumlah_peminjaman }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Peminjaman Diterima</h4>
                            <div class="stats-figure">{{ $total_peminjaman_diterima }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Peminjaman Ditolak</h4>
                            <div class="stats-figure">{{ $jumlah_peminjaman_ditolak }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <h1 class="app-page-title">Peminjaman</h1>
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-3">History Peminjaman</h4>
                <table id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Tenor</th>
                            <th>Tanggal</th>
                            <th>Jaminan</th>
                            <th>Validasi</th>
                            @if ($role == 'admin')
                                <th>Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($role == 'admin')
                            @foreach ($peminjamanList as $index => $peminjaman)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $peminjaman->user->nama }}</td> <!-- Mengakses user -->
                                    <td>{{ 'Rp ' . number_format($peminjaman->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ $peminjaman->tenor . ' Bulan' }}</td>
                                    <td>{{ $peminjaman->tanggal }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalBukti-{{ $peminjaman->user->jaminan }}">Lihat
                                            Jaminan</button> <!-- Mengakses user -->
                                        <div class="modal fade" id="modalBukti-{{ $peminjaman->user->jaminan }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalPendudukLabel"
                                            aria-bs-hidden="true"> <!-- Mengakses user -->
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalPendudukLabel">Lihat Jaminan
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/' . $peminjaman->user->jaminan) }}"
                                                            class="img-fluid" /> <!-- Mengakses user -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($peminjaman->validasi === 'diterima')
                                            <span class="badge badge-success"
                                                style="background-color:#28A745">Diterima</span>
                                        @elseif ($peminjaman->validasi === 'ditolak')
                                            <span class="badge badge-danger"
                                                style="background-color:#DC3545">Ditolak</span>
                                        @else
                                            <span class="badge badge-secondary"
                                                style="background-color:#6C757D">Menunggu</span>
                                        @endif
                                    </td>
                                    @if ($role == 'admin')
                                        <td>
                                            @if ($peminjaman->validasi === 'diterima')
                                                <i class="fas fa-check-circle text-success"></i>
                                            @elseif ($peminjaman->validasi === 'ditolak')
                                                <i class="fas fa-times-circle text-danger"></i>
                                            @else
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#Modalterima-{{ $peminjaman->id_peminjaman }}">Terima</button>

                                                {{-- Modal Terima --}}
                                                <div class="modal fade"
                                                    id="Modalterima-{{ $peminjaman->id_peminjaman }}" tabindex="-1"
                                                    aria-labelledby="ModalTambah" aria-bs-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Terima peminjaman
                                                                    {{ $peminjaman->user->nama }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-bs-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menerima peminjaman dari
                                                                dari
                                                                <b> {{ $peminjaman->user->nama }}</b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <form
                                                                    action="{{ route('terima_peminjaman', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button type="submit"
                                                                        class="btn btn-success">Ya</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                |
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#Modaltolak-{{ $peminjaman->id_peminjaman }}">Tolak</button>

                                                <div class="modal fade"
                                                    id="Modaltolak-{{ $peminjaman->id_peminjaman }}" tabindex="-1"
                                                    aria-labelledby="ModalTambah" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Tolak peminjaman ruang
                                                                    {{ $peminjaman->user->nama }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-bs-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menolak peminjaman
                                                                ruangan dari
                                                                <b>{{ $peminjaman->user->nama }}</b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <form
                                                                    action="{{ route('tolak_peminjaman', ['id_peminjaman' => $peminjaman->id_peminjaman]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button type="submit"
                                                                        class="btn btn-success">Ya</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            @if ($peminjaman)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $peminjaman->user->nama }}</td>
                                    <td>{{ 'Rp ' . number_format($peminjaman->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ $peminjaman->tenor . ' Bulan' }}</td>
                                    <td>{{ $peminjaman->tanggal }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalBukti-{{ $peminjaman->user->jaminan }}">Lihat
                                            Jaminan</button>
                                        <div class="modal fade" id="modalBukti-{{ $peminjaman->user->jaminan }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modalPendudukLabel"
                                            aria-bs-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalPendudukLabel">Lihat Jaminan
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('storage/' . $peminjaman->user->jaminan) }}"
                                                            class="img-fluid" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($peminjaman->validasi === 'diterima')
                                            <span class="badge badge-success"
                                                style="background-color:#28A745">Diterima</span>
                                        @elseif ($peminjaman->validasi === 'ditolak')
                                            <span class="badge badge-danger"
                                                style="background-color:#DC3545">Ditolak</span>
                                        @else
                                            <span class="badge badge-secondary"
                                                style="background-color:#6C757D">Menunggu</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endif
                    </tbody>
                </table>
                @if ($role == 'user')
                    @php
                        $disableButton =
                            $peminjaman &&
                            ($peminjaman->validasi === 'diterima' || $peminjaman->validasi === 'menunggu persetujuan');
                    @endphp

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambah"
                            {{ $disableButton ? 'disabled' : '' }}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg> Ajukan Pinjaman
                        </button>
                    </div>
                @endif
            </div>
        </div>

        @if ($role === 'user' && $peminjaman && $peminjaman->validasi === 'diterima')
            <h1 class="app-page-title mt-3 mb-3">Cicilan</h1>
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-3">Cicilan</h4>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah Angsuran Perbulan</th>
                                <th>Sisa Bulan Angsuran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman->cicilan as $index => $c)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $c->tanggal_jatuhtempo }}</td>
                                    <td class="text-center">{{ $c->tanggal_pembayaran ?? '-' }}</td>
                                    <td>{{ 'Rp ' . number_format($c->jumlah_angsuran) }}</td>
                                    <td>{{ $c->sisa_bulan . ' Bulan' }}</td>
                                    <td>{{ $c->status }}</td>
                                    <td>
                                        @if ($c->status === 'Sudah Bayar')
                                            <i class="fas fa-check-circle text-success"></i></button>
                                        @elseif ($index == 0 && $c->status === 'Belum Bayar')
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-Bayar-{{ $c->id_cicilan }}">Bayar</button>
                                        @elseif ($index > 0 && $peminjaman->cicilan[$index - 1]->status === 'Sudah Bayar' && $c->status === 'Belum Bayar')
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-Bayar-{{ $c->id_cicilan }}">Bayar</button>
                                        @else
                                            <button class="btn btn-success btn-sm" disabled>Bayar</button>
                                        @endif

                                        <div class="modal fade" id="Modal-Bayar-{{ $c->id_cicilan }}" tabindex="-1"
                                            aria-labelledby="ModalTambah" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Cicilan bulan
                                                            ke {{ $c->sisa_bulan }} </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-bs-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda akan bayar Cicilan bulan ke
                                                        <b>{{ $c->sisa_bulan }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <form action="{{ route('pembayaran_cicilan', ['id_cicilan' => $c->id_cicilan]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Ya</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>

@include('layouts.footer')

<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-bs-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-bs-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store.peminjaman') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="for">Nama</label>
                            <input type="text" name="nama" class="form-control" id="sumber"
                                value="{{ $nama }}" readonly>
                            <input type="hidden" name="id_user" class="form-control" id="sumber"
                                value="{{ $id_user }}" readonly>
                        </div>
                        <div class="col-12">
                            <label for="for">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="sumber">
                        </div>
                        <div class="col-12">
                            <label for="for">Tenor</label>
                            <select type="text" name="tenor" class="form-control" id="sumber">
                                <option value="">--- Pilih Tenor Peminjaman ---</option>
                                <option value="1">1 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="9">9 Bulan</option>
                                <option value="12">1 Tahun</option>
                                <option value="24">2 Tahun</option>
                                <option value="36">3 Tahun</option>
                                <option value="48">4 Tahun</option>
                                <option value="60">5 Tahun</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="for">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal" class="form-control" id="sumber">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>
