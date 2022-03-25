{{-- button --}}
<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $o->id }}">
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/{{ request()->segment(1) }}/databarang/{{ $o->id }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang"></label>
                            <input type="text" class="form-control col-sm-9" id="nama_barang"
                                value="{{ $o->nama_barang }}" name="nama_barang">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="qty"></label>
                            <input type="number" class="form-control col-sm-9" id="qty" value="{{ $o->qty }}"
                                name="qty">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="harga"></label>
                            <input type="number" class="form-control col-sm-9" id="harga" value="{{ $o->harga }}"
                                name="harga">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="waktu_beli"></label>
                            <input type="date" class="form-control col-sm-9" id="waktu_beli"
                                value="{{ $o->waktu_beli }}" name="waktu_beli">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="supplier"></label>
                            <input type="text" class="form-control col-sm-9" id="supplier" value="{{ $o->supplier }}"
                                name="supplier">
                        </div>
                    </div>

                    {{-- <div class="card-body">
                        <div class="form-group">
                            <label for="status"></label>
                            <select name="status" id="status" required="required" class="form-control"
                                value="{{ $o->status }}">
                                <option value="diajukan_beli">Diajukan Beli</option>
                                <option value="habis">Habis</option>
                                <option value="tersedia">Tersedia</option>
                            </select>
                        </div>
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="sumbit" class="btn btn-primary" id="btn-sumbit">Edit</button>
            </div>
        </div>
    </div>
    </form>
</div>
