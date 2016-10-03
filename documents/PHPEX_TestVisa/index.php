<?php 
    include 'lib.php';
    $libpayvtc=new libpay();
    /* 
        $return_url         : Url tra lai khi thanh toan thanh cong
        
        $receiver           : so dien thoai nhan tien
        $transaction_info   : Them thong tin cho giao dich
        $order_code         : ma giao dich duy nhat khong trung
        $amount             : Gia san pham khach hang mua
        $customer_mobile    : So dien thoai khach hang mua hang tren VTCPAY
        $websiteid          : website id tren VTCPAY
        $secret_key         : Key d?i tác t?o trên website khi dang ky dich vu 
        $vtcpay_url         : Url url doi tac call vao  VTCPAY "http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html" (test)
    */
	  // pay acount vtc
           
	   $return_url         ="htpps://localhost:8081/ExPayVTC/done.php";
        $receiver           ="0986699482";
        $transaction_info   ="Mua_hang_tai_website";
        $order_code         =strtotime("now");
        $amount             =1;
        $customer_mobile    ="0983666999";
        $websiteid          ="637";
        $secret_key         ="NguyenThanhTrung68";
        $vtcpay_url         ="http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/checkout.html";
        $url=$libpayvtc->buildCheckoutUrl($return_url,$receiver,$transaction_info,$order_code,$amount,$customer_mobile,$websiteid,$secret_key,$vtcpay_url,'PaymentType:Visa;Direct:Master');
		                                 //($return_url, $receiver, $transaction_info, $order_code, $amount,$customer_mobile,$websiteid,$secret_key,$vtcpay_url,$param_extend)             
		header("Location:".$url);
	   
		
		// Check order status
		//UrlCheck   : http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/WSCheckTrans.asmx
		//orderCode  :20160122100449
		//secret_key :NguyenThanhTrung68
		//websiteid  :637
		/*
		$website_id="637";
		$order_code="20160122100449";
		$receiver_acc="0972040069";
		$secret_key="NguyenThanhTrung68";
		$url="http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/WSCheckTrans.asmx";
		$port="80";
		$result=$libpayvtc->buildOrderStatusUrl($website_id, $order_code, $receiver_acc, $secret_key, $url,$port)
		echo $result;
		*/
		
?>