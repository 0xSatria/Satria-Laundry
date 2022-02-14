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
            <td class="text-center">{{ $i =(isset($i)?++$i:$i=1) }}</td>
            <td class="text-center">{{ $o->nama }}</td>
            <td class="text-center">{{ $o->alamat }}</td>
            <td class="text-center">{{ $o->tlp }}</td>
            <td class="text-center">
                <button type="button" class="btn edit-class" data-toggle="modal" data-target="#formInputModal" data-toggle="modal"
                    data-mode="edit"
                    data-id="{{ $o->id }}"
                    data-nama="{{ $o->nama }}"
                    data-alamat="{{ $o->alamat }}"
                    data-tlp="{{ $o->tlp }}" >
                    <i class="fas fa-edit"></i>
                </button>
                @include('outlet.update')
                <form method="POST" action="{{ route('outlet.destroy', $o->id) }}" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn delete-outlet btn-danger"><i class="fas fa-trash-alt" style="color:reda"></i></button> &nbsp;
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>