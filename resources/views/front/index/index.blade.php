@extends('front.layouts.app');

@section('titulo')
Inicio
@endsection

@section('contenido')
<!-- Banner -->
<section class="xs-bg-cover parallaxie " id="home" style="background: url({{ $fondo ? $fondo : '/resources/img/fondos/default.jpg' }}) center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="xs-banner text-center">
                    <p class="xs-banner-subtitle">El ejercicio es sinónimo de salud</p>
                    <h1 class="xs-banner-title">Fitness <span>10</span></h1>
                </a>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Banner End -->

<!-- About Us -->
<section class="xs-section-padding" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>Why Join <span>Us</span></h2>
                    <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                </div>
            </div>
        </div><!-- .row END -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="xs-about-us" onmouseover="new Vivus('servicesvg', {duration: 50});">
                    <object id="servicesvg" type="image/svg+xml" data="assets/images/services/01.svg"></object>
                    <h3>TONS OF EQUIPMENT</h3>
                    <p>
                        We have heap of fun piece of equi to build down every inh of your for body and from boom.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="xs-about-us" onmouseover="new Vivus('servicesvg2', {duration: 50});">
                <object id="servicesvg2" type="image/svg+xml" data="assets/images/services/02.svg"></object>
                    <h3>ROWS OF CARDIO</h3>
                    <p>
                        We have heap of fun piece of equi to build down every inh of your for body and from boom.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            <div class="xs-about-us" onmouseover="new Vivus('servicesvg3', {duration: 50});">
                <object id="servicesvg3" type="image/svg+xml" data="assets/images/services/03.svg"></object>
                    <h3>HEART PUMPING</h3>
                    <p>
                        We have heap of fun piece of equi to build down every inh of your for body and from boom.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            <div class="xs-about-us" onmouseover="new Vivus('servicesvg4', {duration: 50});">
                <object id="servicesvg4" type="image/svg+xml" data="assets/images/services/04.svg"></object>
                    <h3>TONS OF EQUIPMENT</h3>
                    <p>
                        We have heap of fun piece of equi to build down every inh of your for body and from boom.
                    </p>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- About Us end -->

<!-- Services-intro -->
<section class="xs-light-bg xs-section-padding-sm" id="training">
    <div class="container">
        <div class="xs-services-intro">
            <div class="row">
                <div class="col-lg-8">
                    <div class="xs-section-heading">
                        <h2>fEATURED <span>tRAINING</span></h2>
                        <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                    </div>
                </div>
                <div class="col-lg-4 align-self-center">
                    <div class="xs-btn-wraper">
                        <a href="#" class="btn btn-primary">All Training <span class="icon icon-plus"></span></a>
                    </div>
                </div>
            </div>
        </div><!-- .xs-services-intro END -->
    </div><!-- .container END -->
</section><!-- Services-intro end -->

<!-- Services -->
<div class="container-fluid p-0" id="about">
    <div class="row no-gutters">
        <div class="col-md-4">
            <div class="xs-service" >
                <img src="assets/images/services/service1.jpg" alt="service image">
                <div class="xs-overlay d-flex align-items-center">
                    <div class="xs-service-content">
                        <div class="xs-icon-wraper">
                            <i class="icon icon-dumble"></i>
                        </div>
                        <h3>GRIT STRENGTH</h3>
                        <p>We have heap of fun piece of equi to build <br> down every inh of your for body.</p>
                        <a href="#" class="btn btn-primary">
                            <i class="icon icon-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="xs-service">
                <img src="assets/images/services/service2.jpg" alt="service image">
                <div class="xs-overlay d-flex align-items-center">
                    <div class="xs-service-content">
                        <div class="xs-icon-wraper">
                            <i class="icon icon-equipment"></i>
                        </div>
                        <h3>ZUMBA ATHLETIC</h3>
                        <p>We have heap of fun piece of equi to build <br> down every inh of your for body.</p>
                        <a href="#" class="btn btn-primary">
                            <i class="icon icon-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="xs-service">
                <img src="assets/images/services/service3.jpg" alt="service image">
                <div class="xs-overlay d-flex align-items-center">
                    <div class="xs-service-content">
                        <div class="xs-icon-wraper">
                            <i class="icon icon-yoga"></i>
                        </div>
                        <h3>FUSION YOga</h3>
                        <p>We have heap of fun piece of equi to build <br> down every inh of your for body.</p>
                        <a href="#" class="btn btn-primary">
                            <i class="icon icon-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .container END --><!-- Services end -->

<!-- Help -->
<section class="xs-section-padding-lg" data-scrollax-parent="true">
    <div class="container">
        <div class="xs-help">
            <div class="row">
                <div class="col-lg-6">
                    <div class="xs-section-heading">
                        <h2>HELPING YOU to GO <br />
                            <span>Since 1971</span>
                        </h2>
                    </div>
                    <p>World is committed to making participation in the event  harass ment free on experience for everyone, regardless of leve of expenc gender by identity and expression oriention disability for personal.</p>
                    <a href="#" class="btn btn-primary">Join Classes <span class="icon icon-plus"></span></a>
                </div>
                <div class="col-lg-6">
                    <div class="xs-video-wraper">
                        <img src="assets/images/video/video-1.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=X_9VoqR5ojM" class="xs-video-btn">
                            <i class="icon icon-play"></i>
                        </a>
                        <div class="xs-video-shape" data-scrollax="properties: { translateY: '-250px' }" style="background-image: url(assets/images/shape/help-shape.png);"></div>
                    </div>
                </div>
            </div>
        </div><!-- .xs-help END -->
    </div><!-- .container END -->
</section><!-- Help end -->

<!-- Class Schedule -->
<section class="xs-section-padding xs-bg-cover class-schedule-area parallaxie parallaxie" style="background-image: url(assets/images/schedule-bg.jpg);" data-scrollax-parent="true" id="schedule">
    <div class="xs-water-mark" data-scrollax="properties: { translateY: '-250px' }">GYMvast</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading2 text-center">
                    <h2>Class <span>Schedule</span></h2>
                    <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                </div>
            </div>
        </div><!-- .row END -->

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive xs-schedule-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="xs-calendar-index"><i class="icon icon-calendar1"></i></th>
                                <th scope="col"><span>Monday</span></th>
                                <th scope="col"><span>Tuesday</span></th>
                                <th scope="col"><span>Wednesday</span></th>
                                <th scope="col"><span>Thursday</span></th>
                                <th scope="col"><span>Friday</span></th>
                                <th scope="col"><span>Saturday</span></th>
                                <th scope="col"><span>Sunday</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">10.00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">12.00</th>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">15.00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">17.00</th>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">19.00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Relax</h3>
                                        <h4>Yoga</h4>
                                        <p>12.00 - 13.00</p>
                                        <span>Jonas Blue</span>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Class Schedule end -->

<!-- Team -->
<section class="xs-section-padding" data-scrollax-parent="true">
    <div class="xs-team-wraper">
        <div class="xs-shape" data-scrollax="properties: { translateY: '-250px' }" style="background-image: url(assets/images/shape/dot.png);"></div>
        <div class="xs-shape xs-team-right-shape" data-scrollax="properties: { translateY: '250px' }" style="background-image: url(assets/images/shape/memphis.png);"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="xs-section-heading text-center">
                        <h2>Our <span>Trainers</span></h2>
                        <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                    </div>
                </div>
            </div><!-- .row END -->
        </div><!-- .container END -->

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="xs-team">
                        <div class="xs-team-thumb">
                            <img src="assets/images/team/team-1.jpg" alt="Jhon Statham">
                            <div class="xs-team-overlay d-flex align-items-center">
                                <ul class="list-unstyled xs-team-share">
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="xs-team-content">
                            <h3>
                                <a href="trainer-details.html">Jhon Statham</a>
                            </h3>
                            <p>Yoga Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="xs-team">
                        <div class="xs-team-thumb">
                            <img src="assets/images/team/team-2.jpg" alt="David William">
                            <div class="xs-team-overlay d-flex align-items-center">
                                <ul class="list-unstyled xs-team-share">
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="xs-team-content">
                            <h3>
                                <a href="trainer-details.html">David William</a>
                            </h3>
                            <p>Yoga Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="xs-team">
                        <div class="xs-team-thumb">
                            <img src="assets/images/team/team-3.jpg" alt="Robert Dany">
                            <div class="xs-team-overlay d-flex align-items-center">
                                <ul class="list-unstyled xs-team-share">
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="xs-team-content">
                            <h3>
                                <a href="trainer-details.html">Robert Dany</a>
                            </h3>
                            <p>Yoga Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="xs-team">
                        <div class="xs-team-thumb">
                            <img src="assets/images/team/team-4.jpg" alt="Ana Mariea">
                            <div class="xs-team-overlay d-flex align-items-center">
                                <ul class="list-unstyled xs-team-share">
                                    <li>
                                        <a href="#"><i class="icon icon-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon icon-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="xs-team-content">
                            <h3>
                                <a href="trainer-details.html">Ana Mariea</a>
                            </h3>
                            <p>Yoga Trainer</p>
                        </div>
                    </div>
                </div>
            </div><!-- .row END -->
        </div><!-- .container END -->
    </div><!-- .xs-team-wraper -->
</section><!-- Team end -->

<!-- BMI -->
<section class="xs-bg-cover xs-pt-50 xs-pb-sm parallaxie parallaxie" style="background-image: url(assets/images/bmi-bg.png);">
    <div class="container">
        <div class="xs-bmi">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading2">
                        <h2>BMI <span>Chart</span></h2>
                    </div>
                    <div class="table-responsive xs-bmi-table">
                        <table class="table table-bordered">
                            <caption>Body Metabolic Rate / energy expenditure per unit time</caption>
                            <thead>
                                <tr>
                                    <th scope="col">BMI</th>
                                    <th scope="col">WEIGHT STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Below 18.5</td>
                                    <td>Underweight</td>
                                </tr>
                                <tr>
                                    <td>18.5 - 24.9</td>
                                    <td>Healthy</td>
                                </tr>
                                <tr>
                                    <td>25.0 - 29.9</td>
                                    <td>Overweight</td>
                                </tr>
                                <tr>
                                    <td>30 and Above</td>
                                    <td>Obese</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading2">
                        <h2>Calculate <span>Your BMI</span></h2>
                        <p>World is committed to making participation in the event harass ment free on experience for
                            everyone, regardless of leve of expenc</p>
                    </div>
                    <form action="#" class="xs-form xs-form-dark">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="heightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-height">Height / cm</label>
                                    <input type="number" min="1" max="500" id="xs-height" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="weightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-weight">Weight / kg</label>
                                    <input type="number" min="1" max="500" id="xs-weight" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-age">Age</label>
                                    <input type="number" min="1" max="200" id="xs-age" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 align-self-end">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio1" name="sex" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio2" name="sex" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio3" name="sex" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio3">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group xs-mt-20">
                                    <button type="submit" id="calculate" class="btn btn-primary">Calculate</button>
                                </div>
                                <div id="xs-bmi-info" class="clearfix">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- .row END -->
        </div><!-- .xs-bmi END -->
    </div><!-- .container END -->
</section><!-- BMI end -->

<!-- Testimonial -->
<section class="xs-section-padding xs-bg-cover parallaxie parallaxie" style="background-image: url(assets/images/testimonial/testimonial_img.jpg);" data-scrollax-parent="true">
    <div class="xs-testimonial-wraper">
        <div class="xs-shape xs-testimonial-shape" style="background-image: url(assets/images/shape/dot-2.png);" data-scrollax="properties: { translateY: '250px' }"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>Success <span>Stories</span></h2>
                </div>
            </div>
        </div><!-- .row END -->

        <div class="row">
            <div class="col-lg-9 mx-auto">
                <!-- Start Carousel -->
                <div class="owl-carousel owl-theme xs-testimonial-owl">
                    <div class="item">
                        <i class="icon icon-quote"></i>
                        <p>World is committed to making participa in the event that rassment free experience for every, regardless level of experienc, gender identity.and expression orientation, disability by the personal appearance</p>

                        <div class="xs-testimonial-profile clearfix">
                            <div class="xs-profile-thumb">
                                <img src="assets/images/testimonial/testimonial-profile-2.png" class="rounded-circle" alt="testimonial">
                            </div>
                            <div class="xs-profile-info">
                                <h3>David William</h3>
                                <p>Yoga Trainer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <i class="icon icon-quote"></i>
                        <p>World is committed to making participa in the event that rassment free experience for every, regardless level of experienc, gender identity.and expression orientation, disability by the personal appearance</p>

                        <div class="xs-testimonial-profile clearfix">
                            <div class="xs-profile-thumb">
                                <img src="assets/images/testimonial/testimonial-profile-3.png" class="rounded-circle" alt="testimonial">
                            </div>
                            <div class="xs-profile-info">
                                <h3>William Mill</h3>
                                <p>Body Building Trainer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <i class="icon icon-quote"></i>
                        <p>World is committed to making participa in the event that rassment free experience for every, regardless level of experienc, gender identity.and expression orientation, disability by the personal appearance</p>

                        <div class="xs-testimonial-profile clearfix">
                            <div class="xs-profile-thumb">
                                <img src="assets/images/testimonial/testimonial-profile-1.png" class="rounded-circle" alt="testimonial">
                            </div>
                            <div class="xs-profile-info">
                                <h3>Stive Mark</h3>
                                <p>Yoga Trainer</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <i class="icon icon-quote"></i>
                        <p>World is committed to making participa in the event that rassment free experience for every, regardless level of experienc, gender identity.and expression orientation, disability by the personal appearance</p>

                        <div class="xs-testimonial-profile clearfix">
                            <div class="xs-profile-thumb">
                                <img src="assets/images/testimonial/testimonial-profile-2.png" class="rounded-circle" alt="testimonial">
                            </div>
                            <div class="xs-profile-info">
                                <h3>David William</h3>
                                <p>Yoga Trainer</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .xs-testimonial-owl End -->
            </div><!-- .col-lg-8 End -->
        </div><!-- .row End -->
    </div><!-- .container END -->
</section><!-- Testimonial end -->

<!-- Pricing -->
<section class="position-relative xs-section-padding xs-bg-cover parallaxie parallaxie" style="background-image: url(assets/images/pricing/pricing_img.jpg);" data-scrollax-parent="true" id="price">
    <div class="xs-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading2 text-center">
                    <h2>Pricing <span>Plan</span></h2>
                    <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .row END -->
    <div class="position-relative">
        <div class="xs-shape xs-pricing-shape" style="background-image: url(assets/images/shape/dots.png);" data-scrollax="properties: { translateY: '-250px' }"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="xs-pricing" style="background-image: url(assets/images/pricing/pricing_bg.png);">
                    <h3>Basic Plan</h3>
                    <p>
                        <sup>$</sup>
                        <span>49</span>
                        <sub>/mo</sub>
                    </p>
                    <ul class="list-unstyled">
                        <li>Get Free WiFi</li>
                        <li>Month to Month</li>
                        <li>No Time Restrictions</li>
                        <li>Gym and Cardio</li>
                        <li>Service Locker Rooms</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="xs-pricing" style="background-image: url(assets/images/pricing/pricing_bg.png);">
                    <h3>Advance</h3>
                    <p>
                        <sup>$</sup>
                        <span>69</span>
                        <sub>/mo</sub>
                    </p>
                    <ul class="list-unstyled">
                        <li>Get Free WiFi</li>
                        <li>Month to Month</li>
                        <li>No Time Restrictions</li>
                        <li>Gym and Cardio</li>
                        <li>Service Locker Rooms</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="xs-pricing" style="background-image: url(assets/images/pricing/pricing_bg.png);">
                    <h3>Premium</h3>
                    <p>
                        <sup>$</sup>
                        <span>99</span>
                        <sub>/mo</sub>
                    </p>
                    <ul class="list-unstyled">
                        <li>Get Free WiFi</li>
                        <li>Month to Month</li>
                        <li>No Time Restrictions</li>
                        <li>Gym and Cardio</li>
                        <li>Service Locker Rooms</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section>
<!-- Pricing end -->

<!-- Blog -->
<section class="position-relative xs-section-padding" data-scrollax-parent="true">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2>Latest <span>Info</span></h2>
                    <p>World is committed to making participation in the event a harassment free experience for everyone, regardless of level of experience.</p>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->

    <div class="xs-blog-shape xs-bg-cover" data-scrollax="properties: { translateY: '-250px' }" style="background-image: url(assets/images/shape/news_bg.png);">
    </div><!-- .xs-blog-shape END -->

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="xs-blog">
                    <div class="xs-blog-img">
                        <img src="assets/images/blog/blog-1.jpg" alt="testimonial">
                    </div>
                    <div class="xs-blog-content">
                        <div class="xs-blog-data">
                            <a href="#"><i class="icon icon-clock-o"></i> 25 November</a>
                            <a href="#"><i class="icon icon-tag"></i> Fitness</a>
                        </div>
                        <h3><a href="#">This village house believed need our mock</a></h3>
                        <p>We have heap of fun piece of equipmnt to build dow every inh of your body the and From boty builders for them.</p>
                        <div class="xs-blog-admin clearfix">
                            <div class="xs-blog-avatar">
                                <img src="assets/images/testimonial/testimonial-profile-1.png" alt="testimonial">
                            </div>
                            <p>Robert Tutul</p>
                            <ul class="list-unstyled list-inline">
                                <li class="xs-share-trigger">
                                    <span><i class="icon icon-share1"></i></span>
                                    <ul class="xs-share-content">
                                        <li><a href="#" class="xs-twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="xs-facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="xs-google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="xs-instagram"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .xs-blog -->
            </div><!-- .col-lg-4 -->
            <div class="col-lg-4">
                <div class="xs-blog">
                    <div class="xs-blog-img">
                        <img src="assets/images/blog/blog-1.jpg" alt="testimonial">
                    </div>
                    <div class="xs-blog-content">
                        <div class="xs-blog-data">
                            <a href="#"><i class="icon icon-clock-o"></i> 25 November</a>
                            <a href="#"><i class="icon icon-tag"></i> Fitness</a>
                        </div>
                        <h3><a href="#">This village house believed need our mock</a></h3>
                        <p>We have heap of fun piece of equipmnt to build dow every inh of your body the and From boty builders for them.</p>
                        <div class="xs-blog-admin clearfix">
                            <div class="xs-blog-avatar">
                                <img src="assets/images/testimonial/testimonial-profile-1.png" alt="testimonial">
                            </div>
                            <p>Robert Tutul</p>
                            <ul class="list-unstyled list-inline">
                                <li class="xs-share-trigger">
                                    <span><i class="icon icon-share1"></i></span>
                                    <ul class="xs-share-content">
                                        <li><a href="#" class="xs-twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="xs-facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="xs-google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="xs-instagram"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .xs-blog -->
            </div><!-- .col-lg-4 -->
            <div class="col-lg-4">
                <div class="xs-blog">
                    <div class="xs-blog-img">
                        <img src="assets/images/blog/blog-1.jpg" alt="testimonial">
                    </div>
                    <div class="xs-blog-content">
                        <div class="xs-blog-data">
                            <a href="#"><i class="icon icon-clock-o"></i> 25 November</a>
                            <a href="#"><i class="icon icon-tag"></i> Fitness</a>
                        </div>
                        <h3><a href="#">This village house believed need our mock</a></h3>
                        <p>We have heap of fun piece of equipmnt to build dow every inh of your body the and From boty builders for them.</p>
                        <div class="xs-blog-admin clearfix">
                            <div class="xs-blog-avatar">
                                <img src="assets/images/testimonial/testimonial-profile-1.png" alt="testimonial">
                            </div>
                            <p>Robert Tutul</p>
                            <ul class="list-unstyled list-inline">
                                <li class="xs-share-trigger">
                                    <span><i class="icon icon-share1"></i></span>
                                    <ul class="xs-share-content">
                                        <li><a href="#" class="xs-twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="xs-facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="xs-google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="xs-instagram"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .xs-blog -->
            </div><!-- .col-lg-4 -->
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Blog end -->

<!-- Brand -->
<div class="xs-purple-bg xs-section-padding-xs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="owl-carousel owl-theme xs-brand-owl">
                    <div class="item">
                        <img src="assets/images/brand/brand1.png" alt="brand">
                    </div>
                    <div class="item">
                        <img src="assets/images/brand/brand2.png" alt="brand">
                    </div>
                    <div class="item">
                        <img src="assets/images/brand/brand3.png" alt="brand">
                    </div>
                    <div class="item">
                        <img src="assets/images/brand/brand4.png" alt="brand">
                    </div>
                    <div class="item">
                        <img src="assets/images/brand/brand5.png" alt="brand">
                    </div>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</div><!-- Brand end -->
@endsection
