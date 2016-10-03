<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="tutorialJavaConnect.Security" %>	

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Pay by VtcPaygate</title>
</head>
<body>
<%
	if (request.getParameter("btnPostToPaygate") != null) {

		String vtcPagateUrl = this.getServletContext().getInitParameter("VTC_PAYGATE_URL");
		String privateFile = this.getServletContext().getRealPath(this.getServletContext().getInitParameter("PAYGATE_PRIVATE_KEY"));
		
		String key="NguyenThanhTrung68";
		// url muốn chuyển đến khi nhận kết quả trả về
		String urlReturn = "http://localhost:8080/tutorialJavaConnect/done.jsp";
		
		//sign: Mã hóa RSA của các trường = websiteid|paymentMethod|orderID|totalAmount|ReceiveAccount
		String plainText = request.getParameter("txtWebsiteID"); 
		plainText += "-" + request.getParameter("CurrentcyType");
		plainText += "-" + request.getParameter("txtOrderID");
		plainText += "-" + request.getParameter("txtAmount");		
		plainText += "-" + request.getParameter("txtReceiveAccount");
        plainText += "-" + request.getParameter("txtParamExtend");
		plainText += "-" + key;
		plainText += "-" + urlReturn;
				
        //12: Thay the private key cua cua ban
		String sign = Security.sha256(plainText);
		
		
			response.sendRedirect(vtcPagateUrl+"?website_id="+request.getParameter("txtWebsiteID")+"&payment_method="+request.getParameter("CurrentcyType")+"&order_code="+request.getParameter("txtOrderID")+"&amount="+request.getParameter("txtAmount")+"&receiver_acc="+request.getParameter("txtReceiveAccount")+"&customer_name="+request.getParameter("txtCustomer_name")+"&customer_mobile="+request.getParameter("txtCustomer_mobile")+"&order_des="+request.getParameter("txtOrderDes")+"&param_extend="+request.getParameter("txtParamExtend")+"&sign=" + sign+"&urlreturn="+urlReturn);
		
	} 
	else
	{
		out.println("Data error!");
	}
%>
</body>
</html>