
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
@endsection
@section('content')
<a href="{{ route('get_create_phim') }}" class="btn btn-success">Thêm mới </a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Mã</th>
      <th scope="col">Tên</th>
      <th scope="col">Mô Tả</th>
      <th scope="col">Thời Lượng</th>
      <th scope="col">Ngày Khởi Chiếu</th>
      <th scope="col">Hãng Sản Xuất</th>
      <th scope="col">Đạo Diễn</th>
      <th scope="col">Năm Sản Xuất</th>
      <th scope="col">Áp Phích</th>
      <th scope="col">Mã Thể Loại</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
    </tr>
  </thead>
  <tbody id="phim-list">
    
  </tbody>
</table>

 
@endsection
@section('js')

<script>
    $(document).ready(function() {
        // Hiển thị danh sách danh mục
        function displayDanhmucs() {
            $.ajax({
                url: '/api/',
                type: 'GET',
                dataType: 'json',
  
                
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phim-list');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<tr>
                            <th scope="row">`+phim.idPhim+`</th>
                            <td>`+phim.TenPhim+`</td>
                            <td>`+phim.MoTa+`</td>
                            <td>`+phim.ThoiLuong+`</td>
                            <td>`+phim.NgayKhoiChieu+`</td>
                            <td>`+phim.HangSanXuat+`</td>
                            <td>`+phim.DaoDien+`</td>
                            <td>`+phim.NamSX    +`</td>
                            <td><img src="{{ asset('assets/Image/`+phim.ApPhich+`') }}" width="50" height="50"/></td>
                            <td>`+phim.idTheLoai+`</td>
                            <td><a href="/api/get_update_phim/`+phim.idPhim+`"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phim" data-id="` + phim.idPhim + `"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>`);
                    });
                }
            });
        }
    
        displayDanhmucs();
        // Xóa danh mục
        $(document).on('click', '.delete-phim', function(ev) {
            ev.preventDefault();
            
            var id = $(this).data('id');
         
            $.ajax({
                url: '/api/delete_phim/' + id,
                type: 'get',
     
                success: function(rp) {
                    alert(rp.message);
                    displayDanhmucs();
                }
            });
        });
        
    });
  </script>   
@endsection