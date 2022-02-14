  {{-- button --}}


<div class="modal fade" id="edit{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Update Outlet</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="post" action="outlet">
        @csrf
        {{ method_field('patch') }}
        <div id="method"></div>
        <div class="card-body">
          <div class="form-group">
            <label for="nama"></label>
            <input type="text" class="form-control col-sm-9" id="nama"  value="{{ $o->nama }}" name="nama">
          </div>
        </div>

        <div class="card-body">
            <div class="form-group">
              <label for="alamat"></label>
              <input type="text" class="form-control col-sm-9" id="alamat" value="{{ $o->alamat }}" name="alamat">
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="tlp"></label>
              <input type="text" class="form-control col-sm-9" id="tlp" value="{{ $o->tlp }}" name="tlp">
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

