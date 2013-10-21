<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edm Small</title>
 -->
<?php $baseUrl=Yii::app()->request->hostInfo . Yii::app()->request->baseUrl; $url = Yii::app()->request->hostInfo; ?>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto:400,300,700);

/* Client-specific Styles */

/* Force Outlook to provide a "view in browser" button. */
 #outlook a {
    padding:0;
}
/* Force Hotmail to display emails at full width */
 body {
    width:100% !important;
}
.ReadMsgBody {
    width:100%;
}
.ExternalClass {
    width:100%;
}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes. */
 body {
    -webkit-text-size-adjust:none;
    -ms-text-size-adjust:none;
}
/** 3. Yahoo paragraph fix: removes the proper spacing or the paragraph (p) tag. To correct we set the top/bottom margin to 1em in the head of the document. Simple fix with little effect on other styling. You do not need to move this inline. NOTE: It is also common to use two breaks instead of the paragraph tag but I think this way is cleaner and more semantic. NOTE: This example recommends 1em or 1.12 em. More info on setting web defaults: http://www.w3.org/TR/CSS21/sample.html or http://meiert.com/en/blog/20070922/user-agent-style-sheets/

  INLINE: Yes.
**/
 p {
    margin: 1em 0;
}
/** 4. Hotmail header color reset: Hotmail replaces your header color styles with a green color on H2, H3, H4, H5, and H6 tags. In this example, the color is reset to black for a non-linked header, blue for a linked header, red for an active header (limited support), and purple for a visited header (limited support).  Replace with your choice of color. The !important is really what is overriding Hotmail's styling. Hotmail also sets the H1 and H2 tags to the same size. 

INLINE: Yes.
**/
 h1, h2, h3, h4, h5, h6 {
    color: black !important;
    line-height: 100% !important;
}
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
    color: blue !important;
}
h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active {
    color: red !important;
    /* Preferably not the same color as the normal header link color.  There is limited support for psuedo classes in email clients, this was added just for good measure. */
}
h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
    color: purple !important;
    /* Preferably not the same color as the normal header link color. There is limited support for psuedo classes in email clients, this was added just for good measure. */
}
/** Outlook 07, 10 Padding issue: These "newer" versions of Outlook add some padding around table cells potentially throwing off your perfectly pixeled table.  The issue can cause added space and also throw off borders completely.  Use this fix in your header or inline to safely fix your table woes.

   More info: http://www.ianhoar.com/2008/04/29/outlook-2007-borders-and-1px-padding-on-table-cells/ 
   http://www.campaignmonitor.com/blog/post/3392/1px-borders-padding-on-table-cells-in-outlook-07/

   H/T @edmelly 

   INLINE: No
   **/
 table td {
    border-collapse:collapse;
}
/** BONUS: Adaptation of Brian Thies (Campaign Monitor) link color fix to render the Yahoo Short Cuts invisible. Yahoo short cuts are links that Yahoo places over certain text in your email without your knowledge.  In order to use this fix you need to make the text color the same of the actual font color of your email and reset a few elements. IMPORTANT: You then need to use the Responsys/Smith Harmon link color fix (#7) if you want to style your links to the color you want them to be.  If you don't, this fix will change all links to black in Yahoo.  

If you are not worried about Yahoo's shorcuts, just remove this code.  This is not applicable for Yahoo Classic. 

INLINE: No.
**/
 .yshortcuts, .yshortcuts a, .yshortcuts a:link, .yshortcuts a:visited, .yshortcuts a:hover, .yshortcuts a span {
    color: black;
    text-decoration: none !important;
    border-bottom: none !important;
    background: none !important;
}
/* Body text color for the New Yahoo.  This example sets the font of Yahoo's Shortcuts to black. */

/* body my-css */
 body {
    background-color: transparent;
    width: 595px;
    height: auto;
    margin: 0 auto;
    font-family:'Roboto', Arial, Helvetica, sans-serif;
    font-wegith: 400;
    font-size: 12px;
    color: #FFF;
}
table {
    border-collapse:collapse;
    border-spacing: 0;
    border: none;
}
table.full {
    border: none;
    width: 595px;
}
table.header {
    width: 595px;
    height: 71px;
    border: none;
}
p.margin-lgo-header {
    margin-left: 28px;
}
p.margin-right-header {
    margin-right: 35px;
}
table.back-full-content-primary {
    width: 595px;
    height: 273px;
    position: relative;
}
p.margin-text-lefttop {
    margin-left: 28px;
    line-height: 1.5;
}
p.margin-text-righttop {
    margin: -50px 30px 0px 0px;
    text-align:left;
    width: 101px;
}
p.text-content {
    margin: auto 3em 1em 2em;
    text-align: justify;
    line-height:1.5;
}
p.text-content b {
    text-decoration: underline;
}
table.info-footer a {
    color: #000;
    text-decoration: none;
}
</style>
</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
    <table border="0" class="full" width="595" cellspacing="0" cellpadding="0" style="text-align: center;" align="center">
        <tr>
            <td>
                <table background="<?php echo $baseUrl ?>/asset/images/back-top-content.jpg" class="back-full-content-primary" width="595" height="273" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="595" border="0" cellspacing="3" cellpadding="0">
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="380">

                                        <p style="margin-left: 28px; line-height: 1.5;">
                                            <font color="#FFFFFF" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 24px">Jika orang lain sibuk mencari "pembeli" property, Christian justru sibuk mencari "penjual" property... Ingin tau kenapa?
                                                    <br />
                                                    <br />
                                                </span>
                                            </font>
                                        </p>
                                    </td>
                                    <td align="right" width="120">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>

        <!-- Middle Content -->
        <tr>
            <td>
                <table bgcolor="#FFFFFF" width="595" border="0" cellspacing="0" cellpadding="0">
                    <!-- <tr>
          <td>&nbsp;</td>
        </tr> -->
                    <tr>
                        <td class="iframe-test">
                            <p style="margin: auto 3em 1em 2em; text-align: justify; line-height:1.5;">
                                <font color="#000" style="font-weight:300; font-size: 15px;" face="'Roboto', Tahoma, arial">
                                    <span style="font-size: 15px">
                                        Christian Wahyudi telah berkecimpung di dunia property brokerage sejak tahun 2002 bersama ERA Tjandra East. Dengan berjalannya waktu, berbagai usaha lain telah lahir di bawah entrepreneurship Christian, dan berkembang dengan sangat baik serta terlebih lagi adalah <b style="text-decoration: underline;">membuahkan jaringan / network dan sahabat yang sangat luas serta solid.</b>
                                    </span>
                                </font>
                            </p>

                            <p style="margin: auto 3em 1em 2em; text-align: justify; line-height:1.5;">
                                <font color="#000" style="font-weight:300; font-size: 15px;" face="'Roboto', Tahoma, arial">
                                    <span style="font-size: 15px">
                                        Christian sibuk
                                        <strong>mencari &quot;Penjual&quot;</strong> karena di jaringan / network businessnya yang saat ini telah mencapai 2500 VIP contacts, 100 di antaranya adalah
                                        <strong>&quot;Active Buyer&quot;</strong>yang selalu siap membeli property dengan nilai strategis tinggi, sementara contacts yang lain adalah dari kalangan mampu yang juga berpotensi.
                                    </span>
                                </font>
                            </p>

                            <p style="margin: auto 3em 1em 2em; text-align: justify; line-height:1.5;">
                                <font color="#000" style="font-weight:300; font-size: 15px;" face="'Roboto', Tahoma, arial">
                                    <span style="font-size: 15px">
                                        Pada kesempatan ini Christian ingin mengajak para rekan dan sahabat yang berminat untuk me-listing property atau mencari property, untuk dapat menghubungi serta memanfaatkan jaringan Christian.
                                    </span>
                                </font>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>
                            <p style="margin: auto 3em 1em 2em; text-align: left; line-height:1.5;">
                                <font color="#000" style="font-weight:300; font-size: 15px;" face="'Roboto', Tahoma, arial">
                                    <span style="font-size: 15px">
                                        <strong>Hubungi Christian di:</strong>
                                    </span>
                                </font>
                            </p>

                            <p class="text-content">
                                <table class="info-footer" style="width: 532px;
margin: 0px 0px 0px 24px;" width="545" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <img src="<?php echo $baseUrl ?>/asset/images/icons/icon-ipod.png" width="14" height="21" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px">081 2352 7916, 031 7099 7273</span>
                                            </font>
                                        </td>
                                        <td>
                                            <img src="<?php echo $baseUrl ?>/asset/images/icons/icon-bb.png" width="16" height="12" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px">2937C1CF</span>
                                            </font>
                                        </td>
                                        <td align="right">
                                            <img src="<?php echo $baseUrl ?>/asset/images/icons/icon-mail.png" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px"><a href="mailto:christian@forumproperty.net">christian@forumproperty.net</a>
                                                </span>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $baseUrl ?>/asset/images/icons/icon-facebook.png" />&nbsp;&nbsp;&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px"><a target="_blank" href="http://www.facebook.com/forumproperty">facebook.com/forumproperty</a>
                                                </span>
                                            </font>
                                        </td>

                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </p>

                        </td>
                    </tr>


                </table>
            </td>
        </tr>

        <!-- Bottom Content -->
        <tr>
            <td style="background-color: #000; height: 33px; min-height: 33px;">
                <table style="width: 532px;
margin: 0px 0px 0px 24px;" height="33" width="545" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left">
                            <!-- <p class="text-content"> -->
                            <font color="#FFF" style="font-weight:300; font-size: 11px;" face="'Roboto', Tahoma, arial">
                                <span style="font-size: 11px">
                                    Jika Anda merasa terganggu dengan email Christian, silahkan klik di sini.
                                </span>
                            </font>
                            <!-- </p> -->
                        </td>
                        <td align="right">
                            <font color="#FFF" style="text-align: right; font-weight:300; font-size: 11px;" face="'Roboto', Tahoma, arial">
                                <span style="font-size: 11px">
                                    Powered by Mark Design.
                                </span>
                            </font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

<!-- </html> -->
