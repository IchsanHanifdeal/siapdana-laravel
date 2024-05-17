@include('layouts.header')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        <h1 class="app-page-title">{{ $title }}</h1>

        <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
            <div class="inner">
                <div class="app-card-body p-3 p-lg-4">
                    <h3 class="mb-3">Selamat datang, {{ $nama }}!</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><!--//app-card-body-->

            </div><!--//inner-->
        </div><!--//app-card-->
        @if ($role == 'admin')
            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Jumlah Kreditur</h4>
                            <div class="stats-figure">{{ $jumlah_kreditur }}</div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Jumlah Peminjaman</h4>
                            <div class="stats-figure">{{ $jumlah_peminjaman }}</div>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div>
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Peminjaman Diterima</h4>
                            <div class="stats-figure">{{ $total_peminjaman_diterima }}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Peminjaman Ditolak</h4>
                            <div class="stats-figure">{{ $jumlah_peminjaman_ditolak }}</div>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->
            </div>
        @endif
        <h1 class="app-page-title">Peminjaman</h1>
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-3">History Peminjaman</h4>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Tenor</th>
                            <th>Tanggal</th>
                            <th>Validasi</th>
                            @if ($role == 'admin')
                                <th>Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($peminjaman->isEmpty())
                            @if ($role == 'user')
                                <tr>
                                    <td colspan="6" class="text-center badge-secondary">Tidak ada History Peminjaman
                                    </td>
                                </tr>
                            @endif
                            @if ($role == 'admin')
                                <tr>
                                    <td colspan="7" class="text-center badge-secondary">Tidak ada History Peminjaman
                                    </td>
                                </tr>
                            @endif
                        @else
                            @foreach ($peminjaman as $key => $p)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $p->users->nama }}</td>
                                    <td>{{ 'Rp ' . number_format($p->jumlah, 0, ',', '.') }}</td>
                                    <td>{{ $p->tenor }}</td>
                                    <td>{{ $p->tanggal }}</td>
                                    <td>
                                        @if ($p->validasi === 'diterima')
                                            <span class="badge badge-success"
                                                style="background-color:#28A745">Diterima</span>
                                        @elseif ($p->validasi === 'ditolak')
                                            <span class="badge badge-danger"
                                                style="background-color:#DC3545">Ditolak</span>
                                        @else
                                            <span class="badge badge-secondary"style="background-color:#6C757D">Menunggu
                                                Persetujuan</span>
                                        @endif
                                    </td>
                                    @if ($role == 'admin')
                                        <td>
                                            @if ($p->validasi === 'diterima')
                                                <i class="fas fa-check-circle text-success"></i>
                                            @elseif ($p->validasi === 'ditolak')
                                                <i class="fas fa-times-circle text-danger"></i>
                                            @else
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#Modalterima-{{ $p->id_peminjaman }}">Terima</button>

                                                {{-- Modal Terima --}}
                                                <div class="modal fade" id="Modalterima-{{ $p->id_peminjaman }}"
                                                    tabindex="-1" aria-labelledby="ModalTambah" aria-bs-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Terima peminjaman
                                                                    {{ $p->users->nama }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-bs-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menerima peminjaman dari
                                                                dari
                                                                <b> {{ $p->users->nama }}</b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <form
                                                                    action="{{ route('terima_peminjaman', ['id_peminjaman' => $p->id_peminjaman]) }}"
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
                                                    data-bs-target="#Modaltolak-{{ $p->id_peminjaman }}">Tolak</button>

                                                <div class="modal fade" id="Modaltolak-{{ $p->id_peminjaman }}"
                                                    tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Tolak peminjaman ruang
                                                                    {{ $p->users->nama }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-bs-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menolak peminjaman
                                                                ruangan dari
                                                                <b>{{ $p->users->nama }}</b>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <form
                                                                    action="{{ route('tolak_peminjaman', ['id_peminjaman' => $p->id_peminjaman]) }}"
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
                        @endif
                    </tbody>
                </table>
                @if ($role == 'user')
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#ModalTambah"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg> Ajukan Pinjaman</button>
                    </div>
                @endif
            </div>
        </div>
    </div><!--//container-fluid-->
</div><!--//app-content-->
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
                                <option value="1 Bulan">1 Bulan</option>
                                <option value="3 Bulan">3 Bulan</option>
                                <option value="6 Bulan">6 Bulan</option>
                                <option value="9 Bulan">9 Bulan</option>
                                <option value="12 Bulan">1 Tahun</option>
                                <option value="24 Bulan">2 Tahun</option>
                                <option value="48 Bulan">4 Tahun</option>
                                <option value="60 Bulan">5 Tahun</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="for">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="sumber"
                                value="{{ date('Y-m-d') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
