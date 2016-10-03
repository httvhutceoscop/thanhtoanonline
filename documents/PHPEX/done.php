<?php
function verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign)
{
	
	// My plaintext
	$secret_key = "abc";
	$plaintext = $status . "-" . $website_id . "-" . $order_code . "-" . $amount . "-" . $secret_key;
	//print $plaintext;
	// M� h�a sign
	$verify_secure_code = '';
	$verify_secure_code = strtoupper(hash('sha256', $plaintext));;
	// X�c th?c ch? k� c?a ch? web v?i ch? k� tr? v? t? VTC Pay
	if ($verify_secure_code === $sign) 		return strval($status);
	
	return false;
}
if(isset($_GET['status']) && !empty($_GET['status'])) #Nh?n th�ng tin tr? v?
{	
	#Tr?ng th�i giao d?ch
	$status = @$_GET['status'];
	#M� s?n ph?m, m� don h�ng, gi? h�ng giao d?ch
	$order_code = @$_GET['order_code'];
	#T?ng s? ti?n thanh to�n
	$amount = @$_GET['amount'];
	#Website ID
	$website_id = @$_GET['website_id'];
	#L?y m� ki?m tra t�nh h?p l? c?a d?u v�o
	$sign = @$_GET['sign'];
	$url = "";		#URL website c?a b?n
	$check = verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign);
	
	
	
	if($check === false)
	{
		echo 'Ch? k� sai, c� s? can thi?p t? b�n ngo�i <br/><a href = "'.$url.'">Quay l?i</a>';
	}
	else
	{
		if($check == 1 || $check == 2)
		{
			
			echo 'Thanh to�n th�nh c�ng!<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == 0)
		{
			echo 'Thanh to�n dang x? l� <br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -1)
		{
			
			echo 'Giao d?ch th?t b?i<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -5)
		{
			
			echo 'M� don h�ng kh�ng h?p l?<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -6)
		{
			
			echo 'S? du kh�ng d? thanh to�n<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		else
		{
			
			echo 'C� l?i. H�y th?c hi?n l?i!<br/><a href = "'.$url.'">Quay l?i</a>';
		}
	}
}
?>