{{-- button --}}
<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $o->id }}"
    {{-- data-toggle="modal" data-mode="edit" 
    data-id="{{ $o->id }}" data-nama="{{ $o->nama }}"
    data-alamat="{{ $o->alamat }}" data-tlp="{{ $o->tlp }}" --}}>
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Penjemputan Laundry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('penjemputan/' . $o->id) }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama"></label>
                            <input type="text" class="form-control col-sm-9" id="nama" value="{{ $o->member->nama }}"
                                name="nama">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="alamat"></label>
                            <input type="text" class="form-control col-sm-9" id="alamat"
                                value="{{ $o->member->alamat }}" name="alamat">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="tlp"></label>
                            <input type="text" class="form-control col-sm-9" id="tlp" value="{{ $o->member->tlp }}"
                                name="tlp">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="petugas"></label>
                            <input type="text" class="form-control col-sm-9" id="petugas" value="{{ $o->petugas }}"
                                name="petugas">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="status"></label>
                            <select name="status" id="status" required="required" class="form-control"
                                value="{{ $o->status }}">
                                <option value="Tercatat">Tercatat</option>
                                <option value="Penjemputan">Penjemputan</option>
                                <option value="Selesai">Selesai</option>
                            </select>
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
