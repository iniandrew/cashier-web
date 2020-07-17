@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Transaksi</h1>
        <div class="float-right">
            <b>{{ date('d F Y', strtotime($transaction->created_at)) }}</b>
        </div>

        <table class="table table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Photo</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction->details as $detail)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $detail->item->name }}</th>
                        <th>{{ $detail->item->category->name }}</th>
                        <th><img src="{{ asset($detail->item->image) }}" alt="" width="50px" height="50px"/></th>
                        <th>{{ $detail->item->price }}</th>
                        <th>{{ $detail->quantity }}</th>
                        <th>{{ $detail->subtotal }}</th>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                    <td>Total</td>
                    <td>{{ $transaction->total }}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Pembayaran</td>
                    <td>{{ $transaction->pay_total }}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Kembalian</td>
                    <td>{{ $transaction->pay_total - $transaction->total }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
