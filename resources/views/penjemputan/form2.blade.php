{{-- modal member --}}
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Pilih Pelanggan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="penjemputan">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="form-group">
                                <label for="id_member" class="form-label">Nama Pelanggan</label>
                                <select class="form-control " id="id_member" name="id_member">
                                    <option selected>Pilih Pelanggan</option>
                                    @foreach ($member as $m)
                                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pelanggan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>

{{-- End Modal Member --}}
