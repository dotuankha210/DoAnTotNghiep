
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
      <th scope="col">Thời Gian Chiếu</th>
      <th scope="col">Mã Phòng</th>
      <th scope="col">Mã Định Dạng</th>
      <th scope="col">Giá Vé</th>
      <th scope="col">Trạng Thái</th>
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
                url: '/api/lichchieu',
                type: 'GET',
                dataType: 'json',
  
                
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phim-list');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<tr>
                            <th scope="row">`+phim.idLichChieu+`</th>
                            <td>`+phim.ThoiGianChieu+`</td>
                            <td>`+phim.idPhong+`</td>
                            <td>`+phim.idDinhDang+`</td>
                            <td>`+phim.GiaVe+`</td>
                            <td>`+phim.TrangThai+`</td>
                            <td><a href="/api/get_update_lichchieu/`+phim.idLichChieu+`"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="javascript:void(0);" class="delete-phim" data-id="` + phim.idLichChieu + `"><i class="fa-solid fa-trash"></i></a> </td>
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
                url: '/api/delete_lichchieu/' + id,
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