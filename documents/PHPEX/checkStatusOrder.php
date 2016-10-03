<?php 
    $website_id="637";
	$order_code="20160122100449";
	$receiver_acc="0972040069";
	$secret_key="NguyenThanhTrung68";
	$url="http://sandbox1.vtcebank.vn/pay.vtc.vn/gate/WSCheckTrans.asmx";
	$port="80";
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
	$pieces = explode("<CheckPartnerTransationResult>", $result);
    $pieces1 = explode("</CheckPartnerTransationResult>", $pieces[1]);
    echo $pieces1[0];
?>