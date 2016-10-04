<?php
    if(isset($_GET['status']) && !empty($_GET['status']))
    {   
        include 'vendor/libpayment.php';
        $libpayvtc = new libpay();

        $status = @$_GET['status'];
        $order_code = @$_GET['order_code'];
        $amount = @$_GET['amount'];
        $website_id = @$_GET['website_id'];
        $sign = @$_GET['sign'];
        $url = "";      
        $check = $libpayvtc->verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign);
        $msg = '';      
        
        if($check === false) {
            $msg = 'Chữ ký sai, có sự can thiệp bên ngoài <br/><a href = "'.$url.'">Quay lại</a>';
        } else {
            if($check == 1 || $check == 2) {                
                $msg = 'Thanh toán thành công!<br/><a href = "'.$url.'">Quay lại</a>';
            }
            elseif ($check == 0) {
                $msg = 'Thanh toán dang xử lý <br/><a href = "'.$url.'">Quay lại</a>';
            }
            elseif ($check == -1) {                
                $msg = 'Giao dịch thất bại<br/><a href = "'.$url.'">Quay lại</a>';
            }
            elseif ($check == -5) {                
                $msg = 'Mã đơn hàng không hợp lý<br/><a href = "'.$url.'">Quay lại</a>';
            }
            elseif ($check == -6) {                
                $msg = 'Số dư không đủ thanh toán<br/><a href = "'.$url.'">Quay lại</a>';
            }
            else {                
                $msg = 'Có lỗii. Hãy thực hiện lại!<br/><a href = "'.$url.'">Quay lại</a>';
            }
        }
    }
?>


<!DOCTYPE html>
<!-- saved from url=(0033)https://thanhtoan.sanvemaybay.vn/ -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <title>Thanh toán vé máy bay Liên Việt</title>
    <meta name="description" content="Thanh toán vé máy bay online, chấp nhận thẻ atm nội địa và visa, master card.">
    <meta name="keywords" content="san ve may bay, thanh toán vé máy bay, thẻ atm nội địa, thẻ visa, master card">
    <!--    <script src="https://apis.google.com/js/platform.js" async defer></script>-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <style>
        #top-menu {
            width: 100% !important;
            margin: auto;
            text-align: center;
        }

        #bankInfo {
            display: none;
        }

        h2.titleBlock {
            font-weight: normal;
            font-size: 1em;
            text-transform: uppercase;
            border-bottom: 1px dotted #cecece;
        }
    </style>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript"> //<![CDATA[
        var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
        document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
        //]]>
    </script>
    <script src="js/trustlogo.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>

    <style type="text/css" media="screen">
        #comodoTL {
            display: block;
            font-size: 8px;
            padding-left: 18px;
        }
    </style>
</head>
<body>

<?php include_once "header.php"; ?>

<div class="main-content">
    <!-- You only need this form and the form-validation.css -->
    <div id="vtcTab" class="tabContent retry_pay">
        <h2 class="tabTitle">Kết quả thanh toán</h2>
        <span class="red"> THANH TOÁN KHÔNG THÀNH CÔNG. XIN THỬ LẠI HOẶC LIÊN HỆ HOTLINE</span><br/><br/>
        <form action="http://localhost/thanhtoanonline/" method="POST">
            <div id="confirmStep" class="">
                <div class="form-row">
                    <label>
                        <span class="lbl">Họ tên: </span>
                        <span class="lblValue"> Nguyen Van A </span>
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        <span class="lbl">Email: </span>
                        <span class="lblValue"> nguyenvana@gmail.com </span>
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span class="lbl">Số điện thoại: </span>
                        <span class="lblValue"> 9347859345 </span>
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span class="lbl">Số tiền: </span>
                        <span class="lblValue"> 45,894,589 <small>đ</small> </span>
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        <span class="lbl">Lý do thanh toán: </span>
                        <span class="lblValue"> ksdfjsldf </span>
                    </label>
                </div>
                <div class="form-row">
                    <span class="form-invalid-data-info" id="bankNameError"></span>
                    <label class="form-checkbox">
                        <span>Phương Thức Thanh Toán</span>
                    </label>
                    <div class="form-radio-buttons">
                        <div>
                            <label>
                                <input class="selectPayMethod" type="radio" id="pay-by-visa" name="payment_type"
                                       value="Visa">
                                <input type="hidden" name="payment_card_name" value="" id="interCardName">
                                <span>THẺ QUỐC TẾ VISA, MASTERCARD, JCB</span>
                            </label>
                            <div id="wrap-listCard-inter" class="clearfix">
                                <ul id="listCardInter" class="listCard">
                                    <li>
                                        <a id="card_Visa" style="cursor: pointer;">
                                            <img id="imgPaygate_Visa" class="cardInfo" src="images/visa.png" width="108"
                                                 height="48" border="0">
                                        </a>
                                    </li>
                                    <li>
                                        <a id="card_Master" style="cursor: pointer;">
                                            <img id="imgPaygate_Master" class="cardInfo" src="images/master.png"
                                                 width="108" height="48" border="0">
                                        </a>
                                    </li>
                                    <li>
                                        <a id="card_JCB" style="cursor: pointer;">
                                            <img id="imgPaygate_JCB" class="cardInfo" src="images/jcb.png" width="108"
                                                 height="48" border="0">
                                        </a>
                                    </li>
                                    <li id="select-other-bank-inter">
                                        <a style="cursor: pointer; border-radius: 9px;">
                                            <img class="otherBank" src="images/other-bank.jpg" width="108" height="48"
                                                 border="0">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div>
                            <label>
                                <input class="selectPayMethod" id="pay-by-atm" type="radio" name="payment_type"
                                       value="Bank" checked="checked">
                                <input type="hidden" name="payment_bank_name" value="MB" id="atmBankName">
                                <span>THẺ ATM NỘI ĐỊA</span>
                            </label>
                            <div id="wrap-listCard" class="clearfix">
                                <?php include_once "listcard.php"; ?>
                                <img id="iconChoose" src="https://pay.vtc.vn/Content/images/icon-hover.png"
                                     style="position: absolute; bottom: -5px; right: -5px;">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div>
                            <label>
                                <input class="selectPayMethod" type="radio" name="payment_type" value="VTCPay">
                                <span>TÀI KHOẢN VÍ ĐIỆN TỬ VTC PAY</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <button type="submit" id="btnSubmit" name="btnPayNow">THANH TOÁN NGAY</button>
                    <input type="hidden" name="customer_name" value="Nguyen Van A"/>
                    <input type="hidden" name="customer_email" value="nguyenvana@gmail.com"/>
                    <input type="hidden" name="customer_phone" value="9347859345"/>
                    <input type="hidden" name="total" value="45894589"/>
                    <input type="hidden" name="customer_note" value="ksdfjsldf"/>
                    <input type="hidden" name="bookingid" value="0"/>
                    <input type="hidden" name="token" value=""/>
                </div>
            </div>
        </form>
    </div>

    <?php include_once "tabs/bankinfo.php";?>
    <?php include_once "tabs/payatoffice.php";?>
    <?php include_once "tabs/payathome.php";?>
</div>


<?php include_once "footer.php"; ?>

</body>
</html>