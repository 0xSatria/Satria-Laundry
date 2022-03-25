<div class="collapse" id="dataLaundry">
    <div class="card-body">
        <h3>Data</h3>

        <table id="tbl-outlet" class="table table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Kode Transaksi</th>
                    <th class="text-center">Nama Member</th>
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Batas Waktu</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Pembayaran</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $m)
                    <tr>
                        <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                        <td class="text-center">{{ $m->kode_invoice }}</td>
                        <td class="text-center">{{ $m->member->nama }}</td>
                        <td class="text-center">Belum</td>
                        <td class="text-center">{{ $m->tgl }}</td>
                        <td class="text-center">{{ $m->batas_waktu }}</td>
                        <td class="text-center">{{ $m->status }}</td>
                        <td class="text-center">{{ $m->dibayar }}</td>
                        <td class="text-center">
                            {{-- @include('transaksi.update') --}}
                            <form method="POST" action="{{ route('transaksi.destroy', $m->id) }}"
                                style="display:inline">
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

    </div>
</div>
