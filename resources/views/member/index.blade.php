<title>Yakuza 3 | Member</title>
@extends('templates/header')

@section('content')
    <!-- page content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Member</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputModal">
                    Tambah Member
                </button>
                {{-- Export Excel --}}
                <a href="{{ route('export-penggunaanbarang') }}" class="btn btn-primary">
                    <i class="fa fa-file-excel"></i> Export
                </a>
                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#FormImport"
                    style="color:white">
                    <i class="fa fa-file-excel"></i> Import
                </button>

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
                    @include('member/list-all')
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
    </div>
    <!-- /page content -->
@endsection
@include('member/form')
@push('script')
    <script>

    </script>
@endpush
