<?php
require_once "functions.php";

$customer_name     = '';
$email             = '';
$phone             = '';
$bookingid         = '';
$total             = '';
$note              = '';
$payment_type      = '';
$payment_card_name = '';
$payment_bank_name = '';

// msg for invalid input
$msg_customer_name = '';
$msg_email         = '';
$msg_phone         = '';
$msg_bookingid     = '';
$msg_total         = '';
$msg_note          = '';
$msg_payment_type  = '';
$msg_bank_type     = '';

$confirmStep       = false;

//tooltip
$tt_name = 'Vui lòng nhập tên không có dấu.';
$tt_email = 'Vui lòng nhập đúng địa chỉ email.';
$tt_phone = 'Vui lòng nhập đúng số điện thoại.';
$tt_total = 'Số tiền chỉ bao gồm chữ số không chứa khoảng trắng và các ký tự khác.';


if ($_POST) {

    if (isset($_POST['btnSubmit'])) {
        if (isset($_POST['customer_name'])) {
            $customer_name = $_POST['customer_name'];
            $msg_customer_name = validName($customer_name);
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $msg_email = validEmail($email);
        }

        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            $msg_phone = validPhone($phone);
        }

        if (isset($_POST['bookingid'])) {
            $bookingid = $_POST['bookingid'];
        }

        if (isset($_POST['total'])) {
            $total = $_POST['total'];
            $msg_total = validCost($total);
        }

        if (isset($_POST['note']))
            $note = $_POST['note'];

        if (!isset($_POST['payment_type'])) {
            $msg_payment_type = 'Vui lòng chọn phương thức thanh toán.';
        } else {
            $payment_type = $_POST['payment_type'];
            $payment_card_name = $_POST['payment_card_name'];
            $payment_bank_name = $_POST['payment_bank_name'];

            if (empty($payment_card_name) && $payment_type == 'Visa'){
                $msg_bank_type = 'Vui lòng chọn loại thẻ.';
            }

            if (empty($payment_bank_name) && $payment_type == 'Bank') {
                $msg_bank_type = 'Vui lòng chọn ngân hàng.';
            }
        }

        if (empty($msg_customer_name) && empty($msg_email) && empty($msg_phone) && empty($msg_total) 
            && empty($msg_payment_type) && empty($msg_bank_type)) {
            $confirmStep = true;
        }
    }

    if (isset($_POST['btnPayNow'])) {
        
        $customer_name     = $_POST['customer_name'];
        $customer_email    = $_POST['customer_email'];
        $customer_phone    = $_POST['customer_phone'];
        $payment_type      = $_POST['payment_type'];
        $payment_card_name = $_POST['payment_card_name'];
        $payment_bank_name = $_POST['payment_bank_name'];
        $total             = $_POST['total'];
        $customer_note     = $_POST['customer_note'];
        $bookingid         = $_POST['bookingid'];
        $token             = $_POST['token'];

        //TODO: set session for infomation
        $_SESSION['customer_name'] = $customer_name;
        $_SESSION['customer_email'] = $customer_email;
        $_SESSION['customer_phone'] = $customer_phone;
        $_SESSION['payment_type'] = $payment_type;
        $_SESSION['payment_card_name'] = $payment_card_name;
        $_SESSION['payment_bank_name'] = $payment_bank_name;
        $_SESSION['total'] = $total;
        $_SESSION['customer_note'] = $customer_note;
        $_SESSION['bookingid'] = $bookingid;
        $_SESSION['token'] = $token;

        include 'vendor/libpayment.php';
        $libpayvtc = new libpay();
        /* 
            $return_url         : Url tra lai khi thanh toan thanh cong            
            $receiver           : so dien thoai nhan tien
            $transaction_info   : Them thong tin cho giao dich
            $order_code         : ma giao dich duy nhat khong trung
            $amount             : Gia san pham khach hang mua
            $customer_mobile    : So dien thoai khach hang mua hang tren VTCPAY
            $websiteid          : website id tren VTCPAY
            $secret_key         : Key doi tac tao trên website khi dang ky dich vu 
            $vtcpay_url         : Url url doi tac call vao  VTCPAY "http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html" (test)
        */           
        $return_url       = getBaseUrl()."/ket-qua-thanh-toan.php";
        $receiver         = "0983666999"; //"0904128163";
        $transaction_info = "Thanh toán vé máy bay";
        $order_code       = "127";//strtotime("now");
        $amount           = $total;
        $customer_mobile  = $customer_phone;
        $websiteid        = 637; //1935;
        $secret_key       = "NguyenThanhTrung68";//"BaoTam!@#$%^&*()1234567890";
        $vtcpay_url       = "http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html";
        // $vtcpay_url       = "https://pay.vtc.vn/cong-thanh-toan/checkout.html";
        $url              = $libpayvtc->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $amount, $customer_mobile, $websiteid, $secret_key, $vtcpay_url, '');
                            //($return_url,  $receiver, $transaction_info, $order_code, $amount,$customer_mobile,$websiteid,$secret_key,$vtcpay_url,$param_extend)                  
        //var_dump($url);die;
        header("Location:".$return_url);
        // header("Location:".$url);
    }
}

$aMsgInvalid = [
    'customer_name' => $msg_customer_name,
    'email'         => $msg_email,
    'phone'         => $msg_phone,
    'bookingid'     => $msg_bookingid,
    'total'         => $msg_total,
    'note'          => $msg_note,
    'payment_type'  => $msg_payment_type,
    'bank_type'     => $msg_bank_type,
];

?>




<?php include_once "header.php";?>

<div class="main-content">
    <!-- You only need this form and the form-validation.css -->
    <div id="vtcTab" class="tabContent">
        <h2 class="tabTitle">Thanh Toán Online</h2>

        <form class="form-validation" id="payment-info" method="post" action="#" style="display:<?= $confirmStep ? 'none' : 'block'?>">
            <div style="text-align: left;font-weight: normal;line-height: 1.5em;" class="form-row">

            </div>
            <div class="form-row">
                <h2 class="titleBlock">Thông tin khách hàng</h2>
            </div>
            <div class="form-row form-input-name-row">
                <label>
                    <span>Họ tên<strong class="required-field">*</strong></span>
                    <input data-toggle="tooltip" data-placement="top" title="<?= $tt_name;?>" type="text" 
                            name="customer_name" value="<?= $customer_name ?>">
                </label>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['customer_name']; ?></span>

            </div>

            <div class="form-row form-input-email-row">
                <label>
                    <span>Email<strong class="required-field">*</strong></span>
                    <input data-toggle="tooltip" data-placement="top" title="<?= $tt_email;?>" type="text" 
                            name="email" value="<?= $email ?>">
                </label>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['email']; ?></span>
            </div>

            <div class="form-row">

                <label>
                    <span>Số điện thoại<strong class="required-field">*</strong></span>
                    <input data-toggle="tooltip" data-placement="top" title="<?= $tt_phone;?>" type="text" 
                            name="phone" value="<?= $phone ?>">
                </label>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['phone']; ?></span>

            </div>

            <div class="form-row">
                <h2 class="titleBlock">Thông tin thanh toán</h2>
            </div>

            <div class="form-row">

                <label>
                    <span>Mã đơn hàng <small>(nếu có)</small></span>
                    <input type="text" name="bookingid" value="<?= $bookingid ?>">
                </label>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['bookingid']; ?></span>

            </div>

            <div class="form-row">

                <label>
                    <span>Số tiền <small>(VNĐ)<strong class="required-field">*</strong></small></span>
                    <input data-toggle="tooltip" data-placement="top" title="<?= $tt_total;?>" type="text" 
                            name="total" value="<?= $total ?>">
                </label>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['total']; ?></span>

            </div>


            <div class="form-row">

                <label class="form-checkbox">
                    <span>Lý do thanh toán</span>
                    <textarea name="note"><?= $note ?></textarea>
                </label>

            </div>

            <div class="form-row">
                <span class="form-invalid-data-info"><?= $aMsgInvalid['payment_type']; ?></span>
                <label class="form-checkbox">
                    <span>Phương Thức Thanh Toán<strong class="required-field">*</strong></span>
                </label>

                <div class="form-radio-buttons">
                    <div>
                        <label>
                            <input <?= $payment_type == 'Visa' ? 'checked' : ''; ?> class="selectPayMethod" type="radio" 
                                    name="payment_type" value="Visa" id="pay-by-visa">
                            <input type="hidden" name="payment_card_name" value="<?= $payment_card_name;?>" id="interCardName">
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
                                        <img id="imgPaygate_Master" class="cardInfo" src="images/master.png" width="108"
                                             height="48" border="0">
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

                    <div class="clearfix">
                        <label>
                            <input <?= $payment_type == 'Bank' ? 'checked' : ''; ?> class="selectPayMethod" type="radio" 
                                    name="payment_type" value="Bank" id="pay-by-atm">
                            <input type="hidden" name="payment_bank_name" value="<?= $payment_bank_name;?>" id="atmBankName">
                            <span>THẺ ATM NỘI ĐỊA</span>
                        </label>

                        <div id="wrap-listCard" class="clearfix">
                            <?php include_once "listcard.php";?>
                            <img id="iconChoose" src="images/icon-hover.png"
                                 style="position: absolute; bottom: -5px; right: -5px;">
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    <div>
                        <label>
                            <input  <?= $payment_type == 'VTCPay' ? 'checked' : ''; ?> class="selectPayMethod" type="radio" 
                                    name="payment_type" value="VTCPay">
                            <span>TÀI KHOẢN VÍ ĐIỆN TỬ VTC PAY</span>
                        </label>
                    </div>
                </div>
                <span class="form-invalid-data-info"><?= $aMsgInvalid['bank_type']; ?></span>
            </div>

            <div class="form-row">
                <button type="submit" id="btnSubmit" name="btnSubmit">TIẾP TỤC</button>
            </div>
        </form>

        <?php //TODO: xac nhan thanh toan?>
        <?php if ($confirmStep) { ?>

        <div id="confirmStep" class="">
            <h1>Xác nhận thông tin</h1>
            <div class="form-row">
                <label>
                    <span class="lbl">Họ tên: </span>
                    <span class="lblValue"> <?= $customer_name;?> </span>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span class="lbl">Email: </span>
                    <span class="lblValue"> <?= $email;?> </span>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span class="lbl">Số điện thoại: </span>
                    <span class="lblValue"> <?= $phone;?> </span>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span class="lbl">Số tiền: </span>
                    <span class="lblValue"> <?= number_format($total, 0, '', ' ');?> <small>VNĐ</small> </span>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span class="lbl">Phương Thức Thanh Toán: </span>
                    <?php if (!empty($payment_bank_name)) { ?>
                    <span class="lblValue"> THẺ ATM NỘI ĐỊA <br/><em>Ngân hàng (<?= $payment_bank_name;?>)</em></span>
                    <?php } else if (!empty($payment_card_name)) { ?>
                    <span class="lblValue"> THẺ QUỐC TẾ <br/><em><?= $payment_card_name;?> Card</em></span>
                    <?php } else { ?>
                    <span class="lblValue"> TÀI KHOẢN VÍ ĐIỆN TỬ <br/><em><?= $payment_type;?></em></span>
                    <?php } ?>


                </label>
            </div>
            <div class="form-row">
                <form action="#" method="POST">
                    <button type="submit" id="btnSubmit" name="btnPayNow">THANH TOÁN NGAY</button>
                    <button type="button" name="btnback" id="btnBack"> SỬA THÔNG TIN</button>
                    <input type="hidden" name="customer_name" value="<?= $customer_name;?>"/>
                    <input type="hidden" name="customer_email" value="<?= $email;?>"/>
                    <input type="hidden" name="customer_phone" value="<?= $phone;?>"/>
                    <input type="hidden" name="payment_type" value="<?= $payment_type;?>"/>
                    <input type="hidden" name="payment_card_name" value="<?= $payment_card_name;?>"/>
                    <input type="hidden" name="payment_bank_name" value="<?= $payment_bank_name;?>"/>
                    <input type="hidden" name="total" value="<?= $total;?>"/>
                    <input type="hidden" name="customer_note" value="<?= $note;?>"/>
                    <input type="hidden" name="bookingid" value="<?= $bookingid;?>"/>
                    <input type="hidden" name="token" value=""/>
                </form>
            </div>
        </div>

        <?php }?>

    </div>


    <?php include_once "tabs/bankinfo.php";?>
    <?php include_once "tabs/payatoffice.php";?>
    <?php include_once "tabs/payathome.php";?>    

    <div class="tabContent" id="instruction">
        <h2 class="tabTitle">Hướng dẫn</h2>
        <div class="post-editor clearfix">
            <p style="color: #222222; text-align: justify;">Đang cập nhật</p></div><!--.post-editor-->
    </div>
</div>

<?php include_once "footer.php";?>
