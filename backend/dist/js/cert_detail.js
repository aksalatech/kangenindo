// Javascript
var cert = $("#hid_certif").val();

$(document).ready(function(e) {
	$("#step_p1 tr").hide();
	$("#step_p4 tr").hide();
	if (cert == CERT_HHAK)
		$(".hhak").show();
	else if (cert == CERT_IRT) 
		$(".irt").show();
	else if (cert == CERT_IUPHHK) 
		$(".iuphhk").show();
	else if (cert == CERT_TPT) 
		$(".tpt").show();
	else if (cert == CERT_TDI) 
		$(".tdi").show();

	$("#btsave").click(function(e) {
		var prop_id = $("#prop_id").val();
		var propNm = $("#propNm").val();
		var verifID = $("#verifID").val();
		var ket = $("#ket").val();
		var stats = $("#stats").val();

		if (ket == "") {
			$("#error").html("Harap mengisi keterangan terlebih dahulu.");
			$("#error").show();
			window.setTimeout(function() { $("#error").fadeOut("fast"); }, 3200);
		} else {
			$.ajax({
				url : base_url + "certif/save_notes",
				type : "POST",
				dataType : "html",
				data : "verifID=" + verifID + "&prop_id=" + prop_id + "&propNm=" + propNm + "&ket=" + ket + "&stats=" + stats,
				success : function(result) {
					console.log(result);
					alert("Keterangan berhasil disimpan.");
					$("#dialog-notes").modal("hide");
				},
				error : function(result) {
					console.log("AJAX Error on Saving Notes.");
				}
			});
		}
	});


	$(".btket").click(function(e) {
		var verifID = $("#verifID").val();
		var propNm = $(this).data("prop");
		var read = $(this).data("read");
		if (read == 1) {
			$("#ket").hide();
			$("#stats").hide();
			$("#spstats").show();
			$("#spket").show();
		} else {
			$("#ket").show();
			$("#stats").show();
			$("#spstats").hide();
			$("#spket").hide();
		}
		$("#propNm").val(propNm);
		$.ajax({
			url : base_url + "certif/get_notes",
			type : "POST",
			dataType : "html",
			data : "verifID=" + verifID + "&propNm=" + propNm,
			success : function(result) {
				console.log(result);
				var json = $.parseJSON(result);
				if (json != null) {
					$("#ket").val(json.ket);
					$("#stats").val(json.stats);
					$("#spket").html((json.ket == null || json.ket == "") ? "-" : json.ket);
					if (json.stats == 1)
						$("#spstats").html("Memenuhi");
					else if (json.stats == 0) 
						$("#spstats").html("Tidak Memenuhi");
					else
						$("#spstats").html("Tidak Diterapkan");
					$("#prop_id").val(json.prop_id);
				} else {
					$("#ket").val("");
					$("#stats").val("-1");
					$("#prop_id").val("");
					$("#spket").html("-");
					$("#spstats").html("- Belum Diinput -");
				}
				$("#dialog-notes").modal("show");
			},
			error : function(result) {
				console.log("AJAX Error on Saving Notes.");
			}
		});
	});	
});