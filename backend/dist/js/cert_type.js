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

function doit(){
	var temp = $("#brancOption").val();
	var temp2 = $("#brancOption2").val();
	$("#action").val(temp);
	$("#action2").val(temp2);
	$("#productView").submit();
}

//Datemask dd/mm/yyyy
$("#guestBorn").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
$("#guestPhone").inputmask("(___) ___-____", {"placeholder": "(___) ___-____"});
