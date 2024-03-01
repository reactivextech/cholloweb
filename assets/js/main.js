var showLogin = false;

var redirectDispatch = '';

if (showLogin) $('#modalLogin').show();

$('#header_search').keyup(function (e) {
	if (e.keyCode == 13) {
		window.location.href = '/products?search=' + $(this).val();
	}
});
$('#header_search_btn').on('click', function () {
	var search_item = $('#header_search').val();
	window.location.href = '/products?search=' + search_item;
});

$('.header-login-btn').on('click', function () {
	$('#modalLogin').css('display', 'block');
});

$('.header_bottom_right_login').on('click', function () {
	$('#modalLogin').css('display', 'block');
});

$(document).ready(function () {
	$('#header-login,#footer_login_btn,#login_mobile_btn').click(function () {
		$('.mobile-nav-wrapper').animate({left: '-100%'});
		$('#modalLogin').show();
	});

	$('#mobile_navigation_wrapper').on('click', function () {
		$('.mobile-nav-wrapper').animate({left: '0px'});
	});
	$('.landing-mobile-nav-close').on('click', function () {
		$('.mobile-nav-wrapper').animate({left: '-100%'});
	});

	$('.modal-header .close').click(function () {
		$(this).closest('.modal').hide();
	});
	$('.login-form .forgotten').click(function () {
		$('.recover-form [name="username"]').val(
			$('.login-form [name="username"]').val()
		);

		setTimeout(function () {
			$('.login-form').hide();
			$('.recover-form').show();
		}, 500);
		// $('.login-form [name="password"]').closest('.input-control').addClass('puff-out-center');
	});

	$('.recover-back').click(function () {
		setTimeout(function () {
			$('.recover-form').hide();
			$('.login-form').show();
		}, 500);
	});

	var home_slider_set_interval;
	var window_width = $(window).width();
	var slider_width = 0;
	if (window_width < 350) {
		slider_width = 305;
	} else if (window_width > 350 && window_width < 420) {
		slider_width = 390;
	} else if (window_width > 420 && window_width < 850) {
		slider_width = 365;
	} else if (window_width > 850 && window_width < 1000) {
		slider_width = 465;
	} else {
		slider_width = 220;
	}

	// starter phone 1 info popup
	$('#starter_phone_more_info_phone_1').on('click', function () {
		$('#homepage_overlay_wrapper').css('display', 'block');
		$('#starter_phone_more_info_phone_1_modal').css('display', 'block');
	});
	$('#starter_phone_more_info_phone_2').on('click', function () {
		$('#homepage_overlay_wrapper').css('display', 'block');
		$('#starter_phone_more_info_phone_2_modal').css('display', 'block');
	});
	$('#starter_phone_more_info_phone_3').on('click', function () {
		$('#homepage_overlay_wrapper').css('display', 'block');
		$('#starter_phone_more_info_phone_3_modal').css('display', 'block');
	});

	$('#homepage_overlay_wrapper').on('click', function () {
		$(this).css('display', 'none');
		$(
			'#homepage_video_popup_wrapper,.starter_phone_more_info_modal,#revew_video_popup_wrapper,.starter_phone_more_info_modal'
		).css('display', 'none');
		$('#homepage_video_christmas_popup_wrapper').css('display', 'none');
	});

	$('.products_modal_close_btn').on('click', function () {
		$('#homepage_overlay_wrapper').css('display', 'none');
		$(
			'.starter_phone_more_info_modal,#revew_video_popup_wrapper,#homepage_video_popup_wrapper'
		).css('display', 'none');
		$('#homepage_video_christmas_popup_wrapper').css('display', 'none');
	});

	// image carousel right arrow
	$('#you_choose_slider_arrow_right').on('click', function () {
		$('#you_choose_img_slider_main ul')
			.stop()
			.animate({marginLeft: -slider_width}, 1000, function () {
				$(this).find('li:last').after($(this).find('li:first'));
				$(this).css({marginLeft: 0});
			});
	});

	$('#you_choose_slider_arrow_left').on('click', function () {
		$('#you_choose_img_slider_main ul')
			.stop()
			.animate({marginLeft: slider_width}, 1000, function () {
				$(this).find('li:first').before($(this).find('li:last'));
				$(this).css({marginLeft: 0});
			});
	});
});

$('#header_mobile_right_span_container').on('click', function () {
	$('#mobile_nav_wrapper').slideToggle();
});
$('#mobile_nav_shop_link').on('click', function () {
	$('#mobile_nav_shop_wrapper').slideToggle();
});

// application & prepop page
$('#your_order_mobile_header').on('click', function () {
	$('#application_order_details_sub_container').slideToggle();
});

// change phone button
$('#application_right_change_phone_btn').on('click', function () {
	$('.application_dark_overlay').css('display', 'block');
	$('.application_change_product_overlay_wrapper')
		.css('display', 'block')
		.addClass('animated slideInUp');
});
$('#application_change_product_cancel').on('click', function () {
	$(
		'.application_dark_overlay,.application_change_product_overlay_wrapper'
	).css('display', 'none');
});

// Save progress option
$('.apply_save_for_later').on('click', function () {
	$('.application_dark_overlay').css('display', 'block');
	$('.application_save_modal_overlay_wrapper')
		.css('display', 'block')
		.addClass('animated slideInUp');
});
$('.application_dark_overlay').on('click', function () {
	$('.application_dark_overlay').css('display', 'none');
	$('.application_change_product_overlay_wrapper')
		.css('display', 'none')
		.removeClass('animated slideInUp');
	$('.application_save_modal_overlay_wrapper')
		.css('display', 'none')
		.removeClass('animated slideInUp');
});

// Application Stage 1
$('#application_process_app_btn').on('click', function () {
	// // update page title
	// $('#application_page_title').html('Your Address');
	// $('#application_page_teaser').html("If you're getting a new phone, we need to know where to send it.");
	// // show address form
	// $('#application_personal_details_container').css('display','none');
	// $('#application_address_details_container').css('display','block');
	// $("html, body").animate({ scrollTop: $('#application_page_title').offset().top }, 1000);
	return true;
});

// Application Stage 2
$('#application_details_btn').on('click', function () {
	// on the credit card page show testimonial popup.
	return true;
});

// Application Stage 3
$('#application_process_payment_details_btn').on('click', function () {
	// loading screen
	//$('#application_loading_wrapper').css('display','block');
	return true;
});

// Application Overview
// $('#application_overview_btn').on('click',function(){
// 	window.location="https://sunshinemobile.co.uk/secure.php";
// })

// Application secure Overview
// $('#secure_payment_continue').on('click', function () {
//     window.location = "https://sunshinemobile.co.uk/thankyou.php";
// })

$('.login-form').submit(function (e) {
	var $submit_btn = $('button[type="submit"]', $(this)).attr(
		'disabled',
		'disabled'
	);

	$submit_btn.find('i').addClass('animated fadeOutRight');
	e.preventDefault();

	var fields = $(this).serializeArray();

	if (redirectDispatch)
		fields.push({name: 'dispatch', value: redirectDispatch});

	$('.login-form .error-msg').hide();
	$.post('assets/ajax/login.ajax.html', fields, function (response) {
		response = JSON.parse(response);

		if (response.error == null) {
			window.location.href = response.redirect_url;
		} else {
			var error_msg = '';
			switch (response.error) {
				case 'missing': {
					error_msg = 'Please enter your username and password.';
					for (var i = 0; i < response.missing.length; i++) {
						var missing = response.missing[i];
						$('.login-form [name="' + missing + '"]').addClass(
							'error'
						);
					}
					break;
				}
				case 'user_missing_shop': {
					error_msg =
						"That user doesn't exist. Please check for any typing mistakes.";
					break;
				}
				case 'region': {
					error_msg =
						"Unfortunately we're no longer shipping goods to your chosen area. Please contact customer service if you have an existing order with us.";
					break;
				}
				case 'shop_pass': {
					error_msg = 'Password is incorrect.';
					break;
				}
			}
			$('.login-form .error-msg')
				.toggle(error_msg.length > 0)
				.text(error_msg);
		}
	}).always(function () {
		$submit_btn.removeAttr('disabled');
		$submit_btn.find('i').removeClass('animated fadeOutRight');
	});

	return false;
});

$('.recover-form').submit(function (e) {
	e.preventDefault();
	var $submit_btn = $('button[type="submit"]', $(this)).attr(
		'disabled',
		'disabled'
	);
	var fields = $(this).serializeArray();
	$submit_btn.find('i').addClass('animated fadeOutRight');
	$('.recover-form .error-msg').hide();
	$.post('ajax/recover.ajax.html', fields, function (response) {
		var response = JSON.parse(response);
		console.log(response);
		var error_msg = '';
		switch (response.error) {
			case 'missing': {
				error_msg = 'Please enter your username.';
				$('.recover-form [name="username"]').addClass('error');
				break;
			}
			case 'user_missing': {
				error_msg =
					"That user doesn't exist. Please check for any typing mistakes.";
				break;
			}
		}

		if (response.sent) {
			$('.recover-form .sent').show();
		}

		$('.recover-form .error-msg').show().text(error_msg);
	}).always(function () {
		$submit_btn.removeAttr('disabled');
		$submit_btn.find('i').removeClass('animated fadeOutRight');
	});

	return false;
});

// send application btn
$('.application_send_save_btn').on('click', function () {
	// validate email
	var email = $('#application_save_email').val();
	email = email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if (email == null || email == undefined || email == '') {
		$('#application_save_email').addClass('application_save_email_invalid');
		console.log('save error');
	} else if (!emailPattern.test(email)) {
		$('#application_save_email').addClass('invalid_input');
	} else {
		$('#application_save_email').removeClass(
			'application_save_email_invalid'
		);
		// send email routine
		$('.application_dark_overlay').css('display', 'none');
		$('.application_save_modal_overlay_wrapper')
			.css('display', 'none')
			.removeClass('animated slideInUp');
		console.log('save complete');
	}
	return false;
});

function check_save_email_input() {
	// validate email
	var email = $('#application_save_email').val();
	email = email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if (email == null || email == undefined || email == '') {
		$('#application_save_email').addClass('application_save_email_invalid');
		console.log('save error');
	} else if (!emailPattern.test(email)) {
		$('#application_save_email').addClass('invalid_input');
	} else {
		$('#application_save_email').removeClass(
			'application_save_email_invalid'
		);
		// send email routine
		console.log('save complete');
	}
	return false;
}

// Application validation
// application form validation
function personal_title_check(field_name) {
	var dropdown = document.getElementById('title');
	var dropwdown_string = dropdown.options[dropdown.selectedIndex].text;
	if (dropwdown_string == 'Please select') {
		$('#title').removeClass('valid_input');
		$('#title').addClass('invalid_input');
	} else {
		$('#title').removeClass('invalid_input');
		$('#title').addClass('valid_input');
	}
}

function dob_day_check(field_name) {
	// var dropdown = document.getElementById('d_o_b_d1');
	var dropdown_string = $('#d_o_b_d1').val(); // dropdown.options[dropdown.selectedIndex].text;
	if (
		dropdown_string == 'Day' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_d1').removeClass('valid_input');
		$('#d_o_b_d1').addClass('invalid_input');
	} else {
		$('#d_o_b_d1').removeClass('invalid_input');
		$('#d_o_b_d1').addClass('valid_input');
	}
}

function dob_month_check(field_name) {
	//var dropdown = document.getElementById('d_o_b_m1');
	var dropdown_string = $('#d_o_b_m1').val(); //dropdown.options[dropdown.selectedIndex].text;
	if (
		dropdown_string == 'Month' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_m1').removeClass('valid_input');
		$('#d_o_b_m1').addClass('invalid_input');
	} else {
		$('#d_o_b_m1').removeClass('invalid_input');
		$('#d_o_b_m1').addClass('valid_input');
	}
}

function dob_year_check(field_name) {
	//var dropdown = document.getElementById('d_o_b_y1');
	//var dropdown_string = dropdown.options[dropdown.selectedIndex].text;
	var dropdown_string = $('#d_o_b_y1').val();
	if (
		dropdown_string == 'Year' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_y1').removeClass('valid_input');
		$('#d_o_b_y1').addClass('invalid_input');
	} else {
		$('#d_o_b_y1').removeClass('invalid_input');
		$('#d_o_b_y1').addClass('valid_input');
	}
}

function check_app_fname() {
	var element_input = $('#first_name').val();
	if (element_input == '') {
		$('#first_name').addClass('invalid_input');
		$('#first_name').removeClass('valid_input');
	} else if (element_input.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#first_name').removeClass('valid_input');
		$('#first_name').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#first_name').addClass('valid_input');
		$('#first_name').removeClass('invalid_input');
	}
}

function check_app_sname() {
	var element_input = $('#surname').val();
	if (element_input == '') {
		$('#surname').addClass('invalid_input');
		$('#surname').removeClass('valid_input');
	} else if (element_input.length > 50) {
		///(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#surname').removeClass('valid_input');
		$('#surname').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#surname').addClass('valid_input');
		$('#surname').removeClass('invalid_input');
	}
}

function check_app_email() {
	var email = $('#app_email').val();
	email = email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if (emailPattern.test(email)) {
		$('#app_email').removeClass('invalid_input');
		$('#app_email').addClass('valid_input');
	} else {
		$('#app_email').removeClass('valid_input');
		$('#app_email').addClass('invalid_input');
	}
}

function check_agree() {
	if ($('#app_optin_checkbox').prop('checked') == false) {
		$('.app-error-message ').addClass('hidden');
	}
}

function check_app_mobile() {
	var mobPattern =
		/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

	var mobVal = $('#app_mobile').val().replace(/\s/g, '').toString();
	$('#app_mobile').val(mobVal);

	var element_input = $('#app_mobile').val();
	if (!mobPattern.test(element_input)) {
		$('#app_mobile').removeClass('valid_input');
		$('#app_mobile').addClass('invalid_input');
	} else {
		$('#app_mobile').addClass('valid_input');
		$('#app_mobile').removeClass('invalid_input');
	}
	if (element_input == '') {
		$('#app_mobile').addClass('valid_input');
		$('#app_mobile').removeClass('invalid_input');
	}
}

function check_app_sec1() {
	var app_length = document.getElementById('password').value.length;
	if (app_length >= 4) {
		$('#password').addClass('valid_input');
		$('#password').removeClass('invalid_input');
	} else {
		$('#password').removeClass('valid_input');
		$('#password').addClass('invalid_input');
	}
}
function check_app_sec2() {
	var app_length = document.getElementById('password_confirm').value.length;
	if (app_length >= 4) {
		if (
			document.getElementById('password_confirm').value ==
			document.getElementById('password').value
		) {
			$('#password_confirm').addClass('valid_input');
			$('#password_confirm').removeClass('invalid_input');
			return true;
		} else {
			$('#password_confirm').removeClass('valid_input');
			$('#password_confirm').addClass('invalid_input');
			return false;
		}
	} else {
		$('#password_confirm').removeClass('valid_input');
		$('#password_confirm').addClass('invalid_input');
		return false;
	}
}

function check_app_housenoname() {
	if ($('#housenoname').val() != '' && $('#housenoname').val().length > 0) {
		$('#housenoname').removeClass('invalid_input');
		$('#housenoname').addClass('valid_input');
	} else {
		$('#housenoname').removeClass('valid_input');
		$('#housenoname').addClass('invalid_input');
	}
}

function check_app_address1() {
	if ($('#address1').val() != '' && $('#address1').val().length > 2) {
		$('#address1').removeClass('invalid_input');
		$('#address1').addClass('valid_input');
	} else {
		$('#address1').removeClass('valid_input');
		$('#address1').addClass('invalid_input');
	}
}

function check_app_address2() {
	if ($('#address2').val() != '' && $('#address2').val().length > 2) {
		$('#address2').removeClass('invalid_input');
		$('#address2').addClass('valid_input');
	} else {
		$('#address2').removeClass('valid_input');
		$('#address2').addClass('invalid_input');
	}
}

function check_app_address3() {
	if ($('#address3').val() != '' && $('#address3').val().length > 2) {
		$('#address3').removeClass('invalid_input');
		$('#address3').addClass('valid_input');
	} else {
		$('#address3').removeClass('valid_input');
		$('#address3').addClass('invalid_input');
	}
}

function check_app_telhome() {
	var telVal = $('#tel_home').val().replace(/\s/g, '').toString();
	$('#tel_home').val(telVal);

	if (
		document.getElementById('tel_home').value.length < 10 ||
		document.getElementById('tel_home').value.length > 11
	) {
		$('#tel_home').removeClass('valid_input');
		$('#tel_home').addClass('invalid_input');
	} else {
		if (
			$('#tel_home').val() != '' &&
			isNaN($('#tel_home').val()) === false
		) {
			$('#tel_home').removeClass('invalid_input');
			$('#tel_home').addClass('valid_input');
		} else {
			$('#tel_home').removeClass('valid_input');
			$('#tel_home').addClass('invalid_input');
		}
	}

	//var landlinePattern = /^((\(?0\d{4}\)?\s?\d{3}\s?\d{3})|(\(?0\d{3}\)?\s?\d{3}\s?\d{4})|(\(?0\d{2}\)?\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

	//var telVal = $('#tel_home').val().replace(' '/g, '').toString();

	//	var telVal = $('#tel_home').val().replace(/\s/g,'').toString();
	//	$('#tel_home').val(telVal);
	//
	//      if ($("#tel_home").val()!= "" && landlinePattern.test(telVal)){
	//        $("#tel_home").removeClass("invalid_input");
	//      $("#tel_home").addClass("valid_input");
	//}else{
	//       $("#tel_home").removeClass("valid_input");
	//     $("#tel_home").addClass("invalid_input");
	// }
}

function check_app_postcode(field_name) {
	//var post_code = document.getElementById(field_name).value.replace(/ /g,"");
	var postcode2 = $('#postcode').val();
	postcode2 = postcode2.replace(/\s/g, '');
	if (postcode2 == null || postcode2 == '') {
		$('#postcode').addClass('invalid_input');
		$('#postcode').removeClass('valid_input');
	} else {
		var postcodePattern =
			/^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$/;
		if (postcodePattern.test(postcode2)) {
			$('#postcode').addClass('valid_input');
			$('#postcode').removeClass('invalid_input');
		} else {
			$('#postcode').addClass('invalid_input');
			$('#postcode').removeClass('valid_input');
		}
	}
}

// Credit card validation
function card_check_it() {
	var creditcardval = document.getElementById('creditcard').value;

	// The Luhn Algorithm. It's so pretty.
	var nCheck = 0,
		nDigit = 0,
		bEven = false;
	creditcardval = creditcardval.replace(/\D/g, '');

	for (var n = creditcardval.length - 1; n >= 0; n--) {
		var cDigit = creditcardval.charAt(n),
			nDigit = parseInt(cDigit, 10);
		if (bEven) {
			if ((nDigit *= 2) > 9) nDigit -= 9;
		}
		nCheck += nDigit;
		bEven = !bEven;
	}
	if (creditcardval == '') {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else if (/[^0-9-\s]+/.test(creditcardval)) {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else if (nCheck % 10 != 0) {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else {
		$('#creditcard').removeClass('invalid_input');
		$('#creditcard').addClass('valid_input');
	}
}

function number_check(field_name) {
	var number = document.getElementById('cvv').value;
	if (number == null || number == '') {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	} else if (isNaN(number)) {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	} else if (number.length == 3) {
		$('#cvv').removeClass('invalid_input');
		$('#cvv').addClass('valid_input');
	} else {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	}
}
function card_type_check() {
	var dropdown_string = $('#card_type').val();
	if (
		dropdown_string == 'Please select' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#card_type').removeClass('valid_input');
		$('#card_type').addClass('invalid_input');
	} else {
		$('#card_type').removeClass('invalid_input');
		$('#card_type').addClass('valid_input');
	}
}

function month_check(field_name) {
	var date_string = $('#exp_m').val();
	if (date_string == 'Month') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == 'Day') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == 'Please select') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == null) {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else {
		$('#exp_m').removeClass('invalid_input');
		$('#exp_m').addClass('valid_input');
	}
}

function year_check(field_name) {
	var date_string = $('#exp_y').val();
	if (date_string == 'Year') {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else if (date_string == 'Please select') {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else if (date_string == null) {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else {
		$('#exp_y').addClass('valid_input');
		$('#exp_y').removeClass('invalid_input');
	}
}

var app_overview_page = 0;
// on the credit card page show testimonial popup.
$(function () {
	$('#datepicker').datepicker({
		dateFormat: 'dd-mm-yy',
		minDate: 0,
	});
});

function showfinalpage() {
	if (app_overview_page == 0) {
		$('#application_overview_activation_overview_container').slideToggle();
	}

	app_overview_page = 1;
}

// Application form back button
$('#application_details_previous_btn').on('click', function (e) {
	console.log('add click');
	$('#application_personal_details_container').css('display', 'block');
	$('#application_address_details_container').css('display', 'none');
	return false;
});

$('#start_date_previous_btn').on('click', function (e) {
	$('#application_payment_details_container').css('display', 'none');
	$('#application_address_details_container').css('display', 'block');
	return false;
});

$('#starter_phone_previous').on('click', function (e) {
	$('#application_overview_details_container').css('display', 'none');
	$('#application_payment_details_container').css('display', 'block');
	return false;
});

// FAQ dropdown
$('.faq_single_header').on('click', function () {
	// check if current tab is open
	var selected_item = $(this).attr('data-faqactive');
	if (selected_item == '1') {
		console.log('open');
		$('.faq_single_header').removeClass('faq_active_content');
		$('.faq_single_content').removeClass('faq_active_content');
		$('.faq_single_content').slideUp();
		$(this).attr('data-faqactive', '0');
	} else {
		$('.faq_single_header').removeClass('faq_active_content');
		$('.faq_single_content').removeClass('faq_active_content');
		$('.faq_single_content').slideUp();
		$(this).siblings('.faq_single_content').slideDown();
		$(this).addClass('faq_active_content');
		$(this).siblings('.faq_single_content').addClass('faq_active_content');
		$('.faq_single_header').attr('data-faqactive', '0');
		$(this).attr('data-faqactive', '1');
	}
});

$('#mobile_nav_backdrop_wrapper,.mobile_nav_close_btn').on(
	'click',
	function () {
		$('#mobile_nav_wrapper').slideUp();
		$('#mobile_nav_backdrop_wrapper').fadeOut();
	}
);

$('#mobile_navigation_btn').on('click', function () {
	$('#mobile_nav_wrapper').slideDown();
	$('#mobile_nav_backdrop_wrapper').fadeIn();
});

$('#pre_header_input_search').keyup(function (e) {
	if (e.keyCode == 13) {
		window.location.href = '/products?search=' + $(this).val();
	}
});

$(document).ready(function () {
	// $('#form-stage2 [name="app_postcode"]').addressLookup({
	// 	onSelect: function (addr) {
	// 		$('#housenoname')
	// 			.val(addr.name || addr.number)
	// 			.trigger('blur');
	// 		$('#address1').val(addr.street1).trigger('blur');
	// 		$('#address2').val(addr.postTown).trigger('blur');
	// 		$('#address3').val(addr.county).trigger('blur');
	// 		$('#ptcAbs').val(addr.ptcAbs);
	// 		$('.address-sub-container').css('display', 'block');
	// 	},
	// });

	$('#form-stage1').submit(function (e) {
		e.preventDefault();

		// personal_title_check();
		// dob_day_check();
		// dob_month_check();
		// dob_year_check();
		// check_app_fname();
		// check_app_sname();
		// check_app_mobile();
		// check_app_email();
		// check_app_password();
		check_agree();

		var hasError =
			$('.application_single_form_container:visible .invalid_input')
				.length > 0;
		var error_no = 0;
		$(
			'.application_single_form_container:visible .app-error-message'
		).toggleClass('hidden', !hasError);

		// title check
		var title = document.getElementById('title');
		var title_string = title.options[title.selectedIndex].text;
		if (title_string == 'Please select') {
			$('#title').removeClass('valid_input');
			$('#title').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#title').removeClass('invalid_input');
			$('#title').addClass('valid_input');
		}

		// DOB D Check
		var d_o_b_d1 = $('#d_o_b_d1').val(); // dropdown.options[dropdown.selectedIndex].text;
		if (d_o_b_d1 == 'Day' || d_o_b_d1 == '' || d_o_b_d1 == null) {
			$('#d_o_b_d1').removeClass('valid_input');
			$('#d_o_b_d1').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#d_o_b_d1').removeClass('invalid_input');
			$('#d_o_b_d1').addClass('valid_input');
		}

		// DOB M Check
		var d_o_b_m1 = $('#d_o_b_m1').val(); // dropdown.options[dropdown.selectedIndex].text;
		if (d_o_b_m1 == 'Month' || d_o_b_m1 == '' || d_o_b_m1 == null) {
			$('#d_o_b_m1').removeClass('valid_input');
			$('#d_o_b_m1').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#d_o_b_m1').removeClass('invalid_input');
			$('#d_o_b_m1').addClass('valid_input');
		}

		// DOB Y Check
		var d_o_b_y1 = $('#d_o_b_y1').val(); // dropdown.options[dropdown.selectedIndex].text;
		if (d_o_b_y1 == 'Year' || d_o_b_y1 == '' || d_o_b_y1 == null) {
			$('#d_o_b_y1').removeClass('valid_input');
			$('#d_o_b_y1').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#d_o_b_y1').removeClass('invalid_input');
			$('#d_o_b_y1').addClass('valid_input');
		}

		var first_name = $('#first_name').val();
		if (first_name == '' || first_name == null) {
			$('#first_name').addClass('invalid_input');
			$('#first_name').removeClass('valid_input');
			error_no = 1;
		} else if (first_name.length > 50) {
			//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
			//alert("Incorrect first name");
			$('#first_name').removeClass('valid_input');
			$('#first_name').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#first_name').addClass('valid_input');
			$('#first_name').removeClass('invalid_input');
		}

		var surname = $('#surname').val();
		if (surname == '' || surname == null) {
			$('#surname').addClass('invalid_input');
			$('#surname').removeClass('valid_input');
			error_no = 1;
		} else if (surname.length > 50) {
			$('#surname').removeClass('valid_input');
			$('#surname').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#surname').addClass('valid_input');
			$('#surname').removeClass('invalid_input');
		}

		var email = $('#app_email').val();
		email = email.replace(/\s/g, '');
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if (emailPattern.test(email)) {
			$('#app_email').removeClass('invalid_input');
			$('#app_email').addClass('valid_input');
		} else {
			$('#app_email').removeClass('valid_input');
			$('#app_email').addClass('invalid_input');
			error_no = 1;
		}

		var app_password = $('#app_password').val();
		if (app_password == '' || app_password == null) {
			$('#app_password').addClass('invalid_input');
			$('#app_password').removeClass('valid_input');
			error_no = 1;
		} else if (app_password.length > 50) {
			//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
			//alert("Incorrect first name");
			$('#app_password').removeClass('valid_input');
			$('#app_password').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#app_password').addClass('valid_input');
			$('#app_password').removeClass('invalid_input');
		}

		var mobPattern =
			/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

		var mobVal = $('#app_mobile').val().replace(/\s/g, '').toString();
		$('#app_mobile').val(mobVal);

		var app_mobile = $('#app_mobile').val();
		if (!mobPattern.test(app_mobile)) {
			$('#app_mobile').removeClass('valid_input');
			$('#app_mobile').addClass('invalid_input');
			error_no = 1;
		} else {
			$('#app_mobile').addClass('valid_input');
			$('#app_mobile').removeClass('invalid_input');
		}
		if (app_mobile == '' || app_mobile == null) {
			$('#app_mobile').addClass('invalid_input');
			$('#app_mobile').removeClass('valid_input');
			error_no = 1;
		}

		console.log('a');

		//  if (!app_postcode_check()) {
		//      error_no=1;
		//    }

		if (error_no == 1) {
			$('.app-error-message').css('display', 'block');
		} else {
			if (!$('#app_gdpr').is(':checked')) {
				document.getElementById('check_text').style.display = 'block';
				//console.log('b');
				return false;
			} else {
				document.getElementById('check_text').style.display = 'none';
				document.getElementById('create_account_button').style.display =
					'none';
				// document.getElementById('please_wait_image').style.display = 'block';
				$.post(
					'ajax/save_application2.ajax.html',
					$(this).serializeArray(),
					function (response) {
						response = JSON.parse(response);
						document.getElementById(
							'create_account_button'
						).style.display = 'block';
						document.getElementById(
							'please_wait_image'
						).style.display = 'none';
						if (response.error) {
							var msg = '';
							var msgs = {
								postcode:
									"Unfortunately we don't deliver to this area. Apologies for any inconvenience.",
							};
							msg = msgs[response.error];

							if (!msg)
								msg =
									'An unknown error occured. Please contact support and we will be happy to assist.';
							alert(msg);
							return;
						}
						console.log(response);
						console.log('redirect url is ' + response.redirect_url);
						console.log('user ID ' + response.user_id);
						benefits_user_id = response.user_id;
						benefits_redirect = response.redirect_url;
						//fbq('track', 'CompleteRegistration');

						if (
							response.user_id == '' ||
							response.user_id == null
						) {
							console.log('email already exists');
							alert('email already exists');
						} else {
							_paq.push([
								'trackEvent',
								'Create an Account',
								'Create an Account',
								'Create an Account',
								1,
							]);

							window.location.href = response.redirect_url;
							//  window.location.href='/pre-app2.php';
							// document.getElementById('home-account-type-wrapper-stage0').style.display='none';
							// document.getElementById('home-account-type-wrapper-stage1').style.display='block';

							$([
								document.documentElement,
								document.body,
							]).animate(
								{
									scrollTop:
										$('#form-stage2').offset().top - 140,
								},
								2000
							);
						}
					}
				);
			}
		}
		return false;
	});

	$('#form-stage2').submit(function (e) {
		e.preventDefault();

		// dob_day_check();
		// dob_month_check();
		// dob_year_check();
		// check_app_fname();
		// check_app_sname();
		// check_app_mobile();
		// check_app_email();

		app_postcode_check();
		check_app_housenoname();
		check_app_address1();
		check_app_address2();
		check_app_address3();
		check_app_telhome();

		var valids = $('#form-stage2 input.valid_input').length;
		if (valids != 6) return;
		$('#application_process_app_btn2').attr('disabled', 'disabled');

		$.post(
			'ajax/save_application_address.ajax.html',
			$(this).serializeArray(),
			function (response) {
				console.log(response);

				$('#application_process_app_btn2').removeAttr('disabled');

				window.location.href = 'pre-app2.html';
			}
		);

		return false;
	});

	// Previous customers popup
	setTimeout(function () {
		$('#customer_approval_modal').css('display', 'block');
	}, 7000);

	setTimeout(function () {
		$('#customer_approval_modal').fadeOut();
	}, 15000);

	// Previous application popup
	setTimeout(function () {
		$('#previous_customer_win_modal').css('display', 'block');
		$('#previous_customer_win_drop').css('display', 'block');
	}, 2000);

	setTimeout(function () {
		$('#previous_customer_win_modal').fadeOut();
		$('#previous_customer_win_drop').fadeOut();
	}, 17000);

	//  $.getJSON('./ajax/latest_applicant.ajax.php', function(data) {
	//   var span = $('#approved');
	//   $('[data-field="title"]', span).text(data.title);
	//   $('[data-field="forename"]', span).text(data.forename);
	//   $('[data-field="address3"]', span).text(data.address3);
	//   $('[data-field="phone_name"]', span).text(data.phone_name);

	//   $('#approved_img').attr('src', 'https://sunshinemobile.co.uk/images/product/'+data.image_filename);
	//  });

	$('.customer_approval_modal_close').on('click', function () {
		$('#customer_approval_modal').fadeOut();
	});

	$('.previous_customer_modal_close').on('click', function () {
		$('#previous_customer_modal').fadeOut();
	});

	$('.previous_customer_win_modal_close').on('click', function () {
		$('#previous_customer_win_modal').fadeOut();
		$('#previous_customer_win_drop').fadeOut();
	});

	$('#previous_customer_win_drop').on('click', function () {
		$('#previous_customer_win_modal').fadeOut();
		$('#previous_customer_win_drop').fadeOut();
	});

	$('#home-account-flavva-benefits').on('click', function () {
		$.post(
			'ajax/user_group_insert.ajax.html',
			{groups: [16, 20]},
			function (response) {
				response = JSON.parse(response);
				window.location.href = response.redirect_url;
			}
		);
	});
	$('#home-account-standard').on('click', function () {
		window.location.href = benefits_redirect;
	});
});
var timerval;
function homepage_slider_timer() {
	clearInterval(timerval);
	timerval = setInterval('homepage_timer()', 15000);
}

function card_type_check() {
	var dropdown_string = $('#card_type').val();
	if (
		dropdown_string == 'Please select' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#card_type').removeClass('valid_input');
		$('#card_type').addClass('invalid_input');
	} else {
		$('#card_type').removeClass('invalid_input');
		$('#card_type').addClass('valid_input');
	}
}

function address_check() {
	var address = $('#address').val();
	if (address == '' || address == null) {
		$('#address').removeClass('valid_input');
		$('#address').addClass('invalid_input');
	} else {
		$('#address').removeClass('invalid_input');
		$('#address').addClass('valid_input');
	}
}

function postcode_check() {
	var postcode = $('#postcode').val();
	postcode = postcode.replace(/\s/g, '');
	if (postcode == null || postcode == '') {
		$('#postcode').addClass('invalid_input');
		$('#postcode').removeClass('valid_input');
	} else {
		var postcodePattern =
			/^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$/;
		if (postcodePattern.test(postcode)) {
			$('#postcode').addClass('valid_input');
			$('#postcode').removeClass('invalid_input');
		} else {
			$('#postcode').addClass('invalid_input');
			$('#postcode').removeClass('valid_input');
		}
	}
}

function card_check_it() {
	var creditcardval = document.getElementById('creditcard').value;

	// The Luhn Algorithm. It's so pretty.
	var nCheck = 0,
		nDigit = 0,
		bEven = false;
	creditcardval = creditcardval.replace(/\D/g, '');

	for (var n = creditcardval.length - 1; n >= 0; n--) {
		var cDigit = creditcardval.charAt(n),
			nDigit = parseInt(cDigit, 10);
		if (bEven) {
			if ((nDigit *= 2) > 9) nDigit -= 9;
		}
		nCheck += nDigit;
		bEven = !bEven;
	}
	if (creditcardval == '') {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else if (/[^0-9-\s]+/.test(creditcardval)) {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else if (nCheck % 10 != 0) {
		$('#creditcard').removeClass('valid_input');
		$('#creditcard').addClass('invalid_input');
	} else {
		$('#creditcard').removeClass('invalid_input');
		$('#creditcard').addClass('valid_input');
	}
}

function month_check(field_name) {
	var date_string = $('#exp_m').val();
	if (date_string == 'Month') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == 'Day') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == 'Please select') {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else if (date_string == null) {
		$('#exp_m').removeClass('valid_input');
		$('#exp_m').addClass('invalid_input');
	} else {
		$('#exp_m').removeClass('invalid_input');
		$('#exp_m').addClass('valid_input');
	}
}

function year_check(field_name) {
	var date_string = $('#exp_y').val();
	if (date_string == 'Year') {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else if (date_string == 'Please select') {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else if (date_string == null) {
		$('#exp_y').removeClass('valid_input');
		$('#exp_y').addClass('invalid_input');
	} else {
		$('#exp_y').addClass('valid_input');
		$('#exp_y').removeClass('invalid_input');
	}
}

function number_check(field_name) {
	var number = document.getElementById('cvv').value;
	if (number == null || number == '') {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	} else if (isNaN(number)) {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	} else if (number.length == 3) {
		$('#cvv').removeClass('invalid_input');
		$('#cvv').addClass('valid_input');
	} else {
		$('#cvv').removeClass('valid_input');
		$('#cvv').addClass('invalid_input');
	}
}

// home page header slider
$('.home_slideshow_buttons').on('click', function () {
	homepage_slider_timer();
	$('.home_slideshow_single').removeClass('homepage_active');
	$('.home_slideshow_buttons').removeClass('home_slideshow_toggle_active');
	$(this).addClass('home_slideshow_toggle_active');
	var item_number = $(this).attr('data-sliderid');
	$('.home_slideshow_single').css('display', 'none');
	$('[data-slideno="' + item_number + '"]').css('display', 'block');
	$('[data-slideno="' + item_number + '"]').addClass('homepage_active');
	$('.home_slideshow_single').attr('data-homeslideactive', '0');
	$('[data-slideno="' + item_number + '"]').attr('data-homeslideactive', '1');
});

$('input, select').change(function () {
	setTimeout(function () {
		var hasError = $('.invalid_input').length > 0;

		$('#app-error-message').toggleClass('hidden', !hasError);
	}, 100);
});

function validateApply() {
	//make ajax call
	var f_name = $('#first_name').val();
	var s_name = $('#surname').val();
	var home_email = $('#app_email').val();
	home_email = home_email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	var mobile_tel = $('#app_mobile').val();
	var mobPattern =
		/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

	var title_dropdown = document.getElementById('title');
	var title_string =
		title_dropdown.options[title_dropdown.selectedIndex].text;

	var dob_d_dropdown = document.getElementById('d_o_b_d1');
	var dob_d_string =
		dob_d_dropdown.options[dob_d_dropdown.selectedIndex].text;

	var dob_m_dropdown = document.getElementById('d_o_b_m1');
	var dob_m_string =
		dob_m_dropdown.options[dob_m_dropdown.selectedIndex].text;

	var dob_y_dropdown = document.getElementById('d_o_b_y1');
	var dob_y_string =
		dob_y_dropdown.options[dob_y_dropdown.selectedIndex].text;
	//get the username & password
	if (title_string == '' || title_string == 'Please select') {
		$('#title').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_title').offset().top},
			1000
		);
		return false;
		// move to top of form
	} else if (f_name == '') {
		$('#first_name').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_fname').offset().top},
			1000
		);
		return false;
	} else if (f_name.length > 50) {
		//(f_name.search(/[^a-zA-Z\s]+/) !== -1){
		alert('Incorrect first name');
		document.getElementById('first_name').focus();
		$('#first_name').removeClass('valid_input');
		$('#first_name').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_fname').offset().top},
			1000
		);
		error = 1;
		return false;
	} else if (s_name == '') {
		$('#surname').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_surname').offset().top},
			1000
		);
		return false;
	} else if (dob_d_string == '' || dob_d_string == 'Day') {
		$('#d_o_b_d1').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_dob').offset().top},
			1000
		);
		return false;
	} else if (dob_m_string == '' || dob_m_string == 'Month') {
		$('#d_o_b_m1').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_dob').offset().top},
			1000
		);
		return false;
	} else if (dob_y_string == '' || dob_y_string == 'Year') {
		$('#d_o_b_y1').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_dob').offset().top},
			1000
		);
		return false;
	} else if (s_name.length > 50) {
		//(s_name.search(/[^a-zA-Z\s]+/) !== -1){
		alert('Incorrect surname');
		document.getElementById('surname').focus();
		$('#surname').removeClass('valid_input');
		$('#surname').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_surname').offset().top},
			1000
		);
		error = 1;
		return false;
	} else if (mobile_tel != '' && !mobPattern.test(mobile_tel)) {
		$('#app_mobile').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_mobile').offset().top},
			1000
		);
		return false;
	} else if (home_email == '') {
		alert('Incorrect email address');
		document.getElementById('app_email').focus();
		$('#app_email').removeClass('valid_input');
		$('#app_email').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_email').offset().top},
			1000
		);
		return false;
	} else if (!emailPattern.test(home_email)) {
		alert('Incorrect email address');
		document.getElementById('app_email').focus();
		$('#app_email').addClass('invalid_input');
		$('#app_email').removeClass('valid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_email').offset().top},
			1000
		);
		return false;
	} else if (document.getElementById('password').value == '') {
		$('#password').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_sec1').offset().top},
			1000
		);
		//error = 1;
		return false;
	} else if (document.getElementById('password_confirm').value == '') {
		$('#password_confirm').addClass('invalid_input');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_sec2').offset().top},
			1000
		);
		//error = 1;
		return false;
	} else if (
		document.getElementById('password_confirm').value !=
		document.getElementById('password').value
	) {
		$('#password_confirm').addClass('invalid_input');
		alert('Passwords must match');
		$('html, body').animate(
			{scrollTop: $('#home_form_single_sec2').offset().top},
			1000
		);
		return false;
	} else {
		if ($('[name="home_checkbox"]').is(':checked')) {
			title = encodeURIComponent(document.getElementById('title').value);
			firstname_val = encodeURIComponent(
				document.getElementById('first_name').value
			);
			lastname_val = encodeURIComponent(
				document.getElementById('surname').value
			);
			email_val = encodeURIComponent(
				document.getElementById('app_email').value
			);
			title = encodeURIComponent(document.getElementById('title').value);
			d_o_b_d1 = encodeURIComponent(
				document.getElementById('d_o_b_d1').value
			);
			d_o_b_m1 = encodeURIComponent(
				document.getElementById('d_o_b_m1').value
			);
			d_o_b_y1 = encodeURIComponent(
				document.getElementById('d_o_b_y1').value
			);
			mobile_tel = encodeURIComponent(
				document.getElementById('app_mobile').value
			);
			password1 = encodeURIComponent(
				document.getElementById('password').value
			);
			password2 = encodeURIComponent(
				document.getElementById('password_confirm').value
			);
			$('#home_email_error_optin').css('display', 'none');
		} else {
			$('#home_email_error_optin').css('display', 'block');
			return false;
		}
	}
	return true;
}

/*	$('#home_apply_short_form').submit(function(e) {
                var isValid = validateApply();
                if (!isValid) {
                    e.preventDefault();
                }
                $('#app-error-message').toggleClass('hidden', isValid);
                return isValid;
            });*/

function check_fname_input() {
	var element_input = $('#first_name').val();
	if (element_input == '') {
		$('#first_name').addClass('invalid_input');
		$('#first_name').removeClass('valid_input');
	} else if (element_input.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#first_name').removeClass('valid_input');
		$('#first_name').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#first_name').addClass('valid_input');
		$('#first_name').removeClass('invalid_input');
	}
}

function check_sname_input() {
	var element_input = $('#surname').val();
	if (element_input == '') {
		$('#surname').addClass('invalid_input');
		$('#surname').removeClass('valid_input');
	} else if (element_input.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#surname').removeClass('valid_input');
		$('#surname').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#surname').addClass('valid_input');
		$('#surname').removeClass('invalid_input');
	}
}

function check_home_mobile_input() {
	var element_input = $('#app_mobile').val();
	if (element_input == '') {
		$('#app_mobile').removeClass('invalid_input');
		$('#app_mobile').removeClass('valid_input');
	} else if (isNaN(element_input)) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#app_mobile').removeClass('valid_input');
		$('#app_mobile').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#app_mobile').addClass('valid_input');
		$('#app_mobile').removeClass('invalid_input');
	}
}

function check_email_input() {
	var element_input = $('#app_email').val();
	element_input = element_input.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

	if (element_input == '') {
		$('#app_email').addClass('invalid_input');
		$('#app_email').removeClass('valid_input');
	} else if (!emailPattern.test(element_input)) {
		$('#app_email').addClass('invalid_input');
		$('#app_email').removeClass('valid_input');
	} else {
		$('#app_email').addClass('valid_input');
		$('#app_email').removeClass('invalid_input');
	}
}

// home page slideshow arrow click
$('#home_slideshow_left_arrow').on('click', function () {
	homepage_slider_timer();
	var current_active_item = $('[data-homeslideactive="1"]');
	var current_selected_item = $(current_active_item).attr('data-slideno');
	if (current_selected_item == '1') {
		// load next lot of videos
		$('[data-slideno="1"]').attr('data-homeslideactive', '0');
		$('[data-slideno="1"]').removeClass('homepage_active');
		$('.home_slideshow_single').css('display', 'none');
		$('[data-slideno="2"]').css('display', 'block');
		$('[data-slideno="2"]').attr('data-homeslideactive', '1');
		$('[data-slideno="2"]').addClass('homepage_active ');
		$('.home_slideshow_buttons').removeClass(
			'home_slideshow_toggle_active'
		);
		$('[data-sliderid="2"]').addClass('home_slideshow_toggle_active');
	} else if (current_selected_item == '2') {
		// load next lot of videos
		$('[data-slideno="2"]').attr('data-homeslideactive', '0');
		$('[data-slideno="2"]').removeClass('homepage_active');
		$('.home_slideshow_single').css('display', 'none');
		$('[data-slideno="1"]').css('display', 'block');
		$('[data-slideno="1"]').attr('data-homeslideactive', '1');
		$('[data-slideno="1"]').addClass('homepage_active ');
		$('.home_slideshow_buttons').removeClass(
			'home_slideshow_toggle_active'
		);
		$('[data-sliderid="1"]').addClass('home_slideshow_toggle_active');
	}
});

$('#home_slideshow_right_arrow').on('click', function () {
	homepage_slider_timer();
	var current_active_item = $('[data-homeslideactive="1"]');
	var current_selected_item = $(current_active_item).attr('data-slideno');
	if (current_selected_item == '1') {
		// load next lot of videos
		$('[data-slideno="1"]').attr('data-homeslideactive', '0');
		$('[data-slideno="1"]').removeClass('homepage_active');
		$('.home_slideshow_single').css('display', 'none');
		$('[data-slideno="2"]').css('display', 'block');
		$('[data-slideno="2"]').attr('data-homeslideactive', '1');
		$('[data-slideno="2"]').addClass('homepage_active ');
		$('.home_slideshow_buttons').removeClass(
			'home_slideshow_toggle_active'
		);
		$('[data-sliderid="2"]').addClass('home_slideshow_toggle_active');
	} else if (current_selected_item == '2') {
		// load next lot of videos
		$('[data-slideno="2"]').attr('data-homeslideactive', '0');
		$('[data-slideno="2"]').removeClass('homepage_active');
		$('.home_slideshow_single').css('display', 'none');
		$('[data-slideno="1"]').css('display', 'block');
		$('[data-slideno="1"]').attr('data-homeslideactive', '1');
		$('[data-slideno="1"]').addClass('homepage_active ');
		$('.home_slideshow_buttons').removeClass(
			'home_slideshow_toggle_active'
		);
		$('[data-sliderid="1"]').addClass('home_slideshow_toggle_active');
	}
});

function homepage_timer() {
	var nextItem = $('.home_slideshow_single.homepage_active')
		.css('display', 'none')
		.removeClass('homepage_active')
		.next('.home_slideshow_single');
	var slideno = $('[data-homeslideactive="1"]').attr('data-slideno');
	if (nextItem.length === 0) {
		nextItem = $('.home_slideshow_single').first();
	}
	nextItem.css('display', 'block').addClass('homepage_active ');
	$('.home_slideshow_single').attr('data-homeslideactive', '0');
	$('.home_slideshow_buttons').removeClass('home_slideshow_toggle_active');
	if (slideno == 1) {
		$('[data-slideno="2"]').attr('data-homeslideactive', '1');
		$('[data-sliderid="2"]').addClass('home_slideshow_toggle_active');
	} else if (slideno == 2) {
		$('[data-slideno="1"]').attr('data-homeslideactive', '1');
		$('[data-sliderid="1"]').addClass('home_slideshow_toggle_active');
	}
}
homepage_slider_timer();

$('#home_apply_short_form').submit(function (e) {
	e.preventDefault();

	// personal_title_check();
	// dob_day_check();
	// dob_month_check();
	// dob_year_check();
	// check_app_fname();
	// check_app_sname();
	// check_app_mobile();
	// check_app_email();
	// check_app_password();
	check_agree();

	var hasError =
		$('.application_single_form_container:visible .invalid_input').length >
		0;
	var error_no = 0;
	$(
		'.application_single_form_container:visible .app-error-message'
	).toggleClass('hidden', !hasError);

	// title check
	var title = document.getElementById('title');
	var title_string = title.options[title.selectedIndex].text;
	if (title_string == 'Please select') {
		$('#title').removeClass('valid_input');
		$('#title').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#title').removeClass('invalid_input');
		$('#title').addClass('valid_input');
	}

	// DOB D Check
	var d_o_b_d1 = $('#d_o_b_d1').val(); // dropdown.options[dropdown.selectedIndex].text;
	if (d_o_b_d1 == 'Day' || d_o_b_d1 == '' || d_o_b_d1 == null) {
		$('#d_o_b_d1').removeClass('valid_input');
		$('#d_o_b_d1').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#d_o_b_d1').removeClass('invalid_input');
		$('#d_o_b_d1').addClass('valid_input');
	}

	// DOB M Check
	var d_o_b_m1 = $('#d_o_b_m1').val(); // dropdown.options[dropdown.selectedIndex].text;
	if (d_o_b_m1 == 'Month' || d_o_b_m1 == '' || d_o_b_m1 == null) {
		$('#d_o_b_m1').removeClass('valid_input');
		$('#d_o_b_m1').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#d_o_b_m1').removeClass('invalid_input');
		$('#d_o_b_m1').addClass('valid_input');
	}

	// DOB Y Check
	var d_o_b_y1 = $('#d_o_b_y1').val(); // dropdown.options[dropdown.selectedIndex].text;
	if (d_o_b_y1 == 'Year' || d_o_b_y1 == '' || d_o_b_y1 == null) {
		$('#d_o_b_y1').removeClass('valid_input');
		$('#d_o_b_y1').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#d_o_b_y1').removeClass('invalid_input');
		$('#d_o_b_y1').addClass('valid_input');
	}

	var first_name = $('#first_name').val();
	if (first_name == '' || first_name == null) {
		$('#first_name').addClass('invalid_input');
		$('#first_name').removeClass('valid_input');
		error_no = 1;
	} else if (first_name.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#first_name').removeClass('valid_input');
		$('#first_name').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#first_name').addClass('valid_input');
		$('#first_name').removeClass('invalid_input');
	}

	var surname = $('#surname').val();
	if (surname == '' || surname == null) {
		$('#surname').addClass('invalid_input');
		$('#surname').removeClass('valid_input');
		error_no = 1;
	} else if (surname.length > 50) {
		$('#surname').removeClass('valid_input');
		$('#surname').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#surname').addClass('valid_input');
		$('#surname').removeClass('invalid_input');
	}

	var email = $('#app_email').val();
	email = email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if (emailPattern.test(email)) {
		$('#app_email').removeClass('invalid_input');
		$('#app_email').addClass('valid_input');
	} else {
		$('#app_email').removeClass('valid_input');
		$('#app_email').addClass('invalid_input');
		error_no = 1;
	}

	var app_password = $('#app_password').val();
	if (app_password == '' || app_password == null) {
		$('#app_password').addClass('invalid_input');
		$('#app_password').removeClass('valid_input');
		error_no = 1;
	} else if (app_password.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#app_password').removeClass('valid_input');
		$('#app_password').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#app_password').addClass('valid_input');
		$('#app_password').removeClass('invalid_input');
	}

	var mobPattern =
		/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

	var mobVal = $('#app_mobile').val().replace(/\s/g, '').toString();
	$('#app_mobile').val(mobVal);

	var app_mobile = $('#app_mobile').val();
	if (!mobPattern.test(app_mobile)) {
		$('#app_mobile').removeClass('valid_input');
		$('#app_mobile').addClass('invalid_input');
		error_no = 1;
	} else {
		$('#app_mobile').addClass('valid_input');
		$('#app_mobile').removeClass('invalid_input');
	}
	if (app_mobile == '' || app_mobile == null) {
		$('#app_mobile').addClass('invalid_input');
		$('#app_mobile').removeClass('valid_input');
		error_no = 1;
	}

	console.log('a');

	if (!app_postcode_check()) {
		error_no = 1;
	}

	if (error_no == 1) {
		$('.app-error-message').css('display', 'block');
	} else {
		if (!$('#app_gdpr').is(':checked')) {
			document.getElementById('check_text').style.display = 'block';
			return false;
		} else {
			document.getElementById('check_text').style.display = 'none';
			// display loading icon
			$('.lds-roller').css('display', 'block');
			$('.loading-spinner-bg').css('display', 'block');

			$.post(
				'ajax/save_application.ajax.html',
				$(this).serializeArray(),
				function (response) {
					response = JSON.parse(response);
					console.log(response);
					console.log('redirect url is ' + response.redirect_url);
					console.log('user ID ' + response.user_id);
					if (response.user_id == '' || response.user_id == null) {
						console.log('email already exists');
						alert('email already exists');
						// Remove loading icon
						$('.lds-roller').css('display', 'none');
						$('.loading-spinner-bg').css('display', 'none');
					} else {
						window.location.href = response.redirect_url;
					}
				}
			);
		}
	}
	return false;
});
// application form validation
function personal_title_check(field_name) {
	var dropdown = document.getElementById('title');
	var dropwdown_string = dropdown.options[dropdown.selectedIndex].text;
	if (dropwdown_string == 'Please select') {
		$('#title').removeClass('valid_input');
		$('#title').addClass('invalid_input');
	} else {
		$('#title').removeClass('invalid_input');
		$('#title').addClass('valid_input');
	}
}
function dob_day_check(field_name) {
	// var dropdown = document.getElementById('d_o_b_d1');
	var dropdown_string = $('#d_o_b_d1').val(); // dropdown.options[dropdown.selectedIndex].text;
	if (
		dropdown_string == 'Day' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_d1').removeClass('valid_input');
		$('#d_o_b_d1').addClass('invalid_input');
	} else {
		$('#d_o_b_d1').removeClass('invalid_input');
		$('#d_o_b_d1').addClass('valid_input');
	}
}
function dob_month_check(field_name) {
	//var dropdown = document.getElementById('d_o_b_m1');
	var dropdown_string = $('#d_o_b_m1').val(); //dropdown.options[dropdown.selectedIndex].text;
	if (
		dropdown_string == 'Month' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_m1').removeClass('valid_input');
		$('#d_o_b_m1').addClass('invalid_input');
	} else {
		$('#d_o_b_m1').removeClass('invalid_input');
		$('#d_o_b_m1').addClass('valid_input');
	}
}
function dob_year_check(field_name) {
	//var dropdown = document.getElementById('d_o_b_y1');
	//var dropdown_string = dropdown.options[dropdown.selectedIndex].text;
	var dropdown_string = $('#d_o_b_y1').val();
	if (
		dropdown_string == 'Year' ||
		dropdown_string == '' ||
		dropdown_string == null
	) {
		$('#d_o_b_y1').removeClass('valid_input');
		$('#d_o_b_y1').addClass('invalid_input');
	} else {
		$('#d_o_b_y1').removeClass('invalid_input');
		$('#d_o_b_y1').addClass('valid_input');
	}
}
function check_app_fname() {
	var element_input = $('#first_name').val();
	if (element_input == '') {
		$('#first_name').addClass('invalid_input');
		$('#first_name').removeClass('valid_input');
	} else if (element_input.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#first_name').removeClass('valid_input');
		$('#first_name').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#first_name').addClass('valid_input');
		$('#first_name').removeClass('invalid_input');
	}
}
function check_app_sname() {
	var element_input = $('#surname').val();
	if (element_input == '') {
		$('#surname').addClass('invalid_input');
		$('#surname').removeClass('valid_input');
	} else if (element_input.length > 50) {
		///(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#surname').removeClass('valid_input');
		$('#surname').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#surname').addClass('valid_input');
		$('#surname').removeClass('invalid_input');
	}
}
function check_app_email() {
	var email = $('#app_email').val();
	email = email.replace(/\s/g, '');
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	if (emailPattern.test(email)) {
		$('#app_email').removeClass('invalid_input');
		$('#app_email').addClass('valid_input');
	} else {
		$('#app_email').removeClass('valid_input');
		$('#app_email').addClass('invalid_input');
	}
}
function check_app_password() {
	var element_input = $('#app_password').val();
	if (element_input == '') {
		$('#app_password').addClass('invalid_input');
		$('#app_password').removeClass('valid_input');
	} else if (element_input.length > 50) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#app_password').removeClass('valid_input');
		$('#app_password').addClass('invalid_input');
		error = 1;
		return false;
	} else if (element_input.length < 3) {
		//(element_input.search(/[^a-zA-Z\s]+/) !== -1){
		//alert("Incorrect first name");
		$('#app_password').removeClass('valid_input');
		$('#app_password').addClass('invalid_input');
		error = 1;
		return false;
	} else {
		$('#app_password').addClass('valid_input');
		$('#app_password').removeClass('invalid_input');
	}
}

function app_postcode_check() {
	var postcode = $('#app_postcode').val();
	postcode = postcode.replace(/\s/g, '');
	if (postcode == null || postcode == '') {
		$('#app_postcode').addClass('invalid_input');
		$('#app_postcode').removeClass('valid_input');
	} else {
		var postcodePattern =
			/^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$/;
		var postcodePatternEsp = /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/;

		if (
			postcodePattern.test(postcode) ||
			postcodePatternEsp.test(postcode)
		) {
			$('#app_postcode').addClass('valid_input');
			$('#app_postcode').removeClass('invalid_input');
			return true;
		} else {
			$('#app_postcode').addClass('invalid_input');
			$('#app_postcode').removeClass('valid_input');
			return false;
		}
	}
}

function check_app_mobile() {
	var mobPattern =
		/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/;

	var mobVal = $('#app_mobile').val().replace(/\s/g, '').toString();
	$('#app_mobile').val(mobVal);

	var element_input = $('#app_mobile').val();
	if (!mobPattern.test(element_input)) {
		$('#app_mobile').removeClass('valid_input');
		$('#app_mobile').addClass('invalid_input');
	} else {
		$('#app_mobile').addClass('valid_input');
		$('#app_mobile').removeClass('invalid_input');
	}
	if (element_input == '' || element_input == null) {
		$('#app_mobile').addClass('invalid_input');
		$('#app_mobile').removeClass('valid_input');
	}
}

function check_agree() {
	if ($('#app_gdpr').prop('checked') == false) {
		$('.app-error-message ').addClass('hidden');
	}
}

// Application Stage 1
$('#application_process_app_btn').on('click', function () {
	return true;
});

function process_trial(stage) {
	if (stage == 1) {
		document.getElementById(
			'home-account-type-wrapper-stage1'
		).style.display = 'none';
		document.getElementById(
			'home-account-type-wrapper-stage2'
		).style.display = 'block';
	}

	if (stage == 2) {
		exp_m = document.getElementById('exp_m').value;
		exp_y = document.getElementById('exp_y').value;
		card_type = document.getElementById('card_type').value;
		creditcard = document.getElementById('creditcard').value;
		cvv = document.getElementById('cvv').value;
		address = document.getElementById('address').value;
		postcode = document.getElementById('postcode').value;

		var cc_error = false;

		if (exp_m == '') cc_error = true;
		if (exp_y == '') cc_error = true;
		if (card_type == '') cc_error = true;
		if (creditcard == '') cc_error = true;
		if (cvv == '') cc_error = true;
		if (address == '') cc_error = true;
		if (postcode == '') cc_error = true;

		if (cc_error == true) {
			month_check();
			year_check();
			number_check('cvv');
			card_check_it();
			card_type_check();
			postcode_check();
			address_check();

			alert('You must provide correct card details');
		} else {
			gtag('event', 'Click', {
				event_category: 'MFI Pro Sign Up',
				event_label: 'MFI Pro Sign Up',
			});
			$.getJSON(
				'ajax/save_trial.ajax6ebf.html?exp_m=' +
					exp_m +
					'&exp_y=' +
					exp_y +
					'&card_type=' +
					card_type +
					'&creditcard=' +
					creditcard +
					'&cvv=' +
					cvv +
					'&address=' +
					address +
					'&postcode=' +
					postcode,
				function (data) {
					window.location = benefits_redirect;
				}
			);
		}
	}
}

function skip_trial() {
	window.location = benefits_redirect;
}

function getUrlParameter(name) {
	name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
	var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
	var results = regex.exec(location.search);
	return results === null
		? ''
		: decodeURIComponent(results[1].replace(/\+/g, ' '));
}

var transactionid = getUrlParameter('transactionid');
var _transactionid = getUrlParameter('$transactionid');

if (transactionid) {
	document.cookie = 'transactionid=' + transactionid;
} else {
	if (_transactionid) document.cookie = 'transactionid=' + _transactionid;
}

var saledata1 = getUrlParameter('saledata1');
var saledata2 = getUrlParameter('saledata2');

if (saledata1) document.cookie = 'saledata1=' + saledata1;

if (saledata2) document.cookie = 'saledata2=' + saledata2;

var mc_cid = getUrlParameter('mc_cid');

if (mc_cid) {
	document.cookie = 'mc_cid=' + mc_cid;
}

$(
	'.scroll_bottom_btn,#home_shop_items_create_account,#home_when_to_pay_btn'
).on('click', function () {
	$('html, body').animate(
		{
			scrollTop: $('#home_application_wrapper').offset().top,
		},
		2000
	);
});