// Javascript
$(function () {
	$('#userTable').DataTable({
		"columnDefs": [{
			"defaultContent": "-",
			"targets": "_all",
			"orderable": false, "targets": [4]
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
	var base = base_url + "promobio/Delete?d="+d;
    //alert(base)
    var r = confirm("Are you sure?");
    if (r == true) {
    	window.location.assign(base);
    }
}