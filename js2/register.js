// Javascript Document
function submitRegister() {
	var name = $("#name").val();
	var email = $("#email").val();
	var phone = $("#phone").val();

	$("#error-name").hide();
	$("#error-phone").hide();
	$("#error-email").hide();
	if (name.length < 3) {
		$("#error-name").html("Your name is not valid !");
		$("#error-name").show();
	}
	else if (phone.length <= 3) {
		$("#error-phone").html("Your phone is not valid !");
		$("#error-phone").show();
	}
	else {
		$.ajax({
			url: base_url + "Promo/save_register",
			type: "POST",
			dataType: "html",
			data: "name=" + name + "&email=" + email + "&phone=" + phone,
			success: function(result) {
				console.log(result);
				if (result != "") {
					$("#error-email").html(result);
					$("#error-email").show();
				} else 
					window.location = base_url + "Promo/success";
			},
			error: function(result) {
				console.log(result);
				alert("Error when submit registration data !");
			}
		});
		return false;
	}
}