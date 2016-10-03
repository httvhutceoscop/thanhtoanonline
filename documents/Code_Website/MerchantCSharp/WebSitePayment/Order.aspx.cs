using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.IO;
using System.Configuration;


namespace WebSitePayment
{
    public partial class Order : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            // Link test demo tai VTC: http://sandbox3.vtcebank.vn/SandboxTest/Order.aspx
            // TK Pay test thanh toan: 0986699482 / 123456

            if (IsPostBack) return;
            txtOrderID.Text = DateTime.Now.ToString("yyyyMMddHHmmss");
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            try
            {
                var Security_Key = ConfigurationManager.AppSettings["SecretKey"];
                string plaintext = string.Format("{0}-{1}-{2}-{3}-{4}-{5}-{6}-{7}", txtWebsiteID.Text, txtPaymentMethod.Text, txtOrderID.Text,
                    txtTotalAmount.Text, txtReceiveAccount.Text, txtParamExtend.Text , Security_Key, txtUrlReturn.Text.Trim());
                                                
                string shaSign = Security.SHA256encrypt(plaintext);   
             
                string listparam = string.Format("?website_id={0}&payment_method={1}&order_code={2}&amount={3}&receiver_acc={4}&customer_name={5}&customer_mobile={6}&order_des={7}&param_extend={8}&sign={9}&urlreturn={10}",
                    txtWebsiteID.Text.Trim(), txtPaymentMethod.Text, txtOrderID.Text, txtTotalAmount.Text, txtReceiveAccount.Text,
                    txtCustomer_name.Text, txtCustomer_mobile.Text, txtOrderDes.Text, txtParamExtend.Text, shaSign
                    , Server.HtmlEncode( txtUrlReturn.Text));
                NLogLogger.LogInfo("data: " + plaintext +
                    Environment.NewLine + "sign: " + shaSign);

                string urlRedirect = ConfigurationManager.AppSettings["VTCPay_Url"] + listparam;
                Response.Redirect(urlRedirect, false);

            }
            catch (Exception ex)
            {
                Label1.Text = ex.ToString ();
                NLogLogger.Info(ex.ToString());
            }
        }
      
    }
}
