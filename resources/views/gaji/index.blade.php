@extends('templates.header')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">Simulasi Gaji Karyawan</h3>
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
                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-controller" id="nama_karyawan" name="nama_karyawan">
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-6">
                                    <input type="radio" class="form-controller" id="jenis_kelamin" name="jenis_kelamin"
                                        value="Laki-Laki">Laki-Laki
                                    <input type="radio" class="form-controller" id="jenis_kelamin" name="jenis_kelamin"
                                        value="Perempuan">Perempuan
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Status Menikah</label>
                                <div class="col-sm-6">
                                    <select class="form-controller" name="status_menikah" id="status_menikah">
                                        <option selected>Single</option>
                                        <option>Couple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Anak</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-controller" id="jumlah_anak" name="jumlah_anak"
                                        maxlength="1" size="1">
                                </div>
                            </div>
                            <div class="from-group row col-6">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-controller" id="{{ date('Y-m-d') }}" name="tgl">
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
                    </div>
                    <input type="search" class="form-control mr-sm-2" name="search" id="search">
                    <button class="btn btn-success my-2 my-sm-0" type=" button" id="btnSearch">Cari</button>
                </div>
                <div>
                    <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Status</th>
                                <th>jml Anak</th>
                                <th>Mulai Bekerja</th>
                                <th>Gaji Awal</th>
                                <th>Tunjangan</th>
                                <th>Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" align="center">Belum Ada Data</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="background:black;color:white;font-weight:bold;font-size:1em">
                                <td colspan="6" align="center">TOTAL</td>
                                <td><span id="total">0</span></td>
                                <td><span id="total">0</span></td>
                                <td><span id="total">0</span></td>
                            </tr>
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
        // After Load
        $(function() {
            // property
            dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            $('#tblKaryawan tbody').html(showData(dataKaryawan))
            // Initialize
            // Events
            $('#FormKaryawan').on('submit', function(e) {
                e.preventDefault()
                dataKaryawan.push(insert())
                $('#tblKaryawan tbody').html(showData(dataKaryawan))
                let Tanggal = $('#tgl').val();
                let id = (dataKaryawan, 'tgl', Tanggal);
                let data = []
                alert(id)
                alert(data)
                //alert(_calculateAge(tgl))
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
        })

        // methods
        function insert() {
            const data = $('#FormKaryawan').serializeArray()
            let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            let newData = {}
            data.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id_karyawan' ||
                    name === 'jumlah_anak' ?
                    Number(item['value']) : item['value'])
                newData[name] = value
            })
            console.log(newData)

            localStorage.setItem('dataKaryawan', JSON.stringify([...dataKaryawan, newData]))
            return newData
            JSON.parse(localStorage.getItem('dataKaryawan'))
        }



        // Tampilkan Data
        function showData(arr = []) {
            let row = ''
            // let arr = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            if (arr.length == 0) {
                return row = `<tr><td colspan ="6" align="center">Belum ada data</td></tr>`
            }

            function _calculateAge(birthday) {
                birthday = new Date(birthday)
                var ageDifMs = Date.now() - birthday.getTime();
                var ageDate = new Date(ageDifMs);
                return Math.abs(ageDate.getUTCFullYear(1970 - 0));
            }

            function tunjanganMasaKerja(lama) {
                tunjanganB = lama * 150000
                console.log(lama)
            }

            arr.forEach(function(item, index) {
                row += `<tr>`
                row += `<td>${item['id_karyawan']}</td>`
                row += `<td>${item['nama_karyawan']}</td>`
                row += `<td>${item['jenis_kelamin']}</td>`
                row += `<td>${item['status_menikah']}</td>`
                row += `<td>${item['jumlah_anak']}</td>`
                row += `<td>${item['tgl']}</td>`
                row += `<td>2.000.000</td>`
                row += `</tr>`

            })
            return row
        }

        // inserting to an array
        function insertionSort(arr, key, type) {
            let i, j, id, value;
            type = type === 'asc' ? '>' : '<'

            if (arr[0].constructor !== Object || !key) return false
            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && eval(arr[j][key] > id)) {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }
            return arr
        }



        // Search fn
        function searching(arr, key, text) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == text) {
                    return i;
                }
            }
            return -1;
        }
    </script>
@endpush
