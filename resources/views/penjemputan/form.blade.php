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
                <form method="POST" action="penjemputan">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control " id="nama" placeholder="Nama Pelanggan"
                                    name="nama">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pelanggan</label>
                                <input type="text" class="form-control " id="alamat" placeholder="Alamat Pelanggan"
                                    name="alamat">
                            </div>
                            <div>
                                <label for="tlp">No HP Pelanggan</label>
                                <input type="text" class="form-control " id="tlp" placeholder="No HP Pelanggan"
                                    name="tlp">
                            </div>
                            <div>
                                <label for="petugas">Petugas Penjemputan</label>
                                <input type="text" class="form-control " id="petugas" placeholder="Petugas Penjemputan"
                                    name="petugas">
                            </div>
                            <div>
                                <label for="status">Status</label>
                                <select name="status" id="status" required="required" class="form-control">
                                    <option value="Tercatat">Tercatat</option>
                                    <option value="Penjemputan">Penjemputan</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
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
</div>
</div>
