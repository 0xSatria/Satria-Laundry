<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($member as $m)
        <tr>
            <td class="text-center">{{ $i =(isset($i)?++$i:$i=1) }}</td>
            <td class="text-center">{{ $m->nama }}</td>
            <td class="text-center">{{ $m->alamat }}</td>
            <td class="text-center">{{ $m->jenis_kelamin }}</td>
            <td class="text-center">{{ $m->tlp }}</td>
            <td class="text-center">
                <button type="button" class="btn edit-class" data-toggle="modal" data-target="#formInputModal" data-toggle="modal"
                    data-mode="edit"
                    data-id="{{ $m->id }}"
                    data-nama="{{ $m->nama }}"
                    data-alamat="{{ $m->alamat }}"
                    data-jenis_kelamin="{{ $m->jenis_kelamin }}"
                    data-tlp="{{ $m->tlp }}" >
                    <i class="fas fa-edit"></i>
                </button>
                    @include('member.update')
                    <form method="POST" action="{{ route('member.destroy', $m->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-member"><i class="fas fa-trash-alt" style="color:reda"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>