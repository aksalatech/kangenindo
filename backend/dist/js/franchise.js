// Javascript
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
		     "orderable": false, "targets": [6]
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


    $("body").on("click", ".btViewFranchise", function (e) {
		// tempID = $(this).attr("data-id");
		var brand = $(this).attr("data-brand");
		var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var phone = $(this).attr("data-phone");
        var state = $(this).attr("data-state");
        var zip = $(this).attr("data-zip");
        var willtravel = $(this).attr("data-willtravel");
        var fulloperator = $(this).attr("data-fulloperator");
        var assets = $(this).attr("data-assets");
        var where = $(this).attr("data-where");
        var invests = $(this).attr("data-invests");
        var message = $(this).attr("data-message");
        var lastupdate = $(this).attr("data-tgl");

        if (willtravel == "1") { 
            var willtravels = '<span class="label label-success">Yes</span>'
        } else { 
            var willtravels = '<span class="label label-warning">No</span>'
        }

        if (fulloperator == "1") { 
            var fulloperators = '<span class="label label-success">Yes</span>'
        } else { 
            var fulloperators = '<span class="label label-warning">No</span>'
        }
       
		
		// tempID = id;
		// tempNm = "";
		$("#brandSpan").html(brand);
		$("#nameSpan").html(name);
		$("#emailSpan2").html(email);
		$("#phoneSpan3").html(phone);
		$("#stateSpan4").html(state);
		$("#zipSpan5").html(zip);
		$("#travelSpan6").html(willtravels);
		$("#operatorSpan7").html(fulloperators);
		$("#whereSpan8").html(invests);
		$("#assetsSpan9").html(assets);
		$("#findSpan10").html(where);
		$("#messageSpan11").html(message);
		$("#tglSpan12").html(lastupdate);

		$("#tukarDialog").modal("show");
	});
});
