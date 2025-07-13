// Javascript Document
// Global Variable
var admin=parseInt($("#hid_login").val());
var blobURL;
var tempID, tempFile, tempImg, tempImageID;
var flagAdd = false, flagDetail = false;
function show_error(x)
{
	$(".errorContent").fadeIn("slow");
	$(".errorMsg").html(x);
	window.setTimeout(function(){ $(".errorContent").fadeOut("slow"); },3500);
}

function show_success(x)
{
	$(".errorContent").hide();
	$(".successContent").fadeIn("slow");
	$(".success").html(x);
	window.setTimeout(function(){ $(".successContent").fadeOut("slow"); },3500);
}

function clearAll()
{
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
}

// Function for stripping tags
function is_array(obj) {
	if (obj.constructor.toString().indexOf('Array') == -1) {
		return false;
	}
	return true;
}

function strip_tags(input) {
	if (input) {
		var tags = /(<([^>]+)>)/ig;
		if (!is_array(input)) {
			input = input.replace(tags,'');
		}
		else {
			var i = input.length;
			var newInput = new Array();
			while(i--) {
				input[i] = input[i].replace(tags,'');
			}
		}
		return input;
	}
	return false;
}

function nl2br(varTest){
    return varTest.replace(/(\r\n|\n\r|\r|\n)/g, "<br>");
};

function br2nl(varTest){
    return varTest.replace(/<br>/g, "\r");
};

function getShortMonth(idx) {
	var month = new Array("Jan", "Feb", "Mar", "Apr", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	return month[idx];
}

function pad(n) {
    return (parseInt(n) < 10) ? ("0" + n) : n;
}

function formatDate(str, withHour) {
	withHour = typeof withHour == 'undefined' ? 0 : withHour;
	var date = new Date(str);
	var hour = (withHour == 1) ? (" " + pad(date.getHours()) + ":" + pad(date.getMinutes())) : "";
	return date.getDate() + " " + getShortMonth(date.getMonth()-1) + " " + date.getFullYear() + hour;
}

//Collapse All
function collapse_all()
{	
	//$(".welcome-planc").hide();
    $("#div-change-logo").css("left:","-280px");
	$("#div-change-logo").hide();
    $("#div-change-pass").css("left:","-280px");
	$("#div-change-pass").hide();
	$("#manage-home-box").css("left:","-280px");
	$("#manage-home-box").hide();
	$("#manage-how-box").css("left:","-280px");
	$("#manage-how-box").hide();
	$("#manage-testimoni-box").css("left:","-280px");
	$("#manage-testimoni-box").hide();
	$("#manage-events-detail-box").css("left:","-280px");
	$("#manage-events-detail-box").hide();
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function thousandFormat(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


// Other Function

var uploadFileWhyPict = function(file)
{
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_why_pict", true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  $("#imgwhypict").attr("src", base_url + "image/mockup/" + xhr.responseText);
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

var uploadFileTestimoniEdit = function(file,data_id)
{
	var id=data_id;
	
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_testimoni_image?id="+id, true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  retrieve_testimoni();
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

var uploadFileHowEdit = function(file,data_id)
{
	var id=data_id;
	
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_how_image?id="+id, true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  retrieve_how();
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}


var uploadFilePictureEdit = function(file,data_id)
{
	var id=data_id;
	
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_slider_image?id="+id, true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  retrieve_home();
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

var uploadFileImageEdit = function(file,data_id)
{
	var id=data_id;
	
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_news_image?id="+id, true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  retrieve_news();
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

var uploadFilePhotoEdit = function(file,data_id)
{
	var id=data_id;
	
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_team_photo?id="+id, true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  retrieve_team();
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

var uploadFilePortEdit = function(file,data_id)
{
	var id=data_id;
	tempID = id;
	tempFile = file;
	flagDetail = false;
	var URL = window.URL || window.webkitURL;

	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
			document.getElementById("imgCrop").src = reader.result;
			blobURL = URL.createObjectURL(file);
          	$("#cropping").modal("show");
			//alert(e.target.result);
			//$('#right_pic').attr('src',e.target.result);
		}
		reader.readAsDataURL(file);
	}	
}

var uploadFileDetPortEdit = function(file,data_id)
{
	var id=data_id;
	tempID = id;
	tempFile = file;
	flagDetail = true;
	var URL = window.URL || window.webkitURL;

	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
			document.getElementById("imgCrop").src = reader.result;
			blobURL = URL.createObjectURL(file);
          	$("#cropping").modal("show");
			//alert(e.target.result);
			//$('#right_pic').attr('src',e.target.result);
		}
		reader.readAsDataURL(file);
	}	
}

var uploadCV = function(file)
{
	// check if browser supports file reader object 
	if (typeof FileReader !== "undefined"){
	//alert("uploading "+file.name);  
	reader = new FileReader();
	reader.onload = function(e){
		//alert(e.target.result);
		//$('#right_pic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
	
	xhr = new XMLHttpRequest();
	xhr.open("post", base_url+"home/update_cv", true);
	
	xhr.upload.addEventListener("progress", function (event) {
		console.log(event);
		if (event.lengthComputable) {

		
		}
		else {
			alert("Failed to compute file upload length");
		}
	}, false);
	
	xhr.onreadystatechange = function (oEvent) 
	{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  
			  alert("Changes saved successfully.");
			  $("#btDownload").attr("href", base_url + "image/cv/cv.pdf");
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", file.fileName);
		xhr.setRequestHeader("X-File-Size", file.fileSize);
		xhr.setRequestHeader("X-File-Type", file.type);
		
		// Send the file (doh)
		xhr.send(file);
	
	}else{
		alert("Your browser doesn't support FileReader object");
	} 		
}

// Ajax Retrieve

function retrieve_booking()
{
	$.ajax({
		url:base_url+"home/retrieve_booking",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt' style='min-height:68px'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_booking + "'>";
                html+="<i data-id='" + json[i].ID_booking + "' class='btsend-mail icon icon-envelope' title='Send Email'></i><br/>";
                html+="</span>";
                if (json[i].status != "R") {
                    html+="<span class='btreject-booking spclose back-white' data-value='R' data-id='" + json[i].ID_booking + "'>X</span>";
                }
                if (json[i].status != "A") {
                    html+="<span class='btaccept-booking spclose back-white' data-value='A' data-id='" + json[i].ID_booking + "'>&#10003;</span>";
                }
                html+="<span class='events_box' data-id='" + json[i].ID_booking + "' data-title='" + json[i].places + "'>";                               
                html+="<strong>" + json[i].places + "</strong>";
                html+="<br/>";
                html+="By <em>" + json[i].contact_name + "</em> - (" + json[i].contact_phone + ")";
                html+="<br/>";
                html+="<font style='font-size:9pt'>" + formatDate(json[i].book_date, 1) + "</font><br/>";
                html+="<font style='font-size:9pt'>" + json[i].notes + "</font><br/>";
                html+="<b>(<font class='small-font'>";
                if (json[i].status == "P") {
                	html+="Pending";
                } else if (json[i].status == "A") {
                	html+="Accepted";
                } else if (json[i].status == "R") {
                	html+="Rejected";
                }
                html+="</font>)</b></span></div></div></div>";
			}
			
			$("#booking-scroll").html(html);

	        // Button Event
			$(".btsend-mail").click(function(e){
				var id = $(this).attr("data-id");

				$("#booking-scroll").hide();
				$("#edit_booking").fadeIn("fast");
			});

			$(".btreject-booking, .btaccept-booking").click(function(e)
			{
				var id = $(this).attr("data-id");
				var status = $(this).attr("data-value");

				var conf = confirm("Are you sure about your decision ?");
				if (conf == true) {
					$.ajax({
						url :base_url + "home/update_book_status",
						dataType : "html",
						type : "POST",
						data : "id=" + id + "&status=" + status,
						success : function(result) {
							alert("Booking status has been saved successfully.");
							retrieve_booking();
						}, error : function(result) {
							alert("AJAX Error when change status.");
						}
					});
				}
			});
		}
	});
}

function retrieve_detail_portfolio(id)
{
	$.ajax({
		url:base_url+"home/retrieve_full_detail_image?imageid=" + id,
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img no-border'>";
                html+="<div class='img-thumbnail wid' style='margin-bottom:-8px'>";
                html+="<div style=\"background-image:url('" + base_url + "image/portfolio/thumb/" + json[i].imagePath + "')\" class='div-img'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].detailID + "'>";
                html+="<i data-visible='" + json[i].visible + "' data-title='" + json[i].imageTitle + "' data-image='" + json[i].imageID + "' data-desc='" + json[i].imageDesc + "'  data-id='" + json[i].detailID + "' class='btedit-detail-portfolio icon fa fa-pencil' title='Edit Portfolio'></i>";
                html+="<br/>";
                html+="<i data-id='" + json[i].detailID + "' class='btchangepic-detport icon fa fa-picture-o' title='Edit Image'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].detailID + "' data-value='" + json[i].imageIndex + "' class='btdetail-portfolio-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].detailID + "' data-value='" + json[i].imageIndex + "' class='btdetail-portfolio-down icon mini' />";
                html+="<input type='file' class='fnchdetport dnone' data-id='" + json[i].detailID + "' accept='image/*' />";
                html+="</span>";
                html+="<span class='btdelete-detail-portfolio spclose back-white' data-value='" + json[i].imagePath + "' data-id='" + json[i].detailID + "'>X</span>";
                html+="</div></div>";
                html+="<span class='splabel' data-id='" + json[i].detailID + "' style='margin-top:-30px'>" + json[i].imageTitle + "</span>";
            	html+="</div>";
			}
			
			$("#detail-portfolio-scroll").html(html);
			if (tempImg == id) retrieve_detail_img(id);
     
	        // Button Event
	        $(".btdetail-portfolio-up").click(function(e) 
			{
		        var detailID=$(this).attr("data-id");
				var index=$(this).attr("data-value");

				$.ajax({
					url:base_url+"home/move_det_img_up?detailid="+detailID+"&imageid="+id+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_detail_portfolio(id);
					}
				});
		    });
			
			$(".btdetail-portfolio-down").click(function(e) 
			{
		        var detailID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_det_img_down?detailid="+detailID+"&imageid="+id+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_detail_portfolio(id);
					}
				});
		    });

			$(".btedit-detail-portfolio").click(function(e) {
				flagAdd = false;
				var id=$(this).attr("data-id");
				var title=$(this).attr("data-title");
				var desc = $(this).attr("data-desc");
				var visible = $(this).attr("data-visible");
				var image = $(this).attr("data-image");

				$("#btadd_detail_portfolio").hide();
				$("#detail-portfolio-scroll").hide();
				$("#edit_detail_portfolio").fadeIn("fast");
				
				//set data to component
				$("#hid_id_detail_portfolio").val(id);
				$("#txteddetimgtitle").val(title);
				$("#hid_id_image_port").val(image);
				$("#txteddetimgdesc").val(desc);
				$("#hid_id_image_port").val(image);
				$("#chkeddetImgVisible").prop("checked", (visible == "1"));
		    });

			$(".btdelete-detail-portfolio ").click(function(e) {
				var ID_detail = $(this).attr("data-id");
				var filename = $(this).attr("data-value");
				var conf=confirm("Are you sure want to delete this detail portfolio ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_detail_portfolio?id="+ID_detail+"&filename=" + filename,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Detail portfolio removed successfully.");
								retrieve_detail_portfolio(id);
							}
						}
					});
				}
			});

			$(".btchangepic-detport").click(function(e)
			{
				flagAdd = false;
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchdetport[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchdetport").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFileDetPortEdit(file,id);
				}
			});
		}
	});
}

function retrieve_portfolio()
{
	$.ajax({
		url:base_url+"home/retrieve_portfolio",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img no-border'>";
                html+="<div class='img-thumbnail wid' style='margin-bottom:-8px'>";
                html+="<div style=\"background-image:url('" + base_url + "image/portfolio/thumb/"+ json[i].imagePath + "')\" class='div-img'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].imageID + "'>";
                html+="<i data-visible='" + json[i].visible + "' data-title='" + json[i].imageTitle + "' data-category='" + json[i].ID_category + "' data-desc='" + json[i].imageDesc + "'  data-id='" + json[i].imageID + "' class='btedit-portfolio icon fa fa-pencil' title='Edit Portfolio'></i>";
                html+="<br/>";
                html+="<i data-id='" + json[i].imageID + "' class='btchangepic-portfolio icon fa fa-picture-o' title='Edit Image'></i><br/>";
                html+="<i data-id='" + json[i].imageID + "' class='btndetail-portfolio icon fa fa-file-text' title='View Detail'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].imageID + "' data-value='" + json[i].imageIndex + "' class='btportfolio-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].imageID + "' data-value='" + json[i].imageIndex + "' class='btportfolio-down icon mini' />";
                html+="<input type='file' class='fnchport dnone' data-id='" + json[i].imageID + "' accept='image/*' />";
                html+="</span>";
                html+="<span class='btdelete-portfolio spclose back-white' data-value='" + json[i].imagePath + "' data-id='" + json[i].imageID + "'>X</span>";
                html+="</div></div>";
                html+="<span class='splabel' data-id='" + json[i].imageID + "' style='margin-top:-30px'>" + json[i].imageTitle + "</span>";
            	html+="</div>";

            	if (json[i].visible == 1) {
            		html2+="<div class='col-lg-12 col-md-12 item-folder item " + json[i].ID_category + "' data-count='" + json[i].jml_detail + "' data-id='" + json[i].imageID + "'>" + 
                            	"<div class='item-content'>" + 
                                	"<img style='height:560px' src='" + base_url + "image/portfolio/thumb/" + json[i].imagePath + "' alt=''>" + 
		                                "<div class='item-overlay'>" + 
		                                    "<h6>" + json[i].imageTitle + "</h6>" + 
		                                    "<div class='icons'>" + 
		                                        "<span class='icon link'>";
		                                            if (json[i].jml_detail <= 1) { 
		                                            	html2 += "<a href='" + base_url + "image/portfolio/large/" + json[i].imagePath + "'>"; 
		                                            }
		                                            html2 += "<i class='fa fa-search'></i>";
		                                            if (json[i].jml_detail <= 1) {
		                                             	html2 += "</a>"; 
		                                             }
		                                        html2 += "</span>" + 
		                                    "</div>" + 
		                                "</div>" + 
		                            "</div>" + 
		                        "</div>";

            		// html2+="<div class='portfolio-item item-folder " + json[i].ID_category + "' data-count='" + json[i].jml_detail + "' data-id='" + json[i].imageID + "'>" + 
              //       			"<div class='portfolio-box'>" + 
              //      					"<a class='porfolio-popup " + ((json[i].jml_detail <= 1) ? "gallery-popup-link" : "") + "' href='" + ((json[i].jml_detail <= 1) ? base_url + "image/portfolio/large/" + json[i].imagePath : "#portfolio-header") + "' title='" + json[i].imageTitle + "'>" +
              //      						"<div class='portfolio-image-wrap'>" + 
              //      							"<img src='" + base_url + "image/portfolio/thumb/" + json[i].imagePath + "' alt='' />" + 
              //      						"</div>" + 
              //     						"<div class='portfolio-caption-mask'>" + 
              //       						"<div class='portfolio-caption-text'>" + 
              //       							"<div class='portfolio-caption-tb-cell'>" + 
              //       								"<h5 class='alt-title'>" + json[i].imageTitle + "</h5>" + 
              //      									"<p>" + json[i].imageDesc + "</p>" + 
              //       		"</div></div></div></a></div></div>";

	               //  html2+="<div class='portfolio-item item-folder " + json[i].ID_category + "' data-count='" + json[i].jml_detail + "' data-id='" + json[i].imageID + "'>";
	               //  html2+="<div class='portfolio-box'>";
	               //  html2+="<a class='porfolio-popup " + ((json[i].jml_detail <= 1) ? "gallery-popup-link" : "") +"' href='" + ((json[i].jml_detail <= 1) ? base_url + "image/portfolio/large/" + json[i].imagePath : "#portfolio-header") + "' title='" + json[i].imageTitle + "'>";
	               //  html2+="<div class='portfolio-image-wrap'>";
	               //  html2+="<img src='" + base_url + "image/portfolio/thumb/" + json[i].imagePath + "' alt='' />";
	               //  html2+="</div>";
	               //  html2+="<div class='portfolio-caption-mask'>";
	               //  html2+="<div class='portfolio-caption-text'>";
	               //  html2+="<div class='portfolio-caption-tb-cell'>";
	               //  html2+="<h5 class='alt-title'>" + json[i].imageTitle + "</h5>";
	              	// html2+="<p>" + json[i].imageDesc + "</p>";
	               //  html2+="</div></div></div></a></div></div>";
                }
			}
			
			$("#portfolio-detail").hide();
			$(".portfolio-filter").show();
			$("#portfolio-header").show();

			$("#portfolio-scroll").html(html);
			$("#portfolio-header").html(html2);



			// Reinit Isotop
	        $('#portfolio-header').isotope('reloadItems');
	        window.setTimeout(function() {
	        	$("li.sel-item").click();
	    	}, 320);
	        
	        // Button Event
	        $(".btndetail-portfolio").click(function(e){
	        	var id = $(this).attr("data-id");
	        	tempImageID = id;
				collapse_all();
				retrieve_detail_portfolio(id);
				$("#manage-detail-portfolio-box").show();
		        $("#manage-detail-portfolio-box").animate({left:'0'},140);
			});

			$(".item-folder").click(function(e)
			{
				var id = $(this).data("id");
				var count = parseInt($(this).attr("data-count"));

				if (count > 0) {
					retrieve_detail_img(id);
					$("#portfolio-header").hide();
					$(".portfolio-filter").hide();
					$("#portfolio-detail").show();
				}
			});

			$(".btportfolio-up").click(function(e) 
			{
		        var imageID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_img_up?imageid="+imageID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_portfolio();
					}
				});
		    });
			
			$(".btportfolio-down").click(function(e) 
			{
		        var imageID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_img_down?imageid="+imageID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_portfolio();
					}
				});
		    });

			$(".btedit-portfolio").click(function(e) {
				flagAdd = false;
				var id=$(this).attr("data-id");
				var title=$(this).attr("data-title");
				var category=$(this).attr("data-category");
				var desc = $(this).attr("data-desc");
				var visible = $(this).attr("data-visible");

				$("#btadd_portfolio").hide();
				$("#portfolio-scroll").hide();
				$("#edit_portfolio").fadeIn("fast");
				
				//set data to component
				$("#hid_id_portfolio").val(id);
				$("#txtedimgtitle").val(title);
				$("#cbedImgCategory").val(category);
				$("#txtedimgdesc").val(desc);
				$("#chkedImgVisible").prop("checked", (visible == "1"));
		    });

			$(".btdelete-portfolio").click(function(e) {
				var ID_portfolio = $(this).attr("data-id");
				var filename = $(this).attr("data-value");
				var conf=confirm("Are you sure want to delete this portfolio ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_portfolio?id="+ID_portfolio+"&filename=" + filename,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Portfolio removed successfully.");
								retrieve_portfolio();
							}
						}
					});
				}
			});

			$(".btchangepic-portfolio").click(function(e)
			{
				flagAdd = false;
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchport[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchport").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;

					uploadFilePortEdit(file,id);
				}
			});
		}
	});
}

function retrieve_team()
{
	$.ajax({
		url:base_url+"home/retrieve_team",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img no-border'>";
                html+="<div class='img-thumbnail wid' style='margin-bottom:-8px'>";
                html+="<div style=\"background-image:url('" + base_url + "image/team/" + json[i].photo_path + "')\" class='div-img'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_team + "'>";
                html+="<i data-name='" + json[i].name + "' data-position='" + json[i].position_name + "' data-fb='" + json[i].facebook_link + "' data-twitter='" + json[i].twitter_link + "' data-linkedin='" + json[i].linkedin_link + "' data-id='" + json[i].ID_team + "' class='btedit-team icon fa fa-pencil' title='Edit Member'></i>";
                html+="<br/>";
                html+="<i data-id='" + json[i].ID_team + "' class='btchangepic-team icon fa fa-picture-o' title='Edit Photo'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_team + "' data-value='" + json[i].seq_no + "' class='btteam-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_team + "' data-value='" + json[i].seq_no + "' class='btteam-down icon mini' />";
                html+="<input type='file' class='fnchphoto dnone' data-id='" + json[i].ID_team + "' accept='image/*' />";
                html+="</span>";
                html+="<span class='btdelete-team spclose back-white' data-value='" + json[i].photo_path + "' data-id='" + json[i].ID_team + "'>X</span>";
                html+="</div>";
                html+="</div>";
                html+="<span class='splabel' data-id='" + json[i].ID_team + "' style='margin-top:-30px'>" + json[i].name + "</span>";
            	html+="</div>";


                html2+="<div class='item wow fadeInUp'>";
                html2+="<div class='team-item'>";
                html2+="<div class='team-item-img'>";
                html2+="<img src='" + base_url + "image/team/" + json[i].photo_path + "' alt='' />";
                html2+="<div class='team-item-detail'>";
                html2+="<div class='team-item-detail-inner light-color'>";
                html2+="<ul class='social'>";
                if (json[i].facebook_link != "") {
                	html2+="<li><a href='" + json[i].facebook_link + "' target='_blank'><i class='fa fa-facebook'></i></a></li>";
                }
				if (json[i].twitter_link != "") {
					html2+="<li><a href='" + json[i].twitter_link + "' target='_blank'><i class='fa fa-twitter'></i></a></li>";
				}
                if (json[i].linkedin_link != "") {
                	html2+="<li><a href='" + json[i].linkedin_link + "' target='_blank'><i class='fa fa-linkedin'></i></a></li>";
                }
                html2+="</ul></div></div></div>";
                html2+="<div class='team-item-info'>";
                html2+="<h5 class='alt-title'>" + json[i].name + "</h5>";
                html2+="<p class=''>" + json[i].position_name + "</p>";
                html2+="</div></div></div>";
			}
			
			$("#team-scroll").html(html);
			$(".team-carousel").html(html2);

			// Reinit Carousel
	        $(".team-carousel").data('owlCarousel').reinit({
			    autoPlay: false,
	            stopOnHover: true,
	            items: 3,
	            itemsDesktop: [1170, 3],
	            itemsDesktopSmall: [1000, 2],
	            itemsTabletSmall: [768, 1],
	            itemsMobile: [480, 1],
	            pagination: false,  // Hide pagination buttons
	            navigation: false,  // Hide next and prev buttons
	            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
			});
			

	        // Button Event
			$(".btteam-up").click(function(e) 
			{
		        var teamID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_team_up?ID_team="+teamID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_team();
					}
				});
		    });
			
			$(".btteam-down").click(function(e) 
			{
		        var teamID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_team_down?ID_team="+teamID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_team();
					}
				});
		    });

			$(".btedit-team").click(function(e) {
				var id=$(this).attr("data-id");
				var name=$(this).attr("data-name");
				var position=$(this).attr("data-position");
				var fb_link = $(this).attr("data-fb");
				var twitter_link = $(this).attr("data-twitter");
				var linkedin_link = $(this).attr("data-linkedin");

				$("#btadd_team").hide();
				$("#team-scroll").hide();
				$("#edit_team").fadeIn("fast");
				
				//set data to component
				$("#hid_id_team").val(id);
				$("#txtedteam_name").val(name);
				$("#txtedposition").val(position);
				$("#txtedfb_link").val(fb_link);
				$("#txtedtwitter_link").val(twitter_link);
				$("#txtedlinkedin_link").val(linkedin_link);
		    });

			$(".btdelete-team").click(function(e) {
				var ID_team = $(this).attr("data-id");
				var filename = $(this).attr("data-value");
				var conf=confirm("Are you sure want to delete this member ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_team?id="+ID_team+"&filename=" + filename,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Team member removed successfully.");
								retrieve_team();
							}
						}
					});
				}
			});

			$(".btchangepic-team").click(function(e)
			{
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchphoto[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchphoto").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFilePhotoEdit(file,id);
				}
			});
		}
	});
}

function retrieve_news()
{
	$.ajax({
		url:base_url+"home/retrieve_news",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt' style='min-height:68px'>";                  
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_blog + "'>";
                html+="<i data-id='" + json[i].ID_blog + "' data-text='" + json[i].blog_text.replace("'", '"') + "' data-visible='" + json[i].visible + "' data-image='" + json[i].image + "' data-creator='" + json[i].creator + "' data-title='" + json[i].title + "' data-link='" + json[i].link + "' class='btedit-news icon fa fa-pencil' title='Edit News'></i><br/>";
                html+="<i data-id='" + json[i].ID_blog + "' class='btchangepic-news icon fa fa-picture-o' title='Edit Picture'></i><br/>";
                html+="<input type='file' class='fnchimg dnone' data-id='" + json[i].ID_blog + "' accept='image/*' />";
                html+="</span>";
                html+="<span class='btdelete-news spclose back-white' data-id='" + json[i].ID_blog +"' data-value='" + json[i].image + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_blog + "' data-title='" + json[i].title + "'>";                               
                html+="<strong>" + json[i].title + "</strong>";
                html+="<br/>";
                html+="By <em>" + json[i].creator + "</em>";
                html+="<br/>";
                html+="<b>(<font class='small-font'>" + (json[i].visible == "1" ? "Active" : "Not Active") + "</font>)</b><br/>";
                html+="<font style='font-size:9pt'>" + formatDate(json[i].created_date,1) + "</font>";
                html+="</span></div></div></div>";


                html2+="<div class='blog-item'>" + 
                            "<div class='blog-img'>" + 
                                "<a href='" + (json[i].link != "" ? json[i].link : base_url + "blog/detail/" + json[i].ID_blog) + "'>" + 
                                    "<img style='object-fit: cover;height:300px' src='" + base_url + "image/blog/" + json[i].image + "'  alt=''>" + 
                                "</a>" + 
                            "</div>" + 
                            "<div class='blog-content'>" + 
                                "<h3>" + json[i].title + "</h3>" + 
                                "<p>" + (strip_tags(json[i].blog_text).replace("&nbsp;", " ").substring(0, 160) + "...") + "</p>" + 
                                "<div class='blog-meta'>" + 
                                    "<span class='more'>" + 
                                        "<a href='" + ((json[i].link != "") ? json[i].link : base_url + "blog/detail/" + json[i].ID_blog) + "'>Read More</a>" + 
                                    "</span>" + 
                                    "<span class='date'>" + formatDate(json[i].created_date) + "</span>" + 
                                "</div>" + 
                            "</div>" + 
                        "</div>";

                // html2+="<a href='" + (json[i].link != "" ? json[i].link : base_url + "blog/detail/" + json[i].ID_blog) + "'>";
                // html2+="<div class='col-md-4 col-sm-6 mb-sm-30 post-box wow fadeIn' style='margin-bottom:35px' data-wow-duration='2s' data-wow-delay='0.1s'>";
                // html2+="<div class='blog-post'>";
                // html2+="<div class='post-media'>";
                // html2+="<img src='" + base_url + "image/blog/" + json[i].image + "' alt='blog' />";
                // html2+="</div>";
                // html2+="<div class='post-meta'>";
                // html2+="<span>by <a>" + json[i].creator + "</a>, </span>";
                // html2+="<span class='post-date'>" + formatDate(json[i].created_date) + "</span>";
                // html2+="</div>";
                // html2+="<div class='post-header'>";
                // html2+="<h4 class='alt-title'><a href='" + (json[i].link != "" ? json[i].link : base_url + "blog/detail/" + json[i].ID_blog) + "'>" + json[i].title + "</a></h4>";
                // html2+="</div></div></div>";
                // html2+="</a>";
			}
			
			$("#news-scroll").html(html);
			$("#blogList").html(html2);

			// Setting up in Owl Carousel
			// Reinit Carousel
	        $(".blogs .owl-carousel").owlCarousel('destroy'); 
			$(".blogs .owl-carousel").owlCarousel({
		        loop: true,
		        margin: 30,
		        autoplay: true,
		        smartSpeed: 500,
		        responsiveClass: true,
		        dots: false,
		        responsive: {
		            0: {
		                items: 1,
		            },
		            700: {
		                items: 2,
		            },
		            1000: {
		                items: 3,
		            },
		        },
		    });

	        // Button Event
			$(".btedit-news").click(function(e) {
				var id=$(this).attr("data-id");
				var title=$(this).attr("data-title");
				var link=$(this).attr("data-link");
				var creator=$(this).attr("data-creator");
				var visible=$(this).attr("data-visible");

				$("#btadd_news").hide();
				$("#news-scroll").hide();
				$("#edit_news").fadeIn("fast");
				
				//set data to component
				$("#hid_id_news").val(id);
				$("#txtedtitle").val(title);
				$("#txtedlink").val(link);
				$("#txtedcreator").val(creator);
				$("#chkedblogVisible").prop("checked", (visible == "1"));
		    });

			$(".btdelete-news").click(function(e) {
				var ID_blog=$(this).attr("data-id");
				var filename = $(this).attr("data-value");
				var conf=confirm("Are you sure want to delete this news ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_news?id="+ID_blog+"&filename=" + filename,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("News removed successfully.");
								retrieve_news();
							}
						}
					});
				}
			});

			$(".btchangepic-news").click(function(e)
			{
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchimg[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchimg").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFileImageEdit(file,id);
				}
			});
		}
	});
}

function retrieve_detail_img(id)
{
	tempImg = id;
	$.ajax({
		url:base_url+"home/retrieve_detail_image?imageid=" + id,
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";

			html += "<div class='col-lg-4 col-md-6 item-folder cursor' id='btnBackTo'>" + 
						"<div class='divBackBtn'>" + 
                            "<a class='porfolio-popup gallery-popup-link' id='btnBackDetail' title='Back to category'>" + 
                                "<div class='item-content'>" + 
                                    "<center class='backBtn'>Back</center>" +
                                "</div>" + 
                            "</a>" + 
                        "</div>" + 
                    "</div>";

			for (var i=0;i<json.length;i++)
			{
				html += "<div class='col-lg-4 col-md-6 item-folder item'>" + 
                            "<div class='item-content'>" + 
                                "<img style='height:228px' src='" + base_url + "image/portfolio/thumb/" + json[i].imagePath + "' alt=''>" +
                                "<div class='item-overlay'>" + 
                                    "<h6>" + json[i].imageTitle + "</h6>" + 
                                    "<div class='icons'>" + 
                                        "<span class='icon link'>" + 
                                            "<a href='" + base_url + "image/portfolio/large/" +  json[i].imagePath + "'>" + 
                                                "<i class='fa fa-search'></i>" + 
                                            "</a>" + 
                                        "</span>" + 
                                    "</div>" + 
                                "</div>" + 
                            "</div>" + 
                        "</div>";
			}
			html += "<div class='clear'></div>";

			$("#portfolio-detail").html(html);

			 /*========Magnific Popup Setup========*/
		     $('.portfolio .link').magnificPopup({
		        delegate: 'a',
		        type: 'image',
		        gallery: {
		            enabled: true
		        }
		    });
			
			// Back Button Clicked
			$("#btnBackTo").click(function(e)
			{
				$("#portfolio-detail").hide();
				$("#portfolio-header").show();
				$(".portfolio-filter").show();
			});
		}
	});
}

function retrieve_category()
{
	$.ajax({
		url:base_url+"home/retrieve_category",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			html2+="<li class='sel-item' data-filter='*''>All</li>";
			// html2+="<li><a data-filter='*' class='categories active'>All</a></li>";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img'>";
				html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt' style='min-height:68px'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_category + "'>";
                html+="<i data-id='" + json[i].ID_category + "' data-visible='" + json[i].is_active + "' data-code='" + json[i].category_code + "' data-name='" + json[i].category_name + "' class='btedit-category icon fa fa-pencil' title='Edit Category'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_category + "' data-value='" + json[i].seq_no + "' class='btcategory-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_category + "' data-value='" + json[i].seq_no + "' class='btcategory-down icon mini' />";
                html+="</span>";
                html+="<span class='btdelete-category spclose back-white' data-id='" + json[i].ID_category + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_category + "' data-title='" + json[i].category_name + "'>";                               
                html+="<strong>" + json[i].category_name + "</strong>";
                html+="<br/>";
                html+="(<em>" + json[i].category_code + "</em>)<br/>";
                html+="<b>(<font class='small-font'>" + (json[i].is_active == "1" ? "Active" : "Not Active") + "</font>)</b>";
                html+="</span></div></div></div>";

                if (json[i].is_active == "1") {
                	html2+="<li data-filter='." + json[i].ID_category + "'>" + json[i].category_name + "</li>";
	                // html2+="<li><a data-filter='." + json[i].ID_category + "' class='categories'>" + json[i].category_name + "</a></li>";
            	} 
			}
			
			$("#category-scroll").html(html);
			$("#ul-filter").html(html2);
			
			// Button Event
		    $(".btcategory-up").click(function(e) 
			{
		        var categoryID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_category_up?categoryid="+categoryID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_category();
					}
				});
		    });
			
			$(".btcategory-down").click(function(e) 
			{
		        var categoryID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_category_down?categoryid="+categoryID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_category();
					}
				});
		    });

		    $(".btedit-category").click(function(e) {
				var id=$(this).attr("data-id");
				var code=$(this).attr("data-code");
				var name=$(this).attr("data-name");
				var visible = $(this).attr("data-visible");
				
				$("#btadd_category").hide();
				$("#category-scroll").hide();
				$("#edit_category").fadeIn("fast");
				
				//set data to component
				$("#hid_id_category").val(id);
				$("#txtedcategory_code").val(code);
				$("#txtedcategory_name").val(name);
				$("#chkedVisible").prop("checked",visible == "1");
		    });

		    
		    $(".btdelete-category").click(function(e) {
		    	var id_category=$(this).attr("data-id");
				
				var conf=confirm("Are you sure want to delete this category?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/remove_category?id="+id_category,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							console.log(result);
							if (result=="")
							{
								alert("Category removed successfully.");
								retrieve_category();
							}
						}
					});
				}
		    }); 
		}
	});
}

function retrieve_detail(id)
{
	$.ajax({
		url:base_url+"home/retrieve_detail_plan?planid=" + id,
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img'>";
                html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt' style='min-height:50px'>";   
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_plan_detail +"'>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_plan_detail + "' data-value='" + json[i].seq_no + "' class='btdetail-plan-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_plan_detail + "' data-value='" + json[i].seq_no + "' class='btdetail-plan-down icon mini' />";
                html+="</span>";
                html+="<span class='btdelete-detail spclose back-white' data-id='" + json[i].ID_plan_detail + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_plan_detail + "' data-text='" + json[i].detail_text + "' >";
                html+=json[i].detail_text;
                html+="</span></div></div></div>";
			}
			
			$("#detail-plan-scroll").html(html);
			
			// Events Button
			$(".btdetail-plan-up").click(function(e) 
			{
		        var detailID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_detail_up?detailid="+detailID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_detail(id);
						retrieve_plan();
					}
				});
		    });
			
			$(".btdetail-plan-down").click(function(e) 
			{
		        var detailID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_detail_down?detailid="+detailID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_detail(id);
						retrieve_plan();
					}
				});
		    });

			$(".btdelete-detail").click(function(e) {
				var ID_detail=$(this).attr("data-id");
				var conf=confirm("Are you sure want to delete this detail item ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_detail_plan?id="+ID_detail,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Detail item removed successfully.");
								retrieve_detail(id);
								retrieve_plan();
							}
						}
					});
				}
			});
		}
	});
}

function retrieve_plan()
{
	$.ajax({
		url:base_url+"home/retrieve_plan",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt'>";   
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_plan + "'>";
                html+="<i data-id='" + json[i].ID_plan + "' data-name='" + json[i].plan_name + "' class='btedit-plan icon fa fa-pencil' data-currency='" + json[i].currency + "' data-price='" + json[i].price + "' data-pereach='" + json[i].per_each + "' title='Edit Pricing Plan'></i><br/>";
                html+="<i data-id='" + json[i].ID_plan + "' data-name='" + json[i].plan_name + "' class='btedit-detail icon icon-document' title='Edit Detail Plan'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_plan + "' data-value='" + json[i].seq_no + "' class='btplan-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_plan + "' data-value='" + json[i].seq_no + "' class='btplan-down icon mini' />";
                html+="</span>";
                html+="<span class='btdelete-plan spclose back-white' data-id='" + json[i].ID_plan + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_plan + "' data-name='" + json[i].plan_name + "'>";
                html+="<strong>" + json[i].plan_name + "</strong>";
                html+="<br/>";
                html+="(<em>" + json[i].currency + "</em>)";
                html+="<br/>";
                html+=thousandFormat(json[i].price)+" <span class='small-font'>/ " + json[i].per_each + "</span>";
                html+="</span></div></div></div>";

                
                html2+="<div class='col-md-4 mb-sm-30 wow fadeIn' data-wow-duration='2s' data-wow-delay='0.1s' style='margin-bottom:35px'>";
                html2+="<div class='pricing-box'>";
                html2+="<div class='pricing-title'>";
                html2+="<h5 class='alt-title'>" + json[i].plan_name + "</h5>";
                html2+="</div>";
                html2+="<div class='pricing-price'>";
                html2+="<p>";
                html2+="<span class='dollar'>" + json[i].currency + "</span>";
                html2+="<span class='pricing-price-lg'>"+ thousandFormat(json[i].price) + "</span>";
                html2+="<span class='pricing-price-sm'>" + "/ " +  json[i].per_each + "</span>";
                html2+="</p>";
                html2+="</div>";
                html2+="<div class='pricing-features'>";
                html2+="<ul>";
                if (json[i].detail != null) { 
                    for (var j = 0; j<json[i].detail.length; j++) {
                        html2+="<li>" + json[i].detail[j].detail_text + "</li>";
                    }
                }
                html2+="</ul></div></div></div>";
			}
			
			$("#plan-scroll").html(html);
			$("#div-pricing").html(html2);
			
			// Events Button
			$(".btedit-detail").click(function(e) {
				var id = $(this).attr("data-id");
				var name = $(this).attr("data-name");
				
				//collapse_all();
				retrieve_detail(id);
				$("#hid_id_detail").val(id);
				$("#planc").html($(this).attr("data-name"));
				$("#manage-detail-plan-box").show();
		        $("#manage-detail-plan-box").animate({left:'0'},140);
		    });


			$(".btplan-up").click(function(e) 
			{
		        var planID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_plan_up?planid="+planID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_plan();
					}
				});
		    });
			
			$(".btplan-down").click(function(e) 
			{
		        var planID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_plan_down?planid="+planID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_plan();
					}
				});
		    });

			$(".btedit-plan").click(function(e) {
				var id=$(this).attr("data-id");
				var plan_name=$(this).attr("data-name");
				var currency=$(this).attr("data-currency");
				var price=$(this).attr("data-price");
				var pereach=$(this).attr("data-pereach")
				
				$("#btadd_plan").hide();
				$("#plan-scroll").hide();
				$("#edit_plan").fadeIn("fast");
				
				//set data to component
				$("#hid_id_plan").val(id);
				$("#txtedplan_name").val(plan_name);
				$("#txtedcurrency").val(currency);
				$("#txtedplan_price").val(price);
				$("#txtedper_each").val(pereach);
		    });

			$(".btdelete-plan").click(function(e) {
				var ID_plan=$(this).attr("data-id");
				
				var conf=confirm("Are you sure want to delete this pricing plan ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/remove_plan?id="+ID_plan,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Pricing plan removed successfully.");
								retrieve_plan();
							}
						}
					});
				}
			});
		}
	});
}

function retrieve_why()
{
	$.ajax({
		url:base_url+"home/retrieve_why",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "", html3 ="";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'>";
                html+="<div class='div-evt'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_why + "'>";
                html+="<i data-id='" + json[i].ID_why + "' data-side='" + json[i].why_side + "' data-title='" + json[i].why_title + "' class='btedit-why icon fa fa-pencil' data-pict='" + json[i].why_pict + "' data-text='" + json[i].why_text + "' title='Edit Why'></i><br/>";
                html+="<br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_why + "' data-value='" + json[i].seq_no + "' class='btwhy-up icon mini'/><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_why + "' data-value='" + json[i].seq_no + "' class='btwhy-down icon mini' />";
                html+="</span>";
                html+="<span class='btdelete-why spclose back-white' data-id='" + json[i].ID_why + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_why + "' data-title='" + json[i].why_title + "'>";
                html+="<i style='font-size:30px' class='" + json[i].why_pict + "'></i>";
                html+="<br/>";
                html+="(<em>" + ((json[i].why_side == "L") ? "Left" : "Right") + "</em>)";
                html+="<br/>";
                html+="<strong>" + json[i].why_title + "</strong>";
                html+="<br/>";
                html+="<span class='small-font'>" + json[i].why_text + "</span>";
                html+="</span></div></div></div>";

                if (json[i].why_side == "L") {
	                html2+="<div class='content-box alt-right'>";
                    html2+="<div class='alt-icon-right'>";
                    html2+="<i class='" + json[i].why_pict + "'></i>";
                    html2+="</div>";
                    html2+="<h4 class='alt-title'>" + json[i].why_title + "</h4>";
                    html2+="<p>" + json[i].why_text + "</p>";
                    html2+="</div>";
            	} else {
            		html3+="<div class='content-box alt-left'>";
                    html3+="<div class='alt-icon-left'>";
                    html3+="<i class='" + json[i].why_pict + "'></i>";
                    html3+="</div>";
                    html3+="<h4 class='alt-title'>" + json[i].why_title + "</h4>";
                    html3+="<p>" + json[i].why_text + "</p>";
                    html3+="</div>";
            	}
			}
			
			$("#why-scroll").html(html);
			$("#left-bar").html(html2);
			$("#right-bar").html(html3);
			
			// Button Event
		    $(".btwhy-up").click(function(e) 
			{
		        var whyID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_why_up?whyid="+whyID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_why();
					}
				});
		    });
			
			$(".btwhy-down").click(function(e) 
			{
		        var whyID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_why_down?whyid="+whyID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_why();
					}
				});
		    });

		    $(".btedit-why").click(function(e) {
				var id=$(this).attr("data-id");
				var pict=$(this).attr("data-pict");
				var title=$(this).attr("data-title");
				var side=$(this).attr("data-side");
				var text=$(this).attr("data-text");
				
				$("#btadd_why").hide();
				$("#why-scroll").hide();
				$("#edit_why").fadeIn("fast");
				
				//set data to component
				$("#hid_id_why").val(id);
				$("#cbedwhyIcon").val(pict);
				$("#iedwhyIcon").attr("class",pict);
				$("#cbedSide").val(side);
				$("#txtedwhy_title").val(title);
				$("#txtedwhy_text").val(text);
		    });
		    
		    $(".btdelete-why").click(function(e) {
		    	var id_why=$(this).attr("data-id");
				
				var conf=confirm("Are you sure want to delete this points?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/remove_why?id="+id_why,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							console.log(result);
							if (result=="")
							{
								alert("Point removed successfully.");
								retrieve_why();
							}
						}
					});
				}
		    });  	
		}
	});
}

function retrieve_home()
{
	$.ajax({
		url:base_url+"home/retrieve_slider",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img no-border'>";
                html+="<div class='img-thumbnail wid' style='margin-bottom:-8px'>";
                html+="<div style='background-image:url(\""+ base_url + "image/full/" + json[i].imagePath + "\")' class='div-img'>";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].imageID + "'>";
                html+="<i data-html='" + htmlEntities(json[i].content) + "' data-name='" + json[i].imageTitle + "' data-id='" + json[i].imageID + "' class='btedit-home icon fa fa-pencil' title='Edit Item'></i>";
                html+="<br/>";
                html+="<i data-id='" + json[i].imageID+ "' class='btchangepic-home icon fa fa-picture-o' title='Edit Picture'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].imageID + "' data-value='" + json[i].imageIndex + "' class='bthome-up icon mini'/><br/><img src='" + base_url +"assets/arrow-bottom.png' data-id='" + json[i].imageID + "' data-value='" + json[i].imageIndex + "' class='bthome-down icon mini' />";
                html+="<input type='file' class='fnchpic dnone' data-id='" + json[i].imageID + "' accept='image/*' />";
                html+="</span>";
                // html+="<span class='btdelete-home spclose back-white' data-value='" + json[i].imagePath + "' data-id='" + json[i].imageID + "'>X</span>";
                html+="</div></div>";
                html+="<div class='input-prepend input-append dnone' data-id='" + json[i].imageID + "'>";
                html+="<span class='add-on mini icon btclose-edit-home' data-id='" + json[i].imageID + "'><i class='icon-remove'></i></span>";
                html+="<input type='text' class='txttitle-home mini-input span2' placeholder='Title..' value='" + json[i].imageTitle + "' data-id='" + json[i].imageID + "' />";
                html+="<span class='add-on mini icon btsave-edit-home' data-id='" + json[i].imageID + "'><i class='icon-ok'></i></span>";
                html+="</div>";
                html+="<span class='splabel' data-id='" + json[i].imageID + "' style='margin-top:-30px'>" + json[i].imageTitle + "</span></div>";


                // html2+="<div class='item'>";''
                // html2+="<div class='slide-bg-image overlay-dark40 dark-bg parallax parallax-section' data-background-img='" + base_url + "image/full/" + json[i].imagePath + "'>";
                // html2+="<div class='js-fullscreen-height container'>";
                // html2+="<div class='intro-content'>";
                // html2+="<div class='intro-content-inner'>";
                // html2+=json[i].content;
                // html2+="</div></div></div></div></div>";
			}
			
			$("#home-scroll").html(html);
			$("#home").css("background-image", "url('" + base_url + "image/full/" + json[0].imagePath + "')");
			$("#content").html(json[0].content);
			
			// Reinit Carousel
			// window.int_introHeight();
	  //       $(".fullscreen-slider").data('owlCarousel').reinit({
			//     singleItem : true
			// });

			// var pageSection = $('.slide-bg-image, .bg-image');
		 //    pageSection.each(function (indx) {

		 //        if ($(this).attr("data-background-img")) {
		 //            $(this).css("background-image", "url(" + $(this).data("background-img") + ")");
		 //        }
		 //    });



	        // Button Event
		    $(".bthome-up").click(function(e) 
			{
		        var sliderID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_home_up?ID_slider="+sliderID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_home();
					}
				});
		    });
			
			$(".bthome-down").click(function(e) 
			{
		        var sliderID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_home_down?ID_slider="+sliderID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_home();
					}
				});
		    });

		    $(".btchangepic-home").click(function(e)
			{
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchpic[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchpic").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum 700 MB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFilePictureEdit(file,id);
				}
			});

			$(".btedit-home").click(function(e) {
				var id=$(this).attr("data-id");
				var item_name=$(this).attr("data-name");
				var content=$(this).attr("data-html");

				$("#btadd_home").hide();
				$("#home-scroll").hide();
				$("#edit_home").fadeIn("fast");
				
				//set data to component
				$("#hid_id_home").val(id);
				$("#txtedslider_name").val(item_name);
				$("#txtedhtml_element").val(content);
		    });

			$(".btdelete-home").click(function(e) {
				var ID_slider=$(this).attr("data-id");
				var filename = $(this).attr("data-value");
				var conf=confirm("Are you sure want to delete this slider item ?");
				if (conf==true)
				{
					$.ajax({
						url:base_url+"home/delete_slider?id="+ID_slider+"&filename=" + filename,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Slider item removed successfully.");
								retrieve_home();
							}
						}
					});
				}
			});
			
		}
	});
}

function retrieve_testimoni()
{
	$.ajax({
		url:base_url+"home/retrieve_testimoni",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'  >";
                html+="<div class='div-evt' >";   
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_testimoni + "'>";
                html+="<i data-id='" + json[i].ID_testimoni + "' data-person=" + json[i].person_name + "' class='btedit-testimoni icon fa fa-pencil' data-corp='" + json[i].corporation_name + "' data-text='" + json[i].testimoni_text +"' title='Edit Testimoni'></i><br/>";
                html+="<i data-id='" + json[i].ID_testimoni + "' class='btchangepic-test icon fa fa-picture-o' title='Edit Picture'></i><br/>";
                html+="<img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_testimoni + "' data-value='" + json[i].seq_no + "' class='bttestimoni-up icon mini' /><br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_testimoni + "' data-value='" + json[i].seq_no + "' class='bttestimoni-down icon mini' />";
                html+="<input type='file' class='fnchtest dnone' data-id='" + json[i].ID_testimoni + "' accept='image/*' />";
                html+="</span>";
                html+="<span class='btdelete-testimoni spclose back-white' data-id='" + json[i].ID_testimoni + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_testimoni + "' data-person='" + json[i].person_name + "'>";
                html+="<strong>" + json[i].person_name + "</strong>";
                if (json[i].corporation_name != "") {
	                html+="<br/>";
	                html+="(<em>" + json[i].corporation_name + "</em>)";
            	}
                html+="<br/>";
                html+="<center><img style='width:85px;height:85px' src='" + base_url + "image/photo/" + json[i].person_photo + "' class='round' alt='' /></center>";
                html+="<br/>";
                html+="<span class='small-font'>" + json[i].testimoni_text + "</span>";
                html+="</span></div></div></div>";


                 html2+="<div class='testimonial-item'>" + 
		                    "<div class='author-img'>" + 
		                        "<img style='width:120px;height:120px' src='" + base_url + "image/photo/" + json[i].person_photo + "' alt=''>" + 
		                    "</div>" + 
		                    "<h5>" + json[i].person_name + "</h5>" + 
		                    "<span>" +  (json[i].corporation_name != "" ? json[i].corporation_name : "") + "</span>" + 
		                    "<p>" + json[i].testimoni_text + "</p>" + 
		                "</div>";

                // html2+="<div class='item'>";
                // html2+="<div class='testimonial text-center max-width-700'>";
                // html2+="<div class='page-icon-sm'><i class='icon-quote'></i></div>";
                // html2+="<h2>What People Say?</h2>";
                // html2+="<p class='lead-lg'>" + json[i].testimoni_text + "</p>";
                // html2+="<h6 class='quote-author alt-title'>" + json[i].person_name + "<span class='text-regular'>" +  (json[i].corporation_name != "" ? "( " + json[i].corporation_name + " )" : "") + "</span></h6>";
                // html2+="</div></div>";
			}
			
			$("#testimoni-scroll").html(html);
			$("#testimoniList").html(html2);
			
			// Reinit Carousel
			$(".testimonials .owl-carousel").owlCarousel("destroy");
			$(".testimonials .owl-carousel").owlCarousel({
		        items: 1,
		        loop: true,
		        autoplay: true,
		        smartSpeed: 500,
		    });

		    $(".btchangepic-test").click(function(e)
			{
				var id=$(this).attr("data-id");
				var fnchpic=$(".fnchtest[data-id='"+id+"']");
				fnchpic.click();
			});

			$(".fnchtest").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFileTestimoniEdit(file,id);
				}
			});

			$(".bttestimoni-up").click(function(e) 
			{
		        var testimoniID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_testimoni_up?ID_testimoni="+testimoniID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_testimoni();
					}
				});
		    });
			
			$(".bttestimoni-down").click(function(e) 
			{
		        var testimoniID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_testimoni_down?ID_testimoni="+testimoniID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_testimoni();
					}
				});
		    });
    
			$(".btedit-testimoni").click(function(e) {
				var id=$(this).attr("data-id");
				var person_name=$(this).attr("data-person");
				var corp_name=$(this).attr("data-corp");
				var testimoni_text=$(this).attr("data-text");
				
				$("#btadd_testimoni").hide();
				$("#testimoni-scroll").hide();
				$("#edit_testimoni").fadeIn("fast");
				
				//set data to component
				$("#hid_id_testimoni").val(id);
				$("#txtedperson_name").val(person_name);
				$("#txtedcorp_name").val(corp_name);
				$("#txtedtestimoni_text").val(testimoni_text);
		    });

			$(".btdelete-testimoni").click(function(e) {
				var ID_testimoni=$(this).attr("data-id");
				
				var conf=confirm("Are you sure want to delete this testimonial ?");
				if (conf==true)
				{

					console.log(result);
					$.ajax({
						url:base_url+"home/remove_testimoni?id="+ID_testimoni,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Testimonial removed successfully.");
								retrieve_testimoni();
							}
						}
					});
				}
			});
		}
	});
}


function retrieve_how()
{
	$.ajax({
		url:base_url+"home/retrieve_how",
		dataType:"html",
		type:"GET",
		success: function(result)
		{
			var json=$.parseJSON(result);
			var html="";
			var html2 = "";
			for (var i=0;i<json.length;i++)
			{
				html+="<div class='slide-img' >";
                html+="<div class='img-polaroid wid_240'  >";
                html+="<div class='div-evt' >";
                html+="<span class='spleft back-white-left' style='text-align:center' data-id='" + json[i].ID_hows + "'>";
                html+="<i data-id='" + json[i].ID_hows + "' data-title='" + json[i].how_title + "' class='btedit-how icon fa fa-pencil' data-url='" + json[i].how_link + "' data-text='" + json[i].how_text + "' title='Edit How'></i><br/>";
                html+="<i data-id='" + json[i].ID_hows + "' class='btchangepic-how icon fa fa-picture-o' title='Edit Picture'></i>";
                html+="<br/><img src='" + base_url + "assets/arrow-up.png' data-id='" + json[i].ID_hows + "' data-value='" + json[i].seq_no + "' class='bthow-up icon mini'/>";
                html+="<br/><img src='" + base_url + "assets/arrow-bottom.png' data-id='" + json[i].ID_hows + "' data-value='" + json[i].seq_no + "' class='bthow-down icon mini' />";
                html+="</span>";
                html+="<span class='btdelete-how spclose back-white' data-id='" + json[i].ID_hows + "'>X</span>";
                html+="<span class='events_box' data-id='" + json[i].ID_hows + "' data-title='" + json[i].how_title + "'>";                               
                html+="<img src='" + base_url + "image/service/" + json[i].how_pict + "' style='width:120px' />";
                html+="<br/><strong>" + json[i].how_title + "</strong><br/>";
                html+="<span class='small-font'>" + json[i].how_text + "</span></span>";
                html+="<input type='file' class='fnchhow dnone' data-id='" + json[i].ID_hows + "' accept='image/*' />";
                html+="</div></div></div>";


                html2+="<div class='col-md-6'>" + 
                            "<div class='service-item'>" + 
                            	"<a href='" + json[i].how_link + "' target='_blank'>" + 
                            		"<img src='" + base_url + "image/service/" + json[i].how_pict + "' style='width:210px;height: 210px' />" + 
                            	"</a>" + 
                                "<h4>" + json[i].how_title + "</h4>" + 
                                "<p>" + json[i].how_text + "</p>" + 
                            "</div>" + 
                        "</div>";
                // html2+="<div class='col-md-4 content-box mb-sm-45' style='min-height:195px'>";
                // html2+="<div class='alt-icon-top icon-gray'>";
                // html2+="<i class='" + json[i].how_pict + "'></i></div>";
                // html2+="<h4 class='alt-title'>" + json[i].how_title + "</h4>";
                // html2+="<p>" + json[i].how_text + "</p></div>";
			}
			
			$("#how-scroll").html(html);
			$("#row-how").html(html2);

			$(".bthow-up").click(function(e) 
			{
		        var howID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_how_up?howid="+howID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_how();
					}
				});
		    });
			
			$(".bthow-down").click(function(e) 
			{
		        var howID=$(this).attr("data-id");
				var index=$(this).attr("data-value");
				$.ajax({
					url:base_url+"home/move_how_down?howid="+howID+"&index="+index,
					dataType:"html",
					type:"GET",
					success: function(result)
					{
						retrieve_how();
					}
				});
		    });
    
			$(".btedit-how").click(function(e) {
				var id=$(this).attr("data-id");
				var url=$(this).attr("data-url");
				var title=$(this).attr("data-title");
				var text=$(this).attr("data-text");
				
				$("#btadd_how").hide();
				$("#how-scroll").hide();
				$("#edit_how").fadeIn("fast");
				
				//set data to component
				$("#hid_id_how").val(id);
				$("#txtedhow_url").val(url);
				$("#txtedhow_title").val(title);
				$("#txtedhow_text").val(text);
		    });

		    $(".btchangepic-how").click(function(e)
			{
				var id=$(this).attr("data-id");
				var fnchhow=$(".fnchhow[data-id='"+id+"']");
				fnchhow.click();
			});

			$(".fnchhow").change(function(e)
			{
				var id=$(this).attr("data-id");
				var path=$(this).val();
				if (path!="")
				{
					var imageType = /image.*/;  
					var file = this.files[0];
					
					
					// check file type
					if (!file.type.match(imageType)) {  
					  alert("File \""+file.name+"\" is not a valid image file.");
					  return false;	
					} 
					// check file size
					if (parseInt(file.size / 1024) > max_size) {  
					  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
					  return false;	
					} 
					var size=file.size/1024;
					uploadFileHowEdit(file,id);
				}
			});

			$(".btdelete-how").click(function(e) {
				var id_how=$(this).attr("data-id");
				
				var conf=confirm("Are you sure want to delete this points?");
				if (conf==true)
				{

					console.log(result);
					$.ajax({
						url:base_url+"home/remove_how?id="+id_how,
						dataType:"html",
						type:"GET",
						success: function(result)
						{
							if (result=="")
							{
								alert("Points removed successfully.");
								retrieve_how();
							}
						}
					});
				}
			});
		}
	});
}

// Event Handler
$(document).ready(function(e)
{
	// Picture Folder Click
	$(".item-folder").click(function(e)
	{
		var id = $(this).data("id");
		var count = parseInt($(this).attr("data-count"));
		if (count > 0) {
			retrieve_detail_img(id);
			$("#portfolio-header").fadeOut("fast");
			$(".portfolio-filter").hide();
			$("#portfolio-detail").fadeIn("slow");
		}
	});

	try { 
		CKEDITOR.config.toolbar_MA = [
			{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
			{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
		        'HiddenField' ] },
			'/',
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
			'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
			'/',
			{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'tools', items : [ 'ShowBlocks','-','About' ] }
		];
		 
		var editor = CKEDITOR.replace("txtblogText", {
			toolbar: 'MA',
			filebrowserUploadUrl: base_url + 'js/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserBrowseUrl: base_url + 'js/plugins/ckfinder/ckfinder.html?resourceType=Files'
		}); 

		CKFinder.setupCKEditor(editor);
	} catch(e) { }

	$("#contact-form").submit(function(e)
	{
		return false;
	});

    $("#btsend_email").click(function(e) 
	{
     	var xmlhttp;
		var status;
		
		var s_name=$("#txts_name").val();
		var s_email=$("#txts_email").val();
		var s_subject=$("#txts_subject").val();
		var s_message=$("#txts_message").val();
		
		var regex=new RegExp("^.+@.+\..+$");
		
		if (s_name=="")
			show_error("Please fill your name first.");
		else if (s_name.length<3)
			show_error("Name contains at least 3 characters.");
		else if (s_email=="")
			show_error("Please fill your email first.");
		else if (!regex.test(s_email))
			show_error("Please enter a valid email.");
		else if (s_subject == "")
			show_error("Please fill subject first.");
		else if (s_message.length=="")
			show_error("Please give your message.");
		else
		{
			if (window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.status==200 && xmlhttp.readyState==4)
				{
					status=xmlhttp.responseText;
					show_success("Your message successfully sent.");
					
					$("#txts_name").val("");
					$("#txts_subject").val("");
					$("#txts_email").val("");
					$("#txts_message").val("");
				}
			}
			xmlhttp.open("POST",base_url+"home/send_email",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			xmlhttp.send("s_name="+s_name+"&s_subject="+s_subject+"&s_email="+s_email+"&s_message="+s_message);  
		}
    });

	$("#btnSaveText").click(function(e)
	{
		$("#textModal").modal("hide");
	});

	// Manage File Why Pict
	$("#btedit-why-pict").click(function(e)
	{
		$("#fnwhy-pict").click();
	});

	$("#fnwhy-pict").change(function(e)
	{
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileWhyPict(file);
		}
	});

	// Manage Logo

	$("#btedit-logo").click(function(e) {
		collapse_all();
		$("#div-change-logo").show();
        $("#div-change-logo").animate({left:'0'},140);
    });

    $("#close-chlogo").click(function(e) {	
        $("#div-change-logo").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#div-change-logo").hide();},140);
    });

    $("#btuploadlogo").click(function(e)
	{
		var logolight = document.getElementById("fnlogolight").files[0];
		var logodark = document.getElementById("fnlogodark").files[0];
		var formData = new FormData();

		if ($("#fnlogolight").val() == "") {
			$("#error-chlogo").html("Please attach logo light first.");
		} else if ($("#fnlogodark").val() == "") {
			$("#error-chlogo").html("Please attach logo dark first.");
		} else { 
			formData.append('logodark', logodark);
			formData.append('logolight', logolight);
			// Use `jQuery.ajax` method
			$.ajax(base_url + 'home/update_logo', {
			    method: "POST",
			    data: formData,
			    processData: false,
			    contentType: false,
			    success: function (result) {
			      	console.log('Upload success');
			      	//Clean everything..
				  	$("#fnlogolight").val("");
				  	$("#fnlogodark").val("");
				  	$("#error-chlogo").html("");

				  	$("#close-chlogo").click();
				  	var dt = new Date();
				  	$(".logo-light").attr("src",base_url + "image/logo-light.png?" + dt.getTime());
				  	$(".logo-dark").attr("src",base_url + "image/logo-dark.png?" + dt.getTime());
			    },
			    error: function (result) {
			      console.log('Upload error');
			    }
			});
		}
	});

	// Manage Booking
	$("#btnBook").click(function(e)
	{
		var places = $("#txtPlaces").val();
		var date = $("#txtBookDate").val();
		var category = $("#cbCategory").val();
		if (places.trim() == "") {
			$("#error-book").html("Please fill places first.");
			$("#error-book").show();
		} else if(date.trim() == "") {
			$("#error-book").html("Please fill booking date first.");
			$("#error-book").show();
		} else {
			$("#dialog").modal("show");
		}
		window.setTimeout(function(){ $("#error-book").hide(); }, 3200);
	});

	$("#btnRequest").click(function(e){
		var contactName = $("#txtContactName").val();
		var contactPhone = $("#txtContactPhone").val();
		var contactEmail = $("#txtContactEmail").val();
		var notes = $("#txtnotes").val();
		var places = $("#txtPlaces").val();
		var date = $("#txtBookDate").val();
		var category = $("#cbCategory").val();
		var regex = new RegExp("^.+@.+\..+$");

		if (contactName.trim() == "") {
			$("#error-request").html("Please fill your name first.");
			$("#error-request").show();
		} else if (contactPhone.trim() == "") {
			$("#error-request").html("Please fill your phone first.");
			$("#error-request").show();
		} else if (contactEmail.trim() == "") {
			$("#error-request").html("Please fill your email first.");
			$("#error-request").show();
		} else if (!regex.test(contactEmail)) {
			$("#error-request").html("Your email format is not valid!");
			$("#error-request").show();
		} else {
			$.ajax({
				url : base_url + "home/booking",
				type : "POST",
				dataType : "html",
				data : "places=" + places + "&date=" + date + "&category=" + category + "&name=" + contactName + "&phone=" + contactPhone + "&email=" + contactEmail + "&notes="+notes,
				success:function(result) {
					alert("Booking has been saved successfully. We will contact you soon, so stay tune.");
					$("#dialog").modal("hide");
				}, error : function(result) {
					alert("Booking failed : " + result);
				}
			});
		}
		window.setTimeout(function(){ $("#error-request").hide(); }, 3200);
	});

	// Manage Booking
	$("#btmanage-booking").click(function(e) {
		collapse_all();
		$("#manage-booking-box").show();
        $("#manage-booking-box").animate({left:'0'},140);
    });

    $("#close-booking").click(function(e) {	
        $("#manage-booking-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-booking-box").hide();},140);
    });

	// Manage Portfolio
	$("#btedit-portfolio").click(function(e) {
		collapse_all();
		$("#manage-portfolio-box").show();
        $("#manage-portfolio-box").animate({left:'0'},140);
    });

    $("#close-portfolio").click(function(e) {	
        $("#manage-portfolio-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-portfolio-box").hide();},140);
    });

	// Manage Team
	$("#btedit-team").click(function(e) {
		collapse_all();
		$("#manage-team-box").show();
        $("#manage-team-box").animate({left:'0'},140);
    });

    $("#close-team").click(function(e) {	
        $("#manage-team-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-team-box").hide();},140);
    });


	// Manage News
	$("#btedit-news").click(function(e) {
		collapse_all();
		$("#manage-news-box").show();
        $("#manage-news-box").animate({left:'0'},140);
    });

    $("#close-news").click(function(e) {	
        $("#manage-news-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-news-box").hide();},140);
    });

	// Manage Category
	$("#btedit-category").click(function(e) {
		collapse_all();
		$("#manage-category-box").show();
        $("#manage-category-box").animate({left:'0'},140);
    });

    $("#close-category").click(function(e) {	
        $("#manage-category-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-category-box").hide();},140);
    });

	// Manage Pricing Plan
	$(".btedit-detail").click(function(e) {
		var id = $(this).attr("data-id");
		var name = $(this).attr("data-name");
		
		//collapse_all();
		retrieve_detail(id);
		$("#hid_id_detail").val(id);
		$("#planc").html($(this).attr("data-name"));
		$("#manage-detail-plan-box").show();
        $("#manage-detail-plan-box").animate({left:'0'},140);
    });

    $("#close-detail-plan").click(function(e) {	
        $("#manage-detail-plan-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-detail-plan-box").hide();},140);
    });


	$("#btedit-plan").click(function(e) {
		collapse_all();
		$("#manage-plan-box").show();
        $("#manage-plan-box").animate({left:'0'},140);
    });

    $("#close-plan").click(function(e) {	
        $("#manage-plan-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-plan-box").hide();},140);
    });

	// Manage Box Why
	$("#btedit-why").click(function(e) {
		collapse_all();
		$("#manage-why-box").show();
        $("#manage-why-box").animate({left:'0'},140);
    });

    $("#close-why").click(function(e) {	
        $("#manage-why-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-why-box").hide();},140);
    });

	// Manage Box Home
	$("#btedit-home").click(function(e) {
		collapse_all();
		$("#manage-home-box").show();
        $("#manage-home-box").animate({left:'0'},140);
    });

    $("#close-home").click(function(e) {	
        $("#manage-home-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-home-box").hide();},140);
    });

	// Manage Box Event
	$("#btedit-how").click(function(e) {
		collapse_all();
		$("#manage-how-box").show();
        $("#manage-how-box").animate({left:'0'},140);
    });

    $("#close-how").click(function(e) {	
        $("#manage-how-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-how-box").hide();},140);
    });

    // Manage Testimoni Box
    $("#btedit-testimoni").click(function(e)
    {
    	collapse_all();
		$("#manage-testimoni-box").show();
        $("#manage-testimoni-box").animate({left:'0'},140);
    });

    $("#close-testimoni").click(function(e)
    {
    	$("#manage-testimoni-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-testimoni-box").hide();},140);
    });

    // var today = new Date();
    // $(".date").datepicker({
    // 	minDate : today
    // });
    
	// Validation
	$(".num").keydown(function(e) {
        if ((e.keyCode<48 || e.keyCode>57) && e.keyCode!=8 &&e.keyCode!=46 &&e.keyCode!=37 &&e.keyCode!=38 &&e.keyCode!=39 &&e.keyCode!=40 )
		{
			return false;
		}
    });

	$("#btlogin").click(function(e) 
	{
    	var username=$("#txtusername").val(); 
		var password=$("#txtpassword").val();
		
		if (username=="") 
			$("#error-login").html("Please fill your username first.");
		else if (password=="")
			$("#error-login").html("Please fill your password first.");
		else
		{
			$.ajax({
				url:base_url+"home/do_login",
				data:"id_admin="+username+"&password="+password,
				dataType:"html",
				type:"POST",
				success: function(result)
				{
					switch (parseInt(result))
					{
						case 0:window.location.reload();break;
						case 1:$("#error-login").html("Your username is not registered yet.");break;
						case 2:$("#error-login").html("Your password is incorrect.");break;
						case 3:$("#error-login").html("Your account is not active.");break;
					}				
				}
			});
		}
		window.setTimeout(function(){$("#error-login").html("");}, 2400);
    });
	
	$(document).keydown(function(e) 
	{
        if(e.keyCode==13)
		{
			$("#btlogin").click();		
		}
    });

    $("#cropping").on("shown.bs.modal", function(e)
    {
    	cropper.reset().replace(blobURL);
    });

    $("#cropping").on("hide.bs.modal", function(e)
    {
    	$(".fnchport").val("");
    });

	// Booking
	$("#btsend_booking").click(function(e){
		var id = $("#hid_id_booking").val();
		var title = $("#txtmsgtitle").val();
		var msg = $("#txtSendMessage").val();

		if (title == "") {
			$("#error-booking").html("Please fill title first."); 
		} else if (msg == "") {
			$("#error-booking").html("Please fill message first."); 
		} else {
			$.ajax({
				url : base_url + "home/send_booking",
				dataType : "html",
				type : "POST",
				data : "id=" + id + "&title=" + title + "&msg=" + msg,
				success : function(result) {
					alert("Mail has been sent successfully.");
					$("#txtmsgtitle").val("");
					$("#txtSendMessage").val("");
					$("#error-booking").html("");

					$("#btcancel_booking").click();
				}, error : function(result) {
					alert("AJAX Error when send email.");
				}
			});
		}
	});

	$(".btsend-mail").click(function(e){
		var id = $(this).attr("data-id");

		$("#booking-scroll").hide();
		$("#hid_id_booking").val(id);
		$("#edit_booking").fadeIn("fast");
	});

	$("#btcancel_booking").click(function(e)
	{
		$("#booking-scroll").fadeIn("fast");
		$("#edit_booking").hide();
	});

	$(".btreject-booking, .btaccept-booking").click(function(e)
	{
		var id = $(this).attr("data-id");
		var status = $(this).attr("data-value");

		var conf = confirm("Are you sure about your decision ?");
		if (conf == true) {
			$.ajax({
				url :base_url + "home/update_book_status",
				dataType : "html",
				type : "POST",
				data : "id=" + id + "&status=" + status,
				success : function(result) {
					alert("Booking status has been saved successfully.");
					retrieve_booking();
				}, error : function(result) {
					alert("AJAX Error when change status.");
				}
			});
		}
	});

	// Maps Form
	$("#btedit-map").click(function(e)
	{
		// $(".setting-text").slideUp("fast");
		alert("Place the marker to the location you want.");
		google.maps.event.addListener(map, 'click', function(event){
			placeMarker(event.latLng);
		});
		$(".edit-map").slideDown("slow");
		$("#btsave-map").fadeIn("fast");
		$("#btcancel-map").fadeIn("fast");
		$("#btedit-map").hide();
	});
	
	$("#btcancel-map").click(function(e)
	{
		var conf = confirm("Are you sure want to remove all your marker updates ?");
		if (conf == true) {
			marker.setMap(null);
			marker = new google.maps.Marker({
		        position: positions,
		        map: map,
		        title: title,
		        icon: base_url + 'image/map-marker.png'
		    });
			$(".edit-map").slideUp("slow");
			$("#btsave-map").hide();
			$("#btcancel-map").hide();
			$("#btedit-map").fadeIn("fast");
		}
	});

	$("#btsave-map").click(function(e)
	{
		var conf = confirm("Are you sure want to save this location ?");
		if (conf == true) {
			positions = position2;
			$.ajax({
				url : base_url + "home/update_location",
				type : "POST",
				dataType : "html",
				data : "langitude=" + positions.lng() + "&latitude=" + positions.lat(),
				success: function(result) {
					$("#btcancel-map").click();
				}, error : function(result) {
					alert("Error when update location.");
				}
			});
		}

	});

	// Blog Link Form
	$("#btedit-bloglink").click(function(e)
	{
		$(".bloglink-text").slideUp("fast");
		$(".edit-bloglink").slideDown("slow");
		$("#btsave-bloglink").fadeIn("fast");
		$("#btcancel-bloglink").fadeIn("fast");
		$("#btedit-bloglink").hide();
	});
	
	$("#btcancel-bloglink").click(function(e)
	{
		$(".bloglink-text").slideDown("fast");
		$(".edit-bloglink").slideUp("slow");
		$("#btsave-bloglink").hide();
		$("#btcancel-bloglink").hide();
		$("#btedit-bloglink").fadeIn("fast");
	});

	$("#btsave-bloglink").click(function(e)
	{
		var xmlhttp;
		var status;
		
		var blog_link=$("#txtblogLink").val();
		
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.status==200 && xmlhttp.readyState==4)
			{
				status=xmlhttp.responseText;

				$("#newLink").attr("href", blog_link);

				$("#btcancel-bloglink").trigger("click");
			}
		}
		xmlhttp.open("POST",base_url+"home/update_bloglink",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.send("link="+blog_link);
	});


	// Setting Form
	$("#btedit-setting").click(function(e)
	{
		$(".setting-text").slideUp("fast");
		$(".edit-setting").slideDown("slow");
		$("#btsave-setting").fadeIn("fast");
		$("#btcancel-setting").fadeIn("fast");
		$("#btedit-setting").hide();
	});
	
	$("#btcancel-setting").click(function(e)
	{
		$(".setting-text").slideDown("slow");
		$(".edit-setting").slideUp("fast");
		$("#btsave-setting").hide();
		$("#btcancel-setting").hide();
		$("#btedit-setting").fadeIn("fast");
	});
	
	$("#btsave-setting").click(function(e)
	{
		var xmlhttp;
		var status;
		
		var facebook=$("#txtFacebook").val();
		var twitter=$("#txtTwitter").val();
		var linkedin=$("#txtLinkedIn").val();
		var google=$("#txtGooglePlus").val();
		
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.status==200 && xmlhttp.readyState==4)
			{
				status=xmlhttp.responseText;

				$("#lnk-facebook").attr("href", facebook);
				$("#lnk-twitter").attr("href", twitter);
				$("#lnk-linkedin").attr("href", linkedin);
				$("#lnk-google").attr("href", google);

				if (facebook == "") 
					$("#lnk-facebook").addClass("dnone");
				else
					$("#lnk-facebook").removeClass("dnone");

				if (twitter == "") 
					$("#lnk-twitter").addClass("dnone");
				else
					$("#lnk-twitter").removeClass("dnone");

				if (linkedin == "") 
					$("#lnk-linkedin").addClass("dnone");
				else
					$("#lnk-linkedin").removeClass("dnone");

				if (google == "") 
					$("#lnk-google").addClass("dnone");
				else
					$("#lnk-google").removeClass("dnone");

				$("#btcancel-setting").trigger("click");
			}
		}
		xmlhttp.open("POST",base_url+"home/update_social",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.send("facebook="+facebook+"&twitter="+twitter+"&linkedin="+linkedin+"&google="+google);
	});

	// Video Form
	$("#btedit-video").click(function(e)
	{
		$(".video-text").slideUp("fast");
		$(".edit-video").slideDown("slow");
		$("#btsave-video").fadeIn("fast");
		$("#btcancel-video").fadeIn("fast");
		$("#btedit-video").hide();
	});
	
	$("#btcancel-video").click(function(e)
	{
		$(".video-text").slideDown("slow");
		$(".edit-video").slideUp("fast");
		$("#btsave-video").hide();
		$("#btcancel-video").hide();
		$("#btedit-video").fadeIn("fast");
	});
	
	$("#btsave-video").click(function(e)
	{
		var xmlhttp;
		var status;
		
		var link=$("#txtVideoLink").val();
		var text=$("#txtVideoText").val();
		
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.status==200 && xmlhttp.readyState==4)
			{
				status=xmlhttp.responseText;

				$("#video-popup").attr("href", link);
				
				var c=nl2br(text);
				$("#hV-text").html(c);

				//$("#sp_content").html(content);
				$("#btcancel-video").trigger("click");
			}
		}
		xmlhttp.open("POST",base_url+"home/update_video",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.send("link="+link+"&text="+text);
	});

	// About Form
	$("#btedit-about").click(function(e)
	{
		$(".about-text").slideUp("fast");
		$(".edit-about").slideDown("slow");
		$("#btsave-about").fadeIn("fast");
		$("#btcancel-about").fadeIn("fast");
		$("#btedit-about").hide();
	});
	
	$("#btcancel-about").click(function(e)
	{
		$(".about-text").slideDown("slow");
		$(".edit-about").slideUp("fast");
		$("#btsave-about").hide();
		$("#btcancel-about").hide();
		$("#btedit-about").fadeIn("fast");
	});
	
	$("#btsave-about").click(function(e)
	{
		var xmlhttp;
		var status;
		
		var quote=$("#txtquote").val();
		var simple=$("#txtsimple").val();
		//var content=CKEDITOR.instances.txtcontent.getData();
		var content=$("#txtcontent").val();
		
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.status==200 && xmlhttp.readyState==4)
			{
				status=xmlhttp.responseText;

				$("#sp_quote_text").html(quote);
				$("#sp_simple_quote").html(simple);
				
				var c=nl2br(content);				
				$("#about-text").html(c);
				$("#txtcontent").val(br2nl(c));

				//$("#sp_content").html(content);
				$("#btcancel-about").trigger("click");
			}
		}
		xmlhttp.open("POST",base_url+"home/update_about",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.send("quote="+quote+"&simple="+escape(simple)+"&content="+content);
	});


	// Change CV Document
	$("#btedit-cv").click(function(e)
	{
		$("#fnchcv").click();
	});

	$("#fnchcv").change(function(e)
	{
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];

			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadCV(file);
		}
	});

	// Fact
	$("#btedit-fact").click(function(e)
	{
		$(".counter-title").slideUp("fast");
		$(".h-fact").slideDown("slow");
		$("#btsave-fact").fadeIn("fast");
		$("#btcancel-fact").fadeIn("fast");
		$("#btedit-fact").hide();
	});
	
	$("#btcancel-fact").click(function(e)
	{
		$(".counter-title").slideDown("slow");
		$(".h-fact").slideUp("fast");
		$("#btsave-fact").hide();
		$("#btcancel-fact").hide();
		$("#btedit-fact").fadeIn("fast");
	});

	$("#btsave-fact").click(function(e)
	{
		var xmlhttp;
		var status;
		
		var award=$("#txtaward").val();
		var client=$("#txtclient").val();
		var project=$("#txtproject").val();
		var team=$("#txtteam").val();
		
		if (window.XMLHttpRequest)
			xmlhttp=new XMLHttpRequest();
		else
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.status==200 && xmlhttp.readyState==4)
			{
				status=xmlhttp.responseText;

				$("#h-award").html(award);
				$("#h-client").html(client);
				$("#h-project").html(project);
				$("#h-team").html(team);

				//$("#sp_content").html(content);
				$("#btcancel-fact").trigger("click");
			}
		}
		xmlhttp.open("POST",base_url+"home/update_fact",true);
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlhttp.send("award="+award+"&client="+client+"&project="+project+"&team="+team);
	});

	// Contact

	$("#btedit-contact").click(function(e)
	{
		$(".edit-contact").slideDown("slow");
		$(".contact-label").slideUp("fast");
		$("#btsave-contact").fadeIn("fast");
		$("#btcancel-contact").fadeIn("fast");
		$("#btedit-contact").fadeOut("fast");
	});
	
	$("#btcancel-contact").click(function(e)
	{
		$(".edit-contact").slideUp("fast");
		$(".contact-label").slideDown("slow");
		$("#btsave-contact").fadeOut("fast");
		$("#btcancel-contact").fadeOut("fast");
		$("#btedit-contact").fadeIn("fast");
	});
	
	$("#btsave-contact").click(function(e) {
        var xmlhttp;
		var status;
		
		var email=$("#txtemail").val();
		var email2=$("#txtemail2").val();
		var address = $("#txtaddress").val();
		var phone=$("#txtphone").val();
				
		if (address == "")
			alert("Please fill your address first.");
		else if (phone == "")
			alert("Please fill your phone first.");	
		else if (email=="")
			alert("Please fill your email first.");
		else
		{
			if (window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.status==200 && xmlhttp.readyState==4)
				{
					status=xmlhttp.responseText;
					
					$("#p-mp1").html(phone);
					$("#p-email").html(email);
					$("#p-location").html(nl2br(address));
					
					$("#btcancel-contact").trigger("click");
				}
			}
			xmlhttp.open("POST",base_url+"home/update_contact",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			xmlhttp.send("email="+email+"&email2="+ email2 +"&phone="+encodeURIComponent(phone)+"&address="+address);
		}
    });


    // Contact Msg

    // Contact

	$("#btedit-contactmsg").click(function(e)
	{
		$(".edit-contactmsg").slideDown("slow");
		$(".span-contact").slideUp("fast");
		$("#btsave-contactmsg").fadeIn("fast");
		$("#btcancel-contactmsg").fadeIn("fast");
		$("#btedit-contactmsg").hide();
	});
	
	$("#btcancel-contactmsg").click(function(e)
	{
		$(".edit-contactmsg").slideUp("fast");
		$(".span-contact").slideDown("slow");
		$("#btsave-contactmsg").hide();
		$("#btcancel-contactmsg").hide();
		$("#btedit-contactmsg").fadeIn("fast");
	});
	
	$("#btsave-contactmsg").click(function(e) {
        var xmlhttp;
		var status;
		
		var contact=$("#txtcontact").val();
				
				
		if (contact=="")
			alert("Please fill your contact text first.");
		else
		{
			if (window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.status==200 && xmlhttp.readyState==4)
				{
					status=xmlhttp.responseText;
					
					$("#span-contact").html(nl2br(contact));
					
					$("#btcancel-contactmsg").trigger("click");
				}
			}
			xmlhttp.open("POST",base_url+"home/update_contactmsg",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			xmlhttp.send("contact="+contact);
		}
    });

	$("#close-admin").click(function(e) {	
        $("#manage-admin-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-admin-box").hide();},140);
    });

    // How It Works

	$(".bthow-up").click(function(e) 
	{
        var howID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_how_up?howid="+howID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_how();
			}
		});
    });
	
	$(".bthow-down").click(function(e) 
	{
        var howID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_how_down?howid="+howID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_how();
			}
		});
    });

    $(".btedit-how").click(function(e) {
		var id=$(this).attr("data-id");
		var url=$(this).attr("data-url");
		var title=$(this).attr("data-title");
		var text=$(this).attr("data-text");
		
		$("#btadd_how").hide();
		$("#how-scroll").hide();
		$("#edit_how").fadeIn("fast");
		
		//set data to component
		$("#hid_id_how").val(id);
		$("#txtedhow_url").val(url);
		$("#txtedhow_title").val(title);
		$("#txtedhow_text").val(text);
    });

    
    $(".btdelete-how").click(function(e) {
    	var id_how=$(this).attr("data-id");
		
		var conf=confirm("Are you sure want to delete this points?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/remove_how?id="+id_how,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					console.log(result);
					if (result=="")
					{
						alert("Point removed successfully.");
						retrieve_how();
					}
				}
			});
		}
    }); 

	$("#cbIcon").change(function(e)
	{
		$("#iIcon").attr("class", "fa " + $("#cbIcon").val());
	});

	$("#cbedIcon").change(function(e)
	{
		$("#iedIcon").attr("class", "fa " + $("#cbedIcon").val());
	});

	$("#btadd_how").click(function(e) {
        $("#btadd_how").hide();
		$("#how-scroll").hide();
        $("#upload_how").fadeIn("fast");
    });
	
	$("#btcancel_how").click(function(e) {
        $("#btadd_how").fadeIn("fast");
		$("#how-scroll").fadeIn("fast");
        $("#upload_how").hide();
    });
	
	$("#btcanceled_how").click(function(e) {
        $("#btadd_how").fadeIn("fast");
		$("#how-scroll").fadeIn("fast");
        $("#edit_how").hide();
    });
	
	$("#btsaveed_how").click(function(e) 
	{
    	var id = $("#hid_id_how").val();
		var title = $("#txtedhow_title").val();
		var url = $("#txtedhow_url").val();
		var text = $("#txtedhow_text").val();
		
		if (title=="")
			$("#error-edit-how").html("Please fill title first.");
		else if (url=="")
			$("#error-edit-how").html("Please fill how-url first.");
		else if (text=="")
			$("#error-edit-how").html("Please fill how-text first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_how",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&title="+title+"&text="+text+"&url="+url,
				success: function(result)
				{
					retrieve_how();
					//Close
					$("#btcanceled_how").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_how").click(function(e) 
	{
		var filename=$("#fnhow_image").val();
		var title = $("#txthow_title").val();
		var url = $("#txthow_url").val();
		var text = $("#txthow_text").val();
		
		if (filename=="")
			$("#error-how").html("Please attach the file first."); 
		else if (title=="")
			$("#error-how").html("Please fill title first.");
		else if (url=="")
			$("#error-how").html("Please fill url first.");
		else if (text=="")
			$("#error-how").html("Please fill how-text first.");
		else
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnhow_image").files[0];

			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-how").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-how").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePictureHow(file);


			// $.ajax({
			// 	url:base_url+"home/insert_how",
			// 	dataType:"html",
			// 	type:"POST",
			// 	data:"pict="+pict+"&title="+title+"&text="+text,
			// 	success: function(result)
			// 	{
			// 		//Clear Insert
			// 		$("#txthow_title").val("");
			// 		$("#cbIcon").val("icon-mobile");
			// 		$("#iIcon").attr("class","icon-mobile");
			// 		$("#txthow_text").val("");
										
			// 		//retrieve
			// 		retrieve_how();
					
			// 		//Close
			// 		$("#btcancel_how").trigger("click");
			// 	}
			// });
		}
    });


    // Testimonial Section

    $(".bttestimoni-up").click(function(e) 
	{
        var testimoniID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_testimoni_up?ID_testimoni="+testimoniID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_testimoni();
			}
		});
    });
	
	$(".bttestimoni-down").click(function(e) 
	{
        var testimoniID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_testimoni_down?ID_testimoni="+testimoniID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_testimoni();
			}
		});
    });

	$(".btedit-testimoni").click(function(e) {
		var id=$(this).attr("data-id");
		var person_name=$(this).attr("data-person");
		var corp_name=$(this).attr("data-corp");
		var testimoni_text=$(this).attr("data-text");
		
		$("#btadd_testimoni").hide();
		$("#testimoni-scroll").hide();
		$("#edit_testimoni").fadeIn("fast");
		
		//set data to component
		$("#hid_id_testimoni").val(id);
		$("#txtedperson_name").val(person_name);
		$("#txtedcorp_name").val(corp_name);
		$("#txtedtestimoni_text").val(testimoni_text);
    });

	$(".btdelete-testimoni").click(function(e) {
		var ID_testimoni=$(this).attr("data-id");
		
		var conf=confirm("Are you sure want to delete this testimonial ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/remove_testimoni?id="+ID_testimoni,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("Testimonial removed successfully.");
						retrieve_testimoni();
					}
				}
			});
		}
	});

	$("#btadd_testimoni").click(function(e) {
        $("#btadd_testimoni").hide();
		$("#testimoni-scroll").hide();
        $("#upload_testimoni").fadeIn("fast");
    });
	
	$("#btcancel_testimoni").click(function(e) {
        $("#btadd_testimoni").fadeIn("fast");
		$("#testimoni-scroll").fadeIn("fast");
        $("#upload_testimoni").hide();
    });
	
	$("#btcanceled_testimoni").click(function(e) {
        $("#btadd_testimoni").fadeIn("fast");
		$("#testimoni-scroll").fadeIn("fast");
        $("#edit_testimoni").hide();
    });
	
	$("#btsaveed_testimoni").click(function(e) 
	{
    	var id = $("#hid_id_testimoni").val();
		var person_name = $("#txtedperson_name").val();
		var corp_name = $("#txtedcorp_name").val();
		var testimoni_text = $("#txtedtestimoni_text").val();
		
		if (person_name=="")
			$("#error-edit-testimoni").html("Please fill person name first."); 
		else if (testimoni_text=="")
			$("#error-edit-testimoni").html("Please fill testimoni-text first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_testimoni",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&person_name="+escape(person_name)+"&corp_name="+corp_name+"&testimoni_text="+testimoni_text,
				success: function(result)
				{
					console.log(result);
					retrieve_testimoni();
					//Close
					$("#btcanceled_testimoni").trigger("click");
				}
			});
		}
    });

    $("#btsave_testimoni").click(function(e) 
	{
		var person_name = $("#txtperson_name").val();
		var corp_name = $("#txtcorp_name").val();
		var testimoni_text = $("#txttestimoni_text").val();
		
		if (person_name=="")
			$("#error-testimoni").html("Please fill person name first."); 
		else if (testimoni_text=="")
			$("#error-testimoni").html("Please fill testimoni-text first.");
		else
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnperson_photo").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-home").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-home").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileTestimoni(file);
		}
    });


    var uploadFileTestimoni = function(file)
	{
		var person_name = $("#txtperson_name").val();
		var corp_name = $("#txtcorp_name").val();
		var testimoni_text = $("#txttestimoni_text").val();
		
		$("#td-percent-test").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
		}
		reader.readAsDataURL(file);
		
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_testimoni?person_name="+escape(person_name)+"&corp_name="+corp_name+"&testimoni_text="+testimoni_text, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent_test").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-home").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent_test").html("100%");
				  
				  //Clean everything..
				  $("#txtperson_name").val("");
				  $("#txtcorp_name").val("");
				  $("#txttestimoni_text").val("");
				  $("#fnperson_photo").val("");
				  $("#td-percent-test").hide();

				  //retrieve
				  retrieve_testimoni();
					
				  //Close
				  $("#btcancel_testimoni").trigger("click");

				} else {  
				  $("#error-home").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", file.fileName);
			xhr.setRequestHeader("X-File-Size", file.fileSize);
			xhr.setRequestHeader("X-File-Type", file.type);
			
			// Send the file (doh)
			xhr.send(file);
		
		}else{
			$("#error_home").html("Your browser doesnt support FileReader object");
		} 		
	}

	// Slider Home Section

    $(".bthome-up").click(function(e) 
	{
        var sliderID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_home_up?ID_slider="+sliderID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_home();
			}
		});
    });
	
	$(".bthome-down").click(function(e) 
	{
        var sliderID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_home_down?ID_slider="+sliderID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_home();
			}
		});
    });

	$(".btedit-home").click(function(e) {
		var id=$(this).attr("data-id");
		var item_name=$(this).attr("data-name");
		var content=$(this).attr("data-html");
		var visible=$(this).attr("data-visible");

		$("#btadd_home").hide();
		$("#home-scroll").hide();
		$("#edit_home").fadeIn("fast");
		
		//set data to component
		$("#hid_id_home").val(id);
		$("#txtedslider_name").val(item_name);
		$("#txtedhtml_element").val(content);
		$("#chkedslider_visible").prop("checked", (visible == "1"));
    });

	$(".btdelete-home").click(function(e) {
		var ID_slider=$(this).attr("data-id");
		var filename = $(this).attr("data-value");
		var conf=confirm("Are you sure want to delete this slider item ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/delete_slider?id="+ID_slider+"&filename=" + filename,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("Slider item removed successfully.");
						retrieve_home();
					}
				}
			});
		}
	});

	$(".btchangepic-home").click(function(e)
	{
		var id=$(this).attr("data-id");
		var fnchpic=$(".fnchpic[data-id='"+id+"']");
		fnchpic.click();
	});

	$(".fnchpic").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePictureEdit(file,id);
		}
	});

	$("#btadd_home").click(function(e) {
        $("#btadd_home").hide();
		$("#home-scroll").hide();
        $("#upload_home").fadeIn("fast");
    });
	
	$("#btcancel_home").click(function(e) {
        $("#btadd_home").fadeIn("fast");
		$("#home-scroll").fadeIn("fast");
        $("#upload_home").hide();
    });
	
	$("#btcanceled_home").click(function(e) {
        $("#btadd_home").fadeIn("fast");
		$("#home-scroll").fadeIn("fast");
        $("#edit_home").hide();
    });
	
	$("#btsaveed_home").click(function(e) 
	{
    	var id = $("#hid_id_home").val();
		var slider_name = $("#txtedslider_name").val();
		var content = $("#txtedhtml_element").val();
		var visible = ($("#chkedslider_visible").prop("checked") == true) ? "1" : "0";
		
		if (slider_name=="")
			$("#error-edit-home").html("Please fill slider name first."); 
		else
		{
			$.ajax({
				url:base_url+"home/edit_home",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&name="+slider_name+"&content="+escape(content)+"&visible="+visible,
				success: function(result)
				{
					console.log(result);
					retrieve_home();
					//Close
					$("#btcanceled_home").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_home").click(function(e) 
	{
		var filename=$("#fnslider_image").val();
		var name=$("#txtslider_name").val();
		var content=$("#txthtml_element").val();
		var visible=(document.getElementById("chkslider_visible").checked)?1:0;
		
		//Clean error
		$("#error-home").html("");
		if (filename=="")
			$("#error-home").html("Please attach the file first.");
		else if (name=="")
			$("#error-home").html("Please fill the slider name first.");
		else 
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnslider_image").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-home").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-home").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePicture(file);
		}
    });


    var uploadFilePicture = function(file)
	{
		var filename=$("#fnslider_image").val();
		var name=$("#txtslider_name").val();
		var content=$("#txthtml_element").val();
		var visible=(document.getElementById("chkslider_visible").checked)?1:0;
		
		$("#td-percent").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
		}
		reader.readAsDataURL(file);
		
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_slider?name="+name+"&content="+content+"&visible="+visible, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-home").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent").html("100%");
				  
				  //Clean everything..
				  $("#error-home").html("");
				  $("#txtslider_name").val("");
				  $("#fnslider_image").val("");
				  document.getElementById("chkslider_visible").checked = true;
				  $("#txthtml_element").val("");
				  $("#td-percent").hide();

				  if (xhr.responseText!="0")
				  	$("#error-home").html("You can have maximum 4 images.");
				  else
				  {
				  	retrieve_home();
				  	$("#btcancel_home").trigger("click");
				  }
				} else {  
				  $("#error-home").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", file.fileName);
			xhr.setRequestHeader("X-File-Size", file.fileSize);
			xhr.setRequestHeader("X-File-Type", file.type);
			
			// Send the file (doh)
			xhr.send(file);
		
		}else{
			$("#error_home").html("Your browser doesnt support FileReader object");
		} 		
	}

	var uploadFilePictureHow = function(file)
	{
		// $.ajax({
		// 	url:base_url+"home/insert_how",
		// 	dataType:"html",
		// 	type:"POST",
		// 	data:"pict="+pict+"&title="+title+"&text="+text,
		// 	success: function(result)
		// 	{
		// 		//Clear Insert
		// 		$("#txthow_title").val("");
		// 		$("#cbIcon").val("icon-mobile");
		// 		$("#iIcon").attr("class","icon-mobile");
		// 		$("#txthow_text").val("");
									
		// 		//retrieve
		// 		retrieve_how();
				
		// 		//Close
		// 		$("#btcancel_how").trigger("click");
		// 	}
		// });

		var filename=$("#fnhow_image").val();
		var name=$("#txthow_title").val();
		var url=$("#txthow_url").val();
		var content=$("#txthow_text").val();
		
		$("#td-percent-how").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
		}
		reader.readAsDataURL(file);
		
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_how?title="+name+"&text="+content+"&url="+url, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent-how").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-home").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			if (xhr.readyState === 4) 
			{  
				if (xhr.status === 200) 
				{  
				  $("#percent-how").html("100%");
				  
				  //Clean everything..
				  $("#txthow_title").val("");
				  $("#txthow_url").val("");
				  $("#fnhow_image").val("");
				  $("#txthow_text").val("");
				  $("#td-percent-how").hide();
				  retrieve_how();
				  $("#btcancel_how").trigger("click");
				} else {  
				  $("#error-how").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", file.fileName);
			xhr.setRequestHeader("X-File-Size", file.fileSize);
			xhr.setRequestHeader("X-File-Type", file.type);
			
			// Send the file (doh)
			xhr.send(file);
		
		}else{
			$("#error_home").html("Your browser doesnt support FileReader object");
		} 		
	}


	 // Why Us ?

	$(".btwhy-up").click(function(e) 
	{
        var whyID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_why_up?whyid="+whyID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_why();
			}
		});
    });
	
	$(".btwhy-down").click(function(e) 
	{
        var whyID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_why_down?whyid="+whyID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_why();
			}
		});
    });

    $(".btedit-why").click(function(e) {
		var id=$(this).attr("data-id");
		var pict=$(this).attr("data-pict");
		var title=$(this).attr("data-title");
		var side=$(this).attr("data-side");
		var text=$(this).attr("data-text");
		
		$("#btadd_why").hide();
		$("#why-scroll").hide();
		$("#edit_why").fadeIn("fast");
		
		//set data to component
		$("#hid_id_why").val(id);
		$("#cbedwhyIcon").val(pict);
		$("#iedwhyIcon").attr("class",pict);
		$("#cbedSide").val(side);
		$("#txtedwhy_title").val(title);
		$("#txtedwhy_text").val(text);
    });

    
    $(".btdelete-why").click(function(e) {
    	var id_why=$(this).attr("data-id");
		
		var conf=confirm("Are you sure want to delete this points?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/remove_why?id="+id_why,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					console.log(result);
					if (result=="")
					{
						alert("Point removed successfully.");
						retrieve_why();
					}
				}
			});
		}
    }); 

	$("#cbwhyIcon").change(function(e)
	{
		$("#iwhyIcon").attr("class", $("#cbwhyIcon").val());
	});

	$("#cbedwhyIcon").change(function(e)
	{
		$("#iedwhyIcon").attr("class", $("#cbedwhyIcon").val());
	});

	$("#btadd_why").click(function(e) {
        $("#btadd_why").hide();
		$("#why-scroll").hide();
        $("#upload_why").fadeIn("fast");
    });
	
	$("#btcancel_why").click(function(e) {
        $("#btadd_why").fadeIn("fast");
		$("#why-scroll").fadeIn("fast");
        $("#upload_why").hide();
    });
	
	$("#btcanceled_why").click(function(e) {
        $("#btadd_why").fadeIn("fast");
		$("#why-scroll").fadeIn("fast");
        $("#edit_why").hide();
    });
	
	$("#btsaveed_why").click(function(e) 
	{
    	var id = $("#hid_id_why").val();
		var pict = $("#cbedwhyIcon").val();
		var side = $("#cbedSide").val();
		var title = $("#txtedwhy_title").val();
		var text = $("#txtedwhy_text").val();
		
		if (pict=="")
			$("#error-edit-why").html("Please choose icon first."); 
		else if (title=="")
			$("#error-edit-why").html("Please fill title first.");
		else if (side=="")
			$("#error-edit-why").html("Please choose side first.");
		else if (text=="")
			$("#error-edit-why").html("Please fill why-text first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_why",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&pict="+pict+"&side="+ side + "&title="+title+"&text="+text,
				success: function(result)
				{
					retrieve_why();
					//Close
					$("#btcanceled_why").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_why").click(function(e) 
	{
		var pict = $("#cbIcon").val();
		var side = $("#cbSide").val();
		var title = $("#txtwhy_title").val();
		var text = $("#txtwhy_text").val();;
		
		if (pict=="")
			$("#error-why").html("Please fill icon first."); 
		else if (side=="")
			$("#error-why").html("Please fill side first."); 
		else if (title=="")
			$("#error-why").html("Please fill title first.");
		else if (text=="")
			$("#error-why").html("Please fill why-text first.");
		else
		{
			$.ajax({
				url:base_url+"home/insert_why",
				dataType:"html",
				type:"POST",
				data:"pict="+pict+"&side=" + side + "&title="+title+"&text="+text,
				success: function(result)
				{
					//Clear Insert
					$("#txtwhy_title").val("");
					$("#cbIcon").val("icon-mobile");
					$("#iIcon").attr("class","icon-mobile");
					$("#cbside").val("L");
					$("#txtwhy_text").val("");
										
					//retrieve
					retrieve_why();
					
					//Close
					$("#btcancel_why").trigger("click");
				}
			});
		}
    });

    // Pricing Plan Section

    $(".btplan-up").click(function(e) 
	{
        var planID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_plan_up?planid="+planID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_plan();
			}
		});
    });
	
	$(".btplan-down").click(function(e) 
	{
        var planID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_plan_down?planid="+planID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_plan();
			}
		});
    });

	$(".btedit-plan").click(function(e) {
		var id=$(this).attr("data-id");
		var plan_name=$(this).attr("data-name");
		var currency=$(this).attr("data-currency");
		var price=$(this).attr("data-price");
		var pereach=$(this).attr("data-pereach")
		
		$("#btadd_plan").hide();
		$("#plan-scroll").hide();
		$("#edit_plan").fadeIn("fast");
		
		//set data to component
		$("#hid_id_plan").val(id);
		$("#txtedplan_name").val(plan_name);
		$("#txtedcurrency").val(currency);
		$("#txtedplan_price").val(price);
		$("#txtedper_each").val(pereach);
    });

	$(".btdelete-plan").click(function(e) {
		var ID_plan=$(this).attr("data-id");
		
		var conf=confirm("Are you sure want to delete this pricing plan ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/remove_plan?id="+ID_plan,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("Pricing plan removed successfully.");
						retrieve_plan();
					}
				}
			});
		}
	});

	$("#btadd_plan").click(function(e) {
        $("#btadd_plan").hide();
		$("#plan-scroll").hide();
        $("#upload_plan").fadeIn("fast");
    });
	
	$("#btcancel_plan").click(function(e) {
        $("#btadd_plan").fadeIn("fast");
		$("#plan-scroll").fadeIn("fast");
        $("#upload_plan").hide();
    });
	
	$("#btcanceled_plan").click(function(e) {
        $("#btadd_plan").fadeIn("fast");
		$("#plan-scroll").fadeIn("fast");
        $("#edit_plan").hide();
    });
	
	$("#btsaveed_plan").click(function(e) 
	{
    	var id = $("#hid_id_plan").val();
		var name = $("#txtedplan_name").val();
		var currency = $("#txtedcurrency").val();
		var price = $("#txtedplan_price").val();
		var pereach = $("#txtedper_each").val();
		
		if (name=="")
			$("#error-edit-plan").html("Please fill plan name first."); 
		else if (currency=="")
			$("#error-edit-plan").html("Please fill currency first.");
		else if (price=="")
			$("#error-edit-plan").html("Please fill price first.");
		else if (pereach=="")
			$("#error-edit-plan").html("Please fill per each first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_plan",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&name="+name+"&currency="+currency+"&price="+price+"&pereach=" + pereach,
				success: function(result)
				{
					console.log(result);
					retrieve_plan();
					//Close
					$("#btcanceled_plan").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_plan").click(function(e) 
	{
		var name = $("#txtplan_name").val();
		var currency = $("#txtcurrency").val();
		var price = $("#txtplan_price").val();
		var pereach = $("#txtper_each").val();
		
		if (name=="")
			$("#error-edit-plan").html("Please fill plan name first."); 
		else if (currency=="")
			$("#error-edit-plan").html("Please fill currency first.");
		else if (price=="")
			$("#error-edit-plan").html("Please fill price first.");
		else if (pereach=="")
			$("#error-edit-plan").html("Please fill per each first.");
		else
		{
			$.ajax({
				url:base_url+"home/insert_plan",
				dataType:"html",
				type:"POST",
				data:"name="+name+"&currency="+currency+"&price="+price+"&pereach=" + pereach,
				success: function(result)
				{
					//Clear Insert
					$("#txtplan_name").val("");
					$("#txtcurrency").val("");
					$("#txtplan_price").val("");
					$("#txtper_each").val("");

					//retrieve
					retrieve_plan();
					
					//Close
					$("#btcancel_plan").trigger("click");
				}
			});
		}
    });

	// Detail Item
	$("#btsave_detail").click(function(e) 
	{
		var id_plan = $("#hid_id_detail").val();
		var detail_text = $("#txtdetail_text").val();
		
		if (detail_text=="")
			$("#error-detail").html("Please fill detail text first.");
		else
		{
			$.ajax({
				url:base_url+"home/insert_detail_plan",
				dataType:"html",
				type:"POST",
				data:"id="+id_plan+"&detail_text="+detail_text,
				success: function(result)
				{
					//Clear Insert
					$("#txtdetail_text").val("");

					//retrieve
					retrieve_detail(id_plan);
					retrieve_plan();
				}
			});
		}
    });

	$("#btclear_detail").click(function(e) 
	{
		$("#txtdetail_text").val("");
    });

    // Portfolio Category

	$(".btcategory-up").click(function(e) 
	{
        var categoryID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_category_up?categoryid="+categoryID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_category();
			}
		});
    });
	
	$(".btcategory-down").click(function(e) 
	{
        var categoryID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_category_down?categoryid="+categoryID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_category();
			}
		});
    });

    $(".btedit-category").click(function(e) {
		var id=$(this).attr("data-id");
		var code=$(this).attr("data-code");
		var name=$(this).attr("data-name");
		var visible = $(this).attr("data-visible");
		
		$("#btadd_category").hide();
		$("#category-scroll").hide();
		$("#edit_category").fadeIn("fast");
		
		//set data to component
		$("#hid_id_category").val(id);
		$("#txtedcategory_code").val(code);
		$("#txtedcategory_name").val(name);
		$("#chkedVisible").prop("checked",visible == "1");
    });

    
    $(".btdelete-category").click(function(e) {
    	var id_category=$(this).attr("data-id");
		
		var conf=confirm("Are you sure want to delete this category?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/remove_category?id="+id_category,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					console.log(result);
					if (result=="")
					{
						alert("Category removed successfully.");
						retrieve_category();
					}
				}
			});
		}
    }); 

	$("#btadd_category").click(function(e) {
        $("#btadd_category").hide();
		$("#category-scroll").hide();
        $("#upload_category").fadeIn("fast");
    });
	
	$("#btcancel_category").click(function(e) {
        $("#btadd_category").fadeIn("fast");
		$("#category-scroll").fadeIn("fast");
        $("#upload_category").hide();
    });
	
	$("#btcanceled_category").click(function(e) {
        $("#btadd_category").fadeIn("fast");
		$("#category-scroll").fadeIn("fast");
        $("#edit_category").hide();
    });
	
	$("#btsaveed_category").click(function(e) 
	{
    	var id = $("#hid_id_category").val();
		var code = $("#txtedcategory_code").val();
		var name = $("#txtedcategory_name").val();
		var visible = ($("#chkedVisible").prop("checked") == true) ? "1" : "0";
		
		if (code=="")
			$("#error-edit-category").html("Please fill category code first."); 
		else if (name=="")
			$("#error-edit-category").html("Please fill category name first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_category",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&code="+code+"&name="+ name + "&is_active="+visible,
				success: function(result)
				{
					retrieve_category();
					//Close
					$("#btcanceled_category").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_category").click(function(e) 
	{
		var code = $("#txtcategory_code").val();
		var name = $("#txtcategory_name").val();
		var visible = ($("#chkVisible").prop("checked") == true) ? "1" : "0";
		
		if (code=="")
			$("#error-edit-category").html("Please fill category code first."); 
		else if (name=="")
			$("#error-edit-category").html("Please fill category name first.");
		else
		{
			$.ajax({
				url:base_url+"home/insert_category",
				dataType:"html",
				type:"POST",
				data:"code="+code+"&name=" + name + "&is_active="+visible,
				success: function(result)
				{
					//Clear Insert
					$("#txtcategory_code").val("");
					$("#txtcategory_name").val("");
					$("#chkVisible").prop("checked", true);
										
					//retrieve
					retrieve_category();
					
					//Close
					$("#btcancel_category").trigger("click");
				}
			});
		}
    });


	// Blog Section

	$(".btedit-news").click(function(e) {
		var id=$(this).attr("data-id");
		var title=$(this).attr("data-title");
		var link=$(this).attr("data-link");
		var creator=$(this).attr("data-creator");
		var visible=$(this).attr("data-visible");
		var blogText = $(this).attr("data-text");

		$("#btadd_news").hide();
		$("#news-scroll").hide();
		$("#edit_news").fadeIn("fast");
		
		//set data to component
		$("#hid_id_news").val(id);
		$("#txtedtitle").val(title);
		$("#txtedlink").val(link);
		$("#txtedcreator").val(creator);
		CKEDITOR.instances.txtblogText.setData(blogText);
		$("#chkedblogVisible").prop("checked", (visible == "1"));
    });

	$(".btdelete-news").click(function(e) {
		var ID_blog=$(this).attr("data-id");
		var filename = $(this).attr("data-value");
		var conf=confirm("Are you sure want to delete this news ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/delete_news?id="+ID_blog+"&filename=" + filename,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("News removed successfully.");
						retrieve_news();
					}
				}
			});
		}
	});

	$(".btchangepic-how").click(function(e)
	{
		var id=$(this).attr("data-id");
		var fnchhow=$(".fnchhow[data-id='"+id+"']");
		fnchhow.click();
	});

	$(".fnchhow").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileHowEdit(file,id);
		}
	});

	$(".btchangepic-test").click(function(e)
	{
		var id=$(this).attr("data-id");
		var fnchpic=$(".fnchtest[data-id='"+id+"']");
		fnchpic.click();
	});

	$(".fnchtest").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileTestimoniEdit(file,id);
		}
	});

	$(".btchangepic-news").click(function(e)
	{
		var id=$(this).attr("data-id");
		var fnchpic=$(".fnchimg[data-id='"+id+"']");
		fnchpic.click();
	});

	$(".fnchimg").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileImageEdit(file,id);
		}
	});

	$("#btadd_news").click(function(e) {
        $("#btadd_news").hide();
		$("#news-scroll").hide();
        $("#upload_news").fadeIn("fast");
        CKEDITOR.instances.txtblogText.setData("");
    });
	
	$("#btcancel_news").click(function(e) {
        $("#btadd_news").fadeIn("fast");
		$("#news-scroll").fadeIn("fast");
        $("#upload_news").hide();
    });
	
	$("#btcanceled_news").click(function(e) {
        $("#btadd_news").fadeIn("fast");
		$("#news-scroll").fadeIn("fast");
        $("#edit_news").hide();
    });
	
	$("#btsaveed_news").click(function(e) 
	{
    	var id = $("#hid_id_news").val();
		var title = $("#txtedtitle").val();
		var link = $("#txtedlink").val();
		var creator = $("#txtedcreator").val();
		var visible = ($("#chkedblogVisible").prop("checked") == true) ? "1" : "0";
		var blogText = CKEDITOR.instances.txtblogText.getData();
		
		if (title=="")
			$("#error-edit-news").html("Please fill news title first."); 
		else if (creator == "") 
			$("#error-edit-news").html("Please fill news creator first."); 
		else
		{
			$.ajax({
				url:base_url+"home/edit_news",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&title="+title+"&link="+link+"&creator="+creator+"&visible="+visible+"&blogText=" + escape(blogText),
				success: function(result)
				{
					console.log(result);
					retrieve_news();
					//Close
					$("#btcanceled_news").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_news").click(function(e) 
	{
		var filename=$("#fnnews_image").val();
		var title = $("#txttitle").val();
		var link = $("#txtlink").val();
		var creator = $("#txtcreator").val();
		var visible = ($("#chkblogVisible").prop("checked") == true) ? "1" : "0";
		var blogText = CKEDITOR.instances.txtblogText.getData();

		//Clean error
		$("#error-news").html("");
		if (filename=="")
			$("#error-news").html("Please attach the picture first.");
		else if (title=="")
			$("#error-news").html("Please fill news title first."); 
		else if (creator == "") 
			$("#error-news").html("Please fill news creator first."); 
		else 
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnnews_image").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-news").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-news").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileImage(file);
		}
    });


    var uploadFileImage = function(file)
	{
		var filename=$("#fnnews_image").val();
		var title = $("#txttitle").val();
		var link = $("#txtlink").val();
		var creator = $("#txtcreator").val();
		var visible = ($("#chkblogVisible").prop("checked") == true) ? "1" : "0";
		var blogText = CKEDITOR.instances.txtblogText.getData();
		
		$("#td-percent-news").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
		}
		reader.readAsDataURL(file);
		
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_blog?title="+title+"&link="+link+"&creator="+creator+"&visible="+visible+"&blogText="+escape(blogText), true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent-news").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-news").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent-news").html("100%");
				  
				  //Clean everything..
				  $("#error-news").html("");
				  $("#txttitle").val("");
				  $("#txtlink").val("");
				  $("#txtcreator").val("");
				  $("#fnnews_image").val("");
				  clearAll();
				  document.getElementById("chkblogVisible").checked = true;
				  $("#txthtml_element").val("");
				  $("#td-percent-news").hide();

			  	  retrieve_news();
			  	  $("#btcancel_news").trigger("click");
				} else {  
				  $("#error-news").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", file.fileName);
			xhr.setRequestHeader("X-File-Size", file.fileSize);
			xhr.setRequestHeader("X-File-Type", file.type);
			
			// Send the file (doh)
			xhr.send(file);
		
		}else{
			$("#error_news").html("Your browser doesnt support FileReader object");
		} 		
	}


	// Our Team Section

	$(".btteam-up").click(function(e) 
	{
        var teamID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_team_up?ID_team="+teamID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_team();
			}
		});
    });
	
	$(".btteam-down").click(function(e) 
	{
        var teamID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_team_down?ID_team="+teamID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_team();
			}
		});
    });

	$(".btedit-team").click(function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var position=$(this).attr("data-position");
		var fb_link = $(this).attr("data-fb");
		var twitter_link = $(this).attr("data-twitter");
		var linkedin_link = $(this).attr("data-linkedin");

		$("#btadd_team").hide();
		$("#team-scroll").hide();
		$("#edit_team").fadeIn("fast");
		
		//set data to component
		$("#hid_id_team").val(id);
		$("#txtedteam_name").val(name);
		$("#txtedposition").val(position);
		$("#txtedfb_link").val(fb_link);
		$("#txtedtwitter_link").val(twitter_link);
		$("#txtedlinkedin_link").val(linkedin_link);
    });

	$(".btdelete-team").click(function(e) {
		var ID_team = $(this).attr("data-id");
		var filename = $(this).attr("data-value");
		var conf=confirm("Are you sure want to delete this member ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/delete_team?id="+ID_team+"&filename=" + filename,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("Team member removed successfully.");
						retrieve_team();
					}
				}
			});
		}
	});

	$(".btchangepic-team").click(function(e)
	{
		var id=$(this).attr("data-id");
		var fnchpic=$(".fnchphoto[data-id='"+id+"']");
		fnchpic.click();
	});

	$(".fnchphoto").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePhotoEdit(file,id);
		}
	});

	$("#btadd_team").click(function(e) {
        $("#btadd_team").hide();
		$("#team-scroll").hide();
        $("#upload_team").fadeIn("fast");
    });
	
	$("#btcancel_team").click(function(e) {
        $("#btadd_team").fadeIn("fast");
		$("#team-scroll").fadeIn("fast");
        $("#upload_team").hide();
    });
	
	$("#btcanceled_team").click(function(e) {
        $("#btadd_team").fadeIn("fast");
		$("#team-scroll").fadeIn("fast");
        $("#edit_team").hide();
    });
	
	$("#btsaveed_team").click(function(e) 
	{
    	var id = $("#hid_id_team").val();
		var name = $("#txtedteam_name").val();
		var position = $("#txtedposition").val();
		var fb = $("#txtedfb_link").val();
		var twitter = $("#txtedtwitter_link").val();
		var linkedin = $("#txtedlinkedin_link").val();
		
		if (name=="")
			$("#error-edit-team").html("Please fill member name first."); 
		else if (position == "") 
			$("#error-edit-team").html("Please fill position name first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_team",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&name="+name+"&position="+position+"&fb="+fb+"&twitter="+twitter+"&linkedin="+linkedin,
				success: function(result)
				{
					console.log(result);
					retrieve_team();
					//Close
					$("#btcanceled_team").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_team").click(function(e) 
	{
		var filename=$("#fnteam_photo").val();
		var name = $("#txtteam_name").val();
		var position = $("#txtposition").val();
		var fb = $("#txtfb_link").val();
		var twitter = $("#txttwitter_link").val();
		var linkedin = $("#txtlinkedin_link").val();
		
		//Clean error
		$("#error-team").html("");
		if (name=="")
			$("#error-team").html("Please fill member name first."); 
		else if (position == "") 
			$("#error-team").html("Please fill position name first.");
		else 
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnteam_photo").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-team").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-team").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePhoto(file);
		}
    });


    var uploadFilePhoto = function(file)
	{
		var filename=$("#fnteam_photo").val();
		var name = $("#txtteam_name").val();
		var position = $("#txtposition").val();
		var fb = $("#txtfb_link").val();
		var twitter = $("#txttwitter_link").val();
		var linkedin = $("#txtlinkedin_link").val();
		
		$("#td-percent-team").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
		//alert("uploading "+file.name);  
		reader = new FileReader();
		reader.onload = function(e){
		}
		reader.readAsDataURL(file);
		
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_team?name="+name+"&position="+position+"&fb="+fb+"&twitter="+twitter+"&linkedin="+linkedin, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent-team").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-team").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent-team").html("100%");
				  
				  //Clean everything..
				  $("#error-team").html("");
				  $("#txtteam_name").val("");
				  $("#txtposition").val("");
				  $("#txtfb_link").val("");
				  $("#txttwitter_link").val("");
				  $("#txtlinkedin_link").val("");
				  $("#td-percent-team").hide();

			  	  retrieve_team();
			  	  $("#btcancel_team").trigger("click");
				} else {  
				  $("#error-team").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", file.fileName);
			xhr.setRequestHeader("X-File-Size", file.fileSize);
			xhr.setRequestHeader("X-File-Type", file.type);
			
			// Send the file (doh)
			xhr.send(file);
		
		}else{
			$("#error_team").html("Your browser doesnt support FileReader object");
		} 		
	}


	// Our Portfolio Section
	$(".btndetail-portfolio").click(function(e){
		var id = $(this).attr("data-id");
		tempImageID = id;
		collapse_all();
		retrieve_detail_portfolio(id);
		$("#manage-detail-portfolio-box").show();
        $("#manage-detail-portfolio-box").animate({left:'0'},140);
	});

    $("#close-detail-portfolio").click(function(e)
    {
    	$("#manage-detail-portfolio-box").animate({left:'-280'},140);
		window.setTimeout(function(){ $("#manage-detail-portfolio-box").hide();},140);
    });

	$(".btportfolio-up").click(function(e) 
	{
        var imageID=$(this).attr("data-id");
		var index=$(this).attr("data-value");

		$.ajax({
			url:base_url+"home/move_img_up?imageid="+imageID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_portfolio();
			}
		});
    });
	
	$(".btportfolio-down").click(function(e) 
	{
        var imageID=$(this).attr("data-id");
		var index=$(this).attr("data-value");
		$.ajax({
			url:base_url+"home/move_img_down?imageid="+imageID+"&index="+index,
			dataType:"html",
			type:"GET",
			success: function(result)
			{
				retrieve_portfolio();
			}
		});
    });

	$(".btedit-portfolio").click(function(e) {
		flagAdd = false;
		flagDetail = false;
		var id=$(this).attr("data-id");
		var title=$(this).attr("data-title");
		var category=$(this).attr("data-category");
		var desc = $(this).attr("data-desc");
		var visible = $(this).attr("data-visible");

		$("#btadd_portfolio").hide();
		$("#portfolio-scroll").hide();
		$("#edit_portfolio").fadeIn("fast");
		
		//set data to component
		$("#hid_id_portfolio").val(id);
		$("#txtedimgtitle").val(title);
		$("#cbedImgCategory").val(category);
		$("#txtedimgdesc").val(desc);
		$("#chkedImgVisible").prop("checked", (visible == "1"));
    });

	$(".btdelete-portfolio").click(function(e) {
		var ID_portfolio = $(this).attr("data-id");
		var filename = $(this).attr("data-value");
		var conf=confirm("Are you sure want to delete this portfolio ?");
		if (conf==true)
		{
			$.ajax({
				url:base_url+"home/delete_portfolio?id="+ID_portfolio+"&filename=" + filename,
				dataType:"html",
				type:"GET",
				success: function(result)
				{
					if (result=="")
					{
						alert("Portfolio removed successfully.");
						retrieve_portfolio();
					}
				}
			});
		}
	});

	$(".btchangepic-portfolio").click(function(e)
	{
		flagAdd = false;
		var id=$(this).attr("data-id");
		var fnchpic=$(".fnchport[data-id='"+id+"']");
		fnchpic.click();
	});

	$(".fnchport").change(function(e)
	{
		var id=$(this).attr("data-id");
		var path=$(this).val();
		if (path!="")
		{
			var imageType = /image.*/;  
			var file = this.files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  alert("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  alert("File \""+file.name+"\" maximum " + (max_size / 1024) + " KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePortEdit(file,id);
		}
	});

	$("#btadd_portfolio").click(function(e) {
		flagAdd = true;
		flagDetail = false;
        $("#btadd_portfolio").hide();
		$("#portfolio-scroll").hide();
        $("#upload_portfolio").fadeIn("fast");
    });
	
	$("#btcancel_portfolio").click(function(e) {
        $("#btadd_portfolio").fadeIn("fast");
		$("#portfolio-scroll").fadeIn("fast");
        $("#upload_portfolio").hide();
    });
	
	$("#btcanceled_portfolio").click(function(e) {
        $("#btadd_portfolio").fadeIn("fast");
		$("#portfolio-scroll").fadeIn("fast");
        $("#edit_portfolio").hide();
    });
	
	$("#btsaveed_portfolio").click(function(e) 
	{
    	var id = $("#hid_id_portfolio").val();
		var title=$("#txtedimgtitle").val();
		var category=$("#cbedImgCategory").val();
		var desc = $("#txtedimgdesc").val();
		var visible = ($("#chkedImgVisible").prop("checked") == true) ? 1 : 0;
		
		if (title=="")
			$("#error-edit-portfolio").html("Please fill title first."); 
		else if (category == "") 
			$("#error-edit-portfolio").html("Please fill category first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_portfolio",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&title="+title+"&category="+category+"&desc="+desc+"&visible="+visible,
				success: function(result)
				{
					console.log(result);
					retrieve_portfolio();
					//Close
					$("#btcanceled_portfolio").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_portfolio").click(function(e) 
	{
		var filename=$("#fnimg_photo").val();
		var title=$("#txtimgtitle").val();
		var category=$("#cbImgCategory").val();
		var desc = $("#txtimgdesc").val();
		var visible = ($("#chkImgVisible").prop("checked") == true) ? 1 : 0;
		
		//Clean error
		$("#error-portfolio").html("");
		if (title=="")
			$("#error-portfolio").html("Please fill title first."); 
		else if (category == "") 
			$("#error-portfolio").html("Please fill category first.");
		else if (filename == "")
			$("#error-portfolio").html("Please attach photo first.");
		else 
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fnimg_photo").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-portfolio").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-portfolio").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFilePort(file);
		}
    });

	function addCrop() { 
		var title=$("#txtimgtitle").val();
		var category=$("#cbImgCategory").val();
		var desc = $("#txtimgdesc").val();
		var visible = ($("#chkImgVisible").prop("checked") == true) ? 1 : 0;

		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_img?title="+title+"&category="+category+"&desc="+desc+"&visible="+visible, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent-portfolio").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-portfolio").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent-portfolio").html("100%");
				  
				  // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
				 cropper.getCroppedCanvas({ width: 780, height: 508 }).toBlob(function (blob) {
				 var formData = new FormData();

				 formData.append('croppedImage', blob);
				 // Use `jQuery.ajax` method
				 $.ajax(base_url + 'home/update_thumb_image?name=' + xhr.responseText, {
					    method: "POST",
					    data: formData,
					    processData: false,
					    contentType: false,
					    success: function (result) {
					      	console.log('Upload success');

					      	//Clean everything..
						  	$("#error-portfolio").html("");
						  	$("#txtimgtitle").val("");
						  	$("#fnimg_photo").val("");
						  	$("#cbImgCategory option:nth(0)").prop("selected", true);
						  	$("#txtimgdesc").val("");
						  	$("#chkImgVisible").prop("checked", true);
						  	$("#td-percent-portfolio").hide();

					      	retrieve_portfolio();
					      	$("#cropping").modal("hide");
					    },
					    error: function (result) {
					      console.log('Upload error');
					    }
					  });
					});

				  
			  	  $("#btcancel_portfolio").trigger("click");
				} else {  
				  $("#error-portfolio").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", tempFile.fileName);
			xhr.setRequestHeader("X-File-Size", tempFile.fileSize);
			xhr.setRequestHeader("X-File-Type", tempFile.type);
			
			// Send the file (doh)
			xhr.send(tempFile);
	}

	function editCrop() {
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/update_image?id="+tempID, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

			}
			else {
				alert("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  

				 // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
				 cropper.getCroppedCanvas({ width: 780, height: 508 }).toBlob(function (blob) {
				 var formData = new FormData();

				 formData.append('croppedImage', blob);
				 // Use `jQuery.ajax` method
				 $.ajax(base_url + 'home/update_thumb_image?name=' + xhr.responseText, {
					    method: "POST",
					    data: formData,
					    processData: false,
					    contentType: false,
					    success: function (result) {
					      	console.log('Upload success');
					      	retrieve_portfolio();
					      	$("#cropping").modal("hide");
					    },
					    error: function (result) {
					      console.log('Upload error');
					    }
					  });
					});

			  alert("Changes saved successfully.");
			  
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", tempFile.fileName);
		xhr.setRequestHeader("X-File-Size", tempFile.fileSize);
		xhr.setRequestHeader("X-File-Type", tempFile.type);
		
		// Send the file (doh)
		xhr.send(tempFile);
	}

	$("#btnCrop").click(function(e) {
		if (flagDetail == false) {
			if (flagAdd == true) 
				addCrop();
			else
				editCrop();
		} else {
			if (flagAdd == true) 
				addCropDetail();
			else
				editCropDetail();
		}
		alert("Data saved successfully.");
	});

    var uploadFilePort = function(file)
	{
		var filename=$("#fnimg_photo").val();
		var title=$("#txtimgtitle").val();
		var category=$("#cbImgCategory").val();
		var desc = $("#txtimgdesc").val();
		var visible = ($("#chkImgVisible").prop("checked") == true) ? 1 : 0;
		tempFile = file;

		$("#td-percent-portfolio").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
			//alert("uploading "+file.name);  
			reader = new FileReader();
			reader.onload = function(e){
				document.getElementById("imgCrop").src = reader.result;
				blobURL = URL.createObjectURL(file);
	          	$("#cropping").modal("show");
			}
			reader.readAsDataURL(file);
		} else{
			$("#error_portfolio").html("Your browser doesnt support FileReader object");
		}
	}


	// Manage Detail Portfolio

	$("#btadd_detail_portfolio").click(function(e) {
		flagDetail = true;
		flagAdd = true;
        $("#btadd_detail_portfolio").hide();
		$("#detail-portfolio-scroll").hide();
        $("#upload_detail_portfolio").fadeIn("fast");
    });
	
	$("#btcancel_detail_portfolio").click(function(e) {
        $("#btadd_detail_portfolio").fadeIn("fast");
		$("#detail-portfolio-scroll").fadeIn("fast");
        $("#upload_detail_portfolio").hide();
    });
	
	$("#btcanceled_detail_portfolio").click(function(e) {
        $("#btadd_detail_portfolio").fadeIn("fast");
		$("#detail-portfolio-scroll").fadeIn("fast");
        $("#edit_detail_portfolio").hide();
    });
	
	$("#btsaveed_detail_portfolio").click(function(e) 
	{
    	var id = $("#hid_id_detail_portfolio").val();
		var title=$("#txteddetimgtitle").val();
		var image=$("#hid_id_image_port").val();
		var desc = $("#txteddetimgdesc").val();
		var visible = ($("#chkeddetImgVisible").prop("checked") == true) ? 1 : 0;
		
		if (title=="")
			$("#error-edit-detail-portfolio").html("Please fill title first.");
		else
		{
			$.ajax({
				url:base_url+"home/edit_detail_portfolio",
				dataType:"html",
				type:"POST",
				data:"id="+id+"&title="+title+"&image="+image+"&desc="+desc+"&visible="+visible,
				success: function(result)
				{
					console.log(result);
					retrieve_detail_portfolio(image);
					//Close
					$("#btcanceled_detail_portfolio").trigger("click");
				}
			});
		}
    });
	
	$("#btsave_detail_portfolio").click(function(e) 
	{
		var filename=$("#fndetimg_photo").val();
		var title=$("#txtdetimgtitle").val();
		var image=tempImageID;
		var desc = $("#txtdetimgdesc").val();
		var visible = ($("#chkDetImgVisible").prop("checked") == true) ? 1 : 0;
		
		//Clean error
		$("#error-detail-portfolio").html("");
		if (title=="")
			$("#error-detail-portfolio").html("Please fill title first.");
		else if (filename == "")
			$("#error-detail-portfolio").html("Please attach photo first.");
		else 
		{
			var imageType = /image.*/;  
			var file = document.getElementById("fndetimg_photo").files[0];
			
			
			// check file type
			if (!file.type.match(imageType)) {  
			  $("#error-detail-portfolio").html("File \""+file.name+"\" is not a valid image file.");
			  return false;	
			} 
			// check file size
			if (parseInt(file.size / 1024) > max_size) {  
			  $("#error-detail-portfolio").html("File \""+file.name+"\" maximum "+ (max_size/1024) +" KB.");
			  return false;	
			} 
			var size=file.size/1024;
			uploadFileDetPort(file);
		}
    });

	var uploadFileDetPort = function(file)
	{
		var filename=$("#fndetimg_photo").val();
		var title=$("#txtdetimgtitle").val();
		var image = tempImageID;
		var desc = $("#txtdetimgdesc").val();
		var visible = ($("#chkDetImgVisible").prop("checked") == true) ? 1 : 0;
		tempFile = file;

		$("#td-percent-detail-portfolio").show();
		// check if browser supports file reader object 
		if (typeof FileReader !== "undefined"){
			//alert("uploading "+file.name);  
			reader = new FileReader();
			reader.onload = function(e){
				document.getElementById("imgCrop").src = reader.result;
				blobURL = URL.createObjectURL(file);
	          	$("#cropping").modal("show");
			}
			reader.readAsDataURL(file);
		} else{
			$("#error_detail_portfolio").html("Your browser doesnt support FileReader object");
		}
	}

	function addCropDetail() { 
		var title=$("#txtdetimgtitle").val();
		var image = tempImageID;
		var desc = $("#txtdetimgdesc").val();
		var visible = ($("#chkDetImgVisible").prop("checked") == true) ? 1 : 0;

		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/insert_detail_img?title="+title+"&image="+image+"&desc="+desc+"&visible="+visible, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

				$("#percent-detail-portfolio").html(((event.loaded / event.total) * 100).toFixed() + "%");
			}
			else {
				$("#error-detail-portfolio").html("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
			 if (xhr.readyState === 4) {  
				if (xhr.status === 200) 
				{  
				  $("#percent-detail-portfolio").html("100%");

				  // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
				 cropper.getCroppedCanvas({ width: 780, height: 540 }).toBlob(function (blob) {
				 var formData = new FormData();

				 formData.append('croppedImage', blob);
				 // Use `jQuery.ajax` method
				 $.ajax(base_url + 'home/update_thumb_image?name=' + xhr.responseText, {
					    method: "POST",
					    data: formData,
					    processData: false,
					    contentType: false,
					    success: function (result) {
					      	console.log('Upload success');
					      	//Clean everything..
						  	$("#error-detail-portfolio").html("");
						  	$("#txtdetimgtitle").val("");
						  	$("#fndetimg_photo").val("");
						  	$("#txtdetimgdesc").val("");
						  	$("#chkDetImgVisible").prop("checked", true);
						  	$("#td-percent-detail-portfolio").hide();

					      	retrieve_detail_portfolio(tempImageID);
					      	$("#cropping").modal("hide");
					    },
					    error: function (result) {
					      console.log('Upload error');
					    }
					  });
					});

				  
			  	  $("#btcancel_detail_portfolio").trigger("click");
				} else {  
				  $("#error-detail-portfolio").html("Error "+ xhr.statusText);  
				}  
			  }  
			};  
			
			// Set headers
			xhr.setRequestHeader("X-File-Name", tempFile.fileName);
			xhr.setRequestHeader("X-File-Size", tempFile.fileSize);
			xhr.setRequestHeader("X-File-Type", tempFile.type);
			
			// Send the file (doh)
			xhr.send(tempFile);
	}

	function editCropDetail() {
		xhr = new XMLHttpRequest();
		xhr.open("post", base_url+"home/update_detail_image?id="+tempID, true);
		
		xhr.upload.addEventListener("progress", function (event) {
			console.log(event);
			if (event.lengthComputable) {

			}
			else {
				alert("Failed to compute file upload length");
			}
		}, false);
		
		xhr.onreadystatechange = function (oEvent) 
		{  
		 if (xhr.readyState === 4) {  
			if (xhr.status === 200) 
			{  

				 // Upload cropped image to server if the browser supports `HTMLCanvasElement.toBlob`
				 cropper.getCroppedCanvas({ width: 780, height: 540 }).toBlob(function (blob) {
				 var formData = new FormData();

				 formData.append('croppedImage', blob);
				 // Use `jQuery.ajax` method
				 $.ajax(base_url + 'home/update_thumb_image?name=' + xhr.responseText, {
					    method: "POST",
					    data: formData,
					    processData: false,
					    contentType: false,
					    success: function (result) {
					      	console.log('Upload success');
					      	retrieve_detail_portfolio(tempImageID);
					      	$("#cropping").modal("hide");
					    },
					    error: function (result) {
					      console.log('Upload error');
					    }
					  });
					});

			  alert("Changes saved successfully.");
			  
			} else {  
			  alert("Error "+ xhr.statusText);  
			}  
		  }  
		};  
		
		// Set headers
		xhr.setRequestHeader("X-File-Name", tempFile.fileName);
		xhr.setRequestHeader("X-File-Size", tempFile.fileSize);
		xhr.setRequestHeader("X-File-Type", tempFile.type);
		
		// Send the file (doh)
		xhr.send(tempFile);
	}
});

//Show Settings if admin
if (admin==1)
{
	$(".welcome-planc").show();
	$("#div-login").show();
    $("#div-login").animate({left:'0'},140);
}
else if (admin==2)
{
	$(".welcome-planc").show();
	$(".div-settings").fadeIn("fast");
	$(".bar").addClass("active");
}
else {
	$(".welcome-planc").hide();
}

