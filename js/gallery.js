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

			html += "<div class='col-lg-12 col-md-21 item-folder cursor detail-gallery' id='btnBackTo'>" + 
                            "<div class='divBackBtn'>" + 
                                "<a class='porfolio-popup gallery-popup-link' id='btnBackDetail' title='Back to category'>" + 
                                    "<div class='item-content'>" + 
                                        // "<center>"+ json[i].judulTitle + "</center>" +
                                        "<center class='backBtn'><span><i class='fa fa-arrow-left'></i></span> Back</center>" +
                                    "</div>" + 
                                "</a>" + 
                            "</div>" + 
                        "</div>";

			for (var i=0;i<json.length;i++)
			{
				html += "<div class='col-sm-6 col-md-3 gallery-masonry__item gallery-masonry__item--green detail-gallery'>"+
                            "<a class='gallery-masonry__img gallery-masonry__item--height' href='" + base_url + "images/gallery/detail/" + json[i].imagepath + "' data-fancybox='gallery'>"+
                                "<img class='img--bg lazy' src='" + base_url + "images/gallery/detail/" + json[i].imagepath +"' alt='img'/>"+
                                "<div class='gallery-masonry__description'>"+
                                    "<span>" + json[i].imagetitle + "</span>"+
                                "</div>"+
                            "</a>"+
                        "</div>";
			}
			// html += "<div class='clear'></div>";

			$("#portfolio-detail").html(html);

			
			// Back Button Clicked
			$("#btnBackTo").click(function(e)
			{
				$("#portfolio-detail").hide();
                $(".filter-panel").show();
				$("#portfolio-header").show();
			});

            $('.lazy').Lazy({
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                }
            });
		}
	});
}

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
			$(".filter-panel").hide();
			$("#portfolio-detail").fadeIn("slow");
		}
	});

});