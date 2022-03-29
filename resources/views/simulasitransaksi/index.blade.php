@extends('templates.header')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Simulasi Transaksi Cucian</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="formTransaksi" class="form-horizontal">
                        <div class="row" class="col-12">

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">No Transaksi</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="id_transaksi" name="id_transaksi"
                                        maxlength="1" size="3">
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-controller" id="nama_pelanggan" name="nama_pelanggan">
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">No HP/WA</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="no_hp" name="no_hp" maxlength="1"
                                        size="1">
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Beli</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-controller" id="{{ date('Y-m-d') }}" name="tgl">
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Cucian</label>
                                <div class="col-sm-6">
                                    <select class="form-controller" name="jenis_cucian" id="jenis_cucian">
                                        <option value="standar">Standar</option>
                                        <option value="express">Express</option>
                                    </select>
                                </div>
                            </div>

                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Berat</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="berat" name="berat" maxlength="1"
                                        size="1" step="0.1"> Kg
                                </div>
                            </div>

                            <div class="ml-4">
                                <button id="btn-submit" type="submit" class="btn btn-primary">Input</button>
                            </div>
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
                    </div>
                    <input type="search" class="form-control mr-sm-2" name="search" id="search">
                    <button class="btn btn-success my-2 my-sm-0" type=" button" id="btnSearch">Cari</button>
                </div>

                <div>
                    <table class="table table-compact table-stripped table-bordered" id="tblTransaksi">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Kontak</th>
                                <th>Tanggal Cuci</th>
                                <th>Jenis Cucian</th>
                                <th>Berat</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
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
        <div class="card-footer"></div>
        </div>
    </section>
    </div>
@endsection

@push('script')
    <script>
        // menyiapkan dokumen agar siap ketika halaman di-load
        $(document).ready(function() {
            // membuat variabel dataTransaksi untuk menampung data dari localStorage
            let dataTransaksi;
            // mengisi variabel dataTransaksi dan dengan data yang ada di localStorage
            dataTransaksi = JSON.parse(localStorage.getItem('dataTransaksi')) || []
            $(function() {
                // memanggil fungsi menampilkan dataTransaksi dan mengirimkan dataTransaksi 
                $('#tblTransaksi tbody').html(showData(dataTransaksi))
                // event ketika formTransaksi di-submit dan memasukan data dari formTransaksi ke dalam localStorage sekaligus menampilkan data dari localStorage ke dalam tabel tblTransaksi
                $('#formTransaksi').on('submit', function(e) {
                    e.preventDefault()
                    dataTransaksi.push(insert())
                    $('#tblTransaksi tbody').html(showData(dataTransaksi))
                })

                $('#sorting').on('click', function() {
                    data = insertionSort(dataTransaksi, 'id_transaksi', 'asc')
                    console.log(data)

                    data && $('#tblTransaksi tbody').html(showData(dataTransaksi))
                })

                $('#btnSearch').on('click', function(e) {
                    let textSearch = $('#search').val();
                    let id = searching(dataTransaksi, 'id_transaksi', textSearch);
                    let data = [];
                    if (id >= 0)
                        data.push(dataTransaksi[id]);
                    $('#tblTransaksi tbody').html(showData(data));
                });
            })


            // methods
            function insert() {
                // membuat variabel const untuk menampung data yang diinputkan dari formTransaksi,
                // dan mengubah data yang diinputkan menjadi array
                const data = $('#formTransaksi').serializeArray()
                // variable dataTransaksi untuk menampung data dari localStorage
                let dataTransaksi = JSON.parse(localStorage.getItem('dataTransaksi')) || []
                // membuat variabel newData
                let newData = {}
                data.forEach(function(item, index) {
                    let name = item['name']
                    let value = (name === 'id_transaksi' ||
                        name === 'berat' ||
                        name === 'diskon' ?
                        Number(item['value']) : item['value'])
                    newData[name] = value
                })

                localStorage.setItem('dataTransaksi', JSON.stringify([...dataTransaksi, newData]))
                return newData
                JSON.parse(localStorage.getItem('dataTransaksi'))
            }



            // Tampilkan Data
            function showData(arr = []) {
                let row = ''
                // menenentukan nilai persentase diskon
                const persen = 0.1
                var total_harga = 0
                var diskon = 0
                var berat = 0
                var tBerat = 0
                var tDiskon = 0
                var harga = 0
                var tTotal = 0
                if (arr.length == 0) {
                    return row = `<tr><td colspan ="6" align="center">Belum ada data</td></tr>`
                }

                // menampilkan data dari localStorage ke dalam tabel tblTransaksi
                arr.forEach(function(item, index) {

                    // membuat variabel berat untuk menampung data berat
                    let berat = Number(item['berat'])
                    // membuat variabel jenis_cuci untuk menampung data jenis_cuci
                    let jenis = item['jenis_cucian']

                    // pengkondisian untuk menentukan harga
                    if (jenis == 'standar') {
                        harga = 7500
                    } else {
                        harga = 10000
                    }
                    // Mencari total harga
                    total_harga = harga * berat

                    // Menentukan Diskon
                    // jika total_harga lebih besar sama dengan dari 50000 maka diskon 10%
                    if (total_harga >= 50000) {
                        diskon = total_harga * persen
                        total_harga = total_harga - diskon
                    }

                    // Mencari Total semua data
                    tBerat += berat
                    tDiskon += diskon
                    tTotal += total_harga

                    row += `<tr>`
                    row += `<td>${item['id_transaksi']}</td>`
                    row += `<td>${item['nama_pelanggan']}</td>`
                    row += `<td>${item['no_hp']}</td>`
                    row += `<td>${item['tgl']}</td>`
                    row += `<td>${item['jenis_cucian']}</td>`
                    row += `<td>${item['berat']}</td>`
                    row += `<td>${diskon}</td>`
                    row += `<td>${total_harga}</td>`
                    row += `</tr>`

                })
                row +=
                    `<tr style="background:black;color:white;font-weight:bold;font-size:1em">
                <td colspan="5" align="center">TOTAL</td>
                <td><span id="total">${tBerat}</span></td>
                <td><span id="total">${tDiskon}</span></td>
                <td><span id="total">${tTotal}</span></td>
            </tr>`
                return row
            }

            // membuat fungsi insertionSort untuk mengurutkan data dari dataTransaksi
            function insertionSort(arr, key, type) {
                // membuat variable i untuk mengulangi perulangan
                let i, j, id, value;
                // variable tipe diisi dengan asc atau desc
                type = type === 'asc' ? '>' : '<'
                // jika variable arr index 0 tidak sama dengan objek atau bukan key,
                // maka kembalikan hasil false dan tidak melakukan perulangan
                if (arr[0].constructor !== Object || !key) return false
                // mengulangi perulangan sebanyak arr.length
                for (i = 1; i < arr.length; i++) {
                    // mengambil nilai dari arr index i
                    value = arr[i];
                    // variable id diisi dengan nilai dari arr index i
                    id = arr[i][key]
                    //variable j diisi dengan nilai i - 1
                    j = i - 1;
                    // pengulangan sebanyak j yang bernilai true
                    while (j >= 0 && eval(arr[j][key] > id)) {
                        // lakukan perulangan sebanyak j ditaruh di arr index j + 1
                        arr[j + 1] = arr[j];
                        // variable j berkurang 1
                        j = j - 1;
                    }
                    // variable j diisi dengan nilai j + 1
                    arr[j + 1] = value;
                }
                return arr
            }

            // Searching
            // fungsi searching untuk mencari data berdasarkan varibel, dan jika ditemukan,
            // maka akan mengembalikan index dari data yang dicari
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
        });
    </script>
@endpush
