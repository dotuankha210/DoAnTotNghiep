
@extends('TrangChu')
@section('css')

<style>
    .table th{ 
        font-size: 13px;
    }
    .table tbody{
        background-color: lightgrey;
        
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('content')
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    Thêm
</button>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Mã Món</th>
      <th scope="col">Tên Món</th>
      <th scope="col">Đơn Giá</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody id="phim-list">
  </tbody>
</table>

<div class="modal fade addModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" id="addtk" >
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Thức Ăn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errorMessage">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Thức Ăn</label>
                        <input type="text" name="TENTHUCAN" id="TENTHUCAN" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Đơn Giá</label>
                        <input type="number" name="DONGIA" id="DONGIA" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div> 


{{-- cập nhật --}}
<div class="modal fade updateModal" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" id="updatetk" >
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">cập nhật thức ăn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errorMessage">

                    </div>
                    <input type="hidden" name="upMa" id="upMa" class="form-control">
                    <div class="form-group">
                        <label for="">Tên Thức Ăn</label>
                        <input type="text" name="upTen" id="upTen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Đơn Giá</label>
                        <input type="text" name="upGia" id="upGia" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div> 


@endsection
@section('js')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Hiển thị danh sách danh mục
        function displayDanhmucs() {
            $.ajax({
                url: '/api/thucan',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phim-list');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<tr>
                            <th scope="row">`+phim.MATHUCAN+`</th>
                            <td>`+phim.TENTHUCAN+`</td>
                            <td>`+phim.DONGIA+`</td>
                            <td><a href="" data-id="`+phim.MATHUCAN+`" data-toggle="modal" data-target="#updateModal" data-gia="`+phim.DONGIA+`" data-ten="`+phim.TENTHUCAN+`" class="updateacount"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phongchieu" data-id="` + phim.MATHUCAN + `"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>`);
                    });
                }
            });
        }
        displayDanhmucs();
        // Xóa danh mục
        $(document).on('click', '.add', function(event) {
        event.preventDefault();
        let TENTHUCAN = $('#TENTHUCAN').val();
        let DONGIA = $('#DONGIA').val();
        console.log(TENTHUCAN);
    $.ajax({
        url: "{{ route('create_thucan') }}",
        method: 'POST', // Xác định phương thức POST ở đây
        data: { TENTHUCAN: TENTHUCAN,DONGIA:DONGIA},
        success: function(res) {
                $('.addModal').modal('hide');
                $('#addtk')[0].reset();
                var danhmucList = $('#phim-list');
                danhmucList.append(`<tr>
                            <th scope="row">`+res.phim.MATHUCAN+`</th>
                            <td>`+res.phim.TENTHUCAN+`</td>
                            <td>`+res.phim.DONGIA+`</td>
                            <td><a href="" data-id="`+res.phim.MATHUCAN+`" data-toggle="modal" data-target="#updateModal" data-gia="`+res.phim.DONGIA+`" data-ten="`+res.phim.TENTHUCAN+`" class="updateacount"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phongchieu" data-id="` + res.phim.MATHUCAN + `"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>`);
        },error:function(er)
                    {
                        let err=er.responseJSON;
                        $.each(err.errors,function(index,value){
                            $('.errorMessage').append('<span class="text-danger">'+value+'</span>')
                        });
                    }
    });
   
});
        $(document).on('click', '.delete-phongchieu', function(ev) {
            ev.preventDefault();
            
            var id = $(this).data('id');
         
            $.ajax({
                url: '/api/delete_thucan/' + id,
                type: 'get',
     
                success: function(rp) {
                    alert(rp.message);
                    displayDanhmucs();
                }
            });
        });
        $(document).on('click', '.updateacount', function() {
    var Gia = $(this).data('gia');
    var Ten = $(this).data('ten');
    var Ma = $(this).data('id');
    $('#upTen').val(Ten);
    $('#upGia').val(Gia);
    $('#upMa').val(Ma);
});


$(document).on('click', '.update', function(event) {
    event.preventDefault();
    let TENTHUCAN = $('#upTen').val();
    let DONGIA = $('#upGia').val();
    let MATHUCAN = $('#upMa').val();
    console.log(TENTHUCAN);
    $.ajax({
        url: "{{ route('update_thucan') }}",
        method: 'POST', // Xác định phương thức POST ở đây
        data: { TENTHUCAN: TENTHUCAN,DONGIA:DONGIA,MATHUCAN:MATHUCAN},
        success: function(res) {
        
                $('.updateModal').modal('hide');
                $('#updatetk')[0].reset();
                var sanphamList=$('#phim-list');                //r nha, p po ke nmhiua hay quá a, ko cóa gì dâu em, nào lên cho anh 1 đêm là đc gòi:)))vcc
                    sanphamList.html("");
                    displayDanhmucs();

        },error:function(er)
                    {
                        let err=er.responseJSON;
                        $.each(err.errors,function(index,value){
                            $('.errorMessage').append('<span class="text-danger">'+value+'</span>')
                        });
                    }
    });
   
});

    });
  </script>   
@endsection