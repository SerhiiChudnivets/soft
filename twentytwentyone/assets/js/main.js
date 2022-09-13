window.onload = function (){

    var root = document.getElementsByTagName( 'html' )[0];

    var is_opera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var is_Edge = navigator.userAgent.indexOf("Edge") > -1;
    var is_chrome = !!window.chrome && !is_opera && !is_Edge;
    var is_explorer= typeof document !== 'undefined' && !!document.documentMode && !is_Edge;
    var is_firefox = typeof window.InstallTrigger !== 'undefined';
    var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    var nua = navigator.userAgent;
    var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
    if(is_chrome||is_opera||is_firefox||is_android){
        root.setAttribute( 'class','webp');

    }else if(is_safari){
        root.setAttribute( 'class','jp2');
    }
    else{
        root.setAttribute( 'class','no-webp');
    }
    // let burger = document.getElementById('burger');
    // let close = document.getElementById('close');
    // burger.addEventListener('click', function(){
    //     this.closest('.header').classList.add('open');
    // })
    // close.addEventListener('click', function(){
    //     this.closest('.header').classList.remove('open');
    // });
    setEvents();
    getVacancies();

}
function setEvents(){
   let categories =  document.querySelectorAll('[data-category]');
   for (let i = 0; i < categories.length; i++){
       let data = categories[i].getAttribute('data-category');
       categories[i].addEventListener('click', getVacancies);
   }
}
function getVacancies(event){
    let path = document.getElementById('path').textContent;
    let category = '';
    if(event){
    let element = event.target;
        category = element.getAttribute('data-category');
		
		$('.active').removeClass('active');
		$(element).addClass('active');
    }
    let url = ``;
    const lang = document.getElementById('lang').textContent;
	let currLangPath = lang == "ru" ? lang+"/": "";
    if(category){
         url = `${window.location.origin}/wp-json/vacancies/v1/vacancies/?category=${category}&lang=${lang}`;
    }else{
         url = `${window.location.origin}/wp-json/vacancies/v1/vacancies/?lang=${lang}`;
    }
    fetch(url)
        .then(response => response.json())
        .then(data => {
            let parent = document.getElementById('vacancies_wrapper');
            let template =`<div id="vacancies">`;
            let posts = data;
            for(let i = 0; i < posts.length; i++){
				console.log(posts[i]);
				console.log(currLangPath);
                template+=`
            <a href="${window.location.origin}/${currLangPath}${posts[i].post_type}/${posts[i].post_name}" class="vacancy__item cloud9-item">
            <div class="vacancy__content">
            <div class="vacancy__title">${posts[i].post_title}</div>
            
            <div class="vacancy__location">${posts[i].acf.vacancy__location ? posts[i].acf.vacancy__location : ''}</div>`;
                if(posts[i].acf.short_info) {
                    for (let j = 0; j < posts[i].acf.short_info.length; j++) {
                        template += `<div class="vacancy__workflow">${posts[i].acf.short_info[j].item}</div>`;
                    }
                }
            template+=`<div class="vacancy__description">${posts[i].post_excerpt}</div>
            </div>
            <div class="vacancy__link-block">
             <span class="vacancy__link">
              ${ lang == 'ru' ? 'Подробнее' : 'Детальніше' }
             <svg class="vacancy__img" width="36" height="16" viewBox="0 0 36 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M35.7071 8.70711C36.0976 8.31658 36.0976 7.68342 35.7071 7.29289L29.3431 0.928932C28.9526 0.538408 28.3195 0.538408 27.9289 0.928932C27.5384 1.31946 27.5384 1.95262 27.9289 2.34315L33.5858 8L27.9289 13.6569C27.5384 14.0474 27.5384 14.6805 27.9289 15.0711C28.3195 15.4616 28.9526 15.4616 29.3431 15.0711L35.7071 8.70711ZM0 9H35V7H0V9Z" fill="#312A6C"/>
              </svg>
             </span>
</div>
            </a>
            `;
            }
            parent.innerHTML = template;
            initSlick();
            $('[data-parent').removeClass('open');
        });

}
function initSlick(){
        $('#vacancies').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows: false,
			centerMode: true,
			arrows: true,
			prevArrow:'<svg class="left" width="51" height="16" viewBox="0 0 51 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.292893 7.29289C-0.0976295 7.68341 -0.0976296 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41422 8L8.07107 2.34314C8.46159 1.95262 8.46159 1.31945 8.07107 0.928928C7.68054 0.538404 7.04738 0.538404 6.65685 0.928928L0.292893 7.29289ZM51 7L1 7L1 9L51 9L51 7Z" fill="#312A6C"></path></svg>',
            nextArrow:'<svg class="right" width="51" height="16" viewBox="0 0 51 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M50.7071 8.70711C51.0976 8.31658 51.0976 7.68342 50.7071 7.29289L44.3431 0.928932C43.9526 0.538408 43.3195 0.538408 42.9289 0.928932C42.5384 1.31946 42.5384 1.95262 42.9289 2.34315L48.5858 8L42.9289 13.6569C42.5384 14.0474 42.5384 14.6805 42.9289 15.0711C43.3195 15.4616 43.9526 15.4616 44.3431 15.0711L50.7071 8.70711ZM0 9L50 9V7L0 7L0 9Z" fill="#312A6C"></path></svg>',
			    responsive: [
    {
      breakpoint: 991,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
	  dots: true,
		arrows: false,
      }
    }],
        });
}
function slogan(){
    $('#softum-slogan').marquee({
        duration: 15000,
        gap: 50,
        delayBeforeStart: 0,
        direction: 'left',
        duplicated: true
    });
}

$(document).ready(function(){
    $('.menu-item').on('click', function(){
           $(this).closest('.open-menu').removeClass('open-menu'); 
    });
	    $('.header__burger').on('click', function(){
           $(this).closest('.for__mobile-menu').addClass('open-menu'); 
    });
	
    let width = $(window).width();
    console.log(width);

    $('[data-dropdown]').on('click', function(){
        $(this).closest('[data-parent]').toggleClass('open');
    });
        $('.header__menu-close').on('click', function(){
        $(this).closest('.open-menu').toggleClass('open-menu');
    });
	  if (width<768){
        $('[data-slider]').slick({
            slidesToShow: true,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
        });
    }
    $(window).resize(function(){
        if($('.slick-slider').hasClass('slick-initialized')){
            if($(window).width() > 767){
                $('[data-slider]').slick('unslick');
            }
        } else if( $(window).width() < 767){
            if(!$('.slick-slider').hasClass('slick-initialized')){
            $('[data-slider]').slick({
                slidesToShow: true,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
            });
        }
        }

    });
    
    slogan();

    // HEADER

    if (($(window).scrollTop() > 50)&&!$('.header__wrapper').hasClass('scrolled')) {
        $('.header__wrapper').addClass('scrolled')
    } 

    $(window).on('scroll', function (e) {
        if ($(window).scrollTop() > 50) {
            $('.header__wrapper').addClass('scrolled')
        } else {
            $('.header__wrapper').removeClass('scrolled')
        }
    });
    
    // btn-up
    $(".btn-up").on("click",function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, {
            duration: 1000,
            easing: "linear"
        });
    })

});
