﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebSitePayment
{
    public partial class CustomerResult : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            NLogLogger.LogInfo("url: " + Request.Url.AbsolutePath);
        }
    }
}