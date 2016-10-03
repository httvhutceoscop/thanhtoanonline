
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Thanh toán vé máy bay Liên Việt</title>
    <meta name="description" content="Thanh toán vé máy bay online, chấp nhận thẻ atm nội địa và visa, master card."/>
    <meta name="keywords" content="san ve may bay, thanh toán vé máy bay, thẻ atm nội địa, thẻ visa, master card"/>
<!--    <script src="https://apis.google.com/js/platform.js" async defer></script>-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <style>
        #top-menu {
            width: 100% !important;
            margin: auto;
            text-align: center;
        }

        #bankInfo{
            display: none;
        }
        h2.titleBlock {
            font-weight: normal;
            font-size: 1em;
            text-transform: uppercase;
            border-bottom: 1px dotted #cecece;
        }
    </style>
    <link rel="stylesheet" href="css/styles.css" />
    <script type="text/javascript"> //<![CDATA[
        var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
        document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
        //]]>
    </script>
</head>
<body>

<div id="menu-header" class="standar-wrap clearfix">
    <a href="https://thanhtoan.sanvemaybay.vn/" title="Thanh toán vé máy bay" id="main-logo">
        <img id="img-logo" src="images/logo-san-ve-may-bay.png" alt="Săn vé máy bay giá rẻ" accesskey="">
    </a>

    <ul id="main-menu">
        <li id="hotline-dat-ve">
                        <p class="txt">Hỗ Trợ Thanh Toán</p>
            <p class="txt2">Hỗ Trợ</p>
            <p>08 6274 1999</p>
        </li>
    </ul><!--main-menu-->
    <a href="#" id="colslapMenu" data-toggle="collapse" class="mobile-menu-toggle collapsed">Mobile Menu Toggle</a> </div>

<div id="wrap-bottom-header">
        <div id="bottom-header" class="clearfix">
        <ul id="top-menu" class="menu">
            <li id="menu-item-3592" class="menu-item current-menu-item">
                <a href="#vtcTab">Thanh toán online</a>
            </li>
            <li id="menu-item-4181" class="menu-item ">
                <a href="#bankInfo">chuyển khoản</a>
            </li>
            <li id="menu-item-4181" class="menu-item ">
                <a href="#payAtHome">Tại nhà</a>
            </li>
            <li id="menu-item-4181" class="menu-item ">
                <a href="#payAtOffice">Tại văn phòng</a>
            </li>
<!--            <li id="menu-item-4182" class="menu-item ">
                <a href="#instruction">Hướng dẫn</a>
            </li>-->
        </ul>
    </div>
    </div><!--wrap-bottom-header-->

<div class="main-content">
    <!-- You only need this form and the form-validation.css -->
    <div id="vtcTab" class="tabContent">
        <h2 class="tabTitle">Thanh Toán Online</h2>
        <form class="form-validation" id="payment-info" method="post" action="#" style="display: none;">
    <div style="text-align: left;font-weight: normal;line-height: 1.5em;" class="form-row">

    </div>
    <div class="form-row">
        <h2 class="titleBlock">Thông tin khách hàng</h2>
    </div>
    <div class="form-row form-input-name-row">
        <label>
            <span>Họ tên</span>
            <input type="text" name="customer_name" value="Cao Van Minh">
        </label>
        <span class="form-invalid-data-info"></span>

    </div>

    <div class="form-row form-input-email-row">
        <label>
            <span>Email</span>
            <input type="text" name="email" value="caovanminh@gmail.com">
        </label>
        <span class="form-invalid-data-info"></span>
    </div>

    <div class="form-row">

        <label>
            <span>Số điện thoại</span>
            <input type="text" name="phone" value="9347859435">
        </label>
        <span class="form-invalid-data-info"></span>

    </div>

    <div class="form-row">
        <h2 class="titleBlock">Thông tin thanh toán</h2>
    </div>

    <div class="form-row">

        <label>
            <span>Mã đơn hàng <small>(nếu có)</small></span>
            <input type="text" name="bookingid" value="">
        </label>
        <span class="form-invalid-data-info"></span>

    </div>

    <div class="form-row">

        <label>
            <span>Số tiền <small>(VNĐ)</small></span>
            <input type="text" name="total" value="500000">
        </label>
        <span class="form-invalid-data-info"></span>

    </div>


    <div class="form-row">

        <label class="form-checkbox">
            <span>Lý do thanh toán</span>
            <textarea name="note"></textarea>
        </label>

    </div>

    <div class="form-row">
        <span class="form-invalid-data-info"></span>
        <label class="form-checkbox">
            <span>Phương Thức Thanh Toán</span>
        </label>

        <div class="form-radio-buttons">
                        <div>
                <label>
                    <input class="selectPayMethod" type="radio" name="payment_type" value="Visa"  id="pay-by-visa" >
                    <input type="hidden" name="payment_card_name" value="" id="interCardName">
                    <span>THẺ QUỐC TẾ VISA, MASTERCARD, JCB</span>
                </label>
                <div id="wrap-listCard-inter" class="clearfix">
                    <ul id="listCardInter" class="listCard">
                        <li>
                            <a id="card_Visa" style="cursor: pointer;">
                                <img id="imgPaygate_Visa" class="cardInfo" src="images/visa.png" width="108" height="48" border="0">
                            </a>
                        </li>
                        <li>
                            <a id="card_Master" style="cursor: pointer;">
                                <img id="imgPaygate_Master" class="cardInfo" src="images/master.png" width="108" height="48" border="0">
                            </a>
                        </li>
                        <li>
                            <a id="card_JCB" style="cursor: pointer;">
                                <img id="imgPaygate_JCB" class="cardInfo" src="images/jcb.png" width="108" height="48" border="0">
                            </a>
                        </li>
                        <li id="select-other-bank-inter">
                            <a style="cursor: pointer; border-radius: 9px;">
                                <img class="otherBank" src="images/other-bank.jpg" width="108" height="48" border="0">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix">
                <label>
                    <input class="selectPayMethod" type="radio" name="payment_type" value="Bank" checked="checked" id="pay-by-atm">
                    <input type="hidden" name="payment_bank_name" value="Vietcombank" id="atmBankName">
                    <span>THẺ ATM NỘI ĐỊA</span>
                </label>

                <div id="wrap-listCard" class="clearfix">
    <ul id="listCard" class="listCard">
        <li>
            <a id="card_1" style="cursor: pointer;">
                <img id="imgPaygate_Vietcombank" class="bankInfo" src="images/Vietcombank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_3" style="cursor: pointer;">
                <img id="imgPaygate_MB" class="bankInfo" src="images/MB.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_5" style="cursor: pointer;">
                <img id="imgPaygate_Vietinbank" class="bankInfo" src="images/Vietinbank.jpg" width="108" height="48" border="0">
            </a>
        </li>


        <li>
            <a id="card_6" style="cursor: pointer;">
                <img id="imgPaygate_Agribank" class="bankInfo" src="images/Agribank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_8" style="cursor: pointer;">
                <img id="imgPaygate_Oceanbank" class="bankInfo" src="images/Oceanbank.jpg" width="108" height="48" border="0">
            </a>
        </li>
        <li>
            <a id="card_9" style="cursor: pointer;">
                <img id="imgPaygate_BIDV" class="bankInfo" src="images/BIDV.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_10" style="cursor: pointer;">
                <img id="imgPaygate_SHB" class="bankInfo" src="images/SHB.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_11" style="cursor: pointer;">
                <img id="imgPaygate_VIB" class="bankInfo" src="images/VIB.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_18" style="cursor: pointer;">
                <img id="imgPaygate_MaritimeBank" class="bankInfo" src="images/MaritimeBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_20" style="cursor: pointer;">
                <img id="imgPaygate_Eximbank" class="bankInfo" src="images/Eximbank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_26" style="cursor: pointer;">
                <img id="imgPaygate_ACB" class="bankInfo" src="images/ACB.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_27" style="cursor: pointer;">
                <img id="imgPaygate_HDBank" class="bankInfo" src="images/HDBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_28" style="cursor: pointer;">
                <img id="imgPaygate_NamABank" class="bankInfo" src="images/NamABank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_29" style="cursor: pointer;">
                <img id="imgPaygate_SaigonBank" class="bankInfo" src="images/SaigonBank.jpg" width="108" height="48" border="0">
            </a>
        </li>


        <li>
            <a id="card_31" style="cursor: pointer;">
                <img id="imgPaygate_Sacombank" class="bankInfo" src="images/Sacombank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_33" style="cursor: pointer;">
                <img id="imgPaygate_VietABank" class="bankInfo" src="images/VietABank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_34" style="cursor: pointer;">
                <img id="imgPaygate_VPBank" class="bankInfo" src="images/VPBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_35" style="cursor: pointer;">
                <img id="imgPaygate_TienPhongBank" class="bankInfo" src="images/TienPhongBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_37" style="cursor: pointer;">
                <img id="imgPaygate_SeaABank" class="bankInfo" src="images/SeaABank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_38" style="cursor: pointer;">
                <img id="imgPaygate_PGBank" class="bankInfo" src="images/PGBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_41" style="cursor: pointer;">
                <img id="imgPaygate_Navibank" class="bankInfo" src="images/Navibank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_43" style="cursor: pointer;">
                <img id="imgPaygate_GPBank" class="bankInfo" src="images/GPBank.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_45" style="cursor: pointer;">
                <img id="imgPaygate_BACABANK" class="bankInfo" src="images/BACABANK.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_46" style="cursor: pointer;">
                <img id="imgPaygate_PHUONGDONG" class="bankInfo" src="images/PHUONGDONG.jpg" width="108" height="48" border="0">
            </a>
        </li>

        <li>
            <a id="card_47" style="cursor: pointer;">
                <img id="imgPaygate_ABBANK" class="bankInfo" src="images/ABBANK.jpg" width="108" height="48" border="0">
            </a>
        </li>



        <li>
            <a id="card_50" style="cursor: pointer;">
                <img id="imgPaygate_LienVietPostBank" class="bankInfo" src="images/LienVietPostBank.jpg" width="108" height="48" border="0">
            </a>
        </li>
        <li>
            <a id="card_51" style="cursor: pointer;">
                <img id="imgPaygate_BVB" class="bankInfo" src="images/BVB.jpg" width="108" height="48" border="0">
            </a>
        </li>



        <li id="select-other-bank">
            <a style="cursor: pointer; border-radius: 9px;">
                <img class="otherBank" src="images/other-bank.jpg" width="108" height="48" border="0">
            </a>
        </li>
    </ul>
    <img id="iconChoose" src="https://pay.vtc.vn/Content/images/icon-hover.png" style="position: absolute; bottom: -5px; right: -5px;">
</div>
<script>
    $(document).ready(function(){

        //for init
        if ($(".selectPayMethod:checked") !== null && $(".selectPayMethod:checked").val() == 'Bank') {
            // show and select bank
            var bankName = $("#atmBankName").val();
            if (bankName != '') {
                var currentBank = $("#imgPaygate_"+bankName);
                $("#iconChoose").show().appendTo($(currentBank).parent());
                currentBank.parent().addClass("chooseBank");
                currentBank.closest("li").siblings("li").hide();
                $("#select-other-bank").show();
            }
            $("#wrap-listCard").show();
        } else if ($(".selectPayMethod:checked") !== null && $(".selectPayMethod:checked").val() == 'Visa') {
            var bankNameInter = $("#interCardName").val();
            if (bankNameInter != '') {
                var currentBankInter = $("#imgPaygate_"+bankNameInter);
                $("#iconChoose").show().appendTo($(currentBankInter).parent());
                currentBankInter.parent().addClass("chooseBank");
                currentBankInter.closest("li").siblings("li").hide();
                $("#select-other-bank-inter").show();
            }
            $("#wrap-listCard-inter").show();
        }

        //when choose payment method
        $(".selectPayMethod").click(function(){
            var idPay = $(this).attr("id");
            if (idPay == "pay-by-atm") {
                if (!$("#wrap-listCard").is(":visible")) {
                    $("#wrap-listCard").slideDown();
                    $("#iconChoose").hide();
                }
                if ($("#wrap-listCard-inter").is(":visible")) {
                    $("#wrap-listCard-inter").slideUp();

                    $("#listCardInter a.chooseBank").removeClass("chooseBank");
                    $("#iconChoose").hide();
                    $("#interCardName").val('');
                    $("#select-other-bank-inter").hide().siblings("li").show();
                }
            } else if(idPay == "pay-by-visa"){
                if (!$("#wrap-listCard-inter").is(":visible")) {
                    $("#wrap-listCard-inter").slideDown();
                    $("#iconChoose").hide();
                }
                if ($("#wrap-listCard").is(":visible")) {
                    $("#wrap-listCard").slideUp();

                    $("#listCard a.chooseBank").removeClass("chooseBank");
                    $("#iconChoose").hide();
                    $("#atmBankName").val('');
                    $("#select-other-bank").hide().siblings("li").show();
                }
            } else{
                if ($("#wrap-listCard").is(":visible")) {
                    $("#wrap-listCard").slideUp();

                    $("#listCard a.chooseBank").removeClass("chooseBank");
                    $("#iconChoose").hide();
                    $("#atmBankName").val('');
                    $("#select-other-bank").hide().siblings("li").show();
                } else if ($("#wrap-listCard-inter").is(":visible")) {
                    $("#wrap-listCard-inter").slideUp();

                    $("#listCardInter a.chooseBank").removeClass("chooseBank");
                    $("#iconChoose").hide();
                    $("#interCardName").val('');
                    $("#select-other-bank-inter").hide().siblings("li").show();
                }
            }

        });


        $(".bankInfo").click(function(e){
            var bankName = $(this).attr("id").split('_')[1];
            $("#atmBankName").val(bankName);

            $("#iconChoose").show().appendTo($(this).parent());
            $("#listCard a.chooseBank").removeClass("chooseBank");
            $(this).parent().addClass("chooseBank");
            $(this).closest("li").siblings("li").hide();
            $("#select-other-bank").show();
        });
        $(".cardInfo").click(function(e){
            var cardName = $(this).attr("id").split('_')[1];
            $("#interCardName").val(cardName);

            $("#iconChoose").show().appendTo($(this).parent());
            $("#listCardInter a.chooseBank").removeClass("chooseBank");
            $(this).parent().addClass("chooseBank");
            $(this).closest("li").siblings("li").hide();
            $("#select-other-bank-inter").show();
        });

        $("#select-other-bank").click(function(){
            $(this).hide().siblings("li").show();
            $("#listCard a.chooseBank").removeClass("chooseBank");
            $("#iconChoose").hide();
            $("#atmBankName").val('');
        })

        $("#select-other-bank-inter").click(function(){
            $(this).hide().siblings("li").show();
            $("#listCardInter a.chooseBank").removeClass("chooseBank");
            $("#iconChoose").hide();
            $("#interCardName").val('');
        })
    })
</script>                <div class="clearfix"></div>
            </div>

            <div>
                <label>
                    <input class="selectPayMethod" type="radio" name="payment_type" value="VTCPay"  >
                    <span>TÀI KHOẢN VÍ ĐIỆN TỬ VTC PAY</span>
                </label>
            </div>
        </div>
        <span class="form-invalid-data-info"></span>
    </div>

    <div class="form-row">
        <button type="submit" id="btnSubmit" name="btnSubmit">TIẾP TỤC</button>
    </div>

</form>
<div id="confirmStep" class="">
    <h1>Xác nhận thông tin</h1>
    <div class="form-row">
        <label>
            <span class="lbl">Họ tên: </span>
            <span class="lblValue"> Cao Van Minh </span>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span class="lbl">Email: </span>
            <span class="lblValue"> caovanminh@gmail.com </span>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span class="lbl">Số điện thoại: </span>
            <span class="lblValue"> 9347859435 </span>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span class="lbl">Số tiền: </span>
            <span class="lblValue"> 500,000 <small>đ</small> </span>
        </label>
    </div>
            <div class="form-row">
        <label>
            <span class="lbl">Phương Thức Thanh Toán: </span>
                <span class="lblValue">
                    THẺ ATM NỘI ĐỊA <br/><em>Ngân hàng Ngoại thương Việt Nam (Vietcombank)</em>                </span>
        </label>
    </div>
    <div class="form-row">
        <form action="#" method="POST">
            <button type="submit" id="btnSubmit" name="btnPayNow">THANH TOÁN NGAY</button>
            <button type="button" name="btnback" id="btnBack"> SỬA THÔNG TIN </button>
            <input type="hidden" name="customer_name" value="Cao Van Minh" />
            <input type="hidden" name="customer_email" value="caovanminh@gmail.com" />
            <input type="hidden" name="customer_phone" value="9347859435" />
            <input type="hidden" name="payment_type" value="Bank" />
            <input type="hidden" name="payment_card_name" value="" />
            <input type="hidden" name="payment_bank_name" value="Vietcombank" />
            <input type="hidden" name="total" value="500000" />
            <input type="hidden" name="customer_note" value="" />
            <input type="hidden" name="bookingid" value="" />
            <input type="hidden" name="token" value="" />
        </form>
    </div>
</div>    </div>


    <div class="tabContent" id="bankInfo">
        <h2 class="tabTitle">Thanh Toán Chuyển Khoản</h2>
        
<div id="content_transfer">
<p id="bank-note">
    Để booker kiểm tra và xuất vé trong thời gian sớm nhất quý khách vui lòng: <br>
    - Nếu chuyển khoản qua Internet Banking quý khách vui lòng ghi <span class="bold red">Mã Đơn Hàng</span> hoặc <span class="bold red">Số điện thoại</span> liên lạc vào nội dung thanh toán.
    <br>
    - Nếu chuyển khoản qua ATM, sau khi chuyển khoản quý khách vui lòng gọi điện thoại thông báo cho chúng tôi.
    <br>
    - Gọi xác nhận thanh toán ngay sau khi chuyển khoản thành công.

</p>
<h5 class="partTitle">I. TÀI KHOẢN <span class="red">CÁ NHÂN</span></h5>
<div id="bank-account-person">
<table class="tbl_bank">
<tbody>
<tr class="tr-bank">
    <td class="bank-logo">
        <img alt="" src="images/lg_scb.jpg">
    </td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Sài Gòn Thương Tín - Sacombank
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">0600 9880 7570</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">Tân Bình</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg-vcb.png"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Ngoại Thương Việt Nam - Vietcombank
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">0421 000 459 049</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">Hồ Chí Minh</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_tech.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Kỹ Thương Việt Nam - Techcombank
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">1902 9010 844 011</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">PGD Bàu Cát</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/logo_acb.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Á Châu - ACB
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">194 495 869</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">Lũy  Bán Bích</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_vietinbank.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Công Thương Việt Nam - VIETINBANK
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">711AC 8192033</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">PGD Bàu Cát</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_agb.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam - AGRIBANK
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">6460 205 482 957</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">Tân Phú</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_bidv.gif"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Đầu tư và Phát triển Việt Nam - BIDV
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">1351 0000 689 100</td>
            </tr>
            <tr>
                <td class="bank-label">Chi nhánh :</td>
                <td class="bank-branch">Gia Định</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_dab.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân Hàng TMCP Đông Á - DAB
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">0108 855 360</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_hdbank.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Phát Triển Tp.HCM - HDBank
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">055 7040 7000 4147</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

<tr class="tr-bank">
    <td class="bank-logo"><img alt="" src="images/lg_mbbank.jpg"></td>
    <td class="td-bank-detail">
        <table class="tbl-bank-detail">
            <tbody>
            <tr class="bank-name">
                <td colspan="2">
                    Ngân hàng TMCP Quân Đội - MBBank
                </td>
            </tr>
            <tr>
                <td class="bank-label">Tên tài khoản :</td>
                <td class="com-name">
                    HUỲNH NGỌC ĐAN THỦY
                </td>
            </tr>
            <tr>
                <td class="bank-label">Số tài khoản :</td>
                <td class="bank-number">1000 103 308 007</td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>

</tbody>
</table>

</div>


<h5 class="partTitle">II. TÀI KHOẢN <span class="red">CÔNG TY</span></h5>
<div id="bank-account-company">
    <table class="tbl_bank">
        <tbody>
        <tr class="tr-bank">
            <td class="bank-logo">
                <img alt="" src="images/lg-vcb.png">
            </td>
            <td class="td-bank-detail">
                <table class="tbl-bank-detail">
                    <tbody>
                    <tr class="bank-name">
                        <td colspan="2">
                            Ngân hàng TMCP Ngoại Thương Việt Nam - Vietcombank
                        </td>
                    </tr>
                    <tr>
                        <td class="bank-label">Tên tài khoản :</td>
                        <td class="com-name">
                            CÔNG TY TNHH DT-TM-DV LIÊN VIỆT
                        </td>
                    </tr>
                    <tr>
                        <td class="bank-label">Số tài khoản :</td>
                        <td class="bank-number">0441 000 671 342</td>
                    </tr>
                    <tr>
                        <td class="bank-label">Chi nhánh :</td>
                        <td class="bank-branch">Tân Bình</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>


        </tbody>
    </table>
</div>
</div>    </div>

    <div class="tabContent" id="payAtOffice">
        <h2 class="tabTitle">Thanh Toán Tại Phòng Vé Liên Việt</h2>
        <div class="methods-content" id="content_office">
            <div class="content office">
                Sau khi đặt hàng thành công, bạn có thể đến văn phòng Săn Vé Máy Bay để thanh toán và nhận vé.
                <p>
                    <span class="bold upper red"> CÔNG TY TNHH ĐT TM VÀ DV LIÊN VIỆT </span><br>
                    274 Vườn Lài ,P.Phú Thọ Hòa, Q.Tân Phú, TP. HCM  - Hotline: 08 6274 1999 - 0903 413 254<br>
                    Email: <a href="mailto:sanvelienviet@gmail.com"> sanvelienviet@gmail.com </a>
                </p>
            </div>
        </div>
    </div>

    <div class="tabContent" id="payAtHome">
        <h2 class="tabTitle">Thanh Toán Tại Nhà</h2>
        <div class="methods-content" id="content_athome">
            <div class="content athome">
                Trong thời gian từ thứ 2-7 ngày làm việc, nhân viên sẽ đến địa chỉ của bạn để giao vé &amp; thu tiền .
                Với hình thức này, bạn sẽ phải mất phí giao vé là <span class="red bold">25,000 VNĐ</span>.
                Với phương thức thanh toán tại nhà,
                nhân viên VMB Liên Việt sẽ đến địa chỉ ở mục Thông tin liên hệ bạn đã đăng ký ở bước trước để giao vé và thu tiền.<br>
                <span class="red bold"> Thanh toán tại nhà chỉ áp dụng cho các quận huyện trong TP.HCM</span>.
            </div>
        </div>
    </div>


    <div class="tabContent" id="instruction">
        <h2 class="tabTitle">Hướng dẫn</h2>
            <div class="post-editor clearfix">
                <p style="color: #222222; text-align: justify;">Đang cập nhật</p>            </div><!--.post-editor-->
    </div>
</div>

<div id="footer-bottom">
    <div class="container">
        <div class="pull-left">
            <p style="font-size:11px;color:white;padding-top:10px">
                © 2014 <a href="#" style="color:#ff5500">Công Ty TNHH ĐTTM và DV Liên Việt</a>.<br/>
                MST: 0312617045. Cấp ngày 10/01/2014. Nơi cấp: TP.Hồ Chí Minh. </p>
        </div>

        <div class="pull-right">
            <div class="logoSecure">
                <a href="http://online.gov.vn/CustomWebsiteDisplay.aspx?DocId=23630" target="_blank">
                    <img src="images/dathongbao_2.png" style="max-height: 50px;" />
                </a>
                <script language="JavaScript" type="text/javascript">
                    TrustLogo("https://thanhtoan.sanvemaybay.vn/images/comodossl.png", "CL1", "none");
                </script>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".menu-item").click(function(e){
            e.preventDefault();
            $(this).addClass("current-menu-item").siblings().removeClass("current-menu-item");
            var contentId = $(this).find("a").attr("href");
            $(contentId).show().siblings(".tabContent").hide();
            if($("#colslapMenu").is(":visible")) {
                $("#bottom-header").slideUp();
            }
        })

        $("#btnBack").click(function(e){
            e.preventDefault();
            $("#confirmStep").hide();
            $("#payment-info").show();
            return false;
        })

        $("#colslapMenu").click(function(e){
            e.preventDefault();
            $("#bottom-header").slideToggle(1);
        })
    })
</script>

</body>
</html>
