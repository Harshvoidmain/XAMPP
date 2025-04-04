
$(document).ready(function() {
    //open searchbar toggle code


        $(".demo1").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
      pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 4000,
            onToDo: function () {
                //console.log(this);
            }
        });

    $(".demo2").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
      pauseOnHover: true,
      navigation: false,
            direction: 'down',
            newsTickerInterval: 2500,
            onToDo: function () {
                //console.log(this);
            }
        });

        $("#demo3").bootstrapNews({
            newsPerPage: 4,
            autoplay: false,

            onToDo: function () {
                //console.log(this);
            }
        });

$('.closeall').click(function(){
  $('.panel-collapse.in')
    .collapse('hide');
});
$('.openall').click(function(){
  $('.panel-collapse:not(".in")')
    .collapse('show');
});

        var textfield = $("input[name=user]");
                    $('button[type="submit"]').click(function(e) {
                        e.preventDefault();
                        //little validation just to check username
                        if (textfield.val() != "") {
                            //$("body").scrollTo("#output");
                            $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                            $("#output").removeClass(' alert-danger');
                            $("input").css({
                            "height":"0",
                            "padding":"0",
                            "margin":"0",
                            "opacity":"0"
                            });
                            //change button text
                            $('button[type="submit"]').html("continue")
                            .removeClass("btn-info")
                            .addClass("btn-default").click(function(){
                            $("input").css({
                            "height":"auto",
                            "padding":"10px",
                            "opacity":"1"
                            }).val("");
                            });

                            //show avatar
                            $(".avatar").css({
                                "background-image": "url('http://api.randomuser.me/0.3.2/portraits/women/35.jpg')"
                            });
                        } else {
                            //remove success mesage replaced with error message
                            $("#output").removeClass(' alert alert-success');
                            $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                        }
                        //console.log(textfield.val());

                    });


loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }



$('#myCarousel').carousel({
                interval: 5000
        });

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });

    var cssSmall = {
		width: 100,
		height: 175,
		marginTop: 75
	};
	var cssMedium = {
		width: 150,
		height: 215,
		marginTop: 35
	};
	var cssLarge = {
		width: 200,
		height: 250,
		marginTop: 2
	};
	var aniConf = {
		queue: false,
		duration: 300
	};

	$('#carousel')
		.children().css(cssSmall)
		.eq(1).css(cssMedium)
		.next().css(cssLarge)
		.next().css(cssMedium);

	$('#carousel').carouFredSel({
		width: '100%',
		height: 250,
		items: 5,
		scroll: {
			items: 1,
			duration: aniConf.duration,
			onBefore: function( data ) {

				//	0 [ 1 ] 2  3  4
				data.items.old.eq(1).animate(cssSmall, aniConf);

				//	0  1 [ 2 ] 3  4
				data.items.old.eq(2).animate(cssMedium, aniConf);

				// 0  1  2  [ 3 ] 4
				data.items.old.eq(3).animate(cssLarge, aniConf);

				//	0  1  2  3 [ 4 ]
				data.items.old.eq(4).animate(cssMedium, aniConf);
			}
		}
	});



    "use strict";
    // Search field toggle in top bar
    $('li.search a').click(function(e) {
        $(this).parent().find('#top-search').toggle().focus();
        $('#top-links').toggleClass('search-open');
        e.preventDefault();
    });


     /**
  * NAME: Bootstrap 3 Multi-Level
  * This script will active Triple level multi drop-down menus in Bootstrap 3.*
  */
  $('li.dropdown-submenu').on('click', function(event) {
      event.stopPropagation();
      if ($(this).hasClass('open')){
          $(this).removeClass('open');
      }else{
          $('li.dropdown-submenu').removeClass('open');
          $(this).addClass('open');
     }
  });



    // Client logo corousel
    "use strict";
    $("#owl-demo").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-general").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-comp").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-extc").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-elect").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-it").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    "use strict";
    $("#owl-ec").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });


    "use strict";
    $("#owl-place").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4],
        center : true,

    });

    // Testimonial  corousel
    "use strict";
    $("#owl-demo-testimonial").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });



    $("#owlsuccess").owlCarousel({

      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true

      // "singleItem:true" is a shortcut for:
      // items : 1,
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false



  });
  /*$(".image").click(function(){
var id = $(this).attr("id");  // to get the dynamic id
var src = $("#"+id).attr("src");
$(".modal_id").attr("src", src);
$("myModal").show();
}),*/

$('.thumbnail').click(function(){
      $('.modal-body').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');

        var des = $(this).parent('a').attr("des");
        $('.modal-des').html(des);
        //$('.modal-body').html(des);
  	$('#myModal').modal({show:true});
});

    countTo($('.donate-box strong'), 6817);


});
countTo=function(element, number){
    var counter=0;
    var interval=setInterval(function(){
        if(counter<number){
            counter+=50;
            $(element).text(counter);
        }else{
            clearInterval(interval);
        }
    },50);
};
