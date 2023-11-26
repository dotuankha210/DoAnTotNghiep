
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
<h2>Thêm</h2>
<div class="errorMessage">

</div>
    <form id="create-phim-form" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="idPhim" value="" name="idPhim" placeholder="Mã Phim">
        <input type="text" id="TenPhim" value="" name="TenPhim" placeholder="Tên Phim">
        <input type="text" id="MoTa" value="" name="MoTa" placeholder="Mô Tả">
        <input type="number" id="ThoiLuong" value="" name="ThoiLuong" placeholder="Thời Lượng">
        <input type="date" id="NgayKhoiChieu" value="" name="NgayKhoiChieu" placeholder="Ngày Khởi Chiếu">
        <input type="text" id="HangSanXuat" value="" name="HangSanXuat" placeholder="Hãng Sản Xuất">
        <input type="text" id="DaoDien" value="" name="DaoDien" placeholder="DaoDien">
        <input type="text" id="NamSX" value="" name="NamSX" placeholder="Năm Sản Xuất">
        <input type="file"  name="anh" >
        <select id="mySelect" name="idTheLoai">
            @foreach ($loaiphim as $item)
                <option value="{{ $item->idTheLoai }}">{{ $item->TenTheLoai }}</option>
            @endforeach
        </select>
        <button type="submit">Thêm</button>
    </form>
@endsection
@section('js')

<script>
    $(document).ready(function() {
        $('#create-phim-form').on('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('create_phim') }}",
                type: 'POST',
                data: formData,
                processData: false, // Ngăn xử lý dữ liệu gửi đi
                contentType: false, // Không thiết lập kiểu dữ liệu
                success: function(res) {
                    console.log(res);
                    alert(res.message);
                    window.location.href = document.referrer;
                },error:function(er)
                    {
                        let err=er.responseJSON;
                        $.each(err.errors,function(index,value){
                            $('.errorMessage').append('<span class="text-danger">'+value+'</span><br/>  ')
                        });
                    }
            });
        });
    });
</script>
@endsection