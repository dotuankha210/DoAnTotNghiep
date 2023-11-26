
    $(document).ready(function() {
            $.ajax({
                url: '/api/',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('#phims');
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                        danhmucList.append(`<div class="movie-item">
                        <div class="mv-img">
                            <a href=""><img src="/assets/Content/Upload/Image/`+phim.ApPhich+`" alt="" width="285px" height="437px"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="">`+phim.ThoiLuong+`</a></span>
                            </div>
                            <h6><a href="">`+phim.TenPhim+`</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>`);
                    });
                    
                }
            });
    });