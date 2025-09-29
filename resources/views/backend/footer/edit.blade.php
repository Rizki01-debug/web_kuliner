@extends('layouts.backend')

@section('title', 'Edit Footer')

@section('content')
<div class="container-fluid px-4 py-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Edit Footer</h5>
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

            {{-- Form Edit --}}
            <form action="{{ route('backoffice.footer.update', $footer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="about" class="form-label">About</label>
                    <textarea name="about" id="about" rows="3" class="form-control">{{ old('about', $footer->about) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ old('address', $footer->address) }}">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        value="{{ old('phone', $footer->phone) }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $footer->email) }}">
                </div>

                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control"
                        value="{{ old('facebook', $footer->facebook) }}">
                </div>

                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control"
                        value="{{ old('twitter', $footer->twitter) }}">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                        value="{{ old('instagram', $footer->instagram) }}">
                </div>

                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                        value="{{ old('linkedin', $footer->linkedin) }}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('backoffice.footer.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
