@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaksi</h1>

        <table class="table table-secondary table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Total Harga</th>
                    <th>Total Bayar</th>
                    <th>Waktu Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transcation)
                    <tr onclick="window.location='{{ route('transaction.show', $transcation) }}'" style="cursor: pointer">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th>{{ $transcation->user->name }}</th>
                        <th>{{ $transcation->total }}</th>
                        <th>{{ $transcation->pay_total }}</th>
                        <th>{{ $transcation->created_at }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
