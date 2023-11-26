
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
        <input type="hidden" id="idPhongChieu" value="" name="idPhongChieu" placeholder="Mã Phòng Chiếu">
        <input type="text" id="TenPhong" value="" name="TenPhong" placeholder="Tên Phòng">
        <select id="mySelect" name="idMH">
            @foreach ($loaimanhinh as $item)
                <option value="{{ $item->idMH }}">{{ $item->TenMH }}</option>
            @endforeach
        </select>
    
        <select id="mySelect" name="idTinhTrangPhongChieu">
            @foreach ($tinhtrang as $item)
                <option value="{{ $item->idTinhTrangPhongChieu }}">{{ $item->TinhTrang }}</option>
            @endforeach
        </select>
        <input type="number" id="SoHangGhe" value="" name="SoHangGhe" placeholder="Số Hàng Ghế">
        <input type="number" id="SoGheMotHang" value="" name="SoGheMotHang" placeholder="Số Ghế Một Hàng">
       
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
                url: "{{ route('create_phongchieu') }}",
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