<?php 
    
    class libpay
    {
        public function buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $amount,$customer_mobile,$websiteid,$secret_key,$vtcpay_url,$param_extend)
    	{
    		// M?ng c�c tham s? chuy?n t?i VTC Pay
            
    		$arr_param = array(
    			'return_url'		=>	strtolower(urlencode($return_url)),
    			'receiver'			=>	strval($receiver),
    			'transaction_info'	=>	strval($transaction_info),
    			'order_code'		=>	strval($order_code),
    			'amount'			=>	strval($amount)					
    		);
    		$currency = 2;	
    		
    		$plaintext = $websiteid  . "-" . $currency  . "-" . $arr_param['order_code'] . "-" . $arr_param['amount'] . "-" . $arr_param['receiver'] . "-" .$param_extend. "-" . $secret_key."-".$return_url;
    		
    		$sign = strtoupper(hash('sha256', $plaintext));
            
    		$data = "?website_id=" . $websiteid  ."&payment_method=" . $currency . "&order_code=" . $arr_param['order_code'] . "&amount=" . $arr_param['amount'] . "&receiver_acc=" .  $arr_param['receiver'];
    		
    		$data = $data . "&customer_mobile=" . $customer_mobile . "&order_des=" . $arr_param['transaction_info']  ."&sign=" . $sign."&param_extend=" . $param_extend."&urlreturn=".$return_url;
    		$destinationUrl = $vtcpay_url . $data;
    		$destinationUrl = str_replace("%3a",":",$destinationUrl);
    		$destinationUrl = str_replace("%2f","/",$destinationUrl);
    		return $destinationUrl;
    	}
		
		public function buildOrderStatusUrl($website_id, $order_code, $receiver_acc, $secret_key, $url,$port)
    	{
			    $plaintext="".$website_id . "-" . $order_code . "-" . $receiver_acc . "-" . $secret_key;
				$sign = strtoupper(hash('sha256', $plaintext));
			    $xmlpush="<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\">" .
					"<soapenv:Header/>" .
					"<soapenv:Body>" .
					"<tem:CheckPartnerTransation>" .
					"<tem:website_id>".$website_id."</tem:website_id>" .
					"<tem:order_code>".$order_code."</tem:order_code>" .
					"<tem:receiver_acc>".$receiver_acc."</tem:receiver_acc>" .
					"<tem:sign>".$sign."</tem:sign>" .
					"</tem:CheckPartnerTransation>" .
					"</soapenv:Body>" .
					"</soapenv:Envelope>";
			    $urlpar=parse_url($url);
			    $headers = array(
					"POST ".$urlpar['path']." HTTP/1.1",
					"Host: ".$urlpar['host']."",
					"Content-Type: text/xml; charset=utf-8",
					"SOAPAction: VTCOnline.Card.WebAPI/Request",
					"Content-Length: ".strlen($xmlpush)
                );
                $ch = curl_init(); // initialize curl handle 
                curl_setopt($ch, CURLOPT_VERBOSE, 1); // set url to post to 
                curl_setopt($ch, CURLOPT_PORT, $port);
                curl_setopt($ch, CURLOPT_URL, $url); // set url to post to 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable 
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
                curl_setopt($ch, CURLOPT_HEADER, 1); 
                curl_setopt($ch, CURLOPT_TIMEOUT, 40); // times out after 4s 
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlpush); // add POST fields 
                curl_setopt($ch, CURLOPT_POST, 1); 
                $result = curl_exec($ch); // run the whole process 
                return $result;
		}
        
        public function verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign)
    	{
    		// My plaintext
    		$secret_key = "kRIjJuB2fnyXcMH8GLWs/I2bb9Djwlp7bfswhfqFf";
    		$plaintext = $status . "-" . $website_id . "-" . $order_code . "-" . $amount . "-" . $secret_key;
    		//print $plaintext;
            // M� h�a sign
    		$verify_secure_code = '';
    		$verify_secure_code = strtoupper(hash('sha256', $plaintext));;
    		// X�c th?c ch? k� c?a ch? web v?i ch? k� tr? v? t? VTC Pay
    		if ($verify_secure_code === $sign) 		return strval($status);
    		
    		return false;
    	}
        
    }
?>