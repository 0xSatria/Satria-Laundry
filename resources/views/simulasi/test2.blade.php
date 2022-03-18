@extends('templates.header')
<title>test2</title>
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form</h3>
            </div>
            <div class="card-body">
                <!-- /.card -->
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Horizontal Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formBuku" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="id_buku" class="col-sm-2 col-form-label">Id Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_buku" name="id_buku"
                                        placeholder="Id Buku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                                        placeholder="Judul Buku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pengarang" name="pengarang"
                                        placeholder="Pengarang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tahun_terbit" id="tahun_terbit">
                                        <option selected>Open this select menu</option>
                                        {{ $last = date('Y') - 120 }}
                                        {{ $now = date('Y') }}

                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    {{-- <input type="email" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga_buku" class="col-sm-2 col-form-label">Harga Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="harga_buku" name="harga_buku"
                                        placeholder="Harga Buku">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="qty" name="qty" placeholder="Qty">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                        placeholder="Password">
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button id="btn-submit" type="submit" class="btn btn-info">Submit</button>
                            <button id="btn-reset" type="reset" class="btn btn-danger">Reset</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data</h3>
            </div>
            <div class="card-body form-inline my-2 my-lg-0">
                @csrf
                <div class="form-group col-sm-9">
                    <button class="btn btn-info" type="button" name="sorting" id="sorting">Sorting</button>
                </div>
                <input type="search" class="form-control mr-sm-2" name="search" id="search">
                <button class="btn btn-success my-2 my-sm-0" type=" button" id="btnSearch">Cari</button>
            </div>
            <div>
                <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                    <thead class="table-primary">
                        <tr>
                            <th>Id Buku </th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>Harga</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" align="center">Belum Ada Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // After Load
        $(function() {
            // property
            dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            $('#tblKaryawan tbody').html(showData(dataBuku))
            // Initialize
            // Events
            $('#formBuku').on('submit', function(e) {
                e.preventDefault()
                dataBuku.push(insert())
                $('#tblKaryawan tbody').html(showData(dataBuku))
                console.log(dataBuku);
            })

            $('#sorting').on('click', function() {
                data = insertionSort(dataBuku, 'id_buku', 'asc')
                console.log(data)

                data && $('#tblKaryawan tbody').html(showData(dataBuku))
            })

            $('#btnSearch').on('click', function(e) {
                let textSearch = $('#search').val();
                let id = searching(dataBuku, 'id_buku', textSearch);
                let data = [];
                if (id >= 0)
                    data.push(dataBuku[id]);
                console.log(id);
                console.log(data);
                $('#tblKaryawan tbody').html(showData(data));
            });
        })

        // methods
        function insert() {
            const data = $('#formBuku').serializeArray()
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            let newData = {}
            data.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id_buku' ||
                    name === 'qty' ||
                    name === 'harga_buku' ?
                    Number(item['value']) : item['value'])
                newData[name] = value
            })
            console.log(newData)

            localStorage.setItem('dataBuku', JSON.stringify([...dataBuku, newData]))
            return newData
            JSON.parse(localStorage.getItem('dataBuku'))
        }

        // Tampilkan Data
        function showData(arr = []) {
            let row = ''
            // let arr = JSON.parse(localStorage.getItem('dataBuku')) || []
            if (arr.length == 0) {
                return row = `<tr><td colspan ="6" align="center">Belum ada data</td></tr>`
            }
            arr.forEach(function(item, index) {
                row += `<tr>`
                row += `<td>${item['id_buku']}</td>`
                row += `<td>${item['judul_buku']}</td>`
                row += `<td>${item['pengarang']}</td>`
                row += `<td>${item['tahun_terbit']}</td>`
                row += `<td>${item['harga_buku']}</td>`
                row += `<td>${item['qty']}</td>`
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
