

<!-- ========== Contact Section ========== -->
<section class="contact" id="contact">
    <div class="container">
        <div class="main-title title-right contact__title" data-content="Contact">
            <div class="main-title__number">
                <p>04</p>
            </div>
            <div class="main-title__text">
                <p class="main-title__text-short">Get in Touch</p>
                <p class="main-title__text-long">How to contact me</p>
            </div>
        </div>
        <div class="contact__intro intro">
            <h2>နည်းပညာနဲ့ ပတ်သက်ပြီး ဆွေးနွေးချင်လျှင် ဆက်သွယ်နိုင်ပါတယ်။ <img src="frontend/images/gif/Phone.gif" alt="Phone" width="30" height="30"> </h2>
            <p>Don't like forms? Send me an <a href="mailto:davidzaw1111@gmail.com" class="line-btn">email 📧</a>.</p>
        </div>
        <div class="contact__container">
            <div class="contact-info">
                <div>
                    <h2 class="contact-info__title">Contact Info</h2>
                    <ul class="contact-info__list">
                        <li class="contact-info__list__item">
                            <span><img src="frontend/images/location.png" alt=""></span>
                            <span>
                                No.(15), ZabuTheingi Street, BoKanNyut, Thingangyun
                                <br>
                                Yangon, Myanmar(Burma) <br>
                                90017
                            </span>
                        </li>
                        <li class="contact-info__list__item">
                            <span><img src="frontend/images/mail.png" alt=""></span>
                            <span>zawhlaingwin003@gmail.com</span>
                        </li>
                        <li class="contact-info__list__item">
                            <span><img src="frontend/images/call.png" alt=""></span>
                            <span>09-789288363</span>
                        </li>
                    </ul>
                </div>
                <ul class="contact-info__social__list">
                    <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-github"></i></a></li>
                    <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="contact-form">
                <h2 class="contact-form__title">Feel free to drop me a line <img src="frontend/images/gif/Email.gif" alt="Email" width="50" height="50"></h2>

                <div id="response" class="d-none"></div>
                <form action="{{ route('contact.send') }}" method="POST" class="contact-form__box" autocomplete="off" id="contact-form">
                    @csrf

                    <div class="input-box w50">
                        <input type="text" class="input-box__item" name="name" value="{{ old('name') }}" id="name" required>
                        <label>Name</label>
                        <span class="focus-border"></span>
                        <small><span class="text-danger error name__err"></span></small>
                    </div>
                    <div class="input-box w50">
                        <input type="text" class="input-box__item" name="email" value="{{ old('email') }}" id="email" required>
                        <label>Email</label>
                        <span class="focus-border"></span>
                        <small><span class="text-danger error email__err"></span></small>
                    </div>
                    <div class="input-box w100">
                        <input type="text" class="input-box__item" name="subject" value="{{ old('subject') }}" id="subject" required>
                        <label>Subject</label>
                        <span class="focus-border"></span>
                        <small><span class="text-danger error subject__err"></span></small>
                    </div>
                    <div class="input-box w100">
                        <textarea class="input-box__item" name="message" id="message" required>{{ old('message') }}</textarea>
                        <label>Message</label>
                        <span class="focus-border"></span>
                        <small><span class="text-danger error message__err"></span></small>
                    </div>
                    
                    <x-main-button type="submit" iconName="fa-message">
                        Send Message
                    </x-main-button>
                </form>
            </div>
        </div>
    </div>
</section>


@section('custom_js')
<script>
    $(document).ready(function(){
        $('#contact-form').submit(function (e) {
            e.preventDefault();
            const url = $(this).attr('action');
            const type = $(this).attr('method');
            $("#contact-button").attr('disabled', true).css('cursor', 'wait');

            var _token = $("input[name='_token']").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            $.ajax({
                type: "POST",
                url: url,
                data: {_token:_token, name:name, email:email, subject:subject, message:message},
                dataType: "json",
                beforeSend: function(){
                    $('.error').text('');
                },
                success: function (data) {
                    if(data.code == 200){
                        let success = '<p class="alert alert-success">'+data.response+'</p>';

                        $("#response").addClass('d-block').removeClass('d-none').html(success);
                        $("#contact-form")[0].reset();
                        $("#btn").attr('disabled', false).css('cursor', 'pointer');

                    }else if(data.code == 400){
                        $.each(data.response, function (key, value) {
                            $("."+key+"__err").text(value);
                            $("#btn").attr('disabled', false).css('cursor', 'pointer');
                        });
                    }
                }
            });
        });
    })
</script>
@endsection
