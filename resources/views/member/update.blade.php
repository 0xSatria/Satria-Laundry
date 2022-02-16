<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $m->id }}">
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $m->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('member/' . $m->id) }}">
                    @csrf
                    @method('PUT')
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control col-sm-9" id="nama" value="{{ $m->nama }}"
                                name="nama">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control col-sm-9" id="alamat" value="{{ $m->alamat }}"
                                name="alamat">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="tlp">Jenis Kelamin</label>
                            <input type="text" class="form-control col-sm-9" id="jk" value="{{ $m->jk }}"
                                name="jk">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="tlp">No Telepon</label>
                            <input type="text" class="form-control col-sm-9" id="tlp" value="{{ $m->tlp }}"
                                name="tlp">
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
