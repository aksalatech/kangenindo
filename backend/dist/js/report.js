// Javascript Document
var module = "";
$(document).ready(function()
{
	
	$("#dialog-trans").on('hidden.bs.modal', function (e) {
	    $("#txtsd").val("");
	    $("#txted").val("");
	    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
	});

	$("#dialog-date").on('hidden.bs.modal', function (e) {
	    $("#txtsd_dt").val("");
	    $("#txted_dt").val("");
	    $.fn.modal.Constructor.prototype.enforceFocus = function () { };
	});

	$("#dialog-trans").on('hidden.bs.modal', function (e) {
	    $("#txtsd").val("");
	    $("#txted").val("");

		$('select').prop('selectedIndex', 0);
	});

	$("#dialog-nodin").on('hidden.bs.modal', function (e) {
	    $("#nomor_sp").val("");
	    $("#nama_pejabat").val("");
	    $("#nip_pejabat").val("");
	    $("#jabatan_pejabat").val("");
	    $("#tgl_dinas").val("");

		$('select').prop('selectedIndex', 0);
	});

	$("#dialog-izin").on('hidden.bs.modal', function (e) {
	    $("#nomor_izin").val("");
	    $("#tgl_izin").val("");
	    $("#lembaga_pengguna").val("");
	    $("#produsen").val("");
	    $("#qty").val("");
	    $("#mode").val("");
	    $("#tgl_dinas2").val("");

		$('select').prop('selectedIndex', 0);
	});

	$("#dialog-simple").on('hidden.bs.modal', function (e) {
		$('select').prop('selectedIndex', 0);
	});

	$(".repo").click(function(e){
		module = $(this).data("mod");
	});

	$("#txtsd").datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
		format:"yyyy-mm-dd",
        numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            var dt2 = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            dt2.setDate(dt2.getDate() + 31);
            $("#txted").datepicker("option", "minDate", dt);
            $("#txted").datepicker("option", "maxDate", dt2);
        }
    });

    $("#txted").datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
    	format:"yyyy-mm-dd",
        numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtsd").datepicker("option", "maxDate", dt);
        }
    });

	$("#txtsd_dt").datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
		format:"yyyy-mm-dd",
        numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            var dt2 = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            dt2.setDate(dt2.getDate() + 31);
            $("#txted").datepicker("option", "minDate", dt);
            $("#txted").datepicker("option", "maxDate", dt2);
        }
    });

    $("#txted_dt").datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
    	format:"yyyy-mm-dd",
        numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtsd").datepicker("option", "maxDate", dt);
        }
    });

	$("#btprint").click(function(e){
		var lvlk = $("#cblvlk").val();
		var stats = $("#cbstatus").val();
		var sd = $("#txtsd").val();
		var ed = $("#txted").val();
		if (sd == "")
			alert("Please fill start date first.");
		else if (ed == "")
			alert("Please fill end date first.");
		else {
			$("#loading-print").show();
			$("#btprint").hide();
			$.ajax({
				url : base_url + "report/" + module,
				type : "POST",
				dataType : "html",
				data : "lvlk=" + lvlk + "&stats=" + stats + "&sd=" + sd + "&ed=" + ed,
				success : function(result) {
					console.log(result);
					var url = result;
					$("#loading-print").hide();
					$("#btprint").show();
					window.location = url;
				},
				error : function(result) {
					console.log("AJAX Error on Export Report");
				}
			});
		}
	});

	$("#btdate").click(function(e){
		var sd = $("#txtsd_dt").val();
		var ed = $("#txted_dt").val();
		if (sd == "")
			alert("Please fill start date first.");
		else if (ed == "")
			alert("Please fill end date first.");
		else {
			$("#loading-print").show();
			$("#btprint").hide();
			$.ajax({
				url : base_url + "report/" + module,
				type : "POST",
				dataType : "html",
				data : "&sd=" + sd + "&ed=" + ed,
				success : function(result) {
					console.log(result);
					var url = result;
					$("#loading-print").hide();
					$("#btprint").show();
					window.location = url;
				},
				error : function(result) {
					console.log("AJAX Error on Export Report");
				}
			});
		}
	});

	$("#btsimple").click(function(e){
		var lvlk = $("#cbpt").val();
		var pt = $("#cbpt option:selected").text();
		$("#loading-simple").show();
		$("#btsimple").hide();
		$.ajax({
			url : base_url + "report/" + module,
			type : "POST",
			dataType : "html",
			data : "lvlk=" + lvlk + "&pt=" + pt,
			success : function(result) {
				console.log(result);
				var url = result;
				$("#loading-simple").hide();
				$("#btsimple").show();
				window.location = url;
			},
			error : function(result) {
				console.log(result);
			}
		});
	});

	$("#btnodin").click(function(e){
		var nomor_sp = $("#nomor_sp").val();
		var nama_pejabat = $("#nama_pejabat").val();
		var nip_pejabat = $("#nip_pejabat").val();
		var jabatan_pejabat = $("#jabatan_pejabat").val();
		var tgl_dinas = $("#tgl_dinas").val();

		if (nomor_sp == "")
			alert("Nomor SP harus diisi terlebih dahulu!");
		else if (nama_pejabat == "")
			alert("Nama Pejabat harus diisi terlebih dahulu!");
		else if (nip_pejabat == "")
			alert("NIP Pejabat harus diisi terlebih dahulu!");
		else if (jabatan_pejabat == "")
			alert("Jabatan Pejabat harus diisi terlebih dahulu!");
		else if (tgl_dinas == "")
			alert("Tanggal Dinas harus diisi terlebih dahulu!");
		else 
		{
			$("#loading-nodin").show();
			$("#btnodin").hide();
			$.ajax({
				url : base_url + "report/" + module,
				type : "POST",
				dataType : "html",
				data : "nomor_sp=" + nomor_sp + "&nama_pejabat=" + nama_pejabat + "&nip_pejabat=" + nip_pejabat + "&jabatan_pejabat=" + jabatan_pejabat + "&tgl_dinas=" + tgl_dinas,
				success : function(result) {
					console.log(result);
					var url = result;
					$("#loading-nodin").hide();
					$("#btnodin").show();
					window.location = url;
				},
				error : function(result) {
					console.log("AJAX Error on Export Report");
				}
			});
		}
	});

	$("#btizin").click(function(e){
		var nomor_izin = $("#nomor_izin").val();
		var tgl_izin = $("#tgl_izin").val();
		var lembaga_pengguna = $("#lembaga_pengguna").val();
		var produsen = $("#produsen").val();
		var qty = $("#qty").val();
		var mode = $("#mode").val();
		var tgl_dinas = $("#tgl_dinas2").val();

		if (nomor_izin == "")
			alert("Nomor Izin harus diisi terlebih dahulu!");
		else if (tgl_izin == "")
			alert("Tgl Izin harus diisi terlebih dahulu!");
		else if (lembaga_pengguna == "")
			alert("Lembaga Pengguna harus diisi terlebih dahulu!");
		else if (produsen == "")
			alert("Produsen harus diisi terlebih dahulu!");
		else if (qty == "")
			alert("Qty harus diisi terlebih dahulu!");
		else if (mode == "")
			alert("Mode harus diisi terlebih dahulu!");
		else if (tgl_dinas == "")
			alert("Tanggal Dinas harus diisi terlebih dahulu!");
		else 
		{
			$("#loading-izin").show();
			$("#btizin").hide();
			$.ajax({
				url : base_url + "report/" + module,
				type : "POST",
				dataType : "html",
				data : "nomor_izin=" + nomor_izin + "&tgl_izin=" + tgl_izin + "&lembaga_pengguna=" + lembaga_pengguna + "&produsen=" + produsen + "&qty=" + qty + "&mode=" + mode + "&tgl_dinas=" + tgl_dinas,
				success : function(result) {
					console.log(result);
					var url = result;
					$("#loading-izin").hide();
					$("#btizin").show();
					window.location = url;
				},
				error : function(result) {
					console.log("AJAX Error on Export Report");
				}
			});
		}
	});
});
