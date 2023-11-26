
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
        <input type="hidden" id="idLichChieu" value="" name="idLichChieu" placeholder="Mã Lịch Chiếu">
        <input type="date" id="ThoiGianChieu" value="" name="ThoiGianChieu" placeholder="Thời Gian Chiếu">
        <select id="idDinhDangPhim" name="idPhongChieu">
            @foreach ($phong as $item)
                <option value="{{ $item->idPhongChieu }}">{{ $item->TenPhong }}</option>
            @endforeach
        </select>
    
        <select id="idDinhDangPhim" name="idDinhDangPhim">
            @foreach ($dinhdang as $item)
                <option value="{{ $item->idDinhDangPhim }}">{{ $item->idDinhDangPhim }}</option>
            @endforeach
        </select>
        <input type="number" id="GiaVe" value="" name="GiaVe" placeholder="Giá Vé">
        <input type="number" id="TrangThai" value="" name="TrangThai" placeholder="Trạng Thái">
       
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
            url: "{{ route('create_lichchieu') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res.phongchieu);
                alert(res.message);
                window.location.href = document.referrer;
            },
            error: function(er) {
                let err = er.responseJSON;
                $.each(err.errors, function(index, value) {
                    $('.errorMessage').append('<span class="text-danger">' + value + '</span><br/>  ')
                });
            }
        });
    });
});

</script>
@endsection