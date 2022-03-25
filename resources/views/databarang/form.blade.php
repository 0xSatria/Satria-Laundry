{{-- modal member --}}
<div class="modal fade" id="modalDataBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Pilih Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="databarang">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div>
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control " id="nama_barang" placeholder="Nama Barang"
                                name="nama_barang">
                        </div>
                        <div>
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control " id="qty" placeholder="Qty" name="qty">
                        </div>
                        <div>
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control " id="harga" placeholder="Harga" name="harga">
                        </div>
                        <div>
                            <label for="waktu_beli">Waktu Beli</label>
                            <input type="date" class="form-control " id="waktu_beli" placeholder="Waktu Beli"
                                name="waktu_beli">
                        </div>
                        <div>
                            <label for="supplier">Supplier</label>
                            <input type="text" class="form-control " id="supplier" placeholder="Supplier"
                                name="supplier">
                        </div>
                        <div>
                            <label for="status">Status Barang</label>
                            <select name="status" id="status" required="required" class="form-control">
                                <option value="diajukan_beli">Diajukan Beli</option>
                                <option value="habis">Habis</option>
                                <option value="tersedia">Tersedia</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>

{{-- End Modal Member --}}
