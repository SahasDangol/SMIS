@extends('frontend::layouts.master')
@section('Body')
    <title>Courses</title>
<!-- preloader start -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- preloader end -->



<!-- banner-section start -->
<section class="single-banner course-grid-banner">
    <div class="page-breadcums">
        <div class="container">
            <ul class="page-list">
                <li><a href="{{url('frontend/home')}}">Home</a></li>
                <li>course grid</li>
            </ul>
        </div>
    </div>
    <div class="banner-content-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="banner-content text-center">
                        <h1 class="banner-title">Our Courses</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br/> standard dummy text ever since the 1500s.</p>
                        <a href="#" class="cmn-button">admission</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- course-grid-section start -->
<section class="course-grid-section section-bg">
    <div class="container">
        <div class="course-grid-wrapper">
            <div class="select-option-box-area">
                <form class="course-apply-form">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="frm-group apply-options">
                                <select>
                                    <option>Select Department</option>
                                    <option>Department one</option>
                                    <option>Department two</option>
                                    <option>Department three</option>
                                    <option>Department four</option>
                                    <option>Department five</option>
                                </select>
                            </div>
                        </div><!-- frm-group end -->
                        <div class="col-md-3">
                            <div class="frm-group apply-options">
                                <select>
                                    <option>Select semister</option>
                                    <option>semister one</option>
                                    <option>semister two</option>
                                    <option>semister three</option>
                                    <option>semister four</option>
                                    <option>semister five</option>
                                </select>
                            </div>
                        </div><!-- frm-group end -->
                        <div class="col-md-3">
                            <div class="frm-group apply-options">
                                <select>
                                    <option>Course Duration</option>
                                    <option>Duration one</option>
                                    <option>Duration two</option>
                                    <option>Duration three</option>
                                    <option>Duration four</option>
                                    <option>Duration five</option>
                                </select>
                            </div>
                        </div><!-- frm-group end -->
                        <div class="col-lg-2">
                            <div class="frm-group">
                                <button type="submit" class="apply-btn">Apply now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- course end-->
            <div class="row mt-mb-15 course-grid-block">
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/1.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Medicine and Health</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/2.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Marketing Strategy</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/3.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Computer Science Engineering</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/4.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Journalism and Media</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/5.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">International Communication</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/6.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Principle of Accounting</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/7.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Medicine and Pharmacy</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/8.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Cloud Data Management</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
                <div class="col-lg-4 col-sm-6">
                    <div class="course-item">
                        <div class="course-thumb">
                            <a href="#"><img src="{{Module::asset('frontend:images/courses/9.jpg')}}" alt="course-thumb"></a>
                        </div>
                        <div class="course-content">
                            <h5 class="course-title"><a href="#">Product Design and Analysis</a></h5>
                            <p>Many desktop publishing packages and web on page editors now use lorem Ipsum </p>
                            <a href="#" class="simple-btn">course details<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- course-item end -->
            </div>
        </div>
        <nav class="d-pagination" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item previous"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </nav>
    </div>
</section>
<!-- course-grid-section end -->
@endsection