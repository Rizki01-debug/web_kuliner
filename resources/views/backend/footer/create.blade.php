@extends('layouts.backend')

@section('title', 'Tambah Footer')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Footer</h5>
        </div>
        <div class="card-body">

            {{-- Alert error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Create --}}
            <form action="{{ route('backoffice.footer.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea name="about" id="about" rows="3" class="form-control">{{ old('about') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control"
                           value="{{ old('address') }}">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="newsletter_email" class="form-label">Newsletter Email</label>
                    <input type="email" name="newsletter_email" id="newsletter_email" 
                           value="{{ old('newsletter_email') }}" 
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label for="open_hours" class="form-label">Jam Operasional</label>
                    <input type="text" name="open_hours" id="open_hours" class="form-control"
                           placeholder="Contoh: Senin - Minggu, 08:00 - 22:00"
                           value="{{ old('open_hours') }}">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control"
                           value="{{ old('facebook') }}">
                </div>

                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control"
                           value="{{ old('twitter') }}">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                           value="{{ old('instagram') }}">
                </div>

                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                           value="{{ old('linkedin') }}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('backoffice.footer.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
