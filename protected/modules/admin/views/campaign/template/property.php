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
    margin: 0;
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
    font-family:'Roboto', Arial, Helvetica, sans-serif;
    font-wegith: 400;
    font-size: 12px;
    color: #FFF;
    margin: 0px;
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
    height: 238px;
    position: relative;
}
p.margin-text-lefttop {
    margin: 0;
}
p.margin-text-righttop {
}
p.text-content {
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
<!-- <body bgcolor="#f6f6f6" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0"> -->
<table border="0" align="center" bgcolor="#f6f6f6" class="full" width="595" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table background="<?php echo $baseUrl; ?>/asset/images/back-top-content-d2.jpg" style="display:block" class="back-full-content-primary" width="595" height="237" border="0" cellspacing="0" cellpadding="0">
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
                                <td width="380">
                                    <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="height: 40px;" />
                                    <p class="margin-text-lefttop" style="margin: 0px;">
                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="height: 5px; width: 26px;" />
                                        <font color="#FFFFFF" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                            <span style="font-size: 60px; font-weight:300;">The Hot List</span>
                                        </font>
                                    </p>
                                    <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="height: 5px;" />
                                    <p style="margin: 0px 0px 0px 28px;">
                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                            <span style="font-size: 17px; font-weight:300;">Property Update:</span>
                                            <br>
                                            <span style="font-size:28px; line-height: 1.3;">October 2013</span>&nbsp;&nbsp;
                                            <span style="background-color: #fcd000; font-size:17px;">&nbsp;Part 1&nbsp;</span>
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
            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 15px;" />
            <table bgcolor="#f6f6f6" width="595" border="0" cellspacing="0" cellpadding="0">
                <!-- /. Text Content -->
                <tr>
                    <td>
                        <table width="595" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="260">
                                    <table bgcolor="#FFF" width="535" style="width: 535px; margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>

                                                <table width="535" style="width: 535px; margin: 0 auto;" height="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="2">
                                                            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 15px;" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; width: 15px;" />
                                                        </td>
                                                        <td style="vertical-align: top;">
                                                            <img src="<?php echo $baseUrl; ?>/asset/images/property-1.jpg" style="display:block;" />
                                                        </td>
                                                        <td style="vertical-align: top; float: right;">
                                                            <table width="275" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td>
                                                                        <font color="#0d2a5f" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                            <span style="font-size: 15px; font-weight:300;">Rumah Dijual - Surabaya Barat:</span>
                                                                        </font>
                                                                        <br />
                                                                        <font color="#0d2a5f" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                            <span style="font-size: 22px; font-weight:400;">Graha Family P 123</span>
                                                                        </font>
                                                                    </td>
                                                                    <tr/>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="255" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td>
                                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-bed.png" style="display:block; float: left; margin-right: 10px;" />
                                                                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                            <span style="font-size: 12px; font-weight:300;">4</span>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-shower.png" style="display:block;float: left; margin-right: 10px;" />
                                                                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                            <span style="font-size: 12px; font-weight:300;">5</span>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-car.png" style="display:block;float: left; margin-right: 10px;" />
                                                                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                            <span style="font-size: 12px; font-weight:300;">2</span>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-lantai_bangunan.png" style="display:block;float: left; margin-right: 10px;" />
                                                                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                            <span style="font-size: 12px; font-weight:300;">270</span>
                                                                                        </font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-luas_bangunan.png" style="display:block; float: left; margin-right: 10px;" />
                                                                                        <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                            <span style="font-size: 12px; font-weight:300;">220</span>
                                                                                        </font>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <p style="clear:both; height:0px;"></p>
                                                                        </td>
                                                                        <tr/>
                                                                        <tr>
                                                                            <td>
                                                                                <table width="265" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <font color="#9cd70e" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                                <span style="font-size: 50px; font-weight:700;">4.5</span>
                                                                                                <span style="font-size: 24px; font-weight:400;">M</span>
                                                                                            </font>
                                                                                        </td>
                                                                                        <td style="text-align: right; float: right; margin-top: 15px;"><a target="_blank" href="#"><img src="<?php echo $baseUrl; ?>/asset/images/button-detail.png" style="display:block;" /></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                            </table>
                                                        </td>
                                                        </tr>
                                                </table>

                                                <table width="535" style="width: 535px; margin: 0 auto;" height="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 4px;" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-bottom:1px solid #cad7e5;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 7px;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; width: 15px;" />
                                                                    </td>
                                                                    <td>
                                                                        <font color="#0d2a5f" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                            <span style="font-size: 15px; font-weight:300;">Lokasi memiliki potensi untuk terus naik dikarenakan rencana pembangunan mal graha family telah disounding dan telah dipastikan pembangunannya.</span>
                                                                        </font>
                                                                    </td>
                                                                    <td>
                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/cw-score.png" style="display:block;" />
                                                                    </td>
                                                                    <td>
                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; width: 15px;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 8px;" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                </table>

                                            </td>
                                            </tr>
                                    </table>

                                </td>
                                </tr>

                                <?php for ($i=2; $i < 5; $i++) { ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="height: 7px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table bgcolor="#FFF" width="535" style="width: 535px; margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>

                                                    <table width="535" style="width: 535px; margin: 0 auto;" height="" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td colspan="2">
                                                                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 15px;" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">
                                                                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; width: 15px;" />
                                                            </td>
                                                            <td rowspan="2" style="vertical-align: top;">
                                                                <img src="<?php echo $baseUrl; ?>/asset/images/property-<?php echo $i; ?>.jpg" style="display:block;" />
                                                            </td>
                                                            <td style="vertical-align: top; float: right;">
                                                                <table width="270" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>
                                                                            <font color="#0d2a5f" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                <span style="font-size: 15px; font-weight:300;">Rumah Dijual - Surabaya Barat:</span>
                                                                            </font>
                                                                            <br />
                                                                            <font color="#0d2a5f" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                <span style="font-size: 19px; font-weight:400;">Citraland Taman Gapura EE 2</span>
                                                                            </font>
                                                                        </td>
                                                                        <tr/>
                                                                        <tr>
                                                                            <td>
                                                                                <table width="255" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-lantai_bangunan.png" style="display:block;float: left; margin-right: 10px;" />
                                                                                            <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                                <span style="font-size: 12px; font-weight:300;">270</span>
                                                                                            </font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-luas_bangunan.png" style="display:block; float: left; margin-right: 10px;" />
                                                                                            <font color="#000" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                                <span style="font-size: 12px; font-weight:300;">220</span>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <p style="clear:both; height:0px;"></p>
                                                                            </td>
                                                                            <tr/>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <img src="<?php echo $baseUrl; ?>/asset/images/cw-score.png" style="display: block;" />
                                                            </td>
                                                            <td rowspan="2">
                                                                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="width: 15px;" />
                                                            </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2">
                                                                    <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 8px;" />
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td>
                                                                                <font color="#9cd70e" style="font-weight:300;" face="'Roboto', Tahoma, arial">
                                                                                    <span style="font-size: 29px; font-weight:700;">4.5</span>
                                                                                    <span style="font-size: 15px; font-weight:400;">M</span>
                                                                                </font>
                                                                            </td>
                                                                            <td style="text-align: right; float: right;"><a target="_blank" href="#"><img src="<?php echo $baseUrl; ?>/asset/images/button-detail.png" style="display:block;" /></a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2">
                                                                    <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 12px;" />
                                                                </td>
                                                            </tr>
                                                    </table>
                                                </td>
                                                </tr>
                                        </table>

                                    </td>
                                    </tr>
                                    <?php } ?>
                        </table>

                    </td>
                    </tr>
                    <!-- /. End Text Content -->
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td>
                            <p style="margin: 0px; margin-left: 28px;">
                                <font color="#000" style="font-weight:300; font-size: 15px;" face="'Roboto', Tahoma, arial">
                                    <span style="font-size: 15px">
                                        <strong>Hubungi Christian di:</strong>
                                    </span>
                                </font>
                            </p>

                            <p style="margin: 0px;">
                                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 11px;" />
                                <table class="info-footer" style="width: 532px;
margin: 0px 0px 0px 24px;" width="545" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-ipod.png" width="14" height="21" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px">081 2352 7916, 031 7099 7273</span>
                                            </font>
                                        </td>
                                        <td>
                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-bb.png" width="16" height="12" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px">2937C1CF</span>
                                            </font>
                                        </td>
                                        <td align="right">
                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-mail.png" />&nbsp;
                                            <font color="#000" style="font-weight:300;" font-size: 13.5px; face="'Roboto', Tahoma, arial">
                                                <span style="font-size: 13.5px"><a href="mailto:christian@forumproperty.net">christian@forumproperty.net</a>
                                                </span>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 10px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $baseUrl; ?>/asset/images/icons/icon-facebook.png" />&nbsp;&nbsp;&nbsp;
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
                            <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 12px;" />
                        </td>
                    </tr>


            </table>
        </td>
        </tr>

        <!-- Bottom Content -->
        <tr>
            <td style="background-color: #000;">
                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 12px;" />
                <table style="width: 532px;
margin: 0px 0px 0px 24px;" width="545" border="0" align="center" cellpadding="0" cellspacing="0">
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
                <img src="<?php echo $baseUrl; ?>/asset/images/trans.gif" style="display:block; height: 12px;" />
            </td>
        </tr>
</table>

<!-- </body>
</html>
 -->
