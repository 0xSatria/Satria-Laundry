@extends('templates.header')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Simulasi Transaksi Barang</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="FormKaryawan" class="form-horizontal">
                        <div class="row" class="col-12">
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">ID Karyawan</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="id_karyawan" name="id_karyawan"
                                        maxlength="1" size="1">
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Beli</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-controller" id="{{ date('Y-m-d') }}" name="tgl">
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-6">
                                    <select class="form-controller" name="nama_barang" id="nama_barang">
                                        <option selected value="Detergen">Detergen</option>
                                        <option value="Pewangi">Pewangi</option>
                                        <option value="Detergen Sepatu">Detergen Sepatu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Harga Barang</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-controller" id="harga_barang" name="harga_barang"
                                        readonly>
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="jumlah" name="jumlah" maxlength="1"
                                        size="1">
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Pembayaran</label>
                                <div class="col-sm-6">
                                    <input type="radio" class="form-controller" id="jenis_pembayaran" value="cash"
                                        name="jenis_pembayaran">Cash
                                    <input type="radio" class="form-controller" id="jenis_pembayaran"
                                        value="e-money/transfer" name="jenis_pembayaran">e-money/transfer
                                </div>
                            </div>




                            {{-- <div class="form-group row col-6">
                                <label for="inputPassword" class="col-4 col-form-label">Estimasi Selesai</label>
                                <div class="col-6 ml-auto">
                                    <input type="date" class="form-control ml-auto"
                                        id="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+3 day')) }}" name="batas_waktu">
                                </div>
                            </div> --}}

                            <div class="ml-4">
                                {{-- <input type=" hidden"> --}}
                                <button id="btn-submit" type="submit" class="btn btn-primary">Input</button>
                            </div>

                            {{-- </div>
                        <div class="row" class="col-12">
                            <div class="form-group row col-6">
                                <label for="" class="col-sm-4 col-form-label"><button type="button"
                                        class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalMember"><i
                                            class="fas fa-plus"></i></button> Tambahkan </label>
                                <div class="col-sm-6" id="nama-pelanggan">
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row col-6">
                                <label for="" class="col-4 col-form-label">Biodata</label>
                                <div class="col-6 ml-auto" id="biodata-pelanggan">
                                    -
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            {{-- end data awal pelanggan --}}

            <div class="card">
                <div class="card-body form-inline my-2 my-lg-0">
                    @csrf
                    <div class="form-group col-sm-9">
                        <button class="btn btn-success" type="button" name="sorting" id="sorting">Urutkan</button>
                        <div class="col-sm-6">
                            <span class="col-sm-1"></span>
                            <input type="checkbox" class="form-controller" id="filter-cash" value="cash">Cash
                            <span class="col-sm-1"></span>
                            <input type="checkbox" class="form-controller" id="filter-emoney"
                                value="e-money/transfer">e-money/transfer
                        </div>
                    </div>
                    <input type="search" class="form-control mr-sm-2" name="search" id="search">
                    <button class="btn btn-success my-2 my-sm-0" type=" button" id="btnSearch">Cari</button>
                </div>
                <div>
                    <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Beli</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                                <th>Jenis Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" align="center">Belum Ada Data</td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        {{-- End Modal Member --}}

        <div class="card-footer">
        </div>

        </div>
    </section>
    </div>
@endsection

@push('script')
    <script>
        // menyiapkan dokumen agar siap ketika halaman di-load
        $(document).ready(function() {
            // membuat variabel dataKaryawan untuk menampung data dari localStorage
            let dataKaryawan;
            // membuat variabel dilterDataBarang untuk menampung data dari hasil filter
            let filterDataBarang;
            // mengisi variabel dataKaryawan dan filterDataBarang dengan data yang ada di localStorage
            dataKaryawan = filterDataBarang = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            $(function() {
                // memanggil fungsi menampilkan DataKaryawan dan mengirimkan dataKaryawan 
                $('#tblKaryawan tbody').html(showData(dataKaryawan))
                // event ketika FormKaryawan di-submit dan memasukan data dari FormKaryawan ke dalam localStorage sekaligus menampilkan data dari localStorage ke dalam tabel tblKaryawan
                $('#FormKaryawan').on('submit', function(e) {
                    e.preventDefault()
                    dataKaryawan.push(insert())
                    $('#tblKaryawan tbody').html(showData(dataKaryawan))
                })

                $('#nama_barang').on('change', function() {
                    let value = $('#nama_barang').val()
                    if (value == 'Detergen') {
                        $('#harga_barang').val(15000)
                        $('#harga_barang').attr('readonly', true)
                    } else if (value == 'Pewangi') {
                        $('#harga_barang').val(10000)
                        $('#harga_barang').attr('readonly', true)
                    } else if (value == 'Detergen Sepatu') {
                        $('#harga_barang').val(25000)
                        $('#harga_barang').attr('readonly', true)
                    }
                })

                $('#sorting').on('click', function() {
                    data = insertionSort(dataKaryawan, 'id_karyawan', 'asc')
                    console.log(data)

                    data && $('#tblKaryawan tbody').html(showData(dataKaryawan))
                })

                $('#btnSearch').on('click', function(e) {
                    let textSearch = $('#search').val();
                    let id = searching(dataKaryawan, 'id_karyawan', textSearch);
                    let data = [];
                    if (id >= 0)
                        data.push(dataKaryawan[id]);
                    console.log(id);
                    console.log(data);
                    $('#tblKaryawan tbody').html(showData(data));
                });

                console.log(showData)
            })


            // methods
            function insert() {
                const data = $('#FormKaryawan').serializeArray()
                // variable dataKaryawan untuk menampung data dari localStorage
                let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
                let newData = {}
                data.forEach(function(item, index) {
                    let name = item['name']
                    let value = (name === 'id_karyawan' ||

                        name === 'diskon' ||
                        name === 'jumlah' ?
                        Number(item['value']) : item['value'])
                    newData[name] = value
                })

                localStorage.setItem('dataKaryawan', JSON.stringify([...dataKaryawan, newData]))
                return newData
                JSON.parse(localStorage.getItem('dataKaryawan'))
            }



            // Tampilkan Data
            function showData(arr = []) {
                let row = ''
                const persen = 0.15
                var total_harga = 0
                var diskon = 0
                var tHarga = 0
                var tjumlah = 0
                var tDiskon = 0
                var tTotal = 0
                if (arr.length == 0) {
                    return row = `<tr><td colspan ="6" align="center">Belum ada data</td></tr>`
                }

                arr.forEach(function(item, index) {

                    let harga = Number(item['harga_barang'])
                    let jumlah = Number(item['jumlah'])

                    // Mencari Total Jumlah Barang
                    total_harga = harga * jumlah

                    // Menentukan Diskon
                    if (total_harga >= 50000) {
                        diskon = total_harga * persen
                        total_harga = total_harga - diskon
                    }

                    // Mencari Total
                    tHarga += harga
                    tjumlah += jumlah
                    tDiskon += diskon
                    tTotal += total_harga

                    row += `<tr>`
                    row += `<td>${item['id_karyawan']}</td>`
                    row += `<td>${item['tgl']}</td>`
                    row += `<td>${item['nama_barang']}</td>`
                    row += `<td>${item['harga_barang']}</td>`
                    row += `<td>${item['jumlah']}</td>`
                    row += `<td>${diskon}</td>`
                    row += `<td>${total_harga}</td>`
                    row += `<td>${item['jenis_pembayaran']}</td>`
                    row += `</tr>`

                })
                row +=
                    `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="3" align="center">TOTAL</td>
                <td><span id="total">${tHarga}</span></td>
                <td><span id="total">${tjumlah}</span></td>
                <td><span id="total">${tDiskon}</span></td>
                <td colspan="2"><span id="total">${tTotal}</span></td>
            </tr>`
                return row
            }

            // membuat fungsi insertionSort untuk mengurutkan data dari dataKaryawan
            function insertionSort(arr, key, type) {
                //membuat variable i untuk mengulangi perulangan
                let i, j, id, value;
                //variable tipe diisi dengan asc atau desc
                type = type === 'asc' ? '>' : '<'
                //jika variable arr index 0 tidak sama dengan objek atau bukan key, maka kembalikan hasil false dan tidak melakukan perulangan
                if (arr[0].constructor !== Object || !key) return false
                //mengulangi perulangan sebanyak arr.length
                for (i = 1; i < arr.length; i++) {
                    //mengambil nilai dari arr index i
                    value = arr[i];
                    // variable id diisi dengan nilai dari arr index i
                    id = arr[i][key]
                    //variable j diisi dengan nilai i - 1
                    j = i - 1;
                    // pengulangan sebanyak j yang bernilai true
                    while (j >= 0 && eval(arr[j][key] > id)) {
                        //lakukan perulangan sebanyak j ditaruh di arr index j + 1
                        arr[j + 1] = arr[j];
                        //variable j berkurang 1
                        j = j - 1;
                    }
                    // variable j diisi dengan nilai j + 1
                    arr[j + 1] = value;
                }
                return arr
            }



            // Search fn
            // fungsi searching untuk mencari data berdasarkan varibel, dan jika ditemukan, maka akan mengembalikan index dari data yang dicari
            function searching(arr, key, text) {
                // pengulangan sebanyak arr.length
                for (let i = 0; i < arr.length; i++) {
                    // jika arr index i memiliki key yang sama dengan text, maka kembalikan nilai i
                    if (arr[i][key] == text) {
                        // mengembalikan nilai i
                        return i;
                    }
                }
                // jika tidak ditemukan, kembalikan nilai not found
                return 'not found';
            }

            // fungsi untuk memfilter cash dan emoney
            function filterCashAndEmoney(data) {
                if ($('#filter-cash').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'cash';
                    });
                }

                if ($('#filter-emoney').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'e-money/transfer';
                    });
                }

                if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
                    data = data.filter(item => {
                        return item.jenis_pembayaran === 'cash' || item.jenis_pembayaran ===
                            'e-money/transfer';
                    });
                }

                return data;
            }

            // fungsi untuk memfilter data cash dan emoney dan menampilkan datanya sekaligus
            function filterData(keyword) {
                filterDataBarang = filterCashAndEmoney(dataKaryawan);
                filterDataBarang = filterDataBarang.filter(item => {
                    return item.nama_barang.toLowerCase().includes(keyword.toLowerCase());
                });
                $('#tblKaryawan tbody').html(showData(filterDataBarang));
            }

            // jalankan fungsi filterData ketika 2 checbox ditekan
            $('#filter-cash, #filter-emoney').on('change', function() {
                if ($('#filter-cash').is(':checked') && $('#filter-emoney').is(':checked')) {
                    $('#tblKaryawan tbody').html(showData(dataKaryawan));
                } else {
                    filterData('');
                }
            });

        });
    </script>
@endpush
