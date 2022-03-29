{{-- modal member --}}
<div class="modal fade" id="modalDataBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Input Penggunaan Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="penggunaanbarang">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div>
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control " id="nama_barang" placeholder="Nama Barang"
                                name="nama_barang">
                        </div>
                        <div>
                            <label for="waktu_pakai">Waktu Pakai</label>
                            <input type="datetime-local" class="form-control " id="waktu_pakai"
                                placeholder="Waktu Pakai" name="waktu_pakai">
                        </div>
                        <div>
                            <label for="nama_pemakai">Nama Pemakai</label>
                            <input type="text" class="form-control " id="nama_pemakai" placeholder="Nama Pemakai"
                                name="nama_pemakai">
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select name="status" id="status" required="required" class="form-control">
                                <option value="selesai">Selesai</option>
                                <option value="belum_selesai">Belum Selesai</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Pilih File Untuk Import Xls --}}
<div class="modal fade" id="FormImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Pilih File Excel </h5>
                {{-- <span aria-hidden="true">&times;</span> --}}
            </div>
            {{-- Form mesti dibawah modal body agar JSnya bekerja --}}
            <div class="modal-body">
                <form method="POST" action="{{ route('import-penggunaanbarang') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" required="required">

                    </div>
                    <div>
                        <a href="{{ route('databarang.templateExcel.download') }}" class="btn btn-danger">Download
                            Template Import</a>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
{{-- End Modal Member --}}
