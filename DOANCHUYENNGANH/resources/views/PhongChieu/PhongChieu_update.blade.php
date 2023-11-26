
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
<h2>Cập Nhật</h2>
<div class="errorMessage">

</div>
<form id="update-phim-form" method="POST" action="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="idPhongChieu" value="{{ $Phong[0]->idPhongChieu}}" name="idPhongChieu" placeholder="Mã Phim">
    <input type="text" id="TenPhong" value="{{ $Phong[0]->TenPhong }}" name="TenPhong" placeholder="Tên Phòng">
    <select id="mySelect" name="idManHinh">
        @foreach ($loaimanhinh as $item)
            <option value="{{ $item->idMH }}" @if($item->idMH == $Phong[0]->idManHinh) selected @endif>{{ $item->TenMH }}</option>
        @endforeach
    </select>
    <input type="number" id="SoChoNgoi" value="{{ $Phong[0]->SoChoNgoi }}" name="SoChoNgoi" placeholder="Số Chỗ Ngồi">
    <select id="mySelect" name="idTinhTrang">
        @foreach ($tinhtrang as $item)
            <option value="{{ $item->idTinhTrangPhongChieu }}" @if($item->idTinhTrangPhongChieu == $Phong[0]->idTinhTrang) selected @endif>{{ $item->TinhTrang }}</option>
        @endforeach
    </select>
    <input type="number" id="SoHangGhe" value="{{ $Phong[0]->SoHangGhe }}" name="SoHangGhe" placeholder="Số Hàng Ghế">

    <input type="number" id="SoGheMotHang" value="{{ $Phong[0]->SoGheMotHang }}" name="SoGheMotHang" placeholder="Số Ghế Một Hàng">
  
    <button type="submit">Cập Nhật</button>
</form>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function() {
        $('#update-phim-form').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('update_phongchieu') }}",
                type: 'POST',
                data: formData,
                processData: false, // Ngăn xử lý dữ liệu gửi đi
                contentType: false, // Không thiết lập kiểu dữ liệu
                success: function(res) {
                    console.log(res);
                    alert(res.message);
                    window.location.href = document.referrer;
                }
            });
        });
    });
</script>
@endsection