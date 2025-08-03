<!--jquery library js-->
<script src="<?php echo base_url(); ?>js2/jquery-3.7.1.min.js"></script>
<!--bootstrap js-->
<script src="<?php echo base_url(); ?>js2/bootstrap.bundle.min.js"></script>
<!--font-awesome js-->
<script src="<?php echo base_url(); ?>js2/Font-Awesome.js"></script>
<!--nice select js-->
<script src="<?php echo base_url(); ?>js2/jquery.nice-select.min.js"></script>
<!--marquee js-->
<script src="<?php echo base_url(); ?>js2/jquery.marquee.min.js"></script>
<!--slick js-->
<script src="<?php echo base_url(); ?>js2/slick.min.js"></script>
<!--countup js-->
<script src="<?php echo base_url(); ?>js2/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>js2/jquery.countup.min.js"></script>
<!--venobox js-->
<script src="<?php echo base_url(); ?>js2/venobox.min.js"></script>
<!--scroll button js-->
<script src="<?php echo base_url(); ?>js2/scroll_button.js"></script>
<!--price ranger js-->
<script src="<?php echo base_url(); ?>js2/ranger_jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>js2/ranger_slider.js"></script>
<!--select 2 js-->
<script src="<?php echo base_url(); ?>js2/select2.min.js"></script>
<!--aos js-->
<script src="<?php echo base_url(); ?>js2/wow.min.js"></script>
<!--colorfulTab js-->
<script src="<?php echo base_url(); ?>js2/colorfulTab.min.js"></script>
<!--sticky sidebar js-->
<script src="<?php echo base_url(); ?>js2/sticky_sidebar.js"></script>
<!--animated barfiller js-->
<script src="<?php echo base_url(); ?>js2/animated_barfiller.js"></script>
<!--animatedheadline js-->
<script src="<?php echo base_url(); ?>js2/jquery.animatedheadline.min.js"></script>
<!--script/custom js-->
<script src="<?php echo base_url(); ?>js2/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#btn-subscribe").click(function(e) {
            var email = $("#subscribe_email").val();
            var regex = new RegExp("^[^\s@]+@[^\s@]+\.[^\s@]+$");
            $("#error-subscribe").hide();
            if (email == "") {
                $("#error-subscribe").html("Fill your email first !");
                $("#error-subscribe").show();
            }
            else if (email.length < 3) {
                $("#error-subscribe").html("Your email is not valid !");
                $("#error-subscribe").show();
            }
            else if (!regex.test(email)) {
                $("#error-subscribe").html("Your email is not valid !");
                $("#error-subscribe").show();
            }
            else {
                $.ajax({
                    url: base_url + "Promo/save_subscribe",
                    type: "POST",
                    dataType: "html",
                    data: "email=" + email,
                    success: function(result) {
                        console.log(result);
                        if (result != "") {
                            $("#error-subscribe").html(result);
                            $("#error-subscribe").show();
                        } else {
                            $("#subscribe_email").val("");
                            $("#error-subscribe").html("Your email has been subscribed sucessfully !");
                            $("#error-subscribe").show();
                        } 
                    },
                    error: function(result) {
                        console.log(result);
                        alert("Error when submit subscription email !");
                    }
                });
            }
            window.setTimeout(function() { $("#error-subscribe").hide(); }, 3200);
        });

        $("body").on("click", ".btPickup", function(e) {
            var html = $(this).attr("data-html");
            $("#orderBody").html(html);
            $("#orderModal").modal("show");
        });
    });
</script>

<script>

    function format_full() {
        var months = ['January','February','March','April','May','June','July','August','September','September','November','December'];
        return months[d.getMonth()]+' '+d.getDate()+', '+d.getFullYear();
    }
    function format_month() {
        var months = ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return months[d.getMonth()]+'. '+d.getFullYear();
    }

    // Format Number
    function formatThousand(x, char) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, char);
    }

var tempPrice;
var tempData;
var tempUserID = "<?php echo $this->session->userdata('userID') ?>";
var tempDisc;
var tempType;
var tempDiscAmt = 0;
var carts = new Array();
var jsoncart = $("#div_carts").html();
if (jsoncart != "") {
    carts = $.parseJSON(jsoncart);
}

function showNotif(notifMsg, notifFooter) {
    $("#detailNotif").html(notifMsg);
    $("#footerNotif").html(notifFooter);
    if (notifFooter == "")
        $("#footerNotif").hide();
    $("#notifyModal").modal("show");
}

window.fbAsyncInit = function() {
    FB.init({
      appId: '319785020824689',
      cookie: true,
      xfbml: true,
      version: 'v19.0'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function showFBLogin() {
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', {
          fields: 'name, email, gender, picture.type(large)'
        }, function(response) {
          sendDataLogin(response.id, response.name, response.gender, response.email, (response.picture != null) ? response.picture.data.url : "");
          // alert("Good to see you, " + response.name + ", gender " + response.gender + ". i see your email address is " + response.email);
          console.log(response);
          // document.getElementById("profile").innerHTML = 
        });
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
  }

  function sendDataLogin(id, name, gender, email, photoUrl) {
    var store = $("#store_id").val();
    var time = $("#pickup_time").val();
    var cartjson = JSON.stringify(carts);

    $.ajax({
      url: base_url + "order/fbcallback",
      type: "POST",
      dataType: "html",
      data: "id=" + id + "&name=" + name + "&gender=" + gender + "&email=" + email + "&photo=" + encodeURIComponent(photoUrl) + "&store=" + store + "&time=" + time + "&carts=" + encodeURIComponent(cartjson),
      success: function(result) {
        console.log(result);
        var user = $.parseJSON(result);

        // var offcanvasElement = document.getElementById('offcanvasChk');
        // var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        // offcanvas.hide();

        // var offcanvasElement3 = document.getElementById('offcanvasRight');
        // var offcanvas3 = new bootstrap.Offcanvas(offcanvasElement3);
        // offcanvas3.hide();
        $(".btn-close").click();

        $("#pickup_time2").val(time);
        $("#full_name").val(user.employee_name);
        $("#email").val(user.email);
        $("#phone").val(user.phone);

        var offcanvasElement2 = document.getElementById('offcanvasLogin');
        var offcanvas2 = new bootstrap.Offcanvas(offcanvasElement2);
        offcanvas2.show();
      },
      error: function(result) {
        console.log(result);
        alert("Error when facebook login !");
      }
    });
  }

function ordermenu(id) {
    $.ajax({
        url: "<?php echo base_url('Menu/getDetailMenu'); ?>",
        type: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data) {
                tempPrice = data.price;
                tempData = data;
                var options = $.parseJSON(data.optionTxt);
                var detailElmt = "";
                if (options != null) {
                    for(var i=0;i<options.length;i++) {
                        detailElmt += '<div class="details_size">'+
                                        '<h5>' + options[i].label + '</h5>';
                        for(var j=0;j<options[i].option.length;j++) {
                            detailElmt += '<div class="form-check">'+
                                                '<input class="form-check-input optional" type="' + options[i].type + '" data-price="' + options[i].option[j].price + '" name="' + options[i].variable + '" data-text="' + options[i].option[j].text + '" data-var="' + options[i].variable + '" value="' + options[i].option[j].value + '" id="' + options[i].variable + '">'+
                                                '<label class="form-check-label" for="' + options[i].variable + '">'+
                                                   options[i].option[j].text + " &nbsp;&nbsp;(+$" + options[i].option[j].price + ")" +
                                                '</label>'+
                                            '</div>';
                        }
                        detailElmt += '</div>';
                    }
                }
                    var html = '<div class="cart_popup_img">'+
                                    '<img src="<?php echo base_url(); ?>images/catering/'+ data.imagepath +'" alt="menu" class="img-fluid w-100">'+
                                '</div>'+
                                '<div class="cart_popup_text">'+
                                '<a href="javascript:void(0)" class="title">'+ data.imagetitle +'</a>'+
                                '<h4>' + data.imagetitle2 + '</h4>'+
                                '<p class="description">'+ data.imagedesc + '</p>'+
                                '<h4 class="price">$'+ data.price + '</h4>'+
                                detailElmt + 
                                '<div class="details_quentity">'+
                                    '<h5>select quantity</h5>'+
                                    '<div class="quentity_btn_area d-flex flex-wrapa align-items-center">'+
                                        '<div class="quentity_btn">'+
                                            '<button class="btn btn-danger" id="btminus" data-inc="-1"><i class="fal fa-minus"></i></button>'+
                                            '<input type="text" class="num" id="qty" placeholder="1" value="1">'+
                                            '<button class="btn btn-success" id="btplus" data-inc="1"><i class="fal fa-plus"></i></button>'+
                                        '</div>'+
                                        '<h3>$<span id="totalDiv">' + data.price + '</div></h3>'+
                                    '</div>'+
                                '</div>'+
                                '<ul class="details_button_area d-flex flex-wrap">'+
                                    '<li>'+
                                        '<a class="common_btn" href="javascript:void(0)" id="btnOrder">'+
                                            'Order'+
                                        '</a>'+
                                    '</li>'+
                                '</ul>'+
                            '</div>';

                $('#detailMenu').html(html);
                $('#menuModal').modal('show');
            } else {
                $('#detailMenu').html('<p>No data found</p>');
                $('#menuModal').show();
            }
        }
    });
}

function showAlert(head, body, time) {
    $("#headAlert").html(head);
    $("#bodyAlert").html(body);
    $("#alertDiv").fadeIn(500);
    window.setTimeout(function() {
        $("#alertDiv").fadeOut(500);
    }, time);
}

function getNumCarts() {
    var totalNum = 0;
    for(var i=0;i<carts.length;i++) {
        totalNum += parseInt(carts[i].qty);
    }
    $("#numQty").html(totalNum);
    $(".cart-qnty").html(totalNum);
    if (totalNum > 0) {
        $("#numQty").show();
        $(".cart-qnty").show();
        $(".minicart_btn_area").show();
    } else {
        $("#numQty").hide();
        $(".cart-qnty").hide();
        $(".minicart_btn_area").hide();
    }
}

function showCarts() {
    var html = "";
    var html2 = "";
    var totalAmt = 0;
    for(var i=0;i<carts.length;i++) {
        html += '<li>' +
                    '<div class="cart_text">' + 
                        '<a class="cart_title" href="javascript:void(0)">' + carts[i].name + '</a>' + 
                        '<div>' + carts[i].opts + '</div>' + 
                        '<div class="quentity_btn">' + 
                            '<button class="btn btn-danger btnminus" data-id="' + carts[i].id + '" data-inc="-1"><i class="fal fa-minus"></i></button>' + 
                            '<input type="text" class="qty" placeholder="1" data-id="' + carts[i].id + '" value="' + carts[i].qty + '">' + 
                            '<button class="btn btn-success btnplus"  data-id="' + carts[i].id + '" data-inc="1"><i class="fal fa-plus"></i></button>' + 
                            '<p>$<span class="totalDiv"  data-id="' + carts[i].id + '">' + (parseFloat(carts[i].price) * parseInt(carts[i].qty)) + '</p>' + 
                        '</div>' +
                    '</div>' +
                '</li>';
        html2 += '<li>' +
                    '<div class="cart_text">' + 
                        '<div class="pull-left" style="width:70%">' +
                            '<a class="cart_title" href="javascript:void(0)">' + carts[i].qty + " x " +  carts[i].name + '</a>' + 
                            '<div>' + carts[i].opts + '</div>' + 
                        '</div>' + 
                        '<p class="pull-right" style="margin-top:-6px">$<span class="totalDiv"  data-id="' + carts[i].id + '">' + (parseFloat(carts[i].price) * parseInt(carts[i].qty)) + '</p>' + 
                        '<div style="clear:both"></div>' + 
                    '</div>' +
                '</li>';
        totalAmt += (parseFloat(carts[i].price) * parseInt(carts[i].qty));
    }
    $("#cartList").html(html);
    $("#cartList2").html(html2);
    if (carts.length <= 0) {
        $("#cartList").hide();
        $("#subtotal").hide();
    } else {
        $("#cartList").show();
        $("#subtotal").show();
    }

    $(".spTotalAmt").html(formatThousand(totalAmt));
    if ($("#promo_id").val() != "") {
        if (tempType == "percentage") {
            var realAmt = totalAmt * (100 - tempDisc) / 100;
            $(".spTotalAmt").html(formatThousand(realAmt) + " &nbsp;<strike style='font-size:11pt'>$ " + formatThousand(totalAmt) + "</strike>");
            tempDiscAmt = totalAmt * tempDisc / 100;
        } else {
            var realAmt = totalAmt - tempDisc;
            $(".spTotalAmt").html(formatThousand(realAmt) + " &nbsp;<strike style='font-size:11pt'>$ " + formatThousand(totalAmt) + "</strike>");
            tempDiscAmt = tempDisc;
        }
    }
}

$(document).ready(function(e) {
    getNumCarts();
    showCarts();
    // showNotif('<center><span class="fa fa-exclamation-circle"></span> &nbsp;Order has been successfully created !<br/><h3>Your order ID: <b>OR0001</b></h3></center>', '<a class="common_btn" href="' + base_url + 'Order/detail/1" id="btnDetails">View Details</a>');
    if ("<?php echo $time ?>" != "") {
        $("#pickup_time").val("<?php echo $time ?>");
    }

    if (carts.length > 0) {
        var offcanvasElement = document.getElementById('offcanvasLogin');
        var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        offcanvas.show();
    }

    $("body").on("keydown", ".num", function(e){
        if ((e.keyCode < 48 || e.keyCode > 57 ) && e.keyCode != 190 &&
             e.keyCode != 8 && e.keyCode != 46 &&
             e.keyCode != 37 && e.keyCode != 38 && 
             e.keyCode != 39 && e.keyCode != 40 && (e.keyCode < 96 || e.keyCode > 105)) 
         {
            return false;
         }
    });

    $("body").on("click", "#btnContinue", function(e) {
        $(".btn-close").click();

        if (tempUserID != "") {
            var offcanvasElement2 = document.getElementById('offcanvasLogin');
            var offcanvas2 = new bootstrap.Offcanvas(offcanvasElement2);
            offcanvas2.show();
        } else {
            var offcanvasElement = document.getElementById('offcanvasChk');
            var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
            offcanvas.show();
        }        
    });

    $("body").on("click","#btplus,#btminus", function(e) {
        var inc = $(this).attr("data-inc");
        var newqty = parseInt($("#qty").val()) + parseInt(inc);
        if (newqty < 0)
            newqty = 0;
        $("#qty").val(newqty);
        $("#qty").trigger("change");
    });

    $("body").on("change", "#qty", function(e) {
        var totalqty = ($("#qty").val() != "") ? parseInt($("#qty").val()) : 0;
        if ($("#qty").val() == "") {
            $("#qty").val("0");
        }
        var totalPrice = parseFloat(tempPrice) * totalqty;
        var optionals = $(".optional:checked");
        for(var i=0;i<optionals.length;i++) {
            totalPrice += parseFloat($(optionals[i]).attr("data-price"));
        }
        $("#totalDiv").html(formatThousand(totalPrice,","));
    });

    $("body").on("change", ".optional", function(e) {
        var totalqty = ($("#qty").val() != "") ? parseInt($("#qty").val()) : 0;
        if ($("#qty").val() == "") {
            $("#qty").val("0");
        }
        var totalPrice = parseFloat(tempPrice) * totalqty;
        var optionals = $(".optional:checked");
        for(var i=0;i<optionals.length;i++) {
            totalPrice += parseFloat($(optionals[i]).attr("data-price"));
        }
        $("#totalDiv").html(formatThousand(totalPrice,","));
    });

    $("body").on("click", "#btnPay", function(e) {
        var store = $("#store_id").val();
        var time = $("#pickup_time2").val();
        var full_name = $("#full_name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var promo_id = $("#promo_id").val();
        var cartjson = JSON.stringify(carts);

        if (time == "") {
            $("#error_time").html("Pickup time must be filled !");
            $("#error_time").show();
        } else {
            $("#error_time").hide();
        }

        if (full_name == "") {
            $("#error_name").html("Full name must be filled !");
            $("#error_name").show();
        } else {
            $("#error_name").hide();
        }

        if (email == "") {
            $("#error_email").html("Email must be filled !");
            $("#error_email").show();
        } else {
            $("#error_email").hide();
        }

        if (phone == "") {
            $("#error_phone").html("Phone must be filled !");
            $("#error_phone").show();
        } else {
            $("#error_phone").hide();
        }

        if (full_name != "" && email != "" && phone != "" && time != "") {
            $.ajax({
              url: base_url + "order/create",
              type: "POST",
              dataType: "html",
              data: "store=" + store + "&time=" + time + "&full_name=" + full_name + "&email=" + email + "&phone=" + phone + "&disc=" + tempDiscAmt + "&promo=" + promo_id + "&carts=" + encodeURIComponent(cartjson),
              success: function(result) {
                console.log(result);
                showNotif('<center><span class="fa fa-exclamation-circle"></span> &nbsp;Order has been successfully created !<br/><h3 style="font-family:Intro">Your order ID: <b>OR' + result.toString().padStart(4,"0") + '</b></h3></center>', '<a class="common_btn" href="' + base_url + 'Order/detail/' + btoa(result) + '" id="btnDetails">View Details</a>');
                $("#notifyModal").on("hide.bs.modal", function(e) {
                    window.location = base_url + "order?store=buy";
                });
              },
              error: function(result) {
                console.log(result);
                showNotif('<span class="fa fa-remove"></span> &nbsp;Error when creating order data !', '');
              }
            });
        }
    });

    $("body").on("click", "#btnChangeStore,#btnChangeStore2", function(e) {
        $(".box-location-store").hide();
        $("#autocomplete").val("");
        $("#locationModal").modal("show");
    });

    $("body").on("click", "#btnChoosePromo", function(e) {
        $.ajax({
          url: base_url + "order/promo_list",
          type: "GET",
          dataType: "html",
          success: function(result) {
            console.log(result);
            var html = "";
            var promolist = $.parseJSON(result);
            for (var i=0;i<promolist.length; i++) {
                html += '<div style="' + ($("#promo_id").val() == promolist[i].id_promo ? "opacity:0.55;" : "")  + 'padding:10px;border: thin solid #EE2737; border-radius:14px; margin-bottom:12px">' + 
                            '<div>' + 
                                '<h5 class="pull-left" style="font-family:Intro">' + promolist[i].title + '</h5>' +
                                '<h5 class="pull-right" style="background:red;padding:2px 6px;border-radius:8px"><span class="white" style="font-family:Acumin">' + promolist[i].subtitle + '</span></h5>' + 
                                '<div class="clear"></div>' + 
                            '</div>' +
                            '<p style="font-family:Intro">' + 
                                promolist[i].description + 
                            '</p>' + 
                            '<hr style="margin: 10px 0px" />' +
                            '<div id="marketDiv">' + 
                                '<a href="javascript:void(0)" class="btSelectCoupon" data-id="' + promolist[i].id_promo + '" data-name="' + promolist[i].title + '" data-subs="' + promolist[i].subtitle + '" data-disc="' + promolist[i].disc_off + '" data-type="' + promolist[i].disc_type + '" style="color:#DA402E"></span> &nbsp;' + ($("#promo_id").val() == promolist[i].id_promo ? "Unselect coupon" : "Select coupon") + '</a>' + 
                            '</div>' +
                        '</div>';
            }
            $("#detailPromo").html(html);
            $("#promoModal").modal("show");
          },
          error: function(result) {
            console.log(result);
            alert("Error when get promo list !");
          }
        });
    });

    $("body").on("click", "#btSearchPromo", function(e) {
        $.ajax({
          url: base_url + "order/promo_list?keywords=" + $("#keywords").val(),
          type: "GET",
          dataType: "html",
          success: function(result) {
            console.log(result);
            var html = "";
            var promolist = $.parseJSON(result);
            for (var i=0;i<promolist.length; i++) {
                html += '<div style="' + ($("#promo_id").val() == promolist[i].id_promo ? "opacity:0.55;" : "")  + 'padding:10px;border: thin solid #EE2737; border-radius:14px; margin-bottom:12px">' + 
                            '<div>' + 
                                '<h5 class="pull-left" style="font-family:Intro">' + promolist[i].title + '</h5>' +
                                '<h5 class="pull-right" style="background:red;padding:2px 6px;border-radius:8px"><span class="white" style="font-family:Acumin">' + promolist[i].subtitle + '</span></h5>' + 
                                '<div class="clear"></div>' + 
                            '</div>' +
                            '<p style="font-family:Intro">' + 
                                promolist[i].description + 
                            '</p>' + 
                            '<hr style="margin: 10px 0px" />' +
                            '<div id="marketDiv">' + 
                                '<a href="javascript:void(0)" class="btSelectCoupon" data-id="' + promolist[i].id_promo + '" data-name="' + promolist[i].title + '" data-subs="' + promolist[i].subtitle + '" data-disc="' + promolist[i].disc_off + '" data-type="' + promolist[i].disc_type + '" style="color:#DA402E"></span> &nbsp;' + ($("#promo_id").val() == promolist[i].id_promo ? "Unselect coupon" : "Select coupon") + '</a>' + 
                            '</div>' +
                        '</div>';
            }
            $("#detailPromo").html(html);
          },
          error: function(result) {
            console.log(result);
            alert("Error when get promo list !");
          }
        });
    });

    $("body").on("click", ".btSelectCoupon", function(e) {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var desc = $(this).attr("data-desc");
        var sub = $(this).attr("data-subs");
        var disc = $(this).attr("data-disc");
        var type = $(this).attr("data-type");
        

        if (id == $("#promo_id").val()) {
            $("#promo_id").val("");
            $(".promo_name").html("- No promotion used -");
            $(".disc_off").html("");
            $("#promoModal").modal("hide");
            tempDisc = 0;
            tempType = "";
        } else {
            $("#promo_id").val(id);
            $(".promo_name").html(name);
            $(".disc_off").html(sub);
            $("#promoModal").modal("hide");
            tempDisc = disc;
            tempType = type;
        }
        showCarts();
    });

    $("body").on("click", ".btPickLocation", function(e) {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var address = $(this).attr("data-addr");
        var phone = $(this).attr("data-phone");
        var op1 = $(this).attr("data-op1");
        var op2 = $(this).attr("data-op2");

        $("#store_id").val(id);
        $('.store_name').html(name);
        $(".store_address").html(address);
        $(".store_phone").html(phone);
        $(".op1").html(op1);
        $(".op2").html(op2);

        $("#locationModal").modal("hide");
    });

    $("body").on("click", "#btnOrder", function(e) {
        var flag = false;
        var optionals = $(".optional:checked");
        var optPrice = 0;
        var optDesc = new Array();
        for(var i=0;i<optionals.length;i++) {
            optPrice += parseFloat($(optionals[i]).attr("data-price"));
            optDesc.push($(optionals[i]).attr("data-text"));
        }

        for(var i=0;i<carts.length;i++) {
            if (carts[i].id == tempData.imageid && carts[i].opts == optDesc.join(",")) {
                carts[i].qty += parseInt($("#qty").val());
                flag = true;
            }
        }

        if (!flag) {
            var cartobj = new Object();
            cartobj.name = tempData.imagetitle + " " + tempData.imagetitle2;
            cartobj.desc = tempData.imagedesc;
            cartobj.opts = optDesc.join(",");
            cartobj.image = tempData.imagepath;
            cartobj.id = tempData.imageid;
            cartobj.qty = parseInt($("#qty").val());
            cartobj.price = parseFloat(tempPrice) + optPrice;
            carts.push(cartobj);
        }

        getNumCarts();
        showCarts();
        showAlert("Success!", "item has been added to cart", 3000);
        $("#menuModal").modal("hide");
    });

    $("body").on("click", "#btGoogle", function(e) {
        var store = $("#store_id").val();
        var time = $("#pickup_time").val();
        var cartjson = JSON.stringify(carts);

        $.ajax({
          url: base_url + "order/prelogin",
          type: "POST",
          dataType: "html",
          data: "store=" + store + "&time=" + time + "&carts=" + encodeURIComponent(cartjson),
          success: function(result) {
            console.log(result);
            window.location = base_url + "order/glogin";
          },
          error: function(result) {
            console.log(result);
            alert("Error when google login !");
          }
        });
    });

    $("body").on("click", "#btFacebook", function(e) {
         showFBLogin();
    });

    $("body").on("click", ".btnminus,.btnplus", function(e) {
        var id = $(this).attr("data-id");
        var inc = $(this).attr("data-inc");

        var newqty = parseInt($(".qty[data-id='" + id + "']").val()) + parseInt(inc);
        if (newqty < 0)
            newqty = 0;
        $(".qty[data-id='" + id + "']").val(newqty);
        $(".qty[data-id='" + id + "']").trigger("change")
    });

    $("body").on("change", ".qty", function(e) {
        var id = $(this).attr("data-id");
        var totalqty = ($(".qty[data-id='" + id + "']").val() != "") ? parseInt($(".qty[data-id='" + id + "']").val()) : 0;
        if ($(".qty[data-id='" + id + "']").val() == "") {
            $(".qty[data-id='" + id + "']").val("0");
        }
        if (totalqty > 0) {
            var totalPrice = parseFloat(tempPrice) * totalqty;
            $(".totalDiv[data-id='" + id + "']").html(formatThousand(totalPrice,","));
        } else {
            for(var i=0;i<carts.length;i++) {
                if (carts[i].id == id) {
                    carts.splice(i,1);
                    break;
                }
            }
            showCarts();
            getNumCarts();
        }
    });
});
</script>