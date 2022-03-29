{{-- button --}}
<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $p->id }}">
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/{{ request()->segment(1) }}/paket/{{ $p->id }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_outlet"></label>
                            <input type="text" class="form-control col-sm-9" id="id_outlet"
                                value="{{ $p->id_outlet }}" name="id_outlet" readonly>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama"></label>
                            <select name="jenis" class="form-control col-sm-9" id="jenis" placeholder="Jenis"
                                name="jenis">
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_Cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama"></label>
                            <input type="text" class="form-control col-sm-9" id="nama_paket" placeholder="Nama Paket"
                                name="nama_paket" value="{{ $p->nama_paket }}">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="Harga"></label>
                            <input type="text" class="form-control col-sm-9" id="harga" value="{{ $p->harga }}"
                                name="harga">
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
