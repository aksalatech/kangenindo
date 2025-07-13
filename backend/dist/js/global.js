// Javascript Document
var CERT_HHAK = "HHAK";
var CERT_IRT = "IRT";
var CERT_IUPHHK = "IUIPH";
var CERT_TPT = "TPT";
var CERT_TDI = "TDI";

String.prototype.paddingLeft = function (paddingValue) {
   return String(paddingValue + this).slice(-paddingValue.length);
};

function monthName(x)
{
    var mon = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober", "November", "Desember"];
    return mon[x];
}

function formatNumber(biaya) {
	var n = parseFloat(biaya);
	var value = n.toLocaleString(
	  undefined, // use a string like 'en-US' to override browser locale
	  { minimumFractionDigits: 2 }
	);
	return value;
}

function formatDate(x)
{
    var dt = new Date(x);
    var hours = dt.getHours();
    var minutes = dt.getMinutes();
    var dates = dt.getDate();
    return dates.toString().paddingLeft("00") + " " + monthName(dt.getMonth()) + " " + dt.getFullYear() + " " + hours.toString().paddingLeft("00") + ":" + minutes.toString().paddingLeft("00");
}

function formatDateSimple(x)
{
    var dt = new Date(x);
    var dates = dt.getDate();
    return dates.toString().paddingLeft("00") + " " + monthName(dt.getMonth()) + " " + dt.getFullYear();
}

function validateNum() {
	$(".num").keydown(function(e){
		if ((e.keyCode < 48 || e.keyCode > 57 ) && e.keyCode != 190 &&
			 e.keyCode != 8 && e.keyCode != 46 &&
			 e.keyCode != 37 && e.keyCode != 38 && 
			 e.keyCode != 39 && e.keyCode != 40 && (e.keyCode < 96 || e.keyCode > 105)) 
		 {
    	 	return false;
    	 }
	});
}

function validateFilesize(flag)
{
	flag = (typeof flag == "undefined") ? false : flag;
	var input, file;
    if (!window.FileReader) {
        alert("The file API isn't supported on this browser yet.");
        return false;
    }

    input = document.getElementById('fnFile');
    if (!input) {
        alert("Um, couldn't find the fileinput element.");
        return false;
    }
    else if (!input.files) {
        alert("This browser doesn't seem to support the `files` property of file inputs.");
        return false;
    }
    else if (!input.files[0] && flag) {
        alert("There is no document file uploaded.");
        return false;
    }
    else if (input.files[0].size > 3 * 1024 * 1024 && flag) {
        alert("Document's file size exceeds 3 MB in size");
        return false;
    }
    return true;
}

$(document).ready(function(e){
	$("body").on("keydown", ".num", function(e){
		if ((e.keyCode < 48 || e.keyCode > 57 ) && e.keyCode != 190 &&
			 e.keyCode != 8 && e.keyCode != 46 &&
			 e.keyCode != 37 && e.keyCode != 38 && 
			 e.keyCode != 39 && e.keyCode != 40 && (e.keyCode < 96 || e.keyCode > 105)) 
		 {
    	 	return false;
    	 }
	});

	$(".chosen").chosen();

	$(".date").datepicker({
		dateFormat:"yy-mm-dd",
		changeMonth: true,
		changeYear: true
	});

	$("#mn-settings").click(function(e) {
		$.ajax({
			url : base_url + "home/get_settings",
			type : "GET",
			dataType : "html",
			success : function(result) {
				console.log(result);
				var json = $.parseJSON(result);
				$("#no_hp").val(json.no_hp);
				$("#id_telegram").val(json.id_telegram);
				$("#last_perso").val(json.last_perso);
				$("#nip_kepala").val(json.nip_kepala);
				$("#nama_kepala").val(json.nama_kepala);
				$("#jabatan_kepala").val(json.jabatan_kepala);
				$("#setting-dialog").modal("show");
			},
			error : function (result) {
				console.log("AJAX Error when sending data No. HP Whatsapp");
			}
		});
	});

	$("#btsave_setting").click(function(e) {
		var no_hp = $("#no_hp").val();
		var id_telegram = $("#id_telegram").val();
		var last_perso = $("#last_perso").val();
		var nip_kepala = $("#nip_kepala").val();
		var nama_kepala = $("#nama_kepala").val();
		var jabatan_kepala = $("#jabatan_kepala").val();
		if (no_hp == "") {
			$("#error_dialog").html("No. Whatsapp harus diisikan terlebih dahulu!");
		} else if (id_telegram == "") {
			$("#error_dialog").html("URL Telegram harus diisikan terlebih dahulu!");
		} else if (last_perso == "") {
			$("#error_dialog").html("No. Perso terakhir harus diisikan terlebih dahulu!");
		} else if (nip_kepala == "") {
			$("#error_dialog").html("NIP Direktur harus diisikan terlebih dahulu!");
		} else if (nama_kepala == "") {
			$("#error_dialog").html("Nama Direktur harus diisikan terlebih dahulu!");
		} else if (jabatan_kepala == "") {
			$("#error_dialog").html("Jabatan Tertera harus diisikan terlebih dahulu!");
		} else {
			$.ajax({
				url : base_url + "home/save_settings",
				type : "POST",
				data : "no_hp=" + no_hp + "&id_telegram=" + id_telegram + "&last_perso=" + last_perso + "&nip_kepala=" + nip_kepala + "&nama_kepala=" + nama_kepala + "&jabatan_kepala=" + jabatan_kepala,
				dataType : "html",
				success : function(result) {
					alert("Settings has been saved successfully.");
					console.log(result);
					$("#setting-dialog").modal("hide");
				},
				error : function (result) {
					console.log("AJAX Error when sending data No. HP Whatsapp");
				}
			});
		}
	});
});