<div class="collapse" id="dataLaundry">
    <div class="card-body">
        <h3>Data</h3>

        <table class="expandable-table w-100 table-sm" id="tb-transaksi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Outlet</th>
                    <th>Kode Invoice</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Masuk</th>
                    <th>Batas Waktu</th>
                    {{-- <th>Total</th> --}}
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->outlet->nama ?? '' }}</td>
                        <td>{{ $t->kode_invoice }}</td>
                        <td>{{ $t->member->nama ?? '' }}</td>
                        <td>{{ $t->tgl }}</td>
                        <td>{{ $t->batas_waktu }}</td>
                        {{-- <td>{{ $t->total }}</td> --}}
                        <td>{{ $t->status }}</td>
                        <td>
                            @switch($t->dibayar)
                                @case('dibayar')
                                    Dibayar
                                @break

                                @case('belum_dibayar')
                                    Belum Bayar
                                @break
                            @endswitch
                        </td>
                        <td>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary m-2" data-toggle="modal"
                                data-target="#LihatData{{ $t->id }}">Laporan

                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="LihatData{{ $t->id }}" tabindex="-1"
                                aria-labelledby="LihatData" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="LihatData{{ $t->id }}">liat data
                                                disini</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-link active" id="nav-DetailData"
                                                        data-toggle="collapse" href="#DetailData" role="button"
                                                        aria-controls="collapseExample" aria-selected="true">detail
                                                        treansaksi</a>
                                                    <a class="nav-link" id="nav-DetailPelanggan"
                                                        data-toggle="collapse" href="#DetailPelanggan" role="button"
                                                        aria-controls="collapseExample" aria-selected="false">Detail
                                                        Pelanggan</a>
                                                </div>
                                            </nav>
                                            <div class="collapse" id="DetailData">
                                                <table class="expandable-table w-100 table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama Outlet</td>
                                                            <td>{{ $t->outlet->nama ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kode Invoice</td>
                                                            <td>{{ $t->kode_invoice }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Pelanggan</td>
                                                            <td>{{ $t->member->nama ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Masuk</td>
                                                            <td>{{ $t->tgl }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Batas Waktu</td>
                                                            <td>{{ $t->batas_waktu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Bayar</td>
                                                            <td>{{ $t->tgl_bayar }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>{{ $t->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pembayaran</td>
                                                            <td>
                                                                @switch($t->dibayar)
                                                                    @case('dibayar')
                                                                        Dibayar
                                                                    @break

                                                                    @case('belum_dibayar')
                                                                        Belum Bayar
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kasir</td>
                                                            <td>{{ $t->user->name ?? '' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="expandable-table w-100 table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Paket</th>
                                                            <th>Harga</th>
                                                            <th>Qty</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    {{-- <tbody>
                                            @foreach ($t->detail_transaksi as $dt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dt->paket_cucian->nama_paket ?? '' }}</td>
                                                <td>{{ $dt->paket_cucian->harga ?? '' }}</td>
                                                <td>{{ $dt->qty }}</td>
                                                <td>{{ ($dt->paket_cucian->harga ?? '') * $dt->qty }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody> --}}
                                                    {{-- <tfoot>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td>{{ $t->getTotalPrice() }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">Diskon</td>
                                                <td>{{ $t->diskon }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">Pajak {{ $t->pajak }} %
                                                </td>
                                                <td>{{ ($t->getTotalPrice() * $t->pajak) / 100 }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right">Biaya Tambahan</td>
                                                <td>{{ $t->biaya_tambahan }}</td>
                                            </tr>
                                            <tr
                                                style="background:black;color:white;font-weight:bold;font-size:1em">
                                                <td colspan="4" align="right">Total Bayar Akhir</td>
                                                <td>{{ $t->total }}</td>
                                            </tr>
                                        </tfoot> --}}
                                                </table>
                                            </div>
                                            <div class="collapse" id="DetailPelanggan">
                                                <table class="expandable-table w-100 table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>{{ $t->member->nama ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>{{ $t->member->alamat ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>{{ $t->member->jenis_kelamin ?? '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Telepon</td>
                                                            <td>{{ $t->member->telepon ?? '' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary m-2" data-toggle="modal"
                                data-target="#PerbaharuiData{{ $t->id }}">Update

                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="PerbaharuiData{{ $t->id }}" tabindex="-1"
                                aria-labelledby="PerbaharuiData" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="PerbaharuiData{{ $t->id }}">
                                                PerbaharuiData</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="/{{ request()->segment(1) }}/transaksi/{{ $t->id }}"
                                                method="POST" class="mb-5" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="baru"
                                                            @if ($t->status == 'baru') selected @endif>Baru
                                                        </option>
                                                        <option value="proses"
                                                            @if ($t->status == 'proses') selected @endif>Proses
                                                        </option>
                                                        <option value="selesai"
                                                            @if ($t->status == 'selesai') selected @endif>Selesai
                                                        </option>
                                                        <option value="diambil"
                                                            @if ($t->status == 'diambil') selected @endif>Diambil
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dibayar" class="form-label">Pembayaran</label>
                                                    <select class="form-control" name="dibayar" id="dibayar">
                                                        <option value="dibayar"
                                                            @if ($t->dibayar == 'dibayar') selected @endif>Dibayar
                                                        </option>
                                                        <option value="belum_dibayar"
                                                            @if ($t->dibayar == 'belum_dibayar') selected @endif>Belum
                                                            Dibayar</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-warning">Posting</button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary m-2" data-toggle="modal"
                                data-target="#LihatInvoice{{ $t->id }}">Faktur

                            </button>


                            <!-- Modal -->

                            <div class="modal fade" id="LihatInvoice{{ $t->id }}" tabindex="-1"
                                aria-labelledby="LihatInvoice" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="LihatInvoice{{ $t->id }}">Faktur</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="page-header">
                                                        <i class="fas fa-address-book"></i> Planet Laundry
                                                    </h2>
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-striped">

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Alamat : {{ $t->outlet->alamat ?? '' }} <br>
                                                                    Telepon : {{ $t->outlet->tlp ?? '' }} <br>
                                                                    Operator : {{ $t->user->name ?? '' }} <br>
                                                                    Outlet : {{ $t->outlet->nama ?? '' }}
                                                                </td>
                                                                <td>
                                                                    <b>Faktur No. {{ $t->kode_invoice }} </b> <br>
                                                                    {{ $t->tgl_bayar }} <br>
                                                                    Kepada Yth : <br>
                                                                    {{ $t->member->nama ?? '' }} <br>
                                                                    {{ $t->member->alamat ?? '' }} <br>
                                                                    {{ $t->member->tlp ?? '' }} <br>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table class="expandable-table w-100 table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Paket</th>
                                                                <th>Harga</th>
                                                                <th>Qty</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        {{-- <tbody>
                                        @foreach ($t->detail_transaksi as $dt)
                                            <tr>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dt->paket_cucian->nama_paket ?? '' }}</td>
                                                    <td>{{ $dt->paket_cucian->harga ?? '' }}</td>
                                                    <td>{{ $dt->qty }}</td>
                                                    <td>{{ ($dt->paket_cucian->harga ?? '') * $dt->qty }}</td>
                                                </tr>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                                    </table> <br> <br>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <b>Perhatian</b>
                                                            <ol>
                                                                <li> Pengambilan brang dibayar tunai. </li>
                                                                <li> Jika terjadi kehilangan/kerusakan kami hanya
                                                                    mengganti
                                                                    tidak lebih dari 2x ongkos cuci. </li>
                                                                <li> Hak claim yang kami terima tidak lebih dari 24 jam
                                                                    dari
                                                                    pengambilan. </li>
                                                            </ol>
                                                            <b>Kami Tidak Bertanggung Jawab</b>
                                                            <ol>
                                                                <li> Susut/luntur karena sifat bahannya. </li>
                                                                <li> Cucian yang tidak diambil tempo 1 bulan
                                                                    hilang/rusak. </li>
                                                                <li> Bila terhadi kebakaran. </li>
                                                            </ol>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <h6>Dibayar Pada {{ $t->tgl_bayar }}</h6>
                                                                    </tr>
                                                                    {{-- <tr>
                                                    <td>Subtotal</td>
                                                    <td>{{ $t->getTotalPrice() }}</td>
                                                </tr> --}}
                                                                    <tr>
                                                                        <td>Diskon</td>
                                                                        <td>{{ $t->diskon }}</td>
                                                                    </tr>
                                                                    {{-- <tr>
                                                    <td>Pajak {{ $t->pajak }} %</td>
                                                    <td>{{ ($t->getTotalPrice() * $t->pajak) / 100 }}</td>
                                                </tr> --}}
                                                                    <tr>
                                                                        <td>Biaya Tambahan</td>
                                                                        <td>{{ $t->biaya_tambahan }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Bayar Akhir</td>
                                                                        <td>{{ $t->total }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <a class="btn btn-warning" {{-- href="{{ route('faktur', $t->id) }}" target="_blank">Cetak</a> --}}
                                                    {{-- </div> --}}
                                                    {{-- </div> --}}
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-success text-light mb-1" data-bs-toggle="modal"
                                data-bs-target="#ModalLihatInvoice{{ $t->id }}">
                                <i class="fas fa-archive"></i>
                            </button> --}}
                            <div class="modal fade bd-example-modal-lg" id="ModalLihatInvoice{{ $t->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="ModalLihatInvoiceLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-dark">
                                            <h3 class="modal-title" id="ModalLihatInvoiceLabel">Lihat Faktur Disini
                                            </h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <table class="expandable-table w-100 table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h3><img src="{{ asset('assets') }}
                                                                    class="                mr-2">Laundry Ariel</h3>
                                                            Alamat : {{ $t->outlet->alamat ?? '' }} <br>
                                                            Telepon : {{ $t->outlet->tlp ?? '' }} <br>
                                                            Operator : {{ $t->user->name ?? '' }} <br>
                                                            Outlet : {{ $t->outlet->nama ?? '' }}
                                                        </td>
                                                        <td>
                                                            <b>Faktur No. {{ $t->kode_invoice }} </b> <br>
                                                            {{ $t->tgl_bayar }} <br>
                                                            Kepada Yth : <br>
                                                            {{ $t->member->nama ?? '' }} <br>
                                                            {{ $t->member->alamat ?? '' }} <br>
                                                            {{ $t->member->tlp ?? '' }} <br>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <table class="expandable-table w-100 table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Paket</th>
                                                        <th>Harga</th>
                                                        <th>Qty</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                {{-- <tbody>
                                            @foreach ($t->DetailTransaksi as $dt)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dt->paket->nama_paket ?? '' }}</td>
                                                    <td>{{ $dt->paket->harga ?? '' }}</td>
                                                    <td>{{ $dt->qty }}</td>
                                                    <td>{{ ($dt->paket->harga ?? '') * $dt->qty }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody> --}}
                                            </table> <br> <br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <b>Perhatian</b>
                                                    <ol>
                                                        <li> Pengambilan brang dibayar tunai. </li>
                                                        <li> Jika terjadi kehilangan/kerusakan kami hanya mengganti
                                                            tidak lebih dari 2x ongkos cuci. </li>
                                                        <li> Hak claim yang kami terima tidak lebih dari 24 jam dari
                                                            pengambilan. </li>
                                                    </ol>
                                                    <b>Kami Tidak Bertanggung Jawab</b>
                                                    <ol>
                                                        <li> Susut/luntur karena sifat bahannya. </li>
                                                        <li> Cucian yang tidak diambil tempo 1 bulan hilang/rusak. </li>
                                                        <li> Bila terhadi kebakaran. </li>
                                                    </ol>
                                                </div>
                                                {{-- <div class="col-md-6">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <h6>Dibayar Pada {{ $t->tgl_bayar }}</h6>
                                                    </tr>
                                                    <tr>
                                                        <td>Subtotal</td>
                                                        <td>{{ $t->getTotalPrice() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Diskon</td>
                                                        <td>{{ $t->diskon }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pajak {{ $t->pajak }} %</td>
                                                        <td>{{ ($t->getTotalPrice() * $t->pajak) / 100 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Tambahan</td>
                                                        <td>{{ $t->biaya_tambahan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Bayar Akhir</td>
                                                        <td>{{ $t->total }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                {{-- <a class="btn btn-warning"
                                            href="{{ route('faktur', $t->id) }}" target="_blank">Cetak</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
