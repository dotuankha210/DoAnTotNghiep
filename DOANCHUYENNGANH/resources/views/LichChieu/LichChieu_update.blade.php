
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
    <input type="hidden" id="idLichChieu" value="{{ $lichchieu[0]->idLichChieu}}" name="idLichChieu" placeholder="Mã Lịch Chiếu">
    <?php
    // Chuyển đổi chuỗi ngày thành đối tượng Carbon
    $thoiGianChieu = \Carbon\Carbon::parse($lichchieu[0]->ThoiGianChieu);
    // Lấy ngày dưới dạng chuỗi kiểu date
    $ngayKhoiChieu = $thoiGianChieu->toDateString();
?>
<input type="date" id="ThoiGianChieu" value="{{ $ngayKhoiChieu }}" name="ThoiGianChieu" placeholder="Thời Gian Chiếu">
    <input type="number" id="GiaVe" value="{{ $lichchieu[0]->GiaVe }}" name="GiaVe" placeholder="Giá Vé">
    <input type="number" id="TrangThai" value="{{ $lichchieu[0]->TrangThai }}" name="TrangThai" placeholder="Trạng Thái">
    <select id="mySelect" name="idPhong">
        @foreach ($phongchieu as $item)
            <option value="{{ $item->idPhongChieu }}" @if($item->idPhongChieu == $lichchieu[0]->idPhong) selected @endif>{{ $item->TenPhong }}</option>
        @endforeach
    </select>
    <select id="mySelect" name="idDinhDang">
        @foreach ($dinhdangphim as $item)
            <option value="{{ $item->idDinhDangPhim }}" @if($item->idDinhDangPhim == $lichchieu[0]->idDinhDang) selected @endif>{{ $item->idDinhDangPhim }}</option>
        @endforeach
    </select>
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
                url: "{{ route('update_lichchieu') }}",
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