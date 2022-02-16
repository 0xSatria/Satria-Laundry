@extends('templates.header')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transaksi</h3>
            </div>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button"
                        aria-expanded="false" aria-controls="multiCollapseExample1">Data Laundry</a> {{-- Collapse --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="nav-form" data-toggle="collapse" href="#formLaundry" role="button"
                        aria-expanded="false" aria-controls="multiCollapseExample1">&nbsp;&nbsp; Cucian Baru</a>
                </li>
            </ul>
            <div class="card" style="border-top:0px"> {{-- Card --}}
                @include('Transaksi.form')
                @include('Transaksi.data')
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
    </div>
@endsection

@push('script')
    <script>
        // Script untuk #menu data dan form transaksi
        // $('#dataLaundry').collapse('show')

        $('#dataLaundry').on('show.bs.collapse', function() {
            $('#formLaundry').collapse('hide');
            $('#nav-form').removeClass('active');
            $('#nav-data').addClass('active');
        })

        $('#formLaundry').on('show.bs.collapse', function() {
            $('#dataLaundry').collapse('hide');
            $('#nav-data').removeClass('active');
            $('#nav-form').addClass('active');
        })
    </script>
@endpush
