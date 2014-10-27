$(function(){
 	$(".datepicker").each(function() {//ปฏิทิน
 		var date_for = $(this).attr("for");
 		$("span[for="+date_for+"]").datepicker({
			language: "th-th"
		});
		$("span[for="+date_for+"]").on("changeDate", function (e){//onchangeDate
			$('#'+date_for).val(e.format('dd/mm/yyyy'));
			$('span[for='+date_for+']').datepicker('hide');
			return false;
		});
 	});
 });
function NumberFormat(obj,digit){//onBlur="NumberFormat(this,2);" this is object of textbox,2 is digit of number
	var number = $.trim(obj.value).split(",").join("");
	//alert(number);
	if(number!=""){
	if(!isNaN(number)&&number!=""){	
		number_format(obj,digit);
		}
	else{
		num = 0;
		alert("กรุณากรอกเฉพาะตัวเลขเท่านั้น !!");
		obj.value = "";
		return false;
		}
		}

	
	//alert("AAA");
}
function NumberFormat_c(obj){
	number_format(obj);
}

function number_format(objNumber,decimals) {
	
	var point = '.';
	var type = 'i';
	var number = $.trim(objNumber.value);
	var number_zero = '';
	number = number.split(",").join("");
	//alert(number);
	for(i=0; i<number.length; i++) {
		if(number.charAt(i) == point) {
			type = 'f';
		}
	}
	if(type == 'f') {
		for(i=0; i<number.length; i++) {
			if(number.charAt(i) == 'e') {
				e_number = (number.substring(i+1, number.length)).split(".").join("");
				if(parseFloat(e_number) < 0) {
					this_number = (number.substring(0, i)).split(".").join("");
					e_sign = (this_number == (this_number = Math.abs(parseFloat(this_number))));
					real_number = "0.";
					real_number = (((e_sign)?'':'-') + real_number);
					for(j=1; j<Math.abs(parseFloat(e_number)); j++) {
						real_number += '0';
					}
					real_number += this_number;
					number = real_number;
				}
			}
		}
		decimal = number.split(".");
	}
	if(decimals == 0) {
		number = Math.round(parseFloat(number));
	}
	sign = (number == (number = Math.abs(number)));
	number = Math.floor(number*100+0.50000000001);
	number = Math.floor(number/100).toString();
	for (var i = 0; i < Math.floor((number.length-(1+i))/3); i++)
		number = number.substring(0,number.length-(4*i+3))+','+number.substring(number.length-(4*i+3));
	number = (((sign)?'':'-') + number);
	if(type == 'i' && decimals > 0) {
		number += '.';
		for(j=1; j<=decimals; j++) {
			number += '0';
		}
	} else if(type == 'f' && decimals > 0) {
		if(decimal[1].length == decimals) {
			number += '.'+decimal[1];
		} else if(decimal[1].length < decimals) {
			number += '.'+decimal[1];
			for(j=1; j<=decimals-decimal[1].length; j++) {
				number += '0';
			}
		} else if(decimal[1].length > decimals) {
			decimal_value = decimal[1].toString();
			number_string = decimal_value.substring(0, (decimals)+1);
			number_eval = parseFloat(number_string)/Math.pow(10, decimals-1);
			number_eval = Math.round(number_eval);
			if(number_eval == Math.pow(10, decimals)) {
				number_eval = 0;
			}
			if(number_eval.toString().length == 1) {
				number_eval = '0'+number_eval.toString();
			}
			if(number_eval.toString().length < decimals) {
				number_zero += '.'+number_eval.toString();
				for(j=1; j<=decimals-number_eval.toString().length; j++) {
					number_zero += '0';
				}
				number += number_zero;
			} else {
				number += '.'+number_eval.toString();
			}
		}
	}
	objNumber.value = number;
}
