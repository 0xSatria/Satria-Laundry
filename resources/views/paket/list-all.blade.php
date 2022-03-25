<table id="tbl-paket" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">ID Outlet</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Nama Paket</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paket as $p)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                <td class="text-center">{{ $p->outlet->nama }}</td>
                <td class="text-center">{{ $p->jenis }}</td>
                <td class="text-center">{{ $p->nama_paket }}</td>
                <td class="text-center">{{ $p->harga }}</td>
                <td class="text-center">
                    @include('paket.update')
                    <form method="POST" action="{{ route('paket.destroy', $p->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-paket btn-danger"><i class="fas fa-trash-alt"
                                style="color:rede"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
