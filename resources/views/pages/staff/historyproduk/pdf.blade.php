<!DOCTYPE html>
<html>
<head>
    <style>
        /* Define your CSS styles for the PDF here */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Order Produk</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->namalengkap }}</td>
                <td>{{ $item->user->nomorhp }}</td>
                <td>{{ $item->user->address }}</td>
                <td>{{ $item->user->city }}</td>
                <td> 
                @foreach ($item->orderDetails as $orderDetail)
                    <p>
                        - {{ $orderDetail->product->title }}
                    </p>
                @endforeach</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->payment }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
        
        </tbody>
    </table>
</body>
</html>
