
    $(document).ready(function() {
            $.ajax({
                url: '/api/theloai',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var danhmucs = data;
                    var danhmucList = $('.theloai');
                   
                    danhmucList.empty();
                    danhmucs.forEach(function(phim) {
                       if(phim.idTheLoai===1)
                       {
                            danhmucList.append(`
                            <li class="active"><a href="#tab`+phim.idTheLoai+`">`+phim.TenTheLoai+`</a></li>
                            `);
                       }
                       else
                       {
                        danhmucList.append(`
                            <li><a href="#tab`+phim.idTheLoai+`">`+phim.TenTheLoai+`</a></li>
                            `);
                       }
                    });
                    
                }
            });
            $.ajax({
                url: '/api/theloai-phim-theo-the-loai',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
               
                    var danhmucs = data.TheLoai;
                    var phims = data.Phims;
                    var danhmucList = $('.noidung');
                    danhmucList.empty();
                    if(phims!=null)
                    {
                        console.log(phims);
                    }
                    danhmucs.forEach(function(phim) {
                       if(phim.idTheLoai===1)
                       {
                            danhmucList.append(`
                            <div id="tab`+phim.idTheLoai+`" class="tab active">
                                    <div class="row">
                                        <div class="slick-multiItem" id="phim`+phim.idTheLoai+`">
                                            <div class="slide-it">
                                                            
                                                            
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            `);
                       }
                       else
                       {
                        danhmucList.append(`
                            <div id="tab`+phim.idTheLoai+`" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem" id="`+phim.idTheLoai+`">   
                                        <div class="slide-it">
                                                        
                                                        
                                        </div>              
                                    </div>
                                </div>
                            </div>
                            `);
                       }
                      
                       var PhimsLits = $('#phim'+phim.idTheLoai);
                       
                       phims.forEach(function(p){
                            if(p.idTheLoai===phim.idTheLoai)
                            {
                                PhimsLits.append(`
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="/assets/Content/Upload/Image/`+p.ApPhich+`" alt="" width="185" height="250">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="">lego</a></h6>
                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                    </div>
                                                </div>
                                            `);
                                        
                            }
                       });
    
                    });
                    
                }
            });
    });

