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
                                        name="id_outlet">
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
