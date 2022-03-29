<div class="collapse" id="formLaundry">

    <!--data awal pelanggan-->
    <div class="card">
        <div class="card-body">
            {{-- <form> --}}
            <div class="row" class="col-12">
                <div class="form-grup row col-6">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                    <div class="col-sm-6">
                        <input type="date" name="tgl" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="form-grup row col-6">
                    <label for="inputPassword" class="col-4 col-form-label">Estimasi selesai</label>
                    <div class="col-6 ml-auto">
                        <input type="date" class="form-control ml-auto"
                            value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" name="batas_waktu">
                    </div>
                </div>
            </div>
            <div class="row" class="col-12">
                <div class="form-grup row col-6">
                    <label for="" class="col-sm-4 col-form-label">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#member">
                            <li class="fa fa-plus"></li>
                        </button>
                        NamaPelanggan
                        <!-- Button trigger modal -->
                    </label>
                    <label class="col-sm-6 col-form-label" id="nama-pelanggan" style="font-weight:normal">
                        -
                    </label>
                </div>
                <div class="form-grup row col-6">
                    <label for="" class="col-4 col-form-label left">Biodata</label>
                    <div class="col-6 ml-auto" id="biodata-pelanggan" style="font-weight normal">
                        <input type="text" hidden class="idMember">
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
    <!-- end of data awal pelanggan-->

</div>


<!-- Modal member-->
<div class="modal fade" id="member" tabindex="-1" aria-labelledby="memberLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tbl-member" class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>jenis Kelamin</th>
                            <th>Tlp</th>
                            <th>Id Member</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $model)
                            <tr>
                                <td>{{ $i = isset($i) ? ++$i : ($i = 1) }}
                                    <input type="hidden" class="idMember" name="id_member"
                                        value="{{ $model->id }}">
                                </td>
                                </td>
                                <td>{{ $model->nama }}</td>
                                <td>{{ $model->alamat }}</td>
                                <td>{{ $model->jenis_kelamin }}</td>
                                <td>{{ $model->tlp }}</td>
                                <td>{{ $model->id }}</td>
                                <td>
                                    <button type="button" class="PilihMember btn btn-info">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--data paket-->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-success" id="tambahPaketBtn" data-toggle="modal"
                    data-target="#modalPaket">Tambah Cucian</button>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row">
            <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                <thead>
                    <tr>
                        <th>Nama paket</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" style="text-align: center;font-style:italic">Belum ada data</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr valign="bottom">
                        <td width="" colspan="3" align="right">Jumlah Bayar</td>
                        <td><span id="subtotal">0</span></td>
                        <td rowspan="4">
                            <label for="">Pembayaran</label>
                            <input type="text" class="form-control" name="bayar" id="" style="width:170px" value="0">
                            <div>
                                <button type="submit" class="btn btn-success"
                                    style="margin-top:10px; width:170px">Bayar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Diskon</td>
                        <td><input class="form-control" type="number" value="0" id="diskon" name="diskon"
                                style="width:140px"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Pajak <input type="hidden" value="0" min="0"
                                class="qty" name="pajak" id="pajak-persen" size="2" style="width:40px"></td>
                        <td><span id="pajak-harga">0</span></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Biaya Tambahan</td>
                        <td><input class="form-control" type="number" name="biaya_tambahan" style="width:140px"
                                value="0"></td>
                    </tr>
                    <tr style="background:aquamarine; color: black; font-weight:bold; font-size: 1em">
                        <td colspan="3" align-="right">Total Bayar Akhir</td>
                        <td><span id="total">0</span></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- end off data paket -->

<!-- Modal Paket-->
<div class="modal fade" id="modalPaket" tabindex="-1" aria-labelledby="paketLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paketLabel">Pilih Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tbl-paket" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $model)
                            <tr>
                                <td>{{ $j = isset($j) ? ++$j : ($j = 1) }}
                                    <input type="hidden" class="idPaket" value="{{ $model->id }}">
                                </td>
                                <td>{{ $model->nama_paket }}</td>
                                <td>{{ $model->harga }}</td>
                                <td>
                                    <button type="button" class="PilihPaket btn btn-info">Pilih</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
