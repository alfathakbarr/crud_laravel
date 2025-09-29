@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-success bg-gradient text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-book-medical me-2"></i>Tambah Mata Kuliah
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('mata-kuliah.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="kode_mk" class="form-label fw-bold">
                                <i class="fas fa-bookmark me-1"></i>Kode Mata Kuliah
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-code"></i>
                                </span>
                                <input type="text" class="form-control form-control-lg @error('kode_mk') is-invalid @enderror" 
                                    id="kode_mk" name="kode_mk" value="{{ old('kode_mk') }}" required placeholder="Masukkan kode mata kuliah">
                                @error('kode_mk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control @error('nama_mk') is-invalid @enderror" 
                                id="nama_mk" name="nama_mk" value="{{ old('nama_mk') }}" required>
                            @error('nama_mk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sks" class="form-label fw-bold">
                                <i class="fas fa-clock me-1"></i>SKS
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <input type="number" class="form-control form-control-lg @error('sks') is-invalid @enderror" 
                                    id="sks" name="sks" value="{{ old('sks') }}" required min="2" max="4"
                                    placeholder="Masukkan jumlah SKS (2-4)">
                                @error('sks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>SKS harus bernilai antara 2 sampai 4
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dosen_id" class="form-label">Dosen Pengampu</label>
                            <select class="form-select @error('dosen_id') is-invalid @enderror" 
                                id="dosen_id" name="dosen_id" required>
                                <option value="">Pilih Dosen</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama }} ({{ $dosen->nip }})
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
