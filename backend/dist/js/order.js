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
			"orderable": false, "targets": [8]
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
	var base = base_url + "Cert_type/delete?typeID="+d;
    //alert(base)
    var r = confirm("Are you sure?");
    if (r == true) {
    	window.location.assign(base);
    }
}

function confirmationC(d,c){
	var base = base_url + "Order/accept?typeID="+d+"&id2="+c;
    //alert(base)
    var r = confirm("Complete Order?");
    if (r == true) {
    	window.location.assign(base);
    }
}

function confirmationR(d){
	var base = base_url + "Cert_type/delete?typeID="+d;
    //alert(base)
    var r = confirm("Are you sure?");
    if (r == true) {
    	window.location.assign(base);
    }
}

$(".btn-rejectverif").click(function(e) {
	id = $(this).attr("data-id");
	id2 = $(this).attr("data-id2");
	
	$('#idTugasver2').val(id);
	$('#idTugasver3').val(id2);
	$("#rejectDialog").modal("show");
});

function doit(){
	var temp = $("#brancOption").val();
	var temp2 = $("#brancOption2").val();
	$("#action").val(temp);
	$("#action2").val(temp2);
	$("#productView").submit();
}
$(document).ready(function(e)
{

	$("body").on("click","#btsave_reject",function(e) {
		var reasonField = $("#reasonField").val();
		var id = $("#idTugasver2").val();
		var id2 = $("#idTugasver3").val();
		if (reasonField == "") {
			$("#error_send").html("Harap mengisi notes terlebih dahulu.");
			window.setTimeout(function() { $("#error_send").html(""); }, 3200);
		} else {
			$.ajax({
				url: base_url + "order/reject",
				type: "POST",
				dataType: "html",
				data: "catatan=" + reasonField+ "&id=" + id+ "&id2=" + id2+ "&stats=" + 3,
				success: function(result) {
					console.log(result);
					if (id != "")
						alert("Verifikasi berhasil disimpan !");
					else
						alert("Verifikasi berhasil disimpan !");
					window.location.reload(true);
				},
				error: function(result) {
					console.log(result);
					alert("Error when Verifikasi !");
				}
			})
		}
	});

});


//Datemask dd/mm/yyyy
$("#guestBorn").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
$("#guestPhone").inputmask("(___) ___-____", {"placeholder": "(___) ___-____"});
