var FormWizard = function () {


    return {
        //main function to initiate the module

        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }
 console.log('ss');

            console.log(district_list);
            // console.log(cities_list);

            $("#client_type").select2({
                placeholder: "choose your section ",
                allowClear: true,
                width: '100%',

                escapeMarkup: function (m) {
                    return m;
                }
            });

            $("#category_list").select2({
                placeholder: "category",
                allowClear: true,
                width: '100%',

                escapeMarkup: function (m) {
                    return m;
                }
            });
            $("#category_list2").select2({
                placeholder: "category",
                allowClear: true,
                width: '100%',

                escapeMarkup: function (m) {
                    return m;
                }
            });

            $("#country_list").select2({
                placeholder: "country",
                allowClear: true,
                escapeMarkup: function (m) {
                    return m;
                }
            });
            //     $("#keyword_list").select2({
            //     placeholder: "keyword",
            //     allowClear: true,
            //     formatResult: format,
            //     formatSelection: format,
            //     escapeMarkup: function (m) {
            //         return m;
            //     }
            // });
                $("#cities_list").select2({
                placeholder: "city",
                allowClear: true,

                escapeMarkup: function (m) {
                    return m;
                }
            });

            $("#district_list").select2({
                placeholder: "distric",
                allowClear: true,


                escapeMarkup: function (m) {
                    return m;
                }
            });
//
//
var _URL = window.URL || window.webkitURL;

$("#company_logo").change(function(e) {
    var file, img;


    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            alert(this.width + " " + this.height);
        };
        img.onerror = function() {
            alert( "not a valid file: " + file.type);
        };
        img.src = _URL.createObjectURL(file);


    }

});

    // get cities
    $( '#country_list' ).change(function( event ) {
      event.preventDefault();
      $("#cities_list").select2("val", "");
      var form = $( this );
      $.ajax({
        type: 'POST',
        url: "/api/cities",
        data: {countryId : form.val()},
        dataType: 'json',
        success: function( resp ) {
          console.log( resp );
          var dt='<option value="0"> choose your city</option>';
          $.each(resp, function(k,v) {
            /// do stuff
            dt += '<option value="'+v.id+'">'+v.name+'</option>';

        });
          $( '#cities_list' ).html(dt);
        }
      });

    });
    //
    //
    $( '#cities_list' ).on('change',function( event ) {
      event.preventDefault();
      $("#district_list").select2("val", "");
      var city =$( '#cities_list' ).val();
      var country=$( '#country_list' ).val();
      // alert(country);
      // console.dir(country);
      // console.log( city );
      $.ajax({
        type: 'POST',
        url: "/api/districts",
        data: {cityId : city , countryId :country},
        dataType: 'json',
        success: function( resp ) {
          console.log( resp );
          var dt2='';
          $.each(resp, function(k,v) {
            /// do stuff
            dt2 += '<option value="'+v.id+'">'+v.name+'</option>';
        });
          $( '#district_list' ).html(dt2);
        }
      });
    });

//
//
//

            var form = $('#submit_form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    //account
                    username: {
                        minlength: 5,
                        required: true
                    },

                    //profile
                    company_name_en: {
                        required: true
                    },
                    company_name_ar: {
                        required: true
                    },
                    business_email: {
                        required: true,
                        email: true
                    },
                    business_phone: {
                        required: true,
                        number: true
                    },
                    gender: {
                        required: true
                    },

                    city: {
                        required: true
                    },
                    country: {
                        required: true
                    },
                    //payment

                },

                messages: { // custom messages for radio buttons and checkboxes
                    'payment[]': {
                        required: "Please select at least one option",
                        minlength: jQuery.validator.format("Please select at least one option")
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } else if (element.attr("name") == "payment[]") { // for uniform checkboxes, insert the after the given container
                        error.insertAfter("#form_payment_error");
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success.hide();
                    error.show();
                    Metronic.scrollTo(error, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    if (label.attr("for") == "gender" || label.attr("for") == "payment[]") { // for checkboxes and radio buttons, no need to show OK icon
                        label
                            .closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); // remove error label here
                    } else { // display success icon for other inputs
                        label
                            .addClass('valid') // mark the current input as valid and display OK icon
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    }
                },

                submitHandler: function (form) {
                    success.show();
                    error.hide();
                    //add here some ajax code to submit your form or just call form.submit() if you want to submit the form without ajax
                }

            });

            var displayConfirm = function() {
                // $('#tab4 .form-control-static', form).each(function(){
                //     var input = $('[name="'+$(this).attr("data-display")+'"]', form);
                //     if (input.is(":radio")) {
                //         input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
                //     }
                //     if (input.is(":text") || input.is("textarea") || input.is(":email") ) {
                //         $(this).html(input.val());
                //     } else if (input.is("select")) {
                //         $(this).html(input.find('option:selected').text());
                //     } else if (input.is(":radio") && input.is(":checked")) {
                //         $(this).html(input.attr("data-title"));
                //     } else if ($(this).attr("data-display") == 'payment[]') {
                //         var payment = [];
                //         $('[name="payment[]"]:checked', form).each(function(){
                //             payment.push($(this).attr('data-title'));
                //         });
                //         $(this).html(payment.join("<br>"));
                //     }
                // });
                success.show();
                    error.hide();

            }

            var handleTitle = function(tab, navigation, index) {
                var total = navigation.find('li').length;
                var current = index + 1;
                // set wizard title
                $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
                // set done steps
                jQuery('li', $('#form_wizard_1')).removeClass("done");
                var li_list = navigation.find('li');
                for (var i = 0; i < index; i++) {
                    jQuery(li_list[i]).addClass("done");
                }

                if (current == 1) {
                    $('#form_wizard_1').find('.button-previous').hide();
                } else {
                    $('#form_wizard_1').find('.button-previous').show();
                }

                if (current >= total) {
                    $('#form_wizard_1').find('.button-next').hide();
                    $('#form_wizard_1').find('.button-submit').show();
                    displayConfirm();
                } else {
                    $('#form_wizard_1').find('.button-next').show();
                    $('#form_wizard_1').find('.button-submit').hide();
                }
                Metronic.scrollTo($('.page-title'));
            }

            // default form wizard
            $('#form_wizard_1').bootstrapWizard({
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                onTabClick: function (tab, navigation, index, clickedIndex) {
                    return false;

                    success.hide();
                    error.hide();
                    // if (form.valid() == false) {
                    //     return false;
                    // }
                    handleTitle(tab, navigation, clickedIndex);

                },
                onNext: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    // if (form.valid() == false) {
                    //     return false;
                    // }

                    handleTitle(tab, navigation, index);
                },
                onPrevious: function (tab, navigation, index) {
                    success.hide();
                    error.hide();

                    handleTitle(tab, navigation, index);
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#form_wizard_1').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

            $('#form_wizard_1').find('.button-previous').hide();
            $('#form_wizard_1 .button-submit').click(function () {
               $( "#submit_form" ).submit();
            }).hide();

            //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('#country_list', form).change(function () {
                form.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
        }

    };

}();