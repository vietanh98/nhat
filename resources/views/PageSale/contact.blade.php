@extends('PageSale.main')
@section('content')
    <section class="contact">
        <div class="container">
            <div class="breadcrumb-wp">
                <ol class="breadcrumb">
                    <svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #e91f6b;margin: 3px;">
                        <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg>
                    <li class="active">/Liên Hệ</li>
                </ol>
            </div>
            <div class="row block-news">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2306289669655!2d106.58506131530257!3d10.793640261826027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dcd3c3419ef%3A0xb3b2176c397b8e7f!2sSTUDIONOITHAT!5e0!3m2!1svi!2s!4v1473652914818"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="address-wp">
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i> 24 Đường số 4, phường Bình Hưng Hoà B, Quận
                                Bình Tân, HCM.
                            </li>
                            <li>
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                0988 459 063 (Mr.Việt Anh)</li>
                        </ul>
                    </div>
                    <div>
                        <form id="form_contact" method="post">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input required="" name="fullname" type="text" class="form-control" placeholder=""
                                       value="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input required="" name="email" type="email" class="form-control" placeholder=""
                                       value="">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea required="" name="content" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeDCFgUAAAAAC43Kc3Ow50k_0InVa7mh6q-xU-A">
                                    <div style="width: 304px; height: 78px;">
                                        <div>
                                            <iframe
                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeDCFgUAAAAAC43Kc3Ow50k_0InVa7mh6q-xU-A&amp;co=aHR0cHM6Ly9zdHVkaW9ub2l0aGF0LmNvbTo0NDM.&amp;hl=vi&amp;v=HYx6hBAtwYatsD8qzq7tXNTk&amp;size=normal&amp;cb=ruzoswvk0cox"
                                                width="304" height="78" role="presentation" name="a-9ref6b3pxf9u"
                                                frameborder="0" scrolling="no"
                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                        </div>
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                  class="g-recaptcha-response"
                                                  style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div>
                                    <iframe style="display: none;"></iframe>
                                </div>
                            </div>
                            <button type="text" class="btn btn-danger" onclick="SendEmail">Gửi</button>
                            <p></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
