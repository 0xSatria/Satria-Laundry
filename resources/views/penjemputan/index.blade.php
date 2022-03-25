@extends('templates/header')

@section('content')
    <!-- page content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Penjemputan Laundry</h3>
            </div>
            <div class="card-body">
                <div class="card-body form-inline my-2 my-lg-0">
                    <div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalMember">
                            <i class="fas fa-plus"></i>Tambah data
                        </button>

                        {{-- Export Excel --}}
                        <a href="{{ route('export-paket') }}" class="btn btn-primary">
                            <i class="fa fa-file-excel"></i> Export
                        </a>
                    </div>

                    {{-- Import Excel --}}
                    <div class="col-sm-7">
                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#FormImport">
                            <i class="fa fa-file-excel"></i> Import
                        </button>
                    </div>


                    <div>
                        <input type="search" class="form-control my-2 my-lg-0" name="search" id="search">
                        <button class="btn btn-success my-2 my-sm-0" type=" button" id="btnSearch">Cari</button>
                    </div>
                </div>


                <div style="margin-top:20px">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert" id="success-alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $errors)
                                    <li>{{ $errors }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div>
                    @include('penjemputan/list-all')
                </div>
                {{-- <table id="tblTransaksi" class="table table-striped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Pelanggan</th>
                            <th class="text-center">Alamat Pelanggan</th>
                            <th class="text-center">No HP Pelanggan</th>
                            <th class="text-center">Petugas Penjemputan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $o)
                            <tr>
                                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                                <td class="text-center">{{ $o->nama }}</td>
                                <td class="text-center">{{ $o->alamat }}</td>
                                <td class="text-center">{{ $o->tlp }}</td>
                                <td class="text-center">{{ $o->petugas }}</td>
                                <td class="text-center">
                                    <select name="status" id="status">
                                        <option value="{{ $o->status }}">Tercatat</option>
                                        <option value="{{ $o->status }}">Penjemputan</option>
                                        <option value="{{ $o->status }}">Selesai</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    @include('penjemputan.update')
                                    <form method="POST" action="{{ route('penjemputan.destroy', $o->id) }}"
                                        style="display:inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn delete-outlet btn-danger"
                                            onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"
                                                style="color:reda"></i></button> &nbsp;
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
        {{-- end data paket --}}

        <div class="card-footer">

        </div>
        </div>
    </section>
    </div>


    <!-- /page content -->
@endsection
@include('penjemputan/form2')
@push('script')
    <script>
        console.log('javas')
        $(function() {
            console.log('function')
            //data Table
            //     $('tbl-barang').DataTable()

            //     //menghapus alert
            //     $("#succes-alert").fadeTo(2000, 500).slideUp(500, function(){
            //         $("#succes-alert").slideUp(500);
            //     });
            //     $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
            //         $("#succes-alert").slideUp(500);
            //     });

            //     delete barang
            //      $('.delete-barang').click(function(e){
            //          e.prevenDefault()
            //          let data = $(this).closest('tr').find('td:eq(1)').text()
            //          swal({
            //              title ="Apakah kamu yakin?",
            //              text ="Data"+data+"akan dihapus?",
            //              icon ="warning",
            //              buttons = true,
            //              dangermode = true,
            //          })
            //          .then((req) => {
            //              if(req) $(e.target).closest('form').submit()
            //              else swal.close()
            //          })
            //      })

            $('#tbl-outlet').on('change', '.status', function() {
                let status = $(this).closest('tr').find('.status').val()
                let id = $(this).closest('tr').find('.id').val()
                let data = {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                };
                $.post('{{ route('status') }}', data, function(msg) {
                    alert('Status Penjemputan Berhasil Diubah !')
                })
                console.log(status)
                console.log(data)
            })

            $('#formInputModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget)
                console.log(button)
                console.log('modaaaal')
                let id = button.data('id')
                let nama = button.data('nama')
                let alamat = button.data('alamat')
                let tlp = button.data('tlp')
                let mode = button.data('mode')
                let modal = $(this)
                if (mode === "edit") {
                    modal.find('.modal-title').text('Edit Data Outlet')
                    modal.find('.modal-body #nama').val(nama)
                    modal.find('.modal-body #alamat').val(alamat)
                    modal.find('.modal-body #tlp').val(tlp)
                    modal.find('.modal-footer #btn-submit').text('Update')
                    modal.find('.modal-body #method').html('{{ method_field('patch') }}')
                    modal.find('.modal-body form').attr('action', 'outlet/' + id)
                } else {
                    modal.find('.modal-title').text('Input Data Outlet')
                    modal.find('.modal-body #nama').val('')
                    modal.find('.modal-body #alamat').val('')
                    modal.find('.modal-body #tlp').val('')
                    modal.find('.modal-body #method').html("")
                    modal.find('.modal-footer #btn-submit').text('Submit')
                }
            })
        });

        $(function() {
            // property
            dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            $('#tbl-outlet tbody').html(showData(dataBuku))
            // Initialize
            // Events
            $('#formBuku').on('submit', function(e) {
                e.preventDefault()
                dataBuku.push(insert())
                $('#tbl-outlet tbody').html(showData(dataBuku))
                console.log(dataBuku);
            })

            $('#btnSearch').on('click', function(e) {
                let textSearch = $('#search').val();
                let id = searching(dataBuku, 'nama', textSearch);
                let data = [];
                if (id >= 0)
                    data.push(dataBuku[id]);
                console.log(id);
                console.log(data);
                $('#tbl-outlet tbody').html(showData(data));
            });


        })

        // Search fn
        function searching(arr, key, text) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == text) {
                    return i;
                }
            }
            return -1;
        }

        function tired() {
            if (capek) {
                tidur()
            } else if (tunduh) {
                sare()
            } else if (ngantuk) {
                turu()
            } else {
                mabar()
            }
        };
    </script>
@endpush
