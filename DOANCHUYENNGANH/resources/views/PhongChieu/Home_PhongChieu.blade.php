
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
<a href="{{ route('get_create_phongchieu') }}" class="btn btn-success">Thêm mới </a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Mã</th>
      <th scope="col">Tên</th>
      <th scope="col">Mã Màn Hình</th>
      <th scope="col">Số Chỗ Ngồi</th>
      <th scope="col">Mã Tình Trạng</th>
      <th scope="col">Số Hàng Ghế</th>
      <th scope="col">Số Ghế 1 Hàng</th>
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
                url: '/api/phongchieu',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phim-list');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<tr>
                            <th scope="row">`+phim.idPhongChieu+`</th>
                            <td>`+phim.TenPhong+`</td>
                            <td>`+phim.idManHinh+`</td>
                            <td>`+phim.SoChoNgoi+`</td>
                            <td>`+phim.idTinhTrang+`</td>
                            <td>`+phim.SoHangGhe+`</td>
                            <td>`+phim.SoGheMotHang+`</td>
                            <td><a href="/api/get_update_phongchieu/`+phim.idPhongChieu+`"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phongchieu" data-id="` + phim.idPhongChieu + `"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>`);
                    });
                }
            });
        }
    
        displayDanhmucs();
        // Xóa danh mục
        $(document).on('click', '.delete-phongchieu', function(ev) {
            ev.preventDefault();
            
            var id = $(this).data('id');
         
            $.ajax({
                url: '/api/delete_phongchieu/' + id,
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