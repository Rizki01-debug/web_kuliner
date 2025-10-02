@extends('layouts.backend')

@section('title', 'Newsletter Management')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Newsletter</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newsletters as $newsletter)
                        <tr>
                            <td>{{ $newsletter->email }}</td>
                            <td>{{ $newsletter->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <form action="{{ route('backoffice.newsletter.destroy', $newsletter) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus email ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center">Belum ada email terdaftar</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $newsletters->links() }}
        </div>
    </div>
</div>
@endsection
