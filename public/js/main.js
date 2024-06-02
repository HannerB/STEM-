jQuery(document).ready(function($){
	
	var wHeight = $(window).height();
	
	function isVisible( row, container, offset ){
    
    var elementTop = $(row).offset().top,
        elementHeight = $(row).height(),
        containerTop = container.scrollTop(),
        containerHeight = container.height() + offset;
	    
	return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
	}
	
// 18.10.18
// Folders Gestor Documentos


	// Comportament selector CATEGORIES
	
	//click main cat
	$('.docs-list .dw.cat-list li.cat > .name').click(function() {
	
		$('.this-cat-number').addClass('visible');
		
		var $this = $(this).closest('li');
		$this.addClass('on');
		
		var list_parent = $('.docs-list .cat-list li.sub.parent');
		list_child = $('.docs-list .cat-list li.sub.child');
		list_parent.removeClass('on');
		list_parent.removeClass('active');
		list_child.removeClass('on');
		list_child.removeClass('active');
		
		$('.open').removeClass('opened');
	    
	    var sub_all=$('.cat-list ul.dropdown ul');
	    if(sub_all.is(':visible')){
	    sub_all.slideUp();
	    
	    }
	
	});
	
	//click parent(sub) cat
	$('.docs-list .dw.cat-list li.sub.parent > .name').click(function() {
		
		var list_first = $('.docs-list .cat-list li.cat');
		list_parent = $('.docs-list .cat-list li.sub.parent');
		list_child = $('.docs-list .cat-list li.sub.child');
		list_first.removeClass('on');
		list_parent.removeClass('active');
		list_child.removeClass('on');
		list_child.removeClass('active');

		var $this = $(this).closest('li');
	    $this.addClass('active');
	    $this.addClass('on');
	    	    
	    var inactive=$('.docs-list .cat-list li.sub.parent:not(.active)');
	    sub_others=$(inactive).find('ul');
	    sub_others.slideUp();
	    inactive.find('.open').removeClass('opened');
	    inactive.removeClass('on');
	    
	    var sub=$(this).next('ul');
	    if(!sub.is(':visible')){
	    sub.slideDown();
		} else {
		sub.slideUp();

		}
		
	});
	
	//click sub cat
	$('.docs-list .dw.cat-list li.sub.child > .name').click(function() {
	
		var list_child = $('.docs-list .cat-list li.sub.child');
		list_parent = $('.docs-list .cat-list li.sub.parent');
		list_child.removeClass('on');
		list_child.removeClass('active');
		list_parent.removeClass('on');
		
		var $this = $(this).closest('li');
	    $this.addClass('active');
	    $this.addClass('on');
	    
		
	    var sub=$(this).next('ul');
	    if(!sub.is(':visible')){
	    sub.slideDown();
		} else {
		sub.slideUp();

		}		
		
	});
	
	$('.docs-list .dw.cat-list li').has('ul').prepend( "<div class='open'></div>" );

	$('.docs-list .dw.cat-list .dropdown li .name').click(function() {
		$(this).prev('.open').toggleClass('opened');
	});

		
	//CARREGAR MÉS - Documents
	
	paginarDocumentos();

/*
		if($(this).closest('.sub').data('cat') != undefined){
			var cat = $(this).closest('.sub').data('cat');
		} else {
			var cat = $(this).closest('.cat').data('cat');
		}
*/
		
		
	
	function paginarDocumentos(){
	
		if(!$('.cat-list').length && $('ol.docs-list').length){
			cat = 'parent';
		
		} else {
			
			
			if($('.docs-list li .sub.on').data('cat') != undefined){
				var cat = $('.docs-list li .sub.on').data('cat');
			} else {
				var cat = 'parent';
			}
			
		}
		
/*		//IMPRIMEIX OK ELS DATA-CAT
		
		if($('.docs-list li.sub.on').data('cat') != undefined) {
			var cat = $('.docs-list li.sub.on').data('cat');
		} else {
			var cat = 'parent';
		}
*/

		if($('ol.docs-list').length){
			
			console.log(cat);
			
			var size_li =  $('ol.docs-list > li[data-cat~="'+cat+'"]:visible').size();
			
			var x=9;
			//amaguem tots els de la categoria actual menys el 10 primers
			$('ol.docs-list li[data-cat~="'+cat+'"]:gt('+x+')').hide();

	
			$('#loadMore').hide();		
			
			// comprovem si en queden d'amagats i si és així mostrem el botó load more
			
			setTimeout(function(){
				if($('ol.docs-list > li[data-cat~="'+cat+'"]:hidden').length > 0){
					$('#loadMore').show();
				}
			}, 20);
		
		}
			
	}
	
	
	$('#loadMore').hide();
	
	$('.docs-list li .name').click(function(){
		
		$('.search-field').val('');
				

		setTimeout(function(){
		
			paginarDocumentos();
			

		}, 30);
			
	});
	
	
	$('#loadMore').click(function () {
		
		if(!$('.cat-list').length){
			var cat = 'parent';
		} else {
		
			if($('.docs-list li .sub.on').data('cat') != undefined){
				var cat = $('.docs-list li .sub.on').data('cat');
			} else {
				var cat = 'parent';
			}


			//var cat = $('.cat.active').data('cat');
		}
		var size_li =  $('ol.docs-list > li[data-cat~="'+cat+'"]:visible').size();
		var x=9;
		
		//mostrem els 10 propers amagats de la categoria active
		$('ol.docs-list li[data-cat~="'+cat+'"]:hidden:lt('+x+')').show();
		
		//si no en queden d'amagats, amaguem el boto
		if($('ol.docs-list > li[data-cat~="'+cat+'"]:hidden').length == 0){
			$('#loadMore').hide();
		}
		
	});
	
	
	
	
	// Aplica el FILTRE
	
	//parent
	$(".docs-list .dw.cat-list li.cat .name").click(function(e) {
	
	  e.preventDefault();
	  
	  $("ol.docs-list > li").each(function() {
	  
	  if ($(this).attr('data-cat') == 'parent') {
	  
	  $(this).removeClass('hidden');
	  
	  } else {
	  
	  $(this).addClass('hidden');
	  
	  }
		  
	  });
	  
	  var amount = $('ol.docs-list > li:visible').length;
	  
	  if($('ol.docs-list > li:visible').length > 0){
		$('.this-cat-number').text( '(' + amount + ')' );
	  } else {
		$('.this-cat-number').text( '' );	
	  }
	  
	});
	
	//children
	$(".docs-list .dw.cat-list li.sub .name").click(function(e) {
	
	  e.preventDefault();
	  	  
	  var $this = $(this).closest('li');
	  var filter = $this.data("cat");

	  $("ol.docs-list > li").each(function() {
	  
	  $(this).removeClass('hidden');
	  
	  var category = $(this).data("cat");
	  $(this).addClass('hidden');
	  if (filter == category) {
	  $(this).removeClass('hidden');
	  }
	  
	  });
	  
	  var amount = $('ol.docs-list > li:visible').length;
	  
	  if($('ol.docs-list > li:visible').length > 0){
		$('.this-cat-number').text( '(' + amount + ')' );
	  } else {
		$('.this-cat-number').text( '' );	
	  }
	  
	});

	// CERCA PREDICTIVA
	
	if ($('#search-entity-01').length){
		
		$('.search-box input').keyup( function(){
			
			var value = $(this).val().toLowerCase();
			
			$('.cat-list .active').removeClass('active');
			
			$('ol.docs-list li').show();
			
			$('#loadMore').hide();
			
			$('ol.docs-list li').each( function(){
				
				var value_compare = $(this).find('.caption').text().toLowerCase();
				
				if ( value_compare.indexOf(value) !== -1 ) {
					
					$(this).closest('ol.docs-list li').removeClass('hidden');

				} else {
				
					$(this).closest('ol.docs-list li').addClass('hidden');

				}
				
			});
			
			if($(this).val() == ''){
				paginarDocumentos();
			}
				

		});
		
		
		
	}
	
	
// FI - Gestor documents --->	
	
	
	// Cover image (data attr)
	if ($('.cover').length) {
		$('.cover').each(function() {
			if ($(this).attr('data') != '' && typeof($(this).attr('data')) != 'undefined') {
				$(this).css("background-image", "url(" + $(this).attr('data') + ")");
			}
		});
	}

	$('.social-box, .main-banner .img, .news-box .img > a, .video-box .video-holder, .video-block .video-holder, .info-item .img a, .search-results .img > a').each(function(e) {
		if($(this).find('> img').length){
			var bg = 'url(' + $(this).find('> img').attr('src') + ')';
			$(this).find('> img').hide();
			$(this).css('background-image', bg);
		}
	});
	
	$("blockquote").each(function() {
    
    var quote = ($(this).text()); 
    quote = ("<q>"+quote+"</q>"); // add blockquote element to string

	}); // end each
	
	$('.main-nav li').has('> ul').addClass('has-drop');
	
	var $menu = $(".main-nav");
	$menu.attr( "id", "the-menu" ).removeClass('main-nav');
	
	if($(window).width() <= 991){
	
	$menu.mmenu({
		navbar: {
			titleLink: "anchor"
		},
		"navbars": [{
			"position": "top",
			"content": [
				"breadcrumbs",
				"close"
			]
		}],
		offCanvas: {
			position: "right",
			zposition: "front",
			menuInjectMethod:'append'
		}
	}, {
		navbars: {
			breadcrumbSeparator: '|'
		}
	});

	} else {
	
	$menu.mmenu({
		"navbars": [{
			"position": "top",
			"content": [
				"breadcrumbs",
				"close"
			]
		}],
	}, {
		navbars: {
			breadcrumbSeparator: '|'
		}
	});	
		
	}

	var mmenuAPI = $menu.data('mmenu'),
		mobileNav = $('#the-menu');
	$('.the-menu-opener').click(function(){
		if ($('html').hasClass('mm-opened')) {
			mmenuAPI.close();
		} else{
			mmenuAPI.open();
		}
		return false;
	});
	
	
	$('.mm-listview .mm-next').wrapInner('<span></span>');

	
	$('.mega-menu .services-menu').clone().appendTo('.mm-menu .mm-panel');
	
	$('.mm-menu .mm-panel:nth-child(1) .mm-listview > li').each(function(e) {
		if(!$(this).hasClass('category-item')){
			$(this).addClass('no-category-item');
		}
	});
	
	$('.mm-menu .mm-listview .category-item > .mm-next').click(function(){
		if($(this).closest('.category-item').hasClass('color-pink')){
			$(this).closest('.mm-panels').removeClass().addClass('mm-panels active-panel-pink');
		}
		if($(this).closest('.category-item').hasClass('color-light-blue')){
			$(this).closest('.mm-panels').removeClass().addClass('mm-panels active-panel-light-blue');
		}
		if($(this).closest('.category-item').hasClass('color-purple')){
			$(this).closest('.mm-panels').removeClass().addClass('mm-panels active-panel-purple');
		}
	});
	
	$('.mm-menu .mm-listview .no-category-item .mm-next').click(function(){
		$(this).closest('.mm-panels').removeClass().addClass('mm-panels');
	});
	
	setMainBannerTopOffset();
		
	
	if($(window).width() <= 767){
		
		$('.search-form .form-control').attr('placeholder', '¿Qué buscas?');

		if(!$("body").hasClass("search")) { 
		$('.search-box .search-opener').click(function(){
			$('.search-box-mobile').toggleClass('on');
		});
		}

	} else {
		
		$('.search-box .search-opener').click(function(){
			$('.search-box form').toggleClass('on');
			$(this).toggleClass('off');
		});
	}

	setMainAreaTopOffset();
	
	$('.get-height.eq-height-big').matchHeight();
	
	$('.news-box.eq-height-small').matchHeight();
	
	var infoSlideshow = $('.info-slideshow');
	$(function() {
		infoSlideshow.on('init', function(event, slick) {
			slick = $(slick.$slider);
			var slidesTotal = slick.find('.slide').length
			slick.closest('.slideshow-widget').find('.switcher-box .slide-total').html(slidesTotal);
		});
		infoSlideshow.on('afterChange', function(event, slick, currentSlide) {
			slick = $(slick.$slider);
			var ix = slick.find('.slide').eq(currentSlide).index() + 1,
				slidesTotal = slick.find('.slide').length
			slick.closest('.slideshow-widget').find('.switcher-box .slide-current').html(ix);
		});
		infoSlideshow.slick({
			dots: false,
			arrows: false,
			infinite: true,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: false
		});
	});
	
	$('.slideshow-widget .switcher-box .btn-direction-prev').click(function (){
		$(this).closest('.slideshow-widget').find('.info-slideshow').slick('slickPrev');
		return false;
	});
	
	$('.slideshow-widget .switcher-box .btn-direction-next').click(function (){
		$(this).closest('.slideshow-widget').find('.info-slideshow').slick('slickNext');
		return false;
	});
	
	var videoSlideshow = $('.video-slideshow');
	$(function() {
		videoSlideshow.on('init', function(event, slick) {
			slick = $(slick.$slider);
			var slidesTotal = slick.find('.slide').length;
			slick.closest('.video-area').find('.switcher-box .slide-total').html(slidesTotal);
		});
		videoSlideshow.on('afterChange', function(event, slick, currentSlide) {
			slick = $(slick.$slider);
			var ix = slick.find('.slide').eq(currentSlide).index() + 1,
				slidesTotal = slick.find('.slide').length;
			slick.closest('.video-area').find('.switcher-box .slide-current').html(ix);
		});
		videoSlideshow.slick({
			dots: true,
			arrows: true,
			infinite: true,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 7000,
			responsive: [{
				breakpoint: 1025,
				settings: {
					arrows: false
				}
			}]
		});
	});
	
	$('.video-area .switcher-box .btn-direction-prev').click(function (){
		$(this).closest('.video-area').find('.video-slideshow').slick('slickPrev');
		return false;
	});
	
	$('.video-area .switcher-box .btn-direction-next').click(function (){
		$(this).closest('.video-area').find('.video-slideshow').slick('slickNext');
		return false;
	});
	
	$('.banners-slideshow').slick({
		dots: true,
		arrows: false,
		infinite: true,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					dots: true
				}
			}
		]
	});
	
	$('.news-slideshow').slick({
		dots: true,
		arrows: true,
		infinite: true,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true
	});
	
	$('.docs-slideshow').slick({
		dots: true,
		arrows: true,
		infinite: true,
		fade: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true
	});
	
	setNewsSlideshowArrowsTopOffset();
	
	$('.info-item').matchHeight();
	
	var bottomSection = $('.bottom-section');
	$(function() {
		bottomSection.on('init', function(event, slick) {
			slick = $(slick.$slider);
			var slidesTotal = slick.find('.slide').length
			slick.find('.switcher-box .slide-total').html(slidesTotal);
		});
		bottomSection.on('afterChange', function(event, slick, currentSlide) {
			slick = $(slick.$slider);
			var ix = slick.find('.slide').eq(currentSlide).index() + 1,
				slidesTotal = slick.find('.slide').length
			slick.find('.switcher-box .slide-current').html(ix);
		});
		bottomSection.slick({
			dots: false,
			arrows: false,
			infinite: true,
			fade: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			slide: '.slide',
			autoplay: false
		});
	});
	
	// GALLERY FIELD

	var $grid = $('.gallery-layout');
    	$grid.addClass('show');
    	console.log('show');
	    $grid.masonry({
	        itemSelector: '.item',
	        columnWidth: '.item'
	    });
	    setTimeout(function(){
	    	console.log('lazy load');
		    lazyLoadBgImages();

	    }, 100);

	
	function lazyLoadBgImages(){
		$('.cover').each(function(){
			var t = $(this);
							
				if(!t.hasClass('loaded')){
					t.addClass('loaded');
					t.css("background-image", "url(" + t.attr('data') + ")");
					
					console.log(t.attr('data'));
				}
		});
	}
		
	lazyLoadBgImages();			
	
	// Slider fullscreen		
	var $status = $('.slideNumber');
    var $Lightbox = $('.gallery-lightbox');
	var $slide = $('.gallery-lightbox .slide');    
    
    $Lightbox.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
	    
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + slick.slideCount);
		
    }); 
    
    $Lightbox.slick({
		autoplay:false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
  		dots: false,
  		arrows: true,
  		lazyLoad: 'ondemand',
  		prevArrow: '<span class="slick-prev"></span>',
  		nextArrow: '<span class="slick-next"></span>',
  		responsive: [
		{
			breakpoint: 768,
			settings: {
				centerMode: false,
				variableWidth: false,
				touchMove: true,
				swipe: true,
				arrows: false
			}
		}

		]

	});
	
    $('.gallery-layout .item').click(function(e){
	e.preventDefault();
	
		var slideIndex = $(this).index();
		console.log (slideIndex);		

		$Lightbox.slick('slickGoTo', parseInt(slideIndex), true)/*.addClass('active')*/;
		
		setTimeout(function() {
			$Lightbox.slick('setPosition');
			$Lightbox.addClass('active');
			console.log('loaded');
			return false;
		}, 100);
						
			$('.slideNumber').show();
			
			$('.slick-close').show();
			$('body').addClass('open-gallery');
			return false;
		
		
		
	});
		
	$('.slick-close').click(function(){
		$('.gallery-lightbox').removeClass('active');
		$('.slideNumber').hide();
		$('body').removeClass('open-gallery');

		$(this).hide();
		return false;
	});
	/*end gallery*/
	
	
	$('.bottom-section .switcher-box .btn-direction-prev').click(function (){
		$(this).closest('.bottom-section').slick('slickPrev');
		return false;
	});
	
	$('.bottom-section .switcher-box .btn-direction-next').click(function (){
		$(this).closest('.bottom-section').slick('slickNext');
		return false;
	});
	
	
	// Fancybox
	$('[data-fancybox="youtube"]').fancybox({
		toolbar  : false,
		smallBtn : true,
	    youtube : {
	        controls : 0,
	        showinfo : 0
	    },
	    vimeo : {
	        color : 'f00'
	    }
	});
	
	$('[data-fancybox="video"]').fancybox({
		toolbar  : false,
		smallBtn : true,
		opts : {
			afterShow : function( instance, current ) {
				console.log( 'done!' );
				this.content.find('video').trigger('play');
			}
		}
	});
  
	//CALENDAR
  
	$(function() {
		$(window).load(function() {
			$('.calendar').datepicker({
			showOtherMonths: true,
			//selectOtherMonths: true,
			onSelect: function(dateText, obj) {
				var d = obj.selectedDay;
				var m = obj.selectedMonth;
				var y = obj.selectedYear;
				var events_day = [];
				$('#' + this.id + ' td[data-month="' + m + '"]').each(function(itr) {
					if (parseInt($(this).attr('data-year')) == y && $(this).find('a').text() == d) {
						var class_list = $(this).attr('class').split(/\s+/);
						if (class_list.length) {
							for (var i = class_list.length - 1; i >= 0; i--) {
								if (class_list[i].indexOf('event-id-') !== -1) {
									var id = parseInt(class_list[i].replace('event-id-', ''));
									events_day.push(id);
								};
							};
						};
					};
				});
				if (events_day.length) {
					$('.events-list .events-item').each(function() {
						if ($.inArray(parseInt($(this).attr('data-id')), events_day) !== -1) {
							$(this).addClass('event-selected');
						} else {
							$(this).removeClass('event-selected');
						};
					});
				} else {
					$('.events-item.event-selected').removeClass('event-selected');
				};
			},
			onChangeMonthYear: function(y, m) {
				renderEventsList(m,y);
				$('.events-item.event-selected').removeClass('event-selected');
			},
			beforeShowDay: function(tdate) {
				var classes = '';
				var title = '';
				if (window.events_theme_arr.length) { /*new*/
					for (var i = window.events_theme_arr.length - 1; i >= 0; i--) {
						for (var j = window.events_theme_arr[i].event_dates.length - 1; j >= 0; j--) {
							var single_dates = new Date(window.events_theme_arr[i].event_dates[j]);
							if (single_dates.valueOf() === tdate.valueOf()) {
								if (classes.indexOf('highlight-day') === -1) {
									classes = classes + 'highlight-day';
								};
								classes = classes + ' event-id-' + window.events_theme_arr[i].id;
								if (title !== '') {
									title = title + ', ' + window.events_theme_arr[i].title;
								} else {
									title = title + window.events_theme_arr[i].title;
								};
							}
						};
					};
				};
				return [true, classes, title];
			},
		});
		});

		renderEventsList($('.events-list').attr('data-curent-mounth'),$('.events-list').attr('data-curent-year'));

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'MiГ©rcoles', 'Jueves', 'Viernes', 'SГЎbado'],
			dayNamesShort: ['Dom', 'Lun', 'Mar', 'MiГ©', 'Juv', 'Vie', 'SГЎb'],
			dayNamesMin: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yyyy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};

		$.datepicker.setDefaults($.datepicker.regional['es']);
		function renderEventsList(m,y) {
			var year = y;
			if (m) {
				var m_str = m + '';
				var curent_mounth = (m_str.length !== 1) ? m_str :  '0' + m_str;
			} else {
				var curent_mounth = $('.events-list').attr('data-curent-mounth');
			};
			console.log(curent_mounth + ' ' + year);
			$('.events-list .events-item').each(function() {
				if ($(this).attr('data-mounth') == curent_mounth && $(this).attr('data-year') == year) { /*new*/
					$(this).show();
				} else {
					$(this).hide();
				};
			});
		}
	});

	$('.events-area .scrollable-area').each(function() {
		$(this).jScrollPane({
			showArrows: $(this).is('.arrow'),
			verticalDragMaxHeight: 28
		});
		var api = $(this).data('jsp');
		var throttleTimeout;
		$(window).bind('resize', function() {
			if (!throttleTimeout) {
				throttleTimeout = setTimeout(function() {
					api.reinitialise();
					throttleTimeout = null;
				}, 50);
			}
		});
		setInterval(function() {
			api.reinitialise();
		}, 200);
	});
	
	
	// SEARCH RANGE RELEVANSSI
	
	$(function() {
		$(window).load(function() {

			$('.rango .desde').datepicker({ 
				dateFormat: 'yy-mm-dd',
				maxDate: 0,
				showOtherMonths: true,
				selectOtherMonths: true,
				onSelect: function(dateText, inst) {
					$( '.rango .hasta' ).datepicker( "option", "defaultDate", dateText );
				}
				}).on("change", function(e) {
					var desdeDate = $(this).val();
	 				$('#desde').attr('value', desdeDate);
	 				var dates_filter = $('.rango input.desde').val();
	 				$('.fecha-in').text( dates_filter );

 				});



			$('.rango .hasta').datepicker({ 
				dateFormat: 'yy-mm-dd',
				maxDate: 0,
				showOtherMonths: true,
				selectOtherMonths: true,
				}).on("change", function(e) {
					var hastaDate = $(this).val();
	 				$('#hasta').attr('value', hastaDate);	
	 				var dates_filter = $('.rango input.hasta').val();
	 				$('.fecha-out').text( dates_filter );
	 			});
			
			
/*
			$('#search-submit').click( function(e){
			    e.preventDefault();
			    var current_url = "?s=";
			    var url = current_url += "&from="+ $("#desde").val() + "&to=" + $("#hasta").val();
			    window.location = url;
			})
*/

		});
	});
	
	// Search filters
	var checkSearchOptions = $("input[class=OPTION\\[\\]]");
	
	$('.adv-search .cat-list li.todo').find('input').prop("checked", !$('.adv-search .cat-list li.todo').find('input').prop("checked"));
	
	$('.adv-search .cat-list li').click(function() {
		$('.adv-search .cat-list li').removeClass('active');
		$('.adv-search .cat-list li').find('input').prop("checked", false);
			
		//e.preventDefault();
		$(this).toggleClass('active');
		$(this).find('input').prop("checked", !$(this).find('input').prop("checked"));

	});
	

	
	initArticleShare();
	initArticleTools();
	closeBottomSection();
	setWidthMainNavLevels();
	initSearchBlock();
		

	$(window).resize(function(){
		
		setWidthMainNavLevels();
		
		setTimeout(function() {
			setMainBannerTopOffset();
		}, 500);
		
		setMainAreaTopOffset();
		
		setTimeout(function() {
			setNewsSlideshowArrowsTopOffset();
		}, 500);
		
	});
	$(window).scroll(function(){
		
		$(window).scrollTop() > 0 ? $('body').addClass('scrolled') : $('body').removeClass('scrolled');
		
	});
	
	function setWidthMainNavLevels(){
		$('.main-nav ul').each(function(e) {
			$(this).outerWidth(getMainNavWidth() / 3);
			$(this).css('min-height', $('.main-nav > ul').outerHeight()); /* new code */
		});
	}
	
	function getMainNavWidth(){
		return $('.main-nav').outerWidth();
	}
	
	function getHeaderHeight(){
		return $('#header').outerHeight();
	}
	
	function getMainBannerHeight(){
		return $('.main-banner').outerHeight();
	}
	
	function setMainBannerTopOffset(){
		$('.main-banner').css('top', getHeaderHeight() + 'px');
	}
	
	function setMainAreaTopOffset(){
		$('.main-area').css('margin-top', getHeaderHeight() + getMainBannerHeight() + 'px');
	}
	
	function setNewsSlideshowArrowsTopOffset(){
		$('.news-slideshow').each(function(e) {
			var imageHeight = $(this).find('.img').outerHeight();
			$(this).find('.slick-arrow').css('top', imageHeight / 2 + 'px');
		});
	}
	
	document.addEventListener('DOMContentLoaded', function() {
		var supportsMixBlendMode = window.getComputedStyle(document.body).mixBlendMode;
		if(typeof supportsMixBlendMode == 'undefined') {
			$('body').addClass('not-support-mix-blend-mode');
		}
	}, false);
	
	function initArticleShare() {
		var $social = $('.socials-list');
	
		toggleFixing();
		$(window).on('resize', toggleFixing);
	
		function toggleFixing() {
			if ($(window).width() > 1239) {
				initFixing();
			} else {
				if ($social.is('.stick-initialized')) {
					detachFixing();
				}
			}
		}
	
		function initFixing() {
			$social.stick_in_parent({
				parent: '.article-section',
				offset_top: 130
			});
			$social.addClass('stick-initialized');
		}
	
		function detachFixing() {
			$social.removeClass('stick-initialized');
			$social.trigger("sticky_kit:detach");
		}
	}
	
	function initArticleTools() {
		var $article = $('.article-section'),
			$btnPrint = $article.find('.print-btn'),
			$btnIncrease = $article.find('.tool-increase'),
			$btnDecrease = $article.find('.tool-decrease'),
			$btnReset = $article.find('.tool-reset'),
			FONT_LIMIT_TOP = 32,
			FONT_LIMIT_BOTTOM = 10;
	
		$btnPrint.on('click', function(e) {
			e.preventDefault();
			window.print();
		});
	
		$btnIncrease.on('click', function(e) {
			e.preventDefault();
			increaseFontSize();
		});
	
		$btnDecrease.on('click', function(e) {
			e.preventDefault();
			decreaseFontSize();
		});
	
		$btnReset.on('click', function(e) {
			e.preventDefault();
			resetFontSize();
		});
	
		function increaseFontSize() {
			var fontSize = ~~$article.css('font-size').replace('px', '');
	
			fontSize++;
			if (fontSize <= FONT_LIMIT_TOP) {
				$article.css('font-size', fontSize);
			}
		}
	
		function decreaseFontSize() {
			var fontSize = ~~$article.css('font-size').replace('px', '');
	
			fontSize--;
			if (fontSize >= FONT_LIMIT_BOTTOM) {
				$article.css('font-size', fontSize);
			}
		}
	
		function resetFontSize() {
			$article.css('font-size', '');
		}
	}
	
	function closeBottomSection() {
		var $section = $('.bottom-section'),
			$btnClose = $section.find('.btn-close');
	
		$btnClose.on('click', function(e) {
			e.preventDefault();
			$section.stop().fadeOut(300);
		});
	}
	
	function initSearchBlock() {
		var $search = $('.search-block'),
			$linkAdvSearch = $search.find('.link-adv-search'),
			$advSearch = $search.find('.adv-search');
	
		$linkAdvSearch.on('click', function(e) {
			e.preventDefault();
			$advSearch.stop().slideToggle(300);
		});
	
	}

});	// ready


	
// MAP

(function($) {
/*
*  new_map
*/
function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');	
		
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	// add a markers reference
	map.markers = [];
	
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	
	// center map
	center_map( map );
	
	// return
	return map;
	
}

/*
*  add_marker
*/
function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

}

/*
*  center_map
*/
function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}



var markers = [];
function mapLocInitialize(map_) {
	var latitude = $('#'+ map_).data('lat');
	var longitude = $('#'+ map_).data('lng');
	
	var latlng = new google.maps.LatLng(latitude,longitude);
		
	var myOptions = {
		zoom: 13,
		zoomControl: false,
		center: latlng,
		disableDefaultUI: true,
		scrollwheel: true,
		//mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: [
		  {
		    "featureType": "administrative.land_parcel",
		    "stylers": [
		      {
		        "color": "#beecb4"
		      },
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "administrative.neighborhood",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "landscape.natural",
		    "stylers": [
		      {
		        "color": "#beecb4"
		      }
		    ]
		  },
		  {
		    "featureType": "poi",
		    "elementType": "labels.text",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "poi.business",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "poi.park",
		    "elementType": "geometry.fill",
		    "stylers": [
		      {
		        "color": "#beecb4"
		      }
		    ]
		  },
		  {
		    "featureType": "road",
		    "elementType": "labels",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "road",
		    "elementType": "labels.icon",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "transit",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  },
		  {
		    "featureType": "water",
		    "elementType": "labels.text",
		    "stylers": [
		      {
		        "visibility": "off"
		      }
		    ]
		  }
		]

    	};

	var map = new google.maps.Map(document.getElementById(map_), myOptions);	
		
	var json = wp_obj;
	
	for (var i = 0, length = json.length; i < length; i++) {
	var data = json[i], latLng = new google.maps.LatLng(data.lat, data.lng);
		
		var contentString = '<span class="label">' + data.label + '</span>'
  
		// Creating a marker and putting it on the map
		var marker = new RichMarker({
			position: latLng,
			map: map,
			shadow: 0,
			content: '<a href="#location-' + data.id + '" class="marker-point n-' + data.id + '">' + contentString + '</a>'
		});
		
		google.maps.event.addDomListener(window, 'resize', function(){
			map.setCenter(latlng);
		});
		
		google.maps.event.addListenerOnce(map, 'idle', function(){
			
			$('.locations-map .marker-point.n-01').addClass('active');
			$('.description-box .bottom .n-01').addClass('active');
			
			$('.locations-map .marker-point').click(function(){
				$('.locations-map .marker-point').removeClass('active');
				$(this).addClass('active');
				$($(this).attr('href')).addClass('active').siblings('div').removeClass('active');
				
				$('.description-box .bottom .n-' + data.id + '').addClass('active').siblings('li').removeClass('active');
				return false;
			});
			
		
		});
		markers.push(marker);
		
		
	}
}


/*
*  document ready
*
*  render each map
*/
var map = null;

jQuery(document).ready(function($){

	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );

	});
	
	$('.locations-map').each(function(){
		var map_ = $(this).attr('id');
		mapLocInitialize(map_);
	});

});

})(jQuery);