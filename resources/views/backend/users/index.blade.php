@extends('layouts.backend')

@section('title','Manajemen Users')

@section('content')
<h1>Users</h1>
<a href="{{ route('backoffice.users.create') }}">Tambah user</a>

<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Admin</th><th>Aksi</th></tr>
  </thead>
  <tbody>
    @foreach($users as $u)
    <tr>
      <td>{{ $u->id }}</td>
      <td>{{ $u->name }}</td>
      <td>{{ $u->email }}</td>
      <td>{{ $u->is_admin ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('backoffice.users.edit', $u) }}">Edit</a>
        <form action="{{ route('backoffice.users.destroy', $u) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $users->links() }}
@endsection
