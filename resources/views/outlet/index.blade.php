@extends('templates/header')

@section('content')
<!-- page content -->
<section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Outlet</h3>
      </div>
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#formInputModal">
        Tambah Outlet
    </button>
    <div>
        @include('outlet/list-all')
    </div>
      </div>
      <div class="card-footer">
        Footer
      </div>
    </div>
  </section>
</div>

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
<!-- /page content -->
@endsection
@include('outlet/form')
@push('script')
<script>
    console.log('javas')
    $(function(){
        console.log('function')
        //data Table
    //     $('tbl-barang').DataTable()

    //     //menghapus alert
    //     $("#succes-alert").fadeTo(2000, 500).slideUp(500, function(){
    //         $("#succes-alert").slideUp(500);
    //     });
    //     $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
    //         $("#succes-alert").slideUp(500);
    //     });

    //     delete barang
    //      $('.delete-barang').click(function(e){
    //          e.prevenDefault()
    //          let data = $(this).closest('tr').find('td:eq(1)').text()
    //          swal({
    //              title ="Apakah kamu yakin?",
    //              text ="Data"+data+"akan dihapus?",
    //              icon ="warning",
    //              buttons = true,
    //              dangermode = true,
    //          })
    //          .then((req) => {
    //              if(req) $(e.target).closest('form').submit()
    //              else swal.close()
    //          })
    //      })
    
         
        $('#formInputModal').on('show.bs.modal', function(event){
        let button = $(event.relatedTarget)
        console.log(button)
        console.log('modaaaal')
        let id= button.data('id')
        let nama= button.data('nama')
        let alamat= button.data('alamat')
        let tlp= button.data('tlp')
        let mode= button.data('mode')
        let modal= $(this)
        if(mode === "edit"){
            modal.find('.modal-title').text('Edit Data Outlet')
            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #alamat').val(alamat)
            modal.find('.modal-body #tlp').val(tlp)
            modal.find('.modal-footer #btn-submit').text('Update')
            modal.find('.modal-body #method').html('{{ method_field('patch') }}')
            modal.find('.modal-body form').attr('action', 'outlet/'+id)
        }else{
            modal.find('.modal-title').text('Input Data Outlet')
            modal.find('.modal-body #nama').val('')
            modal.find('.modal-body #alamat').val('')
            modal.find('.modal-body #tlp').val('')
            modal.find('.modal-body #method').html("")
            modal.find('.modal-footer #btn-submit').text('Submit')
        }
    })
    });
</script>
@endpush



