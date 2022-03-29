@extends('templates.header')
@section('content')
    <!--Content Header (Page beader)-->

    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    <!--Main content-->
    <section class="content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample1">Data Laundry</a> {{-- Collapse --}}
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="na v-form" data-toggle="collapse" href="#formLaundry" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample1">&nbsp;&nbsp; Cucian Baru</a>
            </li>
        </ul>
        <div class="card" style="border-top:0px"> {{-- Card --}}
            @if ($errors->any())
                <div class="card-body">
                    <div class="alert alert-danger alaert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-succes" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="post" action="{{ url(request()->segment(1) . '/transaksi') }}">
                @csrf
                @include('transaksi.data')
                @include('transaksi.form')
                <input type="hidden" name="id_pengguna" id="id_pengguna">
            </form>
        </div>
    </section>
    <!--Content-->
@endsection

@push('script')
    <script>
        // Script untuk #menu data dan form transaksi
        $('#dataLaundry').collapse('show')

        $('#dataLaundry').on('show.bs.collapse', function() {
            $('#formLaundry').collapse('hide');
            $('#nav-form').removeClass('active');
            $('#nav-data').addClass('active');
        });

        $('#formLaundry').on('show.bs.collapse', function() {
            $('#dataLaundry').collapse('hide');
            $('#nav-data').removeClass('active');
            $('#nav-form').addClass('active');
        })
        //End Menu

        // instialize
        let subtotal = total = 0;
        $(function() {
            $('#tbl-member').DataTable();
            $('#tbl-paket').DataTable();
        })
        // end intialize

        //pilihan Member 
        $('#tbl-member').on('click', '.PilihMember', function() {
            pilihMember(this)
            $('#member').modal('hide')
        })
        //pilih paket 
        $('#tbl-paket').on('click', '.PilihPaket', function() {
            pilihPaket(this)
            $('#modalPaket').modal('hide')
        })
        //onchange qty
        $('#tblTransaksi').on('change', '.qty', function() {
            hitungTotalAkhir(this)
        })
        //function pilih member
        function pilihMember(x) {
            const tr = $(x).closest('tr')
            const namaJk = tr.find('td:eq(1)').text() + "/" + tr.find('td:eq(2)').text()
            const biodata = tr.find('td:eq(4)').text() + "/" + tr.find('td:eq(3)').text()
            const idMember = tr.find('.idMember').val()

            $('#nama-pelanggan').text(namaJk)
            $('#biodata-pelanggan').text(biodata)
            $('#id_pengguna').val(idMember)
        }


        //function pilih paket
        function pilihPaket(x) {
            const tr = $(x).closest('tr')
            const nama_paket = tr.find('td:eq(1)').text()
            const harga = tr.find('td:eq(2)').text()
            const idPaket = tr.find('.idPaket').val()

            let data = ''
            let tbody = $('#tblTransaksi tbody tr td').text()
            data += '<tr>'
            data += `<td> ${nama_paket} </td>`
            data += `<td> ${harga} </td>`;
            data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
            data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
            data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
            data += `<td><button type="button" class="btnRemovePaket btn btn-danger">Hapus</button></td>`;
            data += '<tr>';
            if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();
            $('#tblTransaksi tbody').append(data);
            subtotal += Number(harga)
            let pajak = 0.35 * Number(subtotal);
            $('#pajak-harga').text(pajak)
            $('#pajak-persen').val(pajak)
            total = subtotal - Number($('#pajak-harga').val()) + Number(pajak)
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        }

        //function hitung total
        function hitungTotalAkhir(a) {
            let qty = Number($(a).closest('tr').find('.qty').val());
            let harga = Number($(a).closest('tr').find('td:eq(1)').text());
            let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
            let count = qty * harga;
            let pajak = 0.35 * Number(subtotal);
            subtotal = subtotal - subTotalAwal + count
            total = subtotal + Number($('#pajak-harga').val()) + Number(pajak)
            $(a).closest('tr').find('.subTotal').text(count)
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        }

        // remove paket
        $('#tblTransaksi').on('click', '.btnRemovePaket', function() {
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
            subtotal -= subTotalAwal
            total -= subTotalAwal;
            $currentRow = $(this).closest('tr').remove();
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        })
    </script>
@endpush
