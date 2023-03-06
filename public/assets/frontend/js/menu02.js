/**
 * Include your custom JavaScript here.
 *
 * We also offer some hooks so you can plug your own logic. For instance, if you want to be notified when the variant
 * changes on product page, you can attach a listener to the document:
 *
 * document.addEventListener('variant:changed', function(event) {
 *   var variant = event.detail.variant; // Gives you access to the whole variant details
 * });
 *
 * You can also add a listener whenever a product is added to the cart:
 *
 * document.addEventListener('product:added', function(event) {
 *   var variant = event.detail.variant; // Get the variant that was added
 *   var quantity = event.detail.quantity; // Get the quantity that was added
 * });
 *
 * If you just want to force refresh the mini-cart without adding a specific product, you can trigger the event
 * "cart:refresh" in a similar way (in that case, passing the quantity is not necessary):
 *
 * document.documentElement.dispatchEvent(new CustomEvent('cart:refresh', {
 *   bubbles: true
 * }));
 */

(function ($) {
    $('iframe').each(function () {
        var src = $(this).attr('src');
        if (src.indexOf('youtube') != -1) {
            $(this)
                .wrap('<div class="iframe__responsive"></div>')
                .removeAttr('width')
                .removeAttr('height')

        }
    });

    // Elimino refill dal carrello
    jQuery.post('/cart/update.js', {
        updates: {
            32409387303017: 0,  // REFILL SYSTEM
            39852206162025: 0    // PALETTE REFILL VISO DUO OMAGGIO
        }
    });

    // Find search
    if ($('[data-section-id=search]').length > 0) {
        $('body').addClass('template--search');
    }

    // Troppi filtri
    $('#cloud_search_filters_root').each(function (i) {
        i++;

        setTimeout(() => {
            if ($('.cloud-search-page-controls__filters .cloud-search-filter').length > 5) {
                $('body').addClass('more-filters');
            }
        }, 5000);
    });

    // Add active class
    $('.Product__ExtTabs .nav-item:nth-child(1),.Product__ExtTabs .nav-item:nth-child(1) > .nav-link').addClass('active');

    // Add class collection con immagine
    if ($('.PageHeader--withBackground').length == 0) {
        $('body').addClass('collection-no-image');
    } else {
        $('body').addClass('collection-with-image');
    }

    // Nascondo se vuoto
    setTimeout(() => {
        if ($('#productBoughtTogether').html() == '') {
            $('#productBoughtTogether').hide()
        }
        if ($('#globoRelatedProducts .owl-item').length == 0) {
            $('#globoRelatedProducts').hide()
        }
    }, 2200);

    // Find active pane
    setTimeout(function () {
        $('.Product__ExtTabs #pills-tab li').each(function (i) {
            //console.log(i);
            if (i == 0) {
                $(this).addClass('active');
            }
            i++;
        });
        $('.Product__ExtTabs #pills-tabContent .tab-pane').each(function (i) {
            //console.log(i);
            if (i == 0) {
                $(this).addClass('show');
                $(this).addClass('active');
            }
            i++;
        });
    }, 800);

    // Control region to visit
    //console.log('regione_' + asl_country_region());

    /* Refill System */
    setTimeout(function () {
        if ($('.ProductRefill--system').length != 0) {
            $('#infiniteoptions-container > div').each(function (i) {
                $(this).addClass('item-' + i)
                i++;
            });

            $('#infiniteoptions-container fieldset label').each(function () {
                var opt_color = $(this).find('.spb-productoptiontextcolor').val();
                if ($(this).closest('fieldset').find('legend').text() == 'COLORI OPACHI') {
                    var imgUrl = 'https://cdn.shopify.com/s/files/1/0406/5640/4636/t/2/assets/' + opt_color + '_OPACO_600x.png';
                } else {
                    var imgUrl = 'https://cdn.shopify.com/s/files/1/0406/5640/4636/t/2/assets/' + opt_color + '_PERLATO_600x.png';
                }
                $(this).attr('data-bg', imgUrl);
                $(this).attr('style', 'background-image:url(' + imgUrl + ')');
                $(this).attr('title', opt_color);
                $(this).append('<span style="visibility:hidden;" class="code"></span>');
                $(this).find('.code').text($(this).text());
                //$(this).text().remove();
            });

            $('#infiniteoptions-container .item-0').appendTo('#pills-one #infiniteoptions-container');
            $('#infiniteoptions-container .item-1').appendTo('#pills-two #infiniteoptions-container');

            $('fieldset').on('change', '.spb-productoptiontextcolor', function (e) {
                var $this = $(this);
                var $label = $this.closest('label');
                var $label_bg = $label.data('bg');
                var $checked = $(".spb-productoptiontextcolor:checked").length;
                var $refill_pos = $(".ProductRefill__color").data('bg');

                //console.log("Hai checkato: " + $checked);

                if ($checked < 5) {
                    $('fieldset > label > input').prop('disabled', false);
                    if ($label.hasClass('is-checked')) {
                        $(".ProductRefill__color[data-bg='" + $label_bg + "']").attr('style', '')
                        $(".ProductRefill__color[data-bg='" + $label_bg + "']").attr('data-bg', '');
                    } else {
                        //console.log("Prima " + $(".ProductRefill__color.color-1").attr('data-bg'));
                        if ($(".ProductRefill__color.color-1").attr('data-bg') == '') {
                            $(".ProductRefill__color.color-1").attr('data-bg', $label_bg);
                            $(".ProductRefill__color.color-1").attr('style', 'background-image:url(' + $label_bg + ')');
                        } else if ($(".ProductRefill__color.color-2").attr('data-bg') == '') {
                            $(".ProductRefill__color.color-2").attr('data-bg', $label_bg);
                            $(".ProductRefill__color.color-2").attr('style', 'background-image:url(' + $label_bg + ')');
                        } else if ($(".ProductRefill__color.color-3").attr('data-bg') == '') {
                            $(".ProductRefill__color.color-3").attr('data-bg', $label_bg);
                            $(".ProductRefill__color.color-3").attr('style', 'background-image:url(' + $label_bg + ')');
                        } else if ($(".ProductRefill__color.color-4").attr('data-bg') == '') {
                            $(".ProductRefill__color.color-4").attr('data-bg', $label_bg);
                            $(".ProductRefill__color.color-4").attr('style', 'background-image:url(' + $label_bg + ')');
                        }

                        //console.log("Dopo " + $(".ProductRefill__color.color-1").attr('data-bg'));
                    }
                    $label.toggleClass('is-checked');

                    if ($checked == 4) {
                        $('fieldset > label:not(.is-checked) > input').prop('disabled', true);
                        $('.refillError').addClass('is-visible');
                    } else {
                        $('.refillError').removeClass('is-visible');
                    }
                } else {


                }
            });
        }
    }, 3000);

    // Control if exist review
    $('.Product__ExtTabs .__reviews').on('click', function () {
        setTimeout(() => {
            var listReview = $('.ssw-reviews-header-listing .review-wrapp-btn');
            var countReview = $('#recomends_list .ssw-item').length;

            if (countReview == 0) {
                if ($('.text-no-reviews').length == 0) {
                    listReview.prepend('<span class="text-no-reviews">Lascia la prima recensione!</span>')
                }
            } else {
                listReview.find('.text-no-reviews').remove();
            }
        }, 1000);
    });

    // Control form newsletter
    $('.Footer__Newsletter input[type=radio]').change(function () {

        if ($('input[type=radio][name=privacy_policy_a]:checked').val() == 'si' && $('input[type=radio][name=privacy_policy_b]:checked').val() == 'si') {
            $('.Form__Submit').prop('disabled', false)
            $('.Footer__Newsletter .Alert--error').hide();
        } else {
            $('.Form__Submit').prop('disabled', true)
            $('.Footer__Newsletter .Alert--error').show();
        }
    });


    // Scrolling
    $(window).scroll(function () {
        var scrolled = $('html,body').scrollTop();

        if ($('html,body').width() > 1024) {
            if (scrolled > 200) {
                $('.Header__MainNav').addClass('is-fixed');
            } else {
                $('.Header__MainNav').removeClass('is-fixed');
            }
            if (scrolled > 400) {
                $('.Header__MainNav').addClass('is-active');
            } else {
                $('.Header__MainNav').removeClass('is-active');
            }
        }

        if ($('html').hasClass('mobile')) {
            if (scrolled > 43) {
                $('.Header').addClass('is-fixed');
            } else {
                $('.Header').removeClass('is-fixed');
            }
        }
    });

    // Add image bg
    var cdBg = $('.ext-cd').data('bg');
    var cdBgMobile = $('.ext-cd').data('bg-mobile');
    var limitDate = $('.ext-cd').data('limit-date');
    ;

    if ($('.ext-cd').length > 0) {
        if (cdBg) {
            findBg()
            $(window).resize(function () {
                findBg()
            });
        }

        //Provide the plugin settings
        $("#countdown").countdown({
            //The countdown end date
            date: limitDate,
            // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
            format: "on"
        });
    }

    function findBg() {
        if ($(window).width() < 992) {
            //console.log(cdBg);
            //console.log(cdBgMobile);
            if (cdBgMobile) {
                $('.ext-cd').attr('style', 'background-image: url(' + cdBgMobile + ')');
            } else {
                $('.ext-cd').attr('style', 'background-image: url(' + cdBg + ')');
            }
        } else {
            $('.ext-cd').attr('style', 'background-image: url(' + cdBg + ')');
        }
    }

    // Hide and Show button consulenze
    //var $buttonBrow = $('.Product[data-handle="consulenza-brow"]').find('.ProductForm__AddToCart');
    //setTimeout(function(){
    //	$buttonBrow.addClass('is-visible');
    //},4000);

    //var interval;
    //interval = setInterval(function(){
    //  if( $buttonBrow.prop('id') == 'appointo-btn' ){
    //    $buttonBrow.addClass('is-visible-test');
    //	clearInterval(interval);
    //  }
    //}, 5000);

})(jQuery);
