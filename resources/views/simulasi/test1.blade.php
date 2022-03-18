@extends('templates.header')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
            </div>
            <form id="formKaryawan">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label"> ID</label>
                        <input type="text" class="form-control col-sm-10" id="id" placeholder="ID" name="id">
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"> Nama</label>
                        <input type="text" class="form-control col-sm-10" id="nama" placeholder="Nama" name="nama">
                    </div>

                    <div class="form-group row">
                        <label for="jk" class="col-sm-2 col-form-label"> Jenis Kelamin</label>
                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" value="L" name="jk" id="jk">
                            <label class="form-check-label">Laki Laki</label>
                        </div>

                        <div class="form-check col-sm-2">
                            <input class="form-check-input" type="radio" value="P" name="jk" id="jk">
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                            <button class="btn btn-success" id="btnReset" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    <h3>Data</h3>
                </div>
                <div class="card-body">
                    <div>
                        <button class="btn btn-success" type="button" id="sorting">Sorting</button>
                    </div>
                    <input type="search" class="form-control col-sm-2" name="search" id="search">
                    <button class="btn btn-succes" type="button" id="btnSearch">Cari</button>
                    <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
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



            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
    </div>
@endsection

@push('script')
    <script>
        function insert() {
            const data = $('#formKaryawan').serializeArray()
            let newData = {}
            data.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id' ? Number(item['value']) : item['value'])
                newData[name] = value
            })
            return newData
        }

        $(function() {
            // property
            let dataKaryawan = [];

            // events
            $('#formKaryawan').on('submit', function(e) {
                e.preventDefault();

                dataKaryawan.push(insert());
                $('#tblKaryawan tbody').html(showData(dataKaryawan));
                console.log(dataKaryawan);
            });

            // events for sorting button
            $('#sorting').on('click', function() {
                dataKaryawan = insertionSort(dataKaryawan, 'id');

                $('#tblKaryawan tbody').html(showData(dataKaryawan));
                console.log(dataKaryawan);
            });

            // events search
            $('#btnSearch').on('click', function(e) {
                let textSearch = $('#search').val();
                let id = searching(dataKaryawan, 'id', textSearch);
                let data = [];

                if (id >= 0)
                    data.push(dataKaryawan[id]);
                console.log(id);
                console.log(data);
                $('#tblKaryawan tbody').html(showData(data));
            });
        });

        // showData fn
        function showData(arr) {
            let row = '';

            if (arr.length == null) {
                return row = `<tr><td colspan="3">Belum ada data sama sekali</td></tr>`;
            }

            arr.forEach(function(item, value) {
                row += `<tr>`;
                row += `<td>${item['id']}</td>`;
                row += `<td>${item['nama']}</td>`;
                row += `<td>${item['jk']}</td>`;
                row += `</tr>`;
            });

            return row;
        }

        // inserting to an array
        function insertionSort(arr, key) {
            let i, j, id, value;

            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key];
                j = i - 1;

                while (j >= 0 && arr[j][key] > id) {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }

            return arr;
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
