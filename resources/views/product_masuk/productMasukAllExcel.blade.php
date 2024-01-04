    <style>
        #product-masuk {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #product-masuk td,
        #product-masuk th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #product-masuk tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #product-masuk tr:hover {
            background-color: #ddd;
        }

        #product-masuk th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>

    <table id="product-masuk" width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>Material</td>
                <td>Supplier</td>
                <td>Quantity</td>
                <td>Date</td>
                <td>harga_beli</td>
            </tr>
        </thead>
        @foreach ($product_masuk as $p)
            <tbody>
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->product->nama }}</td>
                    <td>{{ $p->supplier->nama }}</td>
                    <td>{{ $p->qty }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->harga_beli }}</td>
                </tr>
            </tbody>
        @endforeach

    </table>


    {{-- <!-- jQuery 3 --> --}}
    {{-- <script src="{{  asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script> --}}
    {{-- <!-- Bootstrap 3.3.7 --> --}}
    {{-- <script src="{{  asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script> --}}
    {{-- <!-- AdminLTE App --> --}}
    {{-- <script src="{{  asset('assets/dist/js/adminlte.min.js') }}"></script> --}}
    {{-- </body> --}}
    {{-- </html> --}}
