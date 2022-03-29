@extends('templates/header')

@section('content')
    <!-- page content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Penggunaan Barang</h3>
            </div>
            <div class="card-body">
                <div class="card-body form-inline my-2 my-lg-0">
                    <div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataBarang">
                            <i class="fas fa-plus"></i> Tambah data
                        </button>
                        {{-- Export Excel --}}
                        <a href="{{ route('export-penggunaanbarang') }}" class="btn btn-primary">
                            <i class="fa fa-file-excel"></i> Export
                        </a>
                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#FormImport"
                            style="color:white">
                            <i class="fa fa-file-excel"></i> Import
                        </button>
                        {{-- Export PDF --}}
                        <a href="{{ route('exportPDF-penggunaanbarang') }}" style="color:white" target="_blank">
                            <button class="btn btn-danger" type="button">
                                <i class="fa fa-file-excel"></i>Export PDF
                            </button>
                        </a>
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
                    @include('penggunaanbarang/list-all')
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
@include('penggunaanbarang/form')
@push('script')
    <script>
        $(function() {
            $('#tbl-outlet').DataTable();
        });

        $('#tbl-outlet').on('change', '.status', function() {
            let status = $(this).closest('tr').find('.status').val()
            let id = $(this).closest('tr').find('.id').val()
            let data = {
                id: id,
                status: status,
                _token: "{{ csrf_token() }}"
            };
            $.post('{{ route('status') }}', data, function(msg) {
                alert('Status Berhasil Diubah !')
            })
            console.log(status)
            console.log(data)
        });
    </script>
@endpush
