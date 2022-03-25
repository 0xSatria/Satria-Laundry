@extends('templates/header')

@section('content')
    <!-- page content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
            </div>
            <div class="card-body">
                <div class="card-body form-inline my-2 my-lg-0">
                    <div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataBarang">
                            <i class="fas fa-plus"></i> Tambah data
                        </button>

                        {{-- Export Excel --}}
                        <a href="{{ route('export-barang') }}" class="btn btn-primary">
                            <i class="fa fa-file-excel"></i> Export
                        </a>
                    </div>

                    {{-- Import Excel --}}
                    <div class="col-sm-6">
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
                    @include('databarang/list-all')
                </div>
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
@include('databarang/form')
@push('script')
    <script>
        $(function() {

            // status konfirmasi ubah status
            $('.changeStatus').on('change', function(e) {
                swal({
                        title: "Apakah kamu yakin ingin menggantinya?",
                        text: "Status tersebut akan diganti",
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    })
                    .then((req) => {
                        if (req) $(e.target).closest('form').submit()
                        else swal.close()
                    })
            });

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
