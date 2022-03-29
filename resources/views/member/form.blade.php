<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelleby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="member">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control " id="nama" placeholder="Nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control " id="alamat" placeholder="Alamat"
                                    name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required="required"
                                    class="form-control">
                                    <option value="P">Perempuan</option>
                                    <option value="L">Laki Laki</option>
                                </select>
                            </div>
                            <label for="tlp">No Telepon</label>
                            <input type="text" class="form-control " id="tlp" placeholder="No Telepon" name="tlp">
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>


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
</div>
