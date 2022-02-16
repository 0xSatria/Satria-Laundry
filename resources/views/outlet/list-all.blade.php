<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($outlet as $o)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                <td class="text-center">{{ $o->nama }}</td>
                <td class="text-center">{{ $o->alamat }}</td>
                <td class="text-center">{{ $o->tlp }}</td>
                <td class="text-center">
                    @include('outlet.update')
                    <form method="POST" action="{{ route('outlet.destroy', $o->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-outlet btn-danger"><i class="fas fa-trash-alt"
                                style="color:reda"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
