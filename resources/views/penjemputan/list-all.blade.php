<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pelanggan</th>
            <th class="text-center">Alamat Pelanggan</th>
            <th class="text-center">No HP Pelanggan</th>
            <th class="text-center">Petugas Penjemputan</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemjemputan as $o)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}
                    <input type="text" hidden class="id" value="{{ $o->id }}">
                </td>
                <td class="text-center">{{ $o->member->nama }}</td>
                <td class="text-center">{{ $o->member->alamat }}</td>
                <td class="text-center">{{ $o->member->tlp }}</td>
                <td class="text-center">{{ $o->petugas }}</td>
                <td class="text-center">
                    <select name="status" class="status form-control changeStatus">
                        <option value="Tercatat" {{ $o->status == 'Tercatat' ? 'selected' : '' }}>Tercatat
                        </option>
                        <option value="Penjemputan" {{ $o->status == 'Penjemputan' ? 'selected' : '' }}>
                            Penjemputan</option>
                        <option value="Selesai" {{ $o->status == 'Selesai' ? 'selected' : '' }}>Selesai
                        </option>
                    </select>
                </td>
                <td class="text-center">
                    @include('penjemputan.update')
                    <form method="POST" action="{{ route('penjemputan.destroy', $o->id) }}" style="display:inline">
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
