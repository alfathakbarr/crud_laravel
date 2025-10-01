@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary bg-gradient text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Daftar Dosen
                    </h5>
                    <a href="{{ route('dosen.create') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm">
                        <i class="fas fa-plus-circle me-1"></i>Tambah Dosen
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('dosen.index') }}" method="GET" class="d-flex gap-2">
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama dosen..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                                @if(request('search'))
                                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Reset</a>
                                @endif
                            </form>
                        </div>
                    </div>

                    @php
                        $dosens = $dosens ?? collect();
                    @endphp
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle border">
                            <thead class="table-light text-center">
                                <tr>
                                    <th class="text-center" style="width: 5%">No</th>
                                    <th style="width: 15%">NIP</th>
                                    <th style="width: 25%">Nama</th>
                                    <th style="width: 25%">Email</th>
                                    <th style="width: 15%">No. Telepon</th>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dosens ?? [] as $index => $dosen)
                                    <tr>
                                        <td class="text-center">{{ ($dosens->currentPage() - 1) * $dosens->perPage() + $loop->iteration }}</td>
                                        <td>{{ $dosen->nip }}</td>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td>{{ $dosen->no_telepon }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('dosen.edit', $dosen->id) }}" 
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('dosen.destroy', $dosen->id) }}" 
                                                    method="POST" class="d-inline" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data dosen.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($dosens instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="d-flex justify-content-end mt-3">
                            {{ $dosens->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection