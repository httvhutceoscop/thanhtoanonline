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
    public partial class Done : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            // Lay cac ket qua tra ve
            int status = 0;
            int website_id = 0;
            string order_code = string.Empty;
            int amount = 0;
            string vtcsign = string.Empty;

            try
            {
                // Day la trang nhan ket qua thanh toan duoi hinh thuc POST (Server to Server)                
                // Doi tac can trien khai trang nhan nay de luon nhan duoc ket qua tra ve tu VTC nham giam cac giao dich phat sinh                

                var Security_Key = ConfigurationManager.AppSettings["SecretKey"];
                if (Request.HttpMethod.ToUpper() == "POST")
                {
                    // Tiến hành thực hiện update trạng thái cho giao dịch và post tới server merchant.
                    string data = Request.Form.Get("data") ?? "";
                    string sign = Request.Form.Get("sign") ?? "";
                    
                    NLogLogger.LogInfo("Ket qua POST: " +
                        "data: " + data + Environment.NewLine +
                        "sign: " + sign);
                    return;
                }

                if (Request.QueryString["status"] == null || Request.QueryString["website_id"] == null || Request.QueryString["order_code"] == null
                    || Request.QueryString["amount"] == null || Request.QueryString["sign"] == null)
                {
                    lblReport.Text = "Khong du tham so tra ve";
                    return;
                }

                status = Convert.ToInt32(Request.QueryString["status"]);
                website_id = Convert.ToInt32(Request.QueryString["website_id"]);
                order_code = Request.QueryString["order_code"];
                amount = Convert.ToInt32(Request.QueryString["amount"]);
                vtcsign = Server.HtmlDecode(Request.QueryString["sign"].ToString().Replace(" ", "+"));

                string plaintext = status + "-" + website_id + "-" + order_code + "-" + amount + "-" + Security_Key;

                string merchantSign = Security.SHA256encrypt(plaintext);
                bool isVerify = (merchantSign == vtcsign);
                if (isVerify)
                {
                    lblVerify.Text = "Chu ky hop le";
                    if (status == 1 || status == 2)
                        lblReport.Text = "GD thanh cong";
                    else if (status == -1)
                        lblReport.Text = "GD that bai";
                    else if (status == -99)
                        lblReport.Text = "GD dang xu ly";
                    else
                        lblReport.Text = "GD dang xu ly";
                }
                else
                    lblVerify.Text = "Chu ky sai";

            }
            catch (Exception ex)
            {
                lblReport.Text = "" + ex;

            }
        }



    }
}