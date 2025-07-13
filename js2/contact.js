// Javascript Document
function submitContact() {
	var brand = $("#brand").val();
	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var state = $("#state").val();
	var zip = $("#zip").val();
	var enquiry = $("#enquiry").val();
	var message = $("#message").val();
	var chkbrand = $(".chkbrand:checked");
	var subs = new Array();
	for(var i=0;i<chkbrand.length;i++) {
		subs.push($(chkbrand[i]).attr("value"));
	}

	$.ajax({
		url: base_url + "Contact/save_contact",
		type: "POST",
		dataType: "html",
		data: "brand=" + brand + "&first_name=" + first_name + "&last_name=" + last_name + "&email=" + email + "&phone=" + phone + "&state=" + state + "&zip=" + zip + "&enquiry=" + enquiry + "&message=" + message + "&subs=" + subs.join(","),
		success: function(result) {
			console.log(result);
			$("#successModal").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#msg-box").html("Your message has been sent successfully.");
            $("#successModal").modal("show");

            $(".form-franchise select").val("");
            $(".form-franchise input").val("");
            $(".form-franchise textarea").val("");
            $(".form-franchise input").prop("checked", false);
		},
		error: function(result) {
			console.log(result);
			alert("Error when submit registration data !");
		}
	});
	return false;
}

