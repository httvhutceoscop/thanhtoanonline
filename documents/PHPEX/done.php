<?php
function verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign)
{
	
	// My plaintext
	$secret_key = "abc";
	$plaintext = $status . "-" . $website_id . "-" . $order_code . "-" . $amount . "-" . $secret_key;
	//print $plaintext;
	// Mã hóa sign
	$verify_secure_code = '';
	$verify_secure_code = strtoupper(hash('sha256', $plaintext));;
	// Xác th?c ch? ký c?a ch? web v?i ch? ký tr? v? t? VTC Pay
	if ($verify_secure_code === $sign) 		return strval($status);
	
	return false;
}
if(isset($_GET['status']) && !empty($_GET['status'])) #Nh?n thông tin tr? v?
{	
	#Tr?ng thái giao d?ch
	$status = @$_GET['status'];
	#Mã s?n ph?m, mã don hàng, gi? hàng giao d?ch
	$order_code = @$_GET['order_code'];
	#T?ng s? ti?n thanh toán
	$amount = @$_GET['amount'];
	#Website ID
	$website_id = @$_GET['website_id'];
	#L?y mã ki?m tra tính h?p l? c?a d?u vào
	$sign = @$_GET['sign'];
	$url = "";		#URL website c?a b?n
	$check = verifyPaymentUrl($status, $order_code, $amount, $website_id, $sign);
	
	
	
	if($check === false)
	{
		echo 'Ch? ký sai, có s? can thi?p t? bên ngoài <br/><a href = "'.$url.'">Quay l?i</a>';
	}
	else
	{
		if($check == 1 || $check == 2)
		{
			
			echo 'Thanh toán thành công!<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == 0)
		{
			echo 'Thanh toán dang x? lý <br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -1)
		{
			
			echo 'Giao d?ch th?t b?i<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -5)
		{
			
			echo 'Mã don hàng không h?p l?<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		elseif ($check == -6)
		{
			
			echo 'S? du không d? thanh toán<br/><a href = "'.$url.'">Quay l?i</a>';
		}
		else
		{
			
			echo 'Có l?i. Hãy th?c hi?n l?i!<br/><a href = "'.$url.'">Quay l?i</a>';
		}
	}
}
?>