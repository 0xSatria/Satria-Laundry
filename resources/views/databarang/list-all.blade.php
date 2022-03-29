<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Waktu Beli</th>
            <th class="text-center">Supplier</th>
            <th class="text-center">Status Barang</th>
            <th class="text-center">Waktu Update Status</th>
            <th class="text-center">Stok Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($databarang as $o)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}
                    <input type="text" hidden class="id" value="{{ $o->id }}">
                </td>
                <td class="text-center">{{ $o->nama_barang }}</td>
                <td class="text-center">{{ $o->qty }}</td>
                <td class="text-center">{{ $o->harga }}</td>
                <td class="text-center">{{ $o->waktu_beli }}</td>
                <td class="text-center">{{ $o->supplier }}</td>
                <td class="text-center">
                    <select name="status" class="status form-control">
                        <option value="diajukan_beli" {{ $o->status == 'diajukan_beli' ? 'selected' : '' }}>Diajukan
                            Beli
                        </option>
                        <option value="habis" {{ $o->status == 'habis' ? 'selected' : '' }}>
                            Habis</option>
                        <option value="tersedia" {{ $o->status == 'tersedia' ? 'selected' : '' }}>Tersedia
                        </option>
                    </select>
                </td>
                <td>{{ $o->waktu_update_status }}</td>
                <td class="text-center">
                    @include('databarang.update')
                    <form method="POST" action="{{ route('databarang.destroy', $o->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-outlet btn-danger"
                            onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"
                                style="color:reda"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
