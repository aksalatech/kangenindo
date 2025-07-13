// Javascript
var tempID;
$(function () {
	$('#branchTable').DataTable({
		"columnDefs": [{
			"defaultContent": "-",
			"targets": "_all"
		}],
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});
$(function () {
	$('#ProductTable').DataTable({
		"columnDefs": [{
			"defaultContent": "-",
			"targets": "_all",
			"orderable": false, "targets": [7]
		}],
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});

function doit(){
	var temp = $("#brancOption").val();
	$("#action").val(temp);
	$("#productView").submit();
}

//Datemask dd/mm/yyyy
$("#guestBorn").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
$("#guestPhone").inputmask("(___) ___-____", {"placeholder": "(___) ___-____"});

$(document).ready(function(e) {


    $("body").on("click", ".btViewContact", function (e) {
		tempID = $(this).attr("data-id");
		var brand = $(this).attr("data-brand");
		var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var phone = $(this).attr("data-phone");
        var state = $(this).attr("data-state");
        var zip = $(this).attr("data-zip");
        var inquiry = $(this).attr("data-inquiry");
        var subs = $(this).attr("data-subs");
        var message = $(this).attr("data-message");
        var lastupdate = $(this).attr("data-tgl");
		
		// tempID = id;
		// tempNm = "";
		$("#brandSpan").html(brand);
		$("#nameSpan").html(name);
		$("#emailSpan2").html(email);
		$("#phoneSpan3").html(phone);
		$("#stateSpan4").html(state);
		$("#zipSpan5").html(zip);
		$("#inquirySpan6").html(inquiry);
		$("#messageSpan11").html(message);
		$("#subMessageSpan12").html(subs);
		$("#tglSpan13").html(lastupdate);

		$("#tukarDialog").modal("show");
	});
});
