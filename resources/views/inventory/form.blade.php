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
                <form method="POST" action="inventory">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control " id="product_name" placeholder="Product Name"
                                    name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="product_brand">Product Brand</label>
                                <input type="text" class="form-control " id="product_brand" placeholder="Product Brand"
                                    name="product_brand">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText">Condition</label>
                                <select id="condition" name="condition" required="required" class="form-control">
                                    <option value="NORMAL">NORMAL</option>
                                    <option value="SLOW">SLOW</option>
                                    <option value="BROKEN">BROKEN</option>
                                </select>
                            </div>
                            <div>
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control " id="quantity" placeholder="Quantity"
                                    name="quantity">
                            </div>
                            <div class="form-group">
                                <label for="restock_date">Restock Date</label>
                                <input type="date" class="form-control " id="restock_date" placeholder="Restock Date"
                                    name="restock_date">
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
