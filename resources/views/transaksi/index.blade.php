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
            {{-- @if (session('success'))
                <div class="alert alert-success "> --}}

        </div>
        <div class="card" style="border-top:0px"> {{-- Card --}}
            <form method="post" action="{{ url(request()->segment(1) . '/transaksi') }}">
                @csrf
                @include('transaksi.form')
                @include('transaksi.data')
                <input type="hidden" name="id_member" id="id_member">
            </form>
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

        // Initialize
        let subtotal = total = 0;
        $(function() {
            $('#tblMember').DataTable();
        })
        //end initialize

        // Pemilihan member
        $('#tblMember').on('click', '.pilihMemberBtn', function() {
            pilihMember(this)
            $('#modalMember').modal('hide')
        })
        //

        // Pemilihan Paket
        $('#tblPaket').on('click', '.pilihPaketBtn', function() {
            pilihPaket(this)
            $('#modalPaket').modal('hide')
        })
        //
        //Function pilih Member
        function pilihMember(x) {
            const tr = $(x).closest('tr')
            const namaJk = tr.find('td:eq(1)').text() + "/" + tr.find('td:eq(2)').text()
            const biodata = tr.find('td:eq(4)').text() + "/" + tr.find('td:eq(3)').text()
            const idMember = tr.find('.idMember').val()
            $('#nama-pelanggan').text(namaJk)
            $('#biodata-pelanggan').text(biodata)
            $('#id_member').val(idMember)
        }
        //

        //Function pilih Paket
        function pilihPaket(x) {
            const tr = $(x).closest('tr')
            const namaPaket = tr.find('td:eq(1)').text()
            const harga = tr.find('td:eq(2)').text()
            const idPaket = tr.find('.idPaket').val()

            let data = ''
            let tbody = $('#tblTransaksi tbody tr td').text()
            data += '<tr>'
            data += `<td class="text-center"> ${namaPaket} </td>`
            data += `<td class="text-center"> ${harga}</td>`;
            data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
            data +=
                `<td class="text-center"><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
            data += `<td class="text-center"><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
            data +=
                `<td class="text-center"><button type="button" class="btnRemovePaket"><span class="fas fa-times-circle"></span></button></td>`;
            data += '</tr>';

            if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr ').remove();

            $('#tblTransaksi tbody').append(data);

            subtotal += Number(harga)
            total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        }

        // onchange qty
        $('#tblTransaksi').on('change', '.qty', function() {
            hitungTotalAkhir(this)
        })

        //function hitung total 
        function hitungTotalAkhir(a) {
            let qty = Number($(a).closest('tr').find('.qty').val());
            let harga = Number($(a).closest('tr').find('td:eq(1)').text());
            let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
            let count = qty * harga;
            subtotal = subtotal - subTotalAwal + count
            total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())

            $(a).closest('tr').find('.subTotal').text(count)
            $('#subtotal').text(subtotal)
            $('#total').text(total)
        }
        //



        //remove paket
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
