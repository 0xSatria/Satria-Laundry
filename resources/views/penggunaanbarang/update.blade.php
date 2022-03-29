{{-- button --}}
<button type="button" class="btn btn- btn-success" data-toggle="modal" data-target="#edit{{ $o->id }}">
    <i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="edit{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Penggunaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/{{ request()->segment(1) }}/penggunaanbarang/{{ $o->id }}">
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
                            <label for="waktu_pakai"></label>
                            <input type="datetime-local" class="form-control col-sm-9" id="waktu_pakai"
                                value="{{ $o->waktu_pakai }}" name="waktu_pakai">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pemakai"></label>
                            <input type="text" class="form-control col-sm-9" id="nama_pemakai"
                                value="{{ $o->nama_pemakai }}" name="nama_pemakai">
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
