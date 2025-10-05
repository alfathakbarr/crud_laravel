@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Edit Mata Kuliah</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('mata_kuliah.update', $mataKuliah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" 
                                id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $mataKuliah->kode_mk) }}" required>
                            @error('kode_mk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                id="nama" name="nama" value="{{ old('nama', $mataKuliah->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror" 
                                id="sks" name="sks" value="{{ old('sks', $mataKuliah->sks) }}" required min="1" max="6">
                            @error('sks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dosen_id" class="form-label">Dosen Pengampu</label>
                            <select class="form-select @error('dosen_id') is-invalid @enderror" 
                                id="dosen_id" name="dosen_id" required>
                                <option value="">Pilih Dosen</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" 
                                        {{ old('dosen_id', $mataKuliah->dosen_id) == $dosen->id ? 'selected' : '' }}>
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
                            <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
