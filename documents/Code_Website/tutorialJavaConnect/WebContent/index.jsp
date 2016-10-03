<%@page import="org.apache.jasper.runtime.ProtectedFunctionMapper"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
	<%@page import="java.util.Calendar"%>
	<%@page import="java.text.SimpleDateFormat"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sample pay to VTC Pagate</title>
</head>
<body>
<%
	final String DATE_FORMAT_NOW = "yyyyMMddHHmmss";	
	Calendar cal = Calendar.getInstance();
	SimpleDateFormat sdf = new SimpleDateFormat(DATE_FORMAT_NOW);
	String orderId =  sdf.format(cal.getTime());
%>
<form action="pay.jsp" method="post">
<table style="border-collapse: collapse; width: 557px;" border="1"
	bordercolor="gray" cellpadding="4" cellspacing="4">
	<tbody style="width: 542px;">
		<tr>
			<td colspan="6" align="left" style="width: 524px;"><span
				class="do">ORDER INFOMACTION</span></td>
		</tr>
		<tr>
			<td colspan="60" align="left">
			<table width="80%" border="0" cellpadding="4" cellspacing="4">
				<tbody>
					<tr>
						<td width="237"  valign="middle"><b>Ma website: </b></td>
						<td width="236"  valign="middle"><input
							name="txtWebsiteID" type="text" value="637"
							id="txtWebsiteID" /></td>
					</tr>					
					<tr>
						<td width="237"  valign="middle"><b>Ma don hang: </b></td>
						<td width="236"  valign="middle"><input
							name="txtOrderID" type="text" value="<%=orderId %>"
							id="txtOrderID" /></td>
					</tr>
					<tr>
						<td width="237"  valign="middle"><b>Tong so tien:
						</b></td>
						<td width="236"  valign="middle"><input
							name="txtAmount" type="text" value="20000" id="txtAmount" /></td>
					</tr>
					<tr>
						<td width="237"  valign="middle"><b>Phuong thuc thanh toan: </b></td>
						<td width="236"  valign="middle"><select
							name="CurrentcyType" id="CurrentcyType">
							<option value="1">VND</option>
							<option value="2">VCOIN</option>							
							<option value="0">Ca hai</option>							
						</select></td>
					</tr>
					<tr>
						<td width="237"  valign="middle"><b>Tai khoan nhan:
						</b></td>
						<td width="236"  valign="middle"><input
							name="txtReceiveAccount" type="txtReceiveAccount" value="0972040069" id="txtReceiveAccount" /></td>
					</tr>
<tr><td width="237"  valign="middle"><b>Ten khach hang</td><td>
             <input name="txtCustomer_name" type="text" value="vtctest1" id="txtCustomer_name" /></td></tr>		
			 <tr><td width="237"  valign="middle"><b>Dien thoai khach hang</td><td>
             <input name="txtCustomer_mobile" type="text" value="0986699482" id="txtCustomer_mobile" /></td></tr>
<tr><td width="237"  valign="middle"><b>Mo ta</td><td>
             <input name="txtOrderDes" type="text" value="MUA_DIEN_THOAI" id="txtOrderDes" /></td></tr>		
<tr><td width="237"  valign="middle"><b>Hinh thuc thanh toan</td><td>
             <input name="txtParamExtend" type="text" value="" id="txtParamExtend" /></td></tr>					 
			 
					<tr>
						<td colspan="2"  valign="middle">							
							<input type="submit" name="btnPostToPaygate" value="CheckOut"> 
							</td>
					</tr>
				</tbody>
			</table>

			</td>
		</tr>
	</tbody>
</table>

</form>
</body>
</html>
