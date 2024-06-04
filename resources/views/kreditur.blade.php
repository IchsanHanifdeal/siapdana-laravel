@include('layouts.header')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">{{ $title }}</h1>
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-3">List {{ $title }}</h4>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Tempat/Tanggal Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Jaminan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kreditur->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center badge-secondary">Tidak ada Kreditur</td>
                            </tr>
                        @else
                            @foreach ($kreditur as $key => $k)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $k->users->nama }}</td>
                                    <td>{{ $k->users->email }}</td>
                                    <td>{{ $k->no_handphone }}</td>
                                    <td>{{ $k->tempat . '/' . $k->tanggal_lahir }}</td>
                                    <td>{{ $k->pekerjaan }}</td>
                                    <td>{{ $k->alamat }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalBukti-{{ $k->id_kreditur }}">Lihat Jaminan</button> 
                                        <div class="modal fade" id="modalBukti-{{ $k->id_kreditur }}"
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
                                                        <img src="{{ asset('storage/' . $k->jaminan) }}"
                                                            class="img-fluid" /> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus-{{ $k->id_kreditur }}"><i class="fas fa-trash"></i> Hapus</button>
                                    
                                         {{-- Modal Hapus --}}
                                         <div class="modal fade" id="modal-hapus-{{ $k->id_kreditur }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="modal-hapusLabel" aria-bs-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-hapusLabel">
                                                            Konfirmasi
                                                            Hapus Data</h5>
                                                        <button type="button" class="close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-bs-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data kreditur
                                                        <b>{{ $k->users->nama }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <form
                                                            action="{{ route('destroy.kreditur', ['id_kreditur' => $k->id_kreditur]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
