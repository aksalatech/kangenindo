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
		     "targets": [4]
		}],
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
});

function confirmation(d){
	var base = base_url + "Store/delete?typeID="+d;
    //alert(base)
    var r = confirm("Are you sure?");
    if (r == true) {
    	window.location.assign(base);
    }
}

function doit(){
	var temp = $("#brancOption").val();
	$("#action").val(temp);
	$("#productView").submit();
}

//Datemask dd/mm/yyyy
$("#guestBorn").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
$("#guestPhone").inputmask("(___) ___-____", {"placeholder": "(___) ___-____"});

$(document).ready(function(e) {


    $("body").on("click", ".btViewCatering", function (e) {
		// tempID = $(this).attr("data-id");
		var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var message = $(this).attr("data-message");
        var lastupdate = $(this).attr("data-tgl");
       
		
		// tempID = id;
		// tempNm = "";
		$("#nameSpan").html(name);
		$("#emailSpan2").html(email);
		$("#messageSpan3").html(message);
		$("#tglSpan4").html(lastupdate);

		$("#tukarDialog").modal("show");
	});

	$("body").on("click", ".btViewReason", function(e) {
		var reason = $(this).attr("data-reason");
		$("#reasonBox").val(reason);
		$("#reasonDialog").modal("show");
	});

    $("body").on("click", ".btNotes", function (e) {
		var notes = $(this).attr("data-notes");
		var id = $(this).attr("data-id");
		// $("#reasonBox").html(notes);
		$("#hidid").val(id);
		$("#rejectDialog").modal("show");
	});

});
