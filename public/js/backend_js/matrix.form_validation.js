
$(document).ready(function(){
	var Domain = $("meta[name='Domain']").attr('content');
	
	$("#new_pwd").click(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>كلمة المرور الحالية غير صحيحة</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>كلمة المرور الحالية صحيحة</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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

    // Add Category Validation
	$("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
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

	// Add Product Validation
	$("#add_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			image:{
				required:true,
			},
			price:{
				required:true,
				number:true
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

	// Edit Product Validation
	$("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			price:{
				required:true,
				number:true
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

	// edit Category Validation
	$("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
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
	
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
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
	
	$("#password_validate").validate({
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
/*
	$("#delCat").click(function(){
		if (confirm('Are You Sure You Want To Delete This Category')) {
			return true;
		}
		return false;
	});
*/
	/*$("#delproduct").click(function(){
		if (confirm('Are You Sure You Want To Delete This Product')) {
			return true;
		}
		return false;
	});*/
	
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title: "Are You Sure?",
			text : "You Will Not Be Able To Recover This Record",
			type : "warning",
			showCancelButton : true,
			confirmButtonClass : "btn-danger",
			confirmButtonText : "Yes, delete it!"

		},
		function () {
			var Domain = $("meta[name='Domain']").attr('content');

			window.location.href ="/admin/"+deleteFunction+"/"+id; 
		});
		
	});

	$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="sku" style="width: 120px;" /> <input type="text" name="size[]" id="size" placeholder="size" style="width: 120px;" /><input type="text" name="price[]" id="price" placeholder="price" style="width: 120px;" /><input type="text" name="stock[]" id="stock" placeholder="stock" style="width: 120px;" /><a href="javascript:void(0);" class="remove_button"> title = "Remove"</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});



});

function selectPaymentMethod() {
	if ($('#permission').is(':checked')){
		// alert("checked");
	}else{
		alert("الرجاء اعطاء صلاحيه من الصلاحيات  الموجوه ");
		return false;
	}
	
}