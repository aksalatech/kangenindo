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
			"orderable": false, "targets": [0]
		}],		
		"pageLength" : 2500,
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth"   : false,
		"scrollY"   : "400px",
		"scrollX"   : true, 
		fixedColumns :   {
			leftColumns: 2,
			heightMatch: "auto"
		},
	});
});

function confirmation(d){
	var base = base_url + "request/delete?requestID="+d;
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