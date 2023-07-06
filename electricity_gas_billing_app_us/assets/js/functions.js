/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
	var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

	function initMainNavigation( container ) {

		// Add dropdown toggle that displays child menu items.
		var dropdownToggle = $( '<button />', {
			'class': 'dropdown-toggle',
			'aria-expanded': false
		} ).append( $( '<span />', {
			'class': 'screen-reader-text',
			text: screenReaderText.expand
		} ) );

		container.find( '.menu-item-has-children > a' ).after( dropdownToggle );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this            = $( this ),
				screenReaderSpan = _this.find( '.screen-reader-text' );

			e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );

			// jscs:disable
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
			screenReaderSpan.text( screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	masthead         = $( '#masthead' );
	menuToggle       = masthead.find( '#menu-toggle' );
	siteHeaderMenu   = masthead.find( '#site-header-menu' );
	siteNavigation   = masthead.find( '#site-navigation' );
	socialNavigation = masthead.find( '#social-navigation' );

	// Enable menuToggle.
	( function() {

		// Return early if menuToggle is missing.
		if ( ! menuToggle.length ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click.sitemush', function() {
			$( this ).add( siteHeaderMenu ).toggleClass( 'toggled-on' );

			// jscs:disable
			$( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded', $( this ).add( siteNavigation ).add( socialNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	} )();

	// Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
		if ( ! siteNavigation.length || ! siteNavigation.children().length ) {
			return;
		}

		// Toggle `focus` class to allow submenu access on tablets.
		function toggleFocusClassTouchScreen() {
			if ( window.innerWidth >= 910 ) {
				$( document.body ).on( 'touchstart.sitemush', function( e ) {
					if ( ! $( e.target ).closest( '.main-navigation li' ).length ) {
						$( '.main-navigation li' ).removeClass( 'focus' );
					}
				} );
				siteNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.sitemush', function( e ) {
					var el = $( this ).parent( 'li' );

					if ( ! el.hasClass( 'focus' ) ) {
						e.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				} );
			} else {
				siteNavigation.find( '.menu-item-has-children > a' ).unbind( 'touchstart.sitemush' );
			}
		}

		if ( 'ontouchstart' in window ) {
			$( window ).on( 'resize.sitemush', toggleFocusClassTouchScreen );
			toggleFocusClassTouchScreen();
		}

		siteNavigation.find( 'a' ).on( 'focus.sitemush blur.sitemush', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();

	// Add the default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( window.innerWidth < 910 ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( siteHeaderMenu.hasClass( 'toggled-on' ) ) {
				siteNavigation.attr( 'aria-expanded', 'true' );
				socialNavigation.attr( 'aria-expanded', 'true' );
			} else {
				siteNavigation.attr( 'aria-expanded', 'false' );
				socialNavigation.attr( 'aria-expanded', 'false' );
			}

			menuToggle.attr( 'aria-controls', 'site-navigation social-navigation' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			socialNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}

	// Add 'below-entry-meta' class to elements.
	function belowEntryMetaClass( param ) {
		if ( body.hasClass( 'page' ) || body.hasClass( 'search' ) || body.hasClass( 'single-attachment' ) || body.hasClass( 'error404' ) ) {
			return;
		}

		$( '.entry-content' ).find( param ).each( function() {
			var element              = $( this ),
				elementPos           = element.offset(),
				elementPosTop        = elementPos.top,
				entryFooter          = element.closest( 'article' ).find( '.entry-footer' ),
				entryFooterPos       = entryFooter.offset(),
				entryFooterPosBottom = entryFooterPos.top + ( entryFooter.height() + 28 ),
				caption              = element.closest( 'figure' ),
				newImg;

			// Add 'below-entry-meta' to elements below the entry meta.
			if ( elementPosTop > entryFooterPosBottom ) {

				// Check if full-size images and captions are larger than or equal to 840px.
				if ( 'img.size-full' === param ) {

					// Create an image to find native image width of resized images (i.e. max-width: 100%).
					newImg = new Image();
					newImg.src = element.attr( 'src' );

					$( newImg ).load( function() {
						if ( newImg.width >= 840  ) {
							element.addClass( 'below-entry-meta' );

							if ( caption.hasClass( 'szp-caption' ) ) {
								caption.addClass( 'below-entry-meta' );
								caption.removeAttr( 'style' );
							}
						}
					} );
				} else {
					element.addClass( 'below-entry-meta' );
				}
			} else {
				element.removeClass( 'below-entry-meta' );
				caption.removeClass( 'below-entry-meta' );
			}
		} );
	}

	$( document ).ready( function() {
		body = $( document.body );

		$( window )
			.on( 'load.sitemush', onResizeARIA )
			.on( 'resize.sitemush', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( function() {
					belowEntryMetaClass( 'img.size-full' );
					belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
				}, 300 );
				onResizeARIA();
			} );

			belowEntryMetaClass( 'img.size-full' );
			belowEntryMetaClass( 'blockquote.alignleft, blockquote.alignright' );
				
  /*--------------------------
  preloader
  ---------------------------- */
  $(window).on('load', function() {
    var pre_loader = $('#preloader');
    pre_loader.fadeOut('slow', function() {
      $(this).remove();
    });
  });
			   	$(document).on('click','.first_input',function(e){
			
			   			$("#details_of_forms").show();
						let input_num = $(this).attr('data-id');
						$("#first_eles").find('i').removeClass('clicked_element');
						$(this).find('i').addClass('clicked_element');
						let str = $("#selected_county").find(':selected').text().trim();
			   			$("#detail_2").find("p").empty().html(str);
						if (input_num==1){
							$("#home_or_business").val("business");
							$("#detail_1").find("p").empty().html("Business");

						}else{
							$("#home_or_business").val("home");
							$("#detail_1").find("p").empty().html("Home");
						}
						$("#first_input_err").html('');
						return false;
				});


			   	$(document).on('change','#selected_county',function(){
			   		let str = $(this).find(':selected').text().trim();
			   		$("#detail_2").find("p").empty().html(str);
			   	})

				$(document).on('click','.selected_energy_type',function(e){
					let selected_energy_type = $(this).attr('data-id');
					$("#select_energy_types").find('i').removeClass('clicked_element');
					$(this).find('i').addClass('clicked_element');
					$("#energy_suppliier_label").show();
					if(selected_energy_type==1){
						$("#selected_energy_source").val("electricity");
						$("#gas_energy_supplier").hide();
						$("#electricity_energy_supplier").show();
						$("#detail_3").find("p").empty().html("Electricity");
						$("#detail_4").find("h5").empty().html("Your Electricity Supplier is");
						$("#detail_4").find("p").empty().html($("#electricity_energy_supplier").find(':selected').text().trim());
						$("#detail_4_1").find("p").empty().html($("#bill_period_selection").find(':selected').text());
						// $("#detail_4").find("p").empty().html("");
					}else{
							$("#selected_energy_source").val("gas");
							$("#gas_energy_supplier").show();
							$("#electricity_energy_supplier").hide();
							$("#detail_3").find("p").empty().html("Gas");
							$("#detail_4").find("h5").empty().html("Your Gas Supplier is");
							$("#detail_4").find("p").empty().html($(this).find(':selected').text().trim());
							$("#detail_4").find("p").empty().html($("#gas_energy_supplier").find(':selected').text().trim());
							$("#detail_4_1").find("p").empty().html($("#bill_period_selection").find(':selected').text());
							// $("#detail_4").find("p").empty().html("");
					}
					$("#second_input_err").html('');
					return false;

				});

				$(document).on('change','#electricity_energy_supplier',function(){
					$("#detail_4").find("p").empty().html($(this).find(':selected').text().trim());
				});

				$(document).on('change','#gas_energy_supplier',function(){
					$("#detail_4").find("p").empty().html($(this).find(':selected').text().trim());
				});

				$(document).on('change','#bill_period_selection',function(){
					let bill_paid_type = $(this).find(':selected').val();
					$("#period_label").html('What is your '+bill_paid_type+' bill?');
					$("#detail_4_1").find("p").empty().html($(this).find(':selected').text());
					$("#detail_6").find("h5").empty().html("Number of Units ("+bill_paid_type+")");
				});



				$(document).on('keyup','#bill_amount',function(){
						let amount = $(this).val();

						if (amount.trim().length>0)
						{	
							$("#bill_amount_err").html('');
							$("#detail_5").find("p").empty().html('£ '+amount);
						}else{
								$("#detail_5").find("p").empty().html('');
						}
				}); //contact_name_err

				$(document).on('keyup','#contact_name',function(){
						let value = $(this).val();
						if (value.trim().length>0){
							$("#contact_name_err").html('');
							$("#detail_7").find("p").empty().html(value);
						}else{
							$("#detail_7").find("p").empty().html('');
						}
				}); //contact_name_err


				$(document).on('keyup','#contact_number',function(){
						let value = $(this).val();
						if (value.trim().length>0)
						{	
							$("#contact_number_err").html('');
							$("#detail_8").find("p").empty().html(value);
						}else{
								$("#detail_8").find("p").empty().html('');
						}
				}); //contact_name_err

				$(document).on('keyup','#number_of_units',function(){
					let number_of_units = $("#number_of_units").val();
					if (number_of_units.trim().length>0)
							{
								$("#number_of_units").html('');
								$("#detail_6").find("p").empty().html(number_of_units+" Units");
							}else{
								$("#detail_6").find("p").empty().html("");
							}
				});

				localStorage.clear();
				$(document).on('submit','#energy_saving_form',function(e){
					
					let home_or_business  = $("#home_or_business").val().trim();
					let selected_energy_source = $("#selected_energy_source").val().trim();
					let bill_amount=  $("#bill_amount").val().trim();
					let contact_name=  $("#contact_name").val().trim();
					let contact_number=  $("#contact_number").val().trim();
					let number_of_units = $("#number_of_units").val().trim();
					if (home_or_business==""){
							$("#first_input_err").html('Please Choose Home or Business');
					}else if(selected_energy_source=="")
					{
						$("#second_input_err").html('Please Choose Energy Source');
					}else if(bill_amount==""){
						$("#bill_amount_err").html('Enter Your Average Bill Amount');
					}else if(contact_name==""){
						$("#contact_name_err").html('Enter Your Full Name');
					}else if(contact_number==""){
						$("#contact_number_err").html('Enter Your Contact Number');
					}
					else if(number_of_units==""){
						$("#number_of_units_err").html('Enter Number Of Units');
					}else{
						let dataString = $(this).serialize()+"&save_this_form=1";

						// console.log(dataString);
						$.ajax({
							method:'post',
							url:'actions/insert.php',
							data:dataString,
							dataType:'json',
							success:function (d){
									if (d.success==1){
										// localStorage.setItem("data_form1",dataString);
										$(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
	   									$(':checkbox, :radio').prop('checked', false);
										$("#success_msg").empty().append(d.msg);
										$("#success_msg").show();
										$("#error_msg").hide();
										$("#energy_saving_form").hide();
										$("#validationcode_err").empty();
										setTimeout(function(){
											$("#success_msg").fadeOut();	
										},10000);
										$("#left_sided_div").empty().append(d.html_code);
									}else if (d.error==1){
										if (d.code_error==1){
											//$("#captcha_code").focus();
											$("#validationcode_err").empty().html(d.msg);
										}
										$("#success_msg").hide();
										$("#validationcode_err").empty();
										$("#error_msg").empty().append(d.msg);
										$("#error_msg").show();
									}	
							}
						});
					} //end else here
					return false;
				});

      $('#light-slider').lightSlider({
         item: 3,
         auto: true,
          loop: true,
          speed:500,

         keyPress: true,
          slideMargin: 0,
         
     });

    
				$(document).on('click','#switch_now',function(){
						$("#left_sided_div").empty();
				});



				
				/// to scroll on the calculator div
				$("#clicker_calculator").click(function(){
						$('html, body').animate({
						        scrollTop: $("#form_div1").offset().top
						    }, 1000);
				});
	} );
} )( jQuery );

