<%@page import="java.net.URLDecoder"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="tutorialJavaConnect.Security" %>	
<%@ page import="java.io.*" %>
<%@ page import="java.util.*" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Show result pay</title>
</head>
<body>
<%		
//if(request.getParameter("data") != null)
	//{
		String Security_Key="NguyenThanhTrung68";
		// processce server PayGate send to merchant.
		String responseData = request.getParameter("data");
		String sign = request.getParameter("sign") == null ? "":request.getParameter("sign");
		String status=request.getParameter("status");
		String website_id=request.getParameter("website_id");
		String order_code=request.getParameter("order_code");
		String amount=request.getParameter("amount");
		
		
	    
	    //output.println(String.format("Data: %s, sign: %s",responseData,sign));
	    
	    if(sign.equals("")||status.equals("")||website_id.equals("")||order_code.equals("")||amount.equals("")){
			 out.println("Khong co tham so tra ve ");
			 out.println("<BR>");
		}
	    String publicKey = this.getServletContext().getRealPath(this.getServletContext().getInitParameter("PAYGATE_PUBLIC_KEY"));
		
		String plaintext = status + "-"  + website_id + "-" + order_code + "-" +  amount + "-" + Security_Key;
	    
        String merchantSign= Security.sha256(plaintext);
        Boolean isVerify = (merchantSign.equals(sign));
			/*
			data= status| orderID|websiteID
			status: Trạng thái đơn hàng, giá trị: 
				1: Thành công
				0: Nghi vấn, đang chờ xử lý
				-1: Thất bại (<0)
				2: Thanh toán tạm giữ (thành công)
			orderID: Mã đơn hàng
			websiteID: Mã của website đăng ký trên Paygate, xem trong phần quản lý tích 
			*/
        	 if (merchantSign.equalsIgnoreCase(sign))
                {
                    out.println(String.format("Chu ky hop le"));
                    if (status.equals("1") || status.equals("2"))
                        out.println("GD thanh cong");
                    else if (status.equals("-1"))
                         out.println("GD that bai");
                    else if (status.equals("-99"))
                         out.println("GD dang xu ly");
                    else
                        out.println("GD dang xu ly");
                }
                else
                    out.println("Chu ky sai"+sign);  
        
        
        
        
	//}
	
	
%>
</body>
</html>