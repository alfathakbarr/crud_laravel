@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-success bg-gradient text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-book me-2"></i>Daftar Mata Kuliah
                    </h5>
                    <a href="{{ route('mata_kuliah.create') }}" class="btn btn-light btn-sm rounded-pill px-3 shadow-sm">
                        <i class="fas fa-plus-circle me-1"></i>Tambah Mata Kuliah
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle border">
                            <thead class="table-light text-center">
                                <tr>
                                    <th class="text-center" style="width: 5%">No</th>
                                    <th style="width: 15%">Kode MK</th>
                                    <th style="width: 30%">Nama Mata Kuliah</th>
                                    <th style="width: 10%">SKS</th>
                                    <th style="width: 25%">Dosen Pengampu</th>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mataKuliahs as $mk)
                                    <tr>
                                        <td class="text-center">{{ ($mataKuliahs->currentPage() - 1) * $mataKuliahs->perPage() + $loop->iteration }}</td>
                                        <td>MK{{ str_pad($mk->id, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $mk->nama }}</td>
                                        <td class="text-center">{{ $mk->sks }}</td>
                                        <td>{{ $mk->dosen->nama }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('mata_kuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('mata_kuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data mata kuliah.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted small mb-0">
                            Showing {{ $mataKuliahs->firstItem() ?? 0 }} to {{ $mataKuliahs->lastItem() ?? 0 }} of {{ $mataKuliahs->total() }} entries
                        </p>
                        {{ $mataKuliahs->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
