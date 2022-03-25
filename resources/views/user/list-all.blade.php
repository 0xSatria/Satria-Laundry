<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Outlet</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Role</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $in)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                <td class="text-center">{{ $in->outlet->nama }}</td>
                <td class="text-center">{{ $in->name }}</td>
                <td class="text-center">{{ $in->username }}</td>
                <td class="text-center">{{ $in->email }}</td>
                <td class="text-center">{{ $in->role }}</td>
                <td class="text-center">
                    @include('user.update')
                    <form method="POST" action="{{ route('user.destroy', $in->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-member btn-danger"><i class="fas fa-trash-alt"
                                style="color:reda"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
