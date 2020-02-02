{{-- <!DOCTYPE html>
<html>
<head>
    <title>Dominican Queue Reservation System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-primary text-center">{{ $details['title'] }}</h1>
    <p class="text-center mt-2">{{ $details['body'] }}</p>
    <h1 class="mt-5 text-center">A-32</h1>
    <p class="text-center text-secondary">Accounting</p>

<hr class="py-5">
    <p class="text-muted mt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi, quibusdam dignissimos! Placeat itaque aut debitis, tempora, maiores vel excepturi non est incidunt ex dolores blanditiis?</p>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html> --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->


    <style>
    #outlook a {
    padding: 0;
}

.ExternalClass {
    width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
    line-height: 100%;
}

.es-button {
    mso-style-priority: 100 !important;
    text-decoration: none !important;
}

a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

.es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
}

.es-button-border:hover a.es-button {
    background: #ffffff !important;
    border-color: #ffffff !important;
}

.es-button-border:hover {
    background: #ffffff !important;
    border-style: solid solid solid solid !important;
    border-color: #3d5ca3 #3d5ca3 #3d5ca3 #3d5ca3 !important;
}

td .es-button-border:hover a.es-button-1580414835798 {
    background: #cc0000 !important;
    border-color: #cc0000 !important;
}

td .es-button-border-1580414844957:hover {
    background: #cc0000 !important;
}

/*
END OF IMPORTANT
*/
s {
    text-decoration: line-through;
}

html,
body {
    width: 100%;
    font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
}

table {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    border-collapse: collapse;
    border-spacing: 0px;
}

table td,
html,
body,
.es-wrapper {
    padding: 0;
    Margin: 0;
}

.es-content,
.es-header,
.es-footer {
    table-layout: fixed !important;
    width: 100%;
}

img {
    display: block;
    border: 0;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
}

table tr {
    border-collapse: collapse;
}

p,
hr {
    Margin: 0;
}

h1,
h2,
h3,
h4,
h5 {
    Margin: 0;
    line-height: 120%;
    mso-line-height-rule: exactly;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
}

p,
ul li,
ol li,
a {
    -webkit-text-size-adjust: none;
    -ms-text-size-adjust: none;
    mso-line-height-rule: exactly;
}

.es-left {
    float: left;
}

.es-right {
    float: right;
}

.es-p5 {
    padding: 5px;
}

.es-p5t {
    padding-top: 5px;
}

.es-p5b {
    padding-bottom: 5px;
}

.es-p5l {
    padding-left: 5px;
}

.es-p5r {
    padding-right: 5px;
}

.es-p10 {
    padding: 10px;
}

.es-p10t {
    padding-top: 10px;
}

.es-p10b {
    padding-bottom: 10px;
}

.es-p10l {
    padding-left: 10px;
}

.es-p10r {
    padding-right: 10px;
}

.es-p15 {
    padding: 15px;
}

.es-p15t {
    padding-top: 15px;
}

.es-p15b {
    padding-bottom: 15px;
}

.es-p15l {
    padding-left: 15px;
}

.es-p15r {
    padding-right: 15px;
}

.es-p20 {
    padding: 20px;
}

.es-p20t {
    padding-top: 20px;
}

.es-p20b {
    padding-bottom: 20px;
}

.es-p20l {
    padding-left: 20px;
}

.es-p20r {
    padding-right: 20px;
}

.es-p25 {
    padding: 25px;
}

.es-p25t {
    padding-top: 25px;
}

.es-p25b {
    padding-bottom: 25px;
}

.es-p25l {
    padding-left: 25px;
}

.es-p25r {
    padding-right: 25px;
}

.es-p30 {
    padding: 30px;
}

.es-p30t {
    padding-top: 30px;
}

.es-p30b {
    padding-bottom: 30px;
}

.es-p30l {
    padding-left: 30px;
}

.es-p30r {
    padding-right: 30px;
}

.es-p35 {
    padding: 35px;
}

.es-p35t {
    padding-top: 35px;
}

.es-p35b {
    padding-bottom: 35px;
}

.es-p35l {
    padding-left: 35px;
}

.es-p35r {
    padding-right: 35px;
}

.es-p40 {
    padding: 40px;
}

.es-p40t {
    padding-top: 40px;
}

.es-p40b {
    padding-bottom: 40px;
}

.es-p40l {
    padding-left: 40px;
}

.es-p40r {
    padding-right: 40px;
}

.es-menu td {
    border: 0;
}

.es-menu td a img {
    display: inline-block !important;
}

/* END CONFIG STYLES */
a {
    font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
    font-size: 16px;
    text-decoration: none;
}

h1 {
    font-size: 20px;
    font-style: normal;
    font-weight: normal;
    color: #333333;
}

h1 a {
    font-size: 20px;
}

h2 {
    font-size: 14px;
    font-style: normal;
    font-weight: normal;
    color: #333333;
}

h2 a {
    font-size: 14px;
}

h3 {
    font-size: 20px;
    font-style: normal;
    font-weight: normal;
    color: #333333;
}

h3 a {
    font-size: 20px;
}

p,
ul li,
ol li {
    font-size: 16px;
    font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;
    line-height: 150%;
}

ul li,
ol li {
    Margin-bottom: 15px;
}

.es-menu td a {
    text-decoration: none;
    display: block;
}

.es-wrapper {
    width: 100%;
    height: 100%;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-wrapper-color {
    background-color: #fafafa;
}

.es-content-body {
    background-color: #ffffff;
}

.es-content-body p,
.es-content-body ul li,
.es-content-body ol li {
    color: #666666;
}

.es-content-body a {
    color: #0b5394;
}

.es-header {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-header-body {
    background-color: #ffffff;
}

.es-header-body p,
.es-header-body ul li,
.es-header-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-header-body a {
    color: #1376c8;
    font-size: 14px;
}

.es-footer {
    background-color: transparent;
    background-image: ;
    background-repeat: repeat;
    background-position: center top;
}

.es-footer-body {
    background-color: transparent;
}

.es-footer-body p,
.es-footer-body ul li,
.es-footer-body ol li {
    color: #333333;
    font-size: 14px;
}

.es-footer-body a {
    color: #333333;
    font-size: 14px;
}

.es-infoblock,
.es-infoblock p,
.es-infoblock ul li,
.es-infoblock ol li {
    line-height: 120%;
    font-size: 12px;
    color: #cccccc;
}

.es-infoblock a {
    font-size: 12px;
    color: #cccccc;
}

a.es-button {
    border-style: solid;
    border-color: #ffffff;
    border-width: 15px 20px 15px 20px;
    display: inline-block;
    background: #ffffff;
    border-radius: 10px;
    font-size: 14px;
    font-family: arial, 'helvetica neue', helvetica, sans-serif;
    font-weight: bold;
    font-style: normal;
    line-height: 120%;
    color: #3D5CA3;
    text-decoration: none;
    width: auto;
    text-align: center;
}

.es-button-border {
    border-style: solid solid solid solid;
    border-color: #3d5ca3 #3d5ca3 #3d5ca3 #3d5ca3;
    background: #ffffff;
    border-width: 2px 2px 2px 2px;
    display: inline-block;
    border-radius: 10px;
    width: auto;
}

/* RESPONSIVE STYLES Please do not delete and edit CSS styles below. If you don't need responsive layout, please delete this section. */
@media only screen and (max-width: 600px) {

    p,
    ul li,
    ol li,
    a {
        font-size: 16px !important;
        line-height: 150% !important;
    }

    h1 {
        font-size: 20px !important;
        text-align: center;
        line-height: 120% !important;
    }

    h2 {
        font-size: 16px !important;
        text-align: left;
        line-height: 120% !important;
    }

    h3 {
        font-size: 20px !important;
        text-align: center;
        line-height: 120% !important;
    }

    h1 a {
        font-size: 20px !important;
    }

    h2 a {
        font-size: 16px !important;
        text-align: left;
    }

    h3 a {
        font-size: 20px !important;
    }

    .es-menu td a {
        font-size: 14px !important;
    }

    .es-header-body p,
    .es-header-body ul li,
    .es-header-body ol li,
    .es-header-body a {
        font-size: 10px !important;
    }

    .es-footer-body p,
    .es-footer-body ul li,
    .es-footer-body ol li,
    .es-footer-body a {
        font-size: 12px !important;
    }

    .es-infoblock p,
    .es-infoblock ul li,
    .es-infoblock ol li,
    .es-infoblock a {
        font-size: 12px !important;
    }

    *[class="gmail-fix"] {
        display: none !important;
    }

    .es-m-txt-c,
    .es-m-txt-c h1,
    .es-m-txt-c h2,
    .es-m-txt-c h3 {
        text-align: center !important;
    }

    .es-m-txt-r,
    .es-m-txt-r h1,
    .es-m-txt-r h2,
    .es-m-txt-r h3 {
        text-align: right !important;
    }

    .es-m-txt-l,
    .es-m-txt-l h1,
    .es-m-txt-l h2,
    .es-m-txt-l h3 {
        text-align: left !important;
    }

    .es-m-txt-r img,
    .es-m-txt-c img,
    .es-m-txt-l img {
        display: inline !important;
    }

    .es-button-border {
        display: block !important;
    }

    a.es-button {
        font-size: 14px !important;
        display: block !important;
        border-left-width: 0px !important;
        border-right-width: 0px !important;
    }

    .es-btn-fw {
        border-width: 10px 0px !important;
        text-align: center !important;
    }

    .es-adaptive table,
    .es-btn-fw,
    .es-btn-fw-brdr,
    .es-left,
    .es-right {
        width: 100% !important;
    }

    .es-content table,
    .es-header table,
    .es-footer table,
    .es-content,
    .es-footer,
    .es-header {
        width: 100% !important;
        max-width: 600px !important;
    }

    .es-adapt-td {
        display: block !important;
        width: 100% !important;
    }

    .adapt-img {
        width: 100% !important;
        height: auto !important;
    }

    .es-m-p0 {
        padding: 0px !important;
    }

    .es-m-p0r {
        padding-right: 0px !important;
    }

    .es-m-p0l {
        padding-left: 0px !important;
    }

    .es-m-p0t {
        padding-top: 0px !important;
    }

    .es-m-p0b {
        padding-bottom: 0 !important;
    }

    .es-m-p20b {
        padding-bottom: 20px !important;
    }

    .es-mobile-hidden,
    .es-hidden {
        display: none !important;
    }

    .es-desk-hidden {
        display: table-row !important;
        width: auto !important;
        overflow: visible !important;
        float: none !important;
        max-height: inherit !important;
        line-height: inherit !important;
    }

    .es-desk-menu-hidden {
        display: table-cell !important;
    }

    table.es-table-not-adapt,
    .esd-block-html table {
        width: auto !important;
    }

    table.es-social {
        display: inline-block !important;
    }

    table.es-social td {
        display: inline-block !important;
    }
}</style>
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="es-adaptive esd-stripe" align="center" esd-custom-block-id="88589">
                                        <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="es-infoblock esd-block-text">
                                                                                        <p>Put your preheader text here. <a href="https://viewstripo.email" class="view" target="_blank">View in browser</a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="es-adaptive esd-stripe" align="center" esd-custom-block-id="88593">
                                        <table class="es-header-body" style="background-color: rgb(61, 92, 163);" width="600" cellspacing="0" cellpadding="0" bgcolor="#3d5ca3" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" style="background-color: rgb(126, 4, 1);" bgcolor="#7e0401" align="left">
                                                        <!--[if mso]><table width="560" cellpadding="0"
                        cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-m-p0l es-m-txt-c" align="left"><a href="https://viewstripo.email" target="_blank"><img src="https://ewbveo.stripocdn.email/content/guids/CABINET_8241bb15b3ef17d5c0c98a119e04cb27/images/25221580414378887.png" alt style="display: block;" width="183"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="270" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" style="background-color: transparent;" bgcolor="transparent" align="center">
                                        <table class="es-content-body" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p20r es-p20l" style="background-color: rgb(254, 245, 245); background-position: left top;" bgcolor="#fef5f5" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table style="background-position: left top;" width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-p5t es-p5b" align="center"><a target="_blank"><img src="https://ewbveo.stripocdn.email/content/guids/CABINET_8241bb15b3ef17d5c0c98a119e04cb27/images/23891556799905703.png" alt style="display: block;" width="175"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p15b" align="center">
                                                                                        <h1 style="color: #333333; font-size: 16px;"><b>YOUR QUEUE NUMBER</b></h1>
                                                                                        <p style="font-size: 36px;"><b>A-30</b></p>
                                                                                        <p><b>Accounting</b><br></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p35r es-p40l" align="center">
                                                                                        <p>Please wait for your turn.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p25t es-p40r es-p40l" align="center">
                                                                                        <p>Thank you for using DQRS.</p>
                                                                                        <p>If you have concerns or suggestions please feel free to contacts.</p>
                                                                                        <p>BAHO LOBOT GIRL</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-button es-p40t es-p40b es-p10r es-p10l" align="center"><span class="es-button-border es-button-border-1580414844957" style="background: rgb(153, 0, 0);"><a href="https://viewstripo.email/" class="es-button es-button-1580414835798" target="_blank" style="background: rgb(153, 0, 0); border-color: rgb(153, 0, 0); color: rgb(255, 255, 255);">CONTACT US</a></span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-infoblock made_with" align="center"><a target="_blank" href="https://viewstripo.email/?utm_source=templates&utm_medium=email&utm_campaign=education&utm_content=trigger_newsletter2"><img src="https://ewbveo.stripocdn.email/content/guids/CABINET_8241bb15b3ef17d5c0c98a119e04cb27/images/46471580415150506.png" alt style="display: block;" width="125"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="88592">
                                        <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#fef5f5" style="background-color: rgb(254, 245, 245);">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-social es-m-txt-c" align="center">
                                                                                        <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://ewbveo.stripocdn.email/content/assets/img/social-icons/square-black-bordered/facebook-square-black-bordered.png" alt="Fb" width="32" height="32"></a></td>
                                                                                                    <td class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://ewbveo.stripocdn.email/content/assets/img/social-icons/square-black-bordered/twitter-square-black-bordered.png" alt="Tw" width="32" height="32"></a></td>
                                                                                                    <td class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://ewbveo.stripocdn.email/content/assets/img/social-icons/square-black-bordered/instagram-square-black-bordered.png" alt="Inst" width="32" height="32"></a></td>
                                                                                                    <td valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://ewbveo.stripocdn.email/content/assets/img/social-icons/square-black-bordered/youtube-square-black-bordered.png" alt="Yt" width="32" height="32"></a></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p5t es-p10b es-p10r es-p10l" align="left" bgcolor="#fef5f5" style="background-color: rgb(254, 245, 245);">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p5t es-p10b" align="center">
                                                                                        <h5 style="color: #666666;">Contact us: <a target="_blank" href="tel:123456789">123456789</a> | <a target="_blank" href="mailto:your@mail.com">dqrshelper@mail.com</a></h5>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p>St.Dominic College of Asia</p>
                                                                                        <p>Bacoor, Cavite</p>
                                                                                        <p>Philippines 4102</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" style="background-color: rgb(250, 250, 250);" bgcolor="#fafafa" align="center">
                                        <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t" style="background-position: left top;" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-spacer es-p20b es-p20r es-p20l" align="center">
                                                                                        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="border-bottom: 1px solid rgb(250, 250, 250); background: none; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-footer" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" style="background-color: rgb(250, 250, 250);" bgcolor="#fafafa" align="center" esd-custom-block-id="88330">
                                        <table class="es-footer-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="transparent" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p5b es-p20r es-p20l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td esd-links-underline="underline" align="center" class="esd-block-text">
                                                                                        <p style="font-size: 12px; color: #666666;">This daily newsletter was sent to info@name.com from company name because you subscribed. If you would not like to receive this email <a target="_blank" style="font-size: 12px; text-decoration: underline;" class="unsubscribe">unsubscribe here</a>.</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="42537" align="center">
                                        <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p30t es-p30b es-p20r es-p20l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-empty-container" style="display: none;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
