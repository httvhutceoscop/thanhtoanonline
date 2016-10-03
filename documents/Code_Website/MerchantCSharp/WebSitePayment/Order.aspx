<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Order.aspx.cs" Inherits="WebSitePayment.Order" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Sample paygate</title>
    <style type="text/css">
        .style1
        {
            height: 18px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
        <asp:label id="Label1" runat="server"></asp:label>
        <table>
               <tr>
                <td>
                    Mã website
                </td>
                <td>
                    <asp:textbox id="txtWebsiteID" runat="server" text="453"></asp:textbox>
                </td>
            </tr>

               <tr>
                <td class="style1">
                    Đơn vị thanh toán:
                </td>
                <td class="style1">
                    <asp:textbox id="txtPaymentMethod" runat="server" text="1"></asp:textbox>
                    &nbsp;<i>1:VND</i>
                </td>
            </tr>

            <tr>
                <td>
                    Mã đơn hàng
                </td>
                <td>
                    <asp:textbox id="txtOrderID" runat="server" text="123456">
                    </asp:textbox>
                </td>
            </tr>

               <tr>
                <td>
                    Mệnh giá:
                </td>
                <td>
                    <asp:textbox id="txtTotalAmount" runat="server" text="30000"></asp:textbox>
                </td>
            </tr>

             <tr>
                <td>
                    Tài khoản nhận
                </td>
                <td>
                    <asp:textbox id="txtReceiveAccount" runat="server" text="0983666999"></asp:textbox>
                </td>
            </tr>

             <tr>
                <td>
                    Tên khách hàng
                </td>
                <td>
                    <asp:textbox id="txtCustomer_name" runat="server">Khuc Huan</asp:textbox>
                </td>
            </tr>

             <tr>
                <td>
                    Số điện thoại khách hàng
                </td>
                <td>
                    <asp:textbox id="txtCustomer_mobile" runat="server">
                    </asp:textbox>
                </td>
            </tr>

            <tr>
                <td>
                    Mô tả
                </td>
                <td>
                    <asp:textbox id="txtOrderDes" runat="server" text="Mua item"></asp:textbox>
                </td>
            </tr>
         
          <tr>
                <td>
                    Tham số bổ xung
                </td>
                <td>
                    <asp:textbox id="txtParamExtend" runat="server" text="">
                    </asp:textbox>
                </td>
            </tr>
         
           <tr>
                <td>
                    Url Return
                </td>
                <td>
                    <asp:textbox id="txtUrlReturn" runat="server" text="http://sandbox3.vtcebank.vn/SandboxTest/CustomerResult.aspx"></asp:textbox>
                </td>
            </tr>
           
           
            <tr>
                <td>
                </td>
                <td>
                    <asp:button id="Button1" runat="server" text="Thanh toán qua Paygate" onclick="Button1_Click"
                        width="188px" />
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>
