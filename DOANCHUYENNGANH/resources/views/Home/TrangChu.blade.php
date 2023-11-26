@extends('Home.Main')
@section('content')
    
    


<div class="slider movie-items">
    <div class="container">
        <div class="row">
            <div class="social-link">
                <p>Follow us: </p>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus"></i></a>
                <a href="#"><i class="ion-social-youtube"></i></a>
            </div>
            <div class="slick-multiItemSlider" id="phims">
                
               
                @foreach ($phim as $item)
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href=""><img src="{{ asset('assets/Content/Upload/Image/' .$item->ApPhich) }}" alt="" width="285px" height="437px"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="">{{ $item->ThoiLuong }}</a></span>
                            </div>
                            <h6><a href="">{{ $item->TenPhim }}</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
</div>
<div class="buster-light">
    <div class="movie-items">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-8">
                    <div class="title-hd">
                        <h2>Phim Chiêu Rap</h2>
                        <a href="#" class="viewall">Xem Tất Cả<i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links theloai">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===1)
                                    <li class="active"><a href="#tab`+phim.idTheLoai+`">{{ $item->TenTheLoai }}</a></li>
                                @else
                                    <li class=""><a href="#tab`+phim.idTheLoai+`">{{ $item->TenTheLoai }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content noidung">
                            @foreach ($theloai as $item)
                                @if ($item->idTheLoai===1)
                                    <div id="tab{{$item->idTheLoai}}" class="tab active">
                                        <div class="row">
                                            <div class="slick-multiItem">
                                                    
                                                        
                                                        @foreach ($phim as $p)
                                                            @if ($p->idTheLoai==$item->idTheLoai)
                                                                <div class="slide-it">
                                                                    <div class="movie-item">
                                                                        <div class="mv-img">
                                                                            <img src="{{ asset('assets/Content/Upload/Image/' .$p->ApPhich) }}" alt="" width="185" height="250">
                                                                        </div>
                                                                        <div class="hvr-inner">
                                                                            <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                                        </div>
                                                                        <div class="title-in">
                                                                            <h6><a href="">lego</a></h6>
                                                                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div id="tab{{ $item->idTheLoai }}" class="tab">
                                        <div class="row">
                                            <div class="slick-multiItem">
                                                    <div class="slide-it">
                                                        
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="title-hd">
                        <h2>PHIM SẮP CHIẾU</h2>
                        <a href="#" class="viewall">Xem Tất Cả <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="tabs">
                        <ul class="tab-links-2">
                            <li><a  href="#tab21">Phim Dc</a></li>
                            <li ><a href="#tab22">Ma Thuật Cổ Đại</a></li>
                            <li class="active"><a href="#tab23">Phim Chờ Đợi</a></li>
                            <li><a href="#tab24">Phim Siêu Nhiên</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab21" class="tab active">
                                <div class="row">
                                    <div class="slick-multiItem">
                                      
                                            <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="{{ asset('assets/Content/Upload/Image/bietDoiCamTu1.jpg') }}" alt="" width="185" height="250">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="">ạdj</a></h6>
                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="tab23" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                       
                                            <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="{{ asset('assets/Content/Upload/Image/Tiachop.jpg') }}" alt="" width="185" height="284">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="">dkjaskj</a></h6>
                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="tab24" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        
                                            <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="{{ asset('assets/Content/Upload/Image/Tiachop.jpg') }}" alt="" width="185" height="284">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="">jakja</a></h6>
                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="tab4" class="tab">
                                <div class="row">
                                    <div class="slick-multiItem">
                                        
                                            <div class="slide-it">
                                                <div class="movie-item">
                                                    <div class="mv-img">
                                                        <img src="{{ asset('assets/Content/Upload/Image/Tiachop.jpg') }}" alt="" width="185" height="250">
                                                    </div>
                                                    <div class="hvr-inner">
                                                        <a href="">Chi Tiết<i class="ion-android-arrow-dropright"></i> </a>
                                                    </div>
                                                    <div class="title-in">
                                                        <h6><a href="">kjakjs</a></h6>
                                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="ads">
                            <img src="{{ asset('assets/Content/Client/images/uploads/ads1.png') }}" alt="" width="336" height="296">
                        </div>
                        <div class="celebrities">
                            <h4 class="sb-title">Diễn Viên Nổi Tiếng</h4>
                            <div class="celeb-item">
                                <a href="#"><img src="{{ asset('assets/Content/Client/images/uploads/ava1.jpg') }}" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Samuel N. Jack</a></h6>
                                    <span>Diễn Viễn</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="{{ asset('assets/Content/Client/images/uploads/ava2.jpg') }}" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Benjamin Carroll</a></h6>
                                    <span>Diễn Viễn</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="{{ asset('assets/Content/Client/images/uploads/ava3.jpg') }}" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Beverly Griffin</a></h6>
                                    <span>Diễn Viễn</span>
                                </div>
                            </div>
                            <div class="celeb-item">
                                <a href="#"><img src="{{ asset('assets/Content/Client/images/uploads/ava4.jpg') }}" alt="" width="70" height="70"></a>
                                <div class="celeb-author">
                                    <h6><a href="#">Justin Weaver</a></h6>
                                    <span>Diễn Viễn</span>
                                </div>
                            </div>
                            <a href="#" class="btn">Xem Thêm<i class="ion-ios-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="trailers">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-12">
                    <div class="title-hd">
                        <h2>Trailer Phim</h2>
                        <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="videos">
                        <div class="slider-for-2 video-ft">
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/1Q8fG0TtVAY"></iframe>
                            </div>
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/w0qQkSuWOS8"></iframe>
                            </div>
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/44LdLqgOpjo"></iframe>
                            </div>
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/gbug3zTm3Ws"></iframe>
                            </div>
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/e3Nl_TCQXuw"></iframe>
                            </div>
                            <div>
                                <iframe class="item-video" src="./Home/Content/Client/#" data-src="https://www.youtube.com/embed/NxhEZG0k9_w"></iframe>
                            </div>
                        </div>
                        <div class="slider-nav-2 thumb-ft">
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer7.jpg') }}" alt="photo by Barn Images" width="4096" height="2737">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Wonder Woman</h4>
                                    <p>2:30</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer2.jpg') }}" alt="photo by Barn Images" width="350" height="200">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Oblivion: Official Teaser Trailer</h4>
                                    <p>2:37</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer6.jpg') }}" alt="photo by Joshua Earle">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Exclusive Interview:  Skull Island</h4>
                                    <p>2:44</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer6.jpg') }}" alt="photo by Joshua Earle">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Logan: Director James Mangold Interview</h4>
                                    <p>2:43</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer4.jpg') }}" alt="photo by Wojciech Szaturski" width="100" height="56">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Beauty and the Beast: Official Teaser Trailer 2</h4>
                                    <p>2: 32</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="trailer-img">
                                    <img src="{{ asset('assets/Content/Client/images/uploads/trailer5.jpg') }}" alt="photo by Wojciech Szaturski" width="360" height="189">
                                </div>
                                <div class="trailer-infor">
                                    <h4 class="desc">Fast&Furious 8</h4>
                                    <p>3:11</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
