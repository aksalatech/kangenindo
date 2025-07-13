// Javascript
var cert = $("#hid_certif").val();
var type = "";


function setOption(typeID) {
  	$("#businessID option").hide();
		$("#businessID ."+typeID).show();
		$('#businessID option').each(function () {
	    if ($(this).css('display') != 'none') {
	        $(this).prop("selected", true);
	        return false;
	    }
	});
}

function get_machine_type()
{
	var businessID = $("#businessID").val();
	var selected = $("#selected").val();
	$.ajax({
		url : base_url + "Request/get_machine_type?businessID=" + businessID,
		type : "GET",
		dataType : "html",
		success : function(result) {
			console.log(result);
			var json = $.parseJSON(result);
			var html = "";
			for(var i=0;i<json.length;i++) {
				html += "<option value='" + json[i].machineID + "' "+ ((selected == json[i].machineID) ? "selected" : "")+">" + json[i].machineNm + "</option>";
			}
			$("#machineID").html(html);
		},
		error : function(result) {
			console.log("AJAX Error on getting machine type : " + result);
		}
	})
}

function get_produsen_type()
{
	var machineID = $("#machineID").val();
	var selected = $("#selected").val();
	$.ajax({
		url : base_url + "Request/get_produsen_type?machineID=" + machineID,
		type : "GET",
		dataType : "html",
		success : function(result) {
			console.log(result);
			var json = $.parseJSON(result);
			var html = "";
			for(var i=0;i<json.length;i++) {
				html += "<option value='" + json[i].businessID + "' "+ ((selected == json[i].businessID) ? "selected" : "")+">" + json[i].businessNm + "</option>";
			}
			$("#businessID").html(html);
		},
		error : function(result) {
			console.log("AJAX Error on getting machine type : " + result);
		}
	})
}

$(document).ready(function(e) {

	// setOption($("#typeID").val());
	// transform($("#typeID").val());

	// $("#typeID").change(function(e) {
	// 	var typeID = $(this).val();
	// 	setOption(typeID);
	// 	transform(typeID);
	// });
	get_produsen_type();
	// $("#businessID").change(function(e) {
	// 	get_machine_type();
	// });

	$("#machineID").change(function(e) {
		get_produsen_type();
	});

	$("#spanEdit").click(function(e)
	{
		$("#fnFile").fadeIn("slow");
		$("#spFile").fadeIn("slow");
		$("#btDownload").fadeOut("fast");
		$(this).hide();
		$("#spanCancel").show();
	});

	$("#spanCancel").click(function(e)
	{
		$("#fnFile").fadeOut("fast");
		$("#spFile").fadeOut("fast");
		$("#btDownload").fadeIn("slow");
		$(this).hide();
		$("#spanEdit").show();
	});
});