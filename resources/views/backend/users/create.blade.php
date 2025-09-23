@extends('layouts.backend')

@section('content')
<h2>Tambah User</h2>
<form action="{{ route('backoffice.users.store') }}" method="POST">
  @csrf
  <label>Name</label><br>
  <input name="name" value="{{ old('name') }}"><br>

  <label>Email</label><br>
  <input name="email" value="{{ old('email') }}"><br>

  <label>Password</label><br>
  <input type="password" name="password"><br>

  <label>Confirm Password</label><br>
  <input type="password" name="password_confirmation"><br>

  <label><input type="checkbox" name="is_admin" value="1"> Is Admin</label><br>

  <button type="submit">Simpan</button>
</form>
@endsection
