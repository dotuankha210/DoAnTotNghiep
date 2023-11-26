
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
      <th scope="col">Mã Khách Hàng</th>
      <th scope="col">Tên Khách Hàng</th>
      <th scope="col">Ngày Sinh</th>
      <th scope="col">Địa Chỉ</th>
      <th scope="col">Số Điện Thoại</th>
      <th scope="col">CMND</th>
      <th scope="col">Điểm Tích Lũy</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody id="phim-list">
  </tbody>
</table>
{{-- thêm --}}
<div class="modal fade addModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" id="addtk" >
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Khách Hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errorMessage">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" name="HoTen" id="HoTen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày Sinh</label>
                        <input type="date" name="NgaySinh" id="NgaySinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="DiaChi" id="DiaChi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="text" name="SDT" id="SDT" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chứng Minh Nhân Dân</label>
                        <input type="text" name="CMND" id="CMND" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Điểm Tích Lũy</label>
                        <input type="text" name="DiemTichLuy" id="DiemTichLuy" class="form-control">
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
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" name="upHoTen" id="upHoTen" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày Sinh</label>
                        <input type="date" name="upNgaySinh" id="upNgaySinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="upDiaChi" id="upDiaChi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="text" name="upSDT" id="upSDT" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chứng Minh Nhân Dân</label>
                        <input type="number" name="upCMND" id="upCMND" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Điểm Tích Lũy</label>
                        <input type="number" name="upDiemTichLuy" id="upDiemTichLuy" class="form-control">
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
                url: '/api/khachhang',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phim-list');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<tr>
                            <th scope="row">`+phim.idKH+`</th>
                            <td>`+phim.HoTen+`</td>
                            <td>`+phim.NgaySinh+`</td>
                            <td>`+phim.DiaChi+`</td>
                            <td>`+phim.SDT+`</td>
                            <td>`+phim.CMND+`</td>
                            <td>`+phim.DiemTichLuy+`</td>
                            <td><a href="" data-diem="`+phim.DiemTichLuy+`" data-cmnd="`+phim.CMND+`" data-sdt="`+phim.SDT+`" data-diachi="`+phim.DiaChi+`" data-id="`+phim.idKH+`" data-toggle="modal" data-target="#updateModal" data-ngaysinh="`+phim.NgaySinh+`" data-hoten="`+phim.HoTen+`" class="updateacount"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phongchieu" data-id="` + phim.idKH + `"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>`);
                    });
                }
            }); 
        }
        displayDanhmucs();
        // Xóa danh mục
        $(document).on('click', '.add', function(event) {
        event.preventDefault();
        let HoTen = $('#HoTen').val();
        let NgaySinh = $('#NgaySinh').val();
        let DiaChi = $('#DiaChi').val();
        let SDT = $('#SDT').val();
        let CMND = $('#CMND').val();
        let DiemTichLuy = $('#DiemTichLuy').val();
            
    $.ajax({
        url: "{{ route('create_khachhang') }}",
        method: 'POST', // Xác định phương thức POST ở đây
        data: { HoTen: HoTen,NgaySinh:NgaySinh,DiaChi:DiaChi,SDT:SDT,CMND:CMND,DiemTichLuy:DiemTichLuy},
        success: function(res) {
                $('.addModal').modal('hide');
                $('#addtk')[0].reset();
                var danhmucList = $('#phim-list');
                danhmucList.append(`<tr>
                    <th scope="row">`+res.phim.idKH+`</th>
                            <td>`+res.phim.HoTen+`</td>
                            <td>`+res.phim.NgaySinh+`</td>
                            <td>`+res.phim.DiaChi+`</td>
                            <td>`+res.phim.SDT+`</td>
                            <td>`+res.phim.CMND+`</td>
                            <td>`+res.phim.DiemTichLuy+`</td>
                            <td><a href="" data-diem="`+res.phim.DiemTichLuy+`" data-cmnd="`+res.phim.CMND+`" data-sdt="`+res.phim.SDT+`" data-diachi="`+res.phim.DiaChi+`" data-id="`+res.phim.idKH+`" data-toggle="modal" data-target="#updateModal" data-ngaysinh="`+res.phim.NgaySinh+`" data-hoten="`+res.phim.HoTen+`" class="updateacount"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phongchieu" data-id="` + res.phim.idKH + `"><i class="fa-solid fa-trash"></i></a> </td>
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
                url: '/api/delete_khachhang/' + id,
                type: 'get',
     
                success: function(rp) {
                    alert(rp.message);
                    displayDanhmucs();
                }
            });
        });
        $(document).on('click', '.updateacount', function() {
    var  NgaySinh= $(this).data('ngaysinh');
    var  HoTen= $(this).data('hoten');
    var  idKH= $(this).data('id');
    var  DiaChi= $(this).data('diachi');
    var  SDT= $(this).data('sdt');
    var  CMND= $(this).data('cmnd');
    var  DiemTichLuy= $(this).data('diem');
    $('#upHoTen').val(HoTen);
    $('#upNgaySinh').val(NgaySinh);
    $('#upMa').val(idKH);
    $('#upDiaChi').val(DiaChi);
    $('#upSDT').val(SDT);
    $('#upCMND').val(CMND);
    $('#upDiemTichLuy').val(DiemTichLuy);
});


$(document).on('click', '.update', function(event) {
    event.preventDefault();
    let HoTen = $('#upHoTen').val();
    let NgaySinh = $('#upNgaySinh').val();
    let idKH = $('#upMa').val();
    let DiaChi = $('#upDiaChi').val();
    let SDT = $('#upSDT').val();
    let CMND = $('#upCMND').val();
    let DiemTichLuy = $('#upDiemTichLuy').val();
    console.log(HoTen);
    console.log(NgaySinh);
    console.log(idKH);
    console.log(DiaChi);
    console.log(SDT);
    console.log(CMND);
    $.ajax({
        url: "{{ route('update_khachhang') }}",
        method: 'POST', // Xác định phương thức POST ở đây
        data: { HoTen: HoTen,NgaySinh:NgaySinh,DiaChi:DiaChi,SDT:SDT,CMND:CMND,DiemTichLuy:DiemTichLuy,idKH:idKH},
        
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
                            alert(er.responseText); 
                            $('.errorMessage').append('<span class="text-danger">'+value+'</span>')
                        });
                    }
    });
   
});

    });
  </script>   
@endsection