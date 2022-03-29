<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Waktu Pakai</th>
            <th class="text-center">Waktu Beres</th>
            <th class="text-center">Nama Pakai</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penggunaanbarang as $o)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}
                    <input type="text" hidden class="id" value="{{ $o->id }}">
                </td>
                <td class="text-center">{{ $o->nama_barang }}</td>
                <td class="text-center">{{ $o->waktu_pakai }}</td>
                <td class="text-center">{{ $o->waktu_selesai_pakai }}</td>
                <td class="text-center">{{ $o->nama_pemakai }}</td>
                <td class="text-center">
                    <select name="status" class="status form-control">
                        <option value="selesai" {{ $o->status == 'selesai' ? 'selected' : '' }}>
                            Selesai</option>
                        <option value="belum_selesai" {{ $o->status == 'belum_selesai' ? 'selected' : '' }}>
                            Belum Selesai</option>
                    </select>
                </td>
                <td class="text-center">
                    @include('penggunaanbarang.update')
                    <form method="POST" action="{{ route('penggunaanbarang.destroy', $o->id) }}"
                        style="display:inline">
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
