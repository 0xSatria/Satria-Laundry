<form method="POST" action="paket">
    @csrf
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

                    <div id="method">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_outlet">Id Outlet</label>
                                    <input type="text" class="form-control " id="id_outlet" placeholder="Id Outlet"
                                        name="id_outlet" value="{{ auth()->user()->id_outlet }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <select id="jenis" name="jenis" required="required" class="form-control">
                                        <option>kiloan</option>
                                        <option>selimut</option>
                                        <option>bed cover</option>
                                        <option>kaos</option>
                                        <option>kain</option>
                                    </select>
                                </div>
                                <label for="nama_paket">Nama Paket</label>
                                <input type="text" class="form-control " id="nama_paket" placeholder="Nama Paket"
                                    name="nama_paket">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control " id="harga" placeholder="Harga" name="harga">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <!-- /.card-body -->
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
