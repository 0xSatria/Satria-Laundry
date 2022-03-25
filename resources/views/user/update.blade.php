{{-- button --}}
<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $in->id }}">
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $in->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('inventory/' . $in->id) }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_name"></label>
                            <input type="text" class="form-control col-sm-9" id="product_name"
                                value="{{ $in->product_name }}" name="product_name">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_brand"></label>
                            <input type="text" class="form-control col-sm-9" id="product_brand"
                                value="{{ $in->product_brand }}" name="product_brand">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="condition"></label>
                            <select name="condition" class="form-control col-sm-9" id="condition"
                                placeholder="Condition" name="condition" value="{{ $in->condition }}">
                                <option value="NORMAL">NORMAL</option>
                                <option value="SLOW">SLOW</option>
                                <option value="BROKEN">BROKEN</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="quantity"></label>
                            <input type="text" class="form-control col-sm-9" id="quantity" value="{{ $in->quantity }}"
                                name="quantity">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="restock_date"></label>
                            <input type="date" class="form-control col-sm-9" id="restock_date"
                                value="{{ $in->restock_date }}" name="restock_date">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="sumbit" class="btn btn-primary" id="btn-sumbit">Edit</button>
            </div>
        </div>
    </div>
    </form>
</div>
