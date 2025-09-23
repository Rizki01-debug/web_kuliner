@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang di panel admin 🎉</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <p class="card-text">123 orang</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Menu</h5>
                            <p class="card-text">45 item</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Bulan Ini</h5>
                            <p class="card-text">Rp 12.500.000</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
