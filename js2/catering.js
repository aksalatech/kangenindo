// Javascript Document
function submitCatering() {
	var full_name = $("#full_name_cat").val();
	var email = $("#email_cat").val();
	var message = $("#message_cat").val();

	$.ajax({
		url: base_url + "Catering/save_catering",
		type: "POST",
		dataType: "html",
		data: "full_name=" + full_name + "&email=" + email + "&message=" + message,
		success: function(result) {
			console.log(result);
			$("#successModal").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#msg-box").html("Your catering requests has been sent successfully.");
            $("#successModal").modal("show");

            $(".form-franchise select").val("");
            $(".form-franchise input").val("");
            $(".form-franchise textarea").val("");
            $(".form-franchise input").prop("checked", false);
		},
		error: function(result) {
			console.log(result);
			alert("Error when submit catering requests !");
		}
	});
	return false;
}

