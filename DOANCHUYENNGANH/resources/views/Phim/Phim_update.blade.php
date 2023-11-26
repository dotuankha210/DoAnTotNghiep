
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
    <input type="hidden" id="idPhim" value="{{ $phim[0]->idPhim}}" name="idPhim" placeholder="Mã Phim">
    <input type="text" id="TenPhim" value="{{ $phim[0]->TenPhim }}" name="TenPhim" placeholder="Tên Phim">
    <input type="text" id="MoTa" value="{{ $phim[0]->MoTa}}" name="MoTa" placeholder="Quốc Gia">
    <input type="text" id="ThoiLuong" value="{{ $phim[0]->ThoiLuong }}" name="ThoiLuong" placeholder="Đạo Diễn">
    <input type="text" id="HangSanXuat" value="{{ $phim[0]->HangSanXuat }}" name="HangSanXuat" placeholder="Hãng Sản Xuất">
    <input type="text" id="DaoDien" value="{{ $phim[0]->DaoDien }}" name="DaoDien" placeholder="Trailer">
    <input type="text" id="NamSX" value="{{ $phim[0]->NamSX }}" name="NamSX" placeholder="Trailer">
    <select id="mySelect" name="idTheLoai">
        @foreach ($loaiphim as $item)
            <option value="{{ $item->idTheLoai }}" @if($item->idTheLoai == $phim[0]->idTheLoai) selected @endif>{{ $item->TenTheLoai }}</option>
        @endforeach
    </select>

    <input type="date" id="NgayKhoiChieu" value="{{ $phim[0]->NgayKhoiChieu }}" name="NgayKhoiChieu" placeholder="Ngày Khởi Chiếu">
    <img src="{{ asset('assets/Image/' . $phim[0]->ApPhich) }}" alt="ảnh phim" id="ApPhich">
    <label for="">Đổi ảnh</label>
    <input type="file"  name="anh" >
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
                url: "{{ route('update_phim') }}",
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