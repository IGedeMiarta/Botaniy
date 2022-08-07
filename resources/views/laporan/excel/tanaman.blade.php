<table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="10px">No</th>
            <th>QR-Code</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Khasiat</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tanaman as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ DNS2D::getBarcodeHTML('4445645656', 'QRCODE') }}</td> --}}
                <td>
                    <div class="qr-code">
                        {!! DNS2D::getBarcodeHTML(url('/') . '/find/' . $t->slug, 'QRCODE', 4, 4) !!}
                    </div>
                </td>
                <td><img src="{{ asset($t->gambar) }}" alt="img-{{ $t->nama }}" style="max-width: 100px">
                </td>
                <td>{{ $t->nama }}</td>
                <td>{{ $t->jenis->nama }}</td>
                <td>{{ $t->khasiat }}</td>
                <td>{{ 'Rp ' . number_format($t->harga, 2, ',', '.') }}</td>


            </tr>
        @endforeach
    </tbody>
</table>
