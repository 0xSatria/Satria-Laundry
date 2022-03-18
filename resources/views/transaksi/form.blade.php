<div class="collapse" id="formLaundry">
    <div class="card-body">
        {{-- data awal pelanggan --}}
        <div class="card">
            <div class="card-body">
                <div class="row" class="col-12">
                    <div class="from-group row col-6">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-controller" value="{{ date('Y-m-d') }}" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="inputPassword" class="col-4 col-form-label">Estimasi Selesai</label>
                        <div class="col-6 ml-auto">
                            <input type="date" class="form-control ml-auto"
                                value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" name="batas_waktu">
                        </div>
                    </div>
                </div>
                <div class="row" class="col-12">
                    <div class="form-group row col-6">
                        <label for="" class="col-sm-4 col-form-label"><button type="button"
                                class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"><i
                                    class="fas fa-plus"></i></button> Tambahkan </label>
                        <div class="col-sm-6" id="nama-pelanggan">
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="" class="col-4 col-form-label">Biodata</label>
                        <div class="col-6 ml-auto" id="biodata-pelanggan">
                            -
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        {{-- end data awal pelanggan --}}

        {{-- data paket --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="tambahPaketBtn" data-toggle="modal"
                            data-target="#modalPaket">Tambah Cucian</button>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                    <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Paket</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Total</th>
                                <th class="text-center" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;font-style:italic">Belum ada data</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr valign="bottom">
                                <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                <td><span id="subtotal">0</span></td>
                                <td rowspan="4">
                                    <label for="">Pembayaran</label>
                                    <input type="text" class="form-control" name="bayar" id="" style="width:170px"
                                        value="0">
                                    <div>
                                        <button class="btn btn-primary" style="margin-top:10px;width:170px"
                                            type="submit">Bayar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Diskon</td>
                                <td><input type="number" value="0" id="diskon" name="diskon" style="width:140px"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Pajak <input type="number" value="0" min="0"
                                        class="qty" name="pajak" id="pajak-persen" size="2"
                                        style="width:40px"></td>
                                <td><span id="pajak-harga">0</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Biaya Tambahan</td>
                                <td><input type="number" name="biaya_tambahan" style="width:140px" value="0"></td>
                            </tr>
                            <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                                <td colspan="3" align="right">Total Bayar Akhir</td>
                                <td><span id="total">0</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{-- end data paket --}}

        {{-- modal paket --}}

        <div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Paket</h5>
                    </div>
                    <div class="modal-body">
                        <table id='tblPaket' class="table table-stripped table-compact">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Paket</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paket as $pt)
                                    <tr>
                                        <td class="text-center"> {{ $j = !isset($j) ? 1 : ++$j }} <input
                                                type="hidden" class="idPaket" value="{{ $pt->id }}"></td>
                                        <td class="text-center"> {{ $pt->nama_paket }} </td>
                                        <td class="text-center"> {{ $pt->harga }} </td>
                                        <td class="text-center"> <button class="pilihPaketBtn btn-primary btn-sm"
                                                type="button">Pilih</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- end modal paket --}}
        {{-- pembayaran --}}
        <div class="card">
        </div>
        {{-- end pembayaran --}}

        {{-- modal member --}}
        <div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"> Pilih Pelanggan</h4>
                    </div>
                    <div class="modal-body">
                        <table id='tblMember' class="table table-stripped table-compact">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member as $mb)
                                    <tr>
                                        <td class="text-center">{{ $i = !isset($i) ? 1 : ++$i }}
                                            <input type="hidden" class="idMember" name="id_member"
                                                value="{{ $mb->id }}">
                                        </td>
                                        <td class="text-center"> {{ $mb->nama }} </td>
                                        <td class="text-center"> {{ $mb->jenis_kelamin }} </td>
                                        <td class="text-center"> {{ $mb->tlp }} </td>
                                        <td class="text-center"> {{ $mb->alamat }} </td>
                                        <td class="text-center"> <button class="pilihMemberBtn btn-primary btn-sm"
                                                type="button">Pilih</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Member --}}
