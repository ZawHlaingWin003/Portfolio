
/*===== Bg Circle Animate =====*/
// gsap.fromTo('.circle-home-one', {
//     x: '-30rem',
//     opacity: 0
// }, {
//     x: 0,
//     opacity: 1,
//     ease: 'back.out(1.7)',
//     delay: .8
// });

// gsap.fromTo('.circle-home-two', {
//     x: '30rem',
//     opacity: 0
// }, {
//     x: 0,
//     opacity: 1,
//     ease: 'back.out(1.7)',
//     delay: 1
// });



/*===== Banner Name Animate =====*/
// let name = gsap.timeline({
//     defaults: {
//         ease: "SloMo.easeOut"
//     }
// });
// name.to('#name, #job', {
//     y: "0%",
//     duration: 0.7
// });




/*===== Contact Form Input Wave =====*/
const labels = document.querySelectorAll('.input-box label')
labels.forEach(label => {
    label.innerHTML = label.innerText
        .split('')
        .map((letter, idx) => `<span style="transition-delay:${idx * 50}ms">${letter}</span>`)
        .join('')
})


/*===== Image Click & Show =====*/
baguetteBox.run('.biography__img, .gallery-container');



$(document).ready(function () {

    /*===== Quick Links =====*/
    /* $(window).on('scroll', function () {
        var link = $('.quick-links a.dot');
        var top = $(window).scrollTop();
        $('section').each(function () {
            var id = $(this).attr('id');
            var height = $(this).height();
            var offset = $(this).offset().top - 50;
            if (top >= offset && top < offset + height) {
                link.removeClass('active');
                $('.quick-links').find('[data-scroll="' + id + '"]').addClass('active');
            }
        });
    }); */

    /*===== Scroll Top Btn Show Hide =====*/
    $(window).scroll(function () {
        $('.scroll-top-btn').toggleClass('show', window.scrollY > 300);
    })
    /*===== Scroll To Top =====*/
    $('.scroll-top-btn').click(function () {
        $(window).scrollTop(0);
    })

    /*===== Nav Toggle for Mobile & Tablet =====*/
    $('#nav-toggle, .nav__link').click(function () {
        $('#nav-toggle').toggleClass('active');
        $('#nav-menu').toggleClass('active');
    })

    /*===== Reset Nav Toggle While Scrolling  =====*/
    $(window).scroll(function () {
        $('#nav-toggle').removeClass('active');
        $('#nav-menu').removeClass('active');
    })


    /*===== Loading =====*/
    $(window).on("load", function(){
        $('.load-wrap').fadeOut("slow");
        $('html').css('overflow', 'auto');
    });


})

