// Javascript Document
function submitFranchise() {
	var brand = $("#brand").val();
	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var state = $("#state").val();
	var zip = $("#zip").val();
	var willing_travel = $("#willing_travel").val();
	var fulltime_operator = $("#fulltime_operator").val();
	var liquid_assets = $("#liquid_assets").val();
	var where_find = $("#where_find").val();
	var message = $("#message").val();
	var investmant = $(".investment:checked");
	var invests = new Array();
	for(var i=0;i<investmant.length;i++) {
		invests.push($(investmant[i]).attr("value"));
	}

	$.ajax({
		url: base_url + "Franchise/save_franchise",
		type: "POST",
		dataType: "html",
		data: "brand=" + brand + "&first_name=" + first_name + "&last_name=" + last_name + "&email=" + email + "&phone=" + phone + "&state=" + state + "&zip=" + zip + "&message=" + message + "&willing_travel=" + willing_travel + "&fulltime_operator=" + fulltime_operator + "&liquid_assets=" + liquid_assets + "&where_find=" + where_find + "&invests=" + invests.join(","),
		success: function(result) {
			console.log(result);
			$("#successModal").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#msg-box").html("Your franchise requests has been sent successfully.");
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

