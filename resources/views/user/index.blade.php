@extends('templates/header')

@section('content')
    <!-- page content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User</h3>
            </div>
            <div class="card-body">
                <a href="register" target="_blank" rel="noopener noreferrer">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Register
                    </button>
                </a>

                {{-- Export Excel --}}

                <a href="{{ route('export-paket') }}" class="btn btn-success">
                    <i class="fa fa-file-excel"></i> Export
                </a>

                {{-- Import Excel --}}
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#FormImport">
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
                    @include('user/list-all')
                </div>
            </div>
        </div>
    </section>


    <!-- /page content -->
@endsection
{{-- @include('user/form') --}}
@push('script')
    <script>

    </script>
@endpush
