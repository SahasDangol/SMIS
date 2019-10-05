@extends('frontend::layouts.master')
@section('Body')
    <title>FAQ</title>
<!-- preloader start -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- preloader end -->




<!-- banner-section start -->
<section class="single-banner asyncImage" data-src="{{asset('images/banner/advisors-two.jpg')}}">
    <div class="page-breadcums">
        <div class="container">
            <ul class="page-list">
                <li><a href="{{url('frontend/home')}}">Home</a></li>
                <li>FAQ</li>
            </ul>
        </div>
    </div>
    <div class="banner-content-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="banner-content text-center">
                        <h1 class="banner-title">Frequently Asked Questions</h1>
                        <p>Please feel free to contact us if there are problems you didn't find solution for.</p>
                        <a href="{{url('frontend/contact_us')}}" class="cmn-button">contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->

<!-- faq-section start -->
<section class="faq-section section-padding section-bg">
    <div class="container">
        <div class="section-header text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">questions and answer</h2>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="nav nav-tabs tab-area-style-two" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">general</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="admission-tab" data-toggle="tab" href="#admission" role="tab" aria-controls="admission" aria-selected="false">admission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="course" aria-selected="false">courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="career-tab" data-toggle="tab" href="#career" role="tab" aria-controls="career" aria-selected="false">career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notice-tab" data-toggle="tab" href="#notice" role="tab" aria-controls="notice" aria-selected="false">notice</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="accordion cmn-accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                How do i get admission ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card is_active">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                What is the rooming afreement term lease ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                What is a entry condition and exit condition report ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                What is included in my accommodation fees ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                What do i need to bring with me to fillup admission form ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                How do i get admission report to confirmation ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="admission" role="tabpanel" aria-labelledby="admission-tab">
                            <div class="accordion cmn-accordion" id="accordionExample2">
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                How do i get admission ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card is_active">
                                    <div class="card-header" id="headingEight">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                What is the rooming afreement term lease ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseEight" class="collapse show" aria-labelledby="headingEight" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingNine">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Nine" aria-expanded="false" aria-controls="Nine">
                                                What is a entry condition and exit condition report ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="Nine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample2">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="course" role="tabpanel" aria-labelledby="course-tab">
                            <div class="accordion cmn-accordion" id="accordionExample3">
                                <div class="card">
                                    <div class="card-header" id="headingTen">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                How do i get admission ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card is_active">
                                    <div class="card-header" id="headingEleven">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                                                What is the rooming afreement term lease ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseEleven" class="collapse show" aria-labelledby="headingEleven" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingTweleve">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTweleve" aria-expanded="false" aria-controls="collapseTweleve">
                                                What is a entry condition and exit condition report ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTweleve" class="collapse" aria-labelledby="headingTweleve" data-parent="#accordionExample3">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="career" role="tabpanel" aria-labelledby="career-tab">
                            <div class="accordion cmn-accordion" id="accordionExample4">
                                <div class="card">
                                    <div class="card-header" id="headingOne1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                                How do i get admission ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne1" class="collapse" aria-labelledby="headingOne1" data-parent="#accordionExample4">
                                        <div class="card-body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card is_active">
                                    <div class="card-header" id="headingTwo2">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                                                What is the rooming afreement term lease ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo2" class="collapse show" aria-labelledby="headingTwo2" data-parent="#accordionExample4">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingThree3">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                                What is a entry condition and exit condition report ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordionExample4">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="notice" role="tabpanel" aria-labelledby="notice-tab">
                            <div class="accordion cmn-accordion" id="accordionExample5">
                                <div class="card">
                                    <div class="card-header" id="headingOne4">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseOne4">
                                                How do i get admission ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne4" class="collapse" aria-labelledby="headingOne4" data-parent="#accordionExample5">
                                        <div class="card-body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card is_active">
                                    <div class="card-header" id="headingTwo5">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo5">
                                                What is the rooming afreement term lease ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo5" class="collapse show" aria-labelledby="headingTwo5" data-parent="#accordionExample5">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                                <div class="card">
                                    <div class="card-header" id="headingThree6">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree6" aria-expanded="false" aria-controls="collapseThree6">
                                                What is a entry condition and exit condition report ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree6" class="collapse" aria-labelledby="headingThree6" data-parent="#accordionExample5">
                                        <div class="card-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div><!-- card end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq-section end -->

@endsection
@section('script')
    <script>
        (() => {
    'use strict';
    // Page is loaded
    const objects = document.getElementsByClassName('asyncImage');
    Array.from(objects).map((item) => {
    // Start loading image
    const img = new Image();
    img.src = item.dataset.src;
    // Once image is loaded replace the src of the HTML element
    img.onload = () => {
    item.classList.remove('asyncImage');
    return item.nodeName === 'IMG' ?
    item.src = item.dataset.src :
    item.style.backgroundImage = `url(${item.dataset.src})`;
    };
    });
    })();
        </script>
    @endsection