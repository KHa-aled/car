/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

// Change Price & Stock With size
$(document).ready(function(){

	var Domain = $("meta[name='Domain']").attr('content');
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if (idSize == "") {
			return false;
		}
		$.ajax({
			type:'get',
			url :Domain+'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
				/*alert(resp); return false;*/
				var arr = resp.split('#');
				$("#getPrice").html("INR" + arr[0]);
				$("#price").val(arr[0]);
				if (arr[1] == 0) {
					$("#carButton").hide();
					$("#Availability").text("Out Of Stock");
				}else{
					$("#carButton").show();
					$("#Availability").text("In Stock");
				}
				
			},error:function(){
				alert("Error");
			}
		});
	});
});

// Replace Main Image With Alternative Image
$(document).ready(function(){

	$(".changeImage").click(function(){
		var image = $(this).attr('src');
		$(".mainImage").attr("src",image);
	});
});

// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
});

$().ready(function(){
	var Domain = $("meta[name='Domain']").attr('content');
	// Validate Register Form on Keyup and submit
	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept:"[a-zA-Z]+"
			},
			password:{
				required:true,
				minlength:6
			},
			email:{
				required:true,
				email:true,
				remote:Domain+"/check-email"
			}
		},
		messages:{
			name:{
				required:"Please enter Your Name",
				minlength:"Your Name Must Be Atleast 2 Characters Long",
				accept:"Your Name Must contain Letters Only"
				
			},
			password:{
				required:"Please Provide Your password",
				minlength:"Your Password Must Be Atleast 6 Characters Long"
			},
			email:{
				required:"Please enter Your Email",
				email:"Your enter Valid Email",
				remote:"Email already exists!"
			}
		}
	});

		// Validate Register Form on Keyup and submit
	$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept:"[a-zA-Z]+"
			},
			address:{
				required:true,
				minlength:6
			},
			city:{
				required:true,
				minlength:2
				
			},
			state:{
				required:true,
				minlength:2
				
			},
			country:{
				required:true
			}
		},
		messages:{
			name:{
				required:"Please enter Your Name",
				minlength:"Your Name Must Be Atleast 2 Characters Long",
				accept:"Your Name Must contain Letters Only"
				
			},
			address:{
				required:"Please Provide Your Address",
				minlength:"Your address Must Be Atleast 10 Characters Long"
			},
			city:{
				required:"Please enter Your City",
				minlength:"Your City must be Atleast 2 Characters long",
				
			},
			state:{
				required:"Please enter Your state",
				minlength:"Your State must be atleast 2 Characters long",
				
			},
			country:{
				required:"Please select Your Country",
			},
		}
	});

	// Validate Login Form on Keyup and submit
	$("#loginForm").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			password:{
				required:true
			}
		},
		messages:{
			email:{
				required:"Please enter Your Email",
				email:"Your enter Valid Email",
			},
				password:{
				required:"Please Provide Your password"
			}
		}
	});

	$("#passwordForm").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#current_pwd").keyup(function(){
		var current_pwd = $(this).val();
		$.ajax({
			    headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
			type:'post',
			url :Domain+'/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});



	// Password Strength Script
	  $('#myPassword').passtrength({
          minChars: 4,
          passwordToggle: true,
          tooltip: true,
          eyeImg : "images/frontend_images/eye.svg"
        });

	  $("#copyAddress").click(function(){
	  	if (this.checked) {
	  		$("#shipping_name").val($("#billing_name").val());
	  		$("#shipping_address").val($("#billing_address").val());
	  		$("#shipping_city").val($("#billing_city").val());
	  		$("#shipping_state").val($("#billing_state").val());
	  		$("#shipping_pincode").val($("#billing_pincode").val());
	  		$("#shipping_mobile").val($("#billing_mobile").val());
	  		$("#shipping_contry").val($("#bill_country").val());
	  	}else{
	  		$("#shipping_name").val('');
	  		$("#shipping_address").val('');
	  		$("#shipping_city").val('');
	  		$("#shipping_state").val('');
	  		$("#shipping_pincode").val('');
	  		$("#shipping_mobile").val('');
	  		$("#shipping_contry").val('');
	  	}
	  });

});
function selectPaymentMethod() {
	if ($('#Paypal').is(':checked') || $('#COD').is(':checked')){
		// alert("checked");
	}else{
		alert("Please Select Payment Method");
		return false;
	}
	
}		
