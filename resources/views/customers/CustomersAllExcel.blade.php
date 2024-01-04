<style>
    #categories {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #categories td,
    #categories th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #categories tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #categories tr:hover {
        background-color: #ddd;
    }

    #categories th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="categories" width="100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Telepon</td>
        </tr>
    </thead>
    @foreach ($customers as $c)
        <tbody>
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ $c->alamat }}</td>
                <td>{{ $c->telepon }}</td>
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
