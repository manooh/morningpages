<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <!-- Facebook sharing information tags -->
        <meta property="og:title" content="<?php echo $mail->subject; ?>" />
        
        <title><?php echo $mail->subject; ?></title>
		<style type="text/css">
			/* Client-specific Styles */
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
			body{-webkit-text-size-adjust:none;} /* Prevent Webkit platforms from changing default text sizes. */
			
			/* Reset Styles */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
			
			/* Template Styles */

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: COMMON PAGE ELEMENTS /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Page
			* @section background color
			* @tip Set the background color for your email. You may want to choose one that matches your company's branding.
			* @theme page
			*/
			body, #backgroundTable{
				background-color: #EFECCA;
				background-repeat:repeat;
				margin-top:10px;
				/*background-image:url("<?php echo URL::site('media/img/noise-gray-vl.png'); ?>");*/
				background-repeat:repeat;
			}
			/**
			* General Classes
			**/
			.center {
				margin: 0 auto;
			}
			.right {
				float: right;
			}

			.left {
				float: left;
			}

			/**
			* @tab Page
			* @section email border
			* @tip Set the border for your email.
			*/
			#templateContainer{
				 
			}

			/**
			* @tab Page
			* @section heading 1
			* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
			* @style heading 1
			*/
			h1, .h1{
				 color:#000;
				display:block;
				 font-family:Arial;
				 font-size:34px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			/**
			* @tab Page
			* @section heading 2
			* @tip Set the styling for all second-level headings in your emails.
			* @style heading 2
			*/
			h2, .h2{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:30px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			/**
			* @tab Page
			* @section heading 3
			* @tip Set the styling for all third-level headings in your emails.
			* @style heading 3
			*/
			h3, .h3{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:26px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			/**
			* @tab Page
			* @section heading 4
			* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
			* @style heading 4
			*/
			h4, .h4{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:22px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: PREHEADER /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Header
			* @section preheader style
			* @tip Set the background color for your email's preheader area.
			* @theme page
			*/
			#templatePreheader{
				
			}

			/**
			* @tab Header
			* @section preheader text
			* @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
			*/
			.preheaderContent
			{
				
				color:#999;
			}
			.preheaderContent div{
				 color:#505050;
				 font-family:Arial;
				 font-size:10px;
				 line-height:100%;
				 text-align:left;
			}

			/**
			* @tab Header
			* @section preheader link
			* @tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
			*/
			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#046380;
				 font-weight:normal;
				 text-decoration:none;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Header
			* @section header style
			* @tip Set the background color and border for your email's header area.
			* @theme header
			*/
			#templateHeader{
				 background-color:#FFFFFF;
				 border-bottom:0;
				 width: 580px;
			}

			/**
			* @tab Header
			* @section header text
			* @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
			*/
			.headerContent
			{
				color:#202020;
				font-family:Georgia;
				font-size:34px;
				line-height:100%;
				padding:10px;
				text-align:left;
				vertical-align:middle;
				background-color:#FFF;
				box-shadow: 4px 4px 5px 0 rgba(50, 50, 50, 0.15);
			}

			/**
			* @tab Header
			* @section header link
			* @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
			*/
			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
				 color:#046380;
				 font-weight:normal;
				 text-decoration:none;
				 padding-left: 15px;
				 border-left: 15px solid #046380;
			}

			#headerImage{
				height:auto;
				max-width:600px;
			}

			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */

			/**
			* @tab Body
			* @section body style
			* @tip Set the background color for your email's body area.
			*/
			#templateContainer, .bodyContent{
				 background-color:#FFFFFF;
				 width: 600px;
				 box-shadow: 4px 4px 5px 0 rgba(50, 50, 50, 0.15);
			}
			
			/**
			* @tab Body
			* @section body text
			* @tip Set the styling for your email's main content text. Choose a size and color that is easy to read.
			* @theme main
			*/
			.bodyContent div{
				 color:#505050;
				 font-family:Arial;
				 font-size:14px;
				 line-height:150%;
				 text-align:left;
			}

			div.button {
				margin: 0 auto;
				width: 200px;
				background-color: #ccefca;
				border: 1px solid #000;
				box-shadow: 4px 4px 5px 0 rgba(50, 50, 50, 0.15);
			}

			div.button:active {
				box-shadow: inset 4px 4px 5px 0 rgba(50, 50, 50, 0.15);
			}

			div.button p, .bodyContent a.write:link, .bodyContent a.write:visited, .bodyContent a.write:hover {
				color: #000;
				text-decoration: none;
				text-align: center;
			}
			
			/**
			* @tab Body
			* @section body link
			* @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
			*/
			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#046380;
				 font-weight:normal;
				 text-decoration:underline;
			}
			
			.bodyContent p {
				font-family: arial;
				font-size: 16px;
				font-weight: normal;
				line-height:150%;
				text-align:left;

			}

			.bodyContent img{
				display:inline;
				height:auto;
			}
			
			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: SIDEBAR /\/\/\/\/\/\/\/\/\/\ */
			
			/**
			* @tab Sidebar
			* @section sidebar style
			* @tip Set the background color and border for your email's sidebar area.
			*/
			#templateSidebar{
				 background-color:#FFFFFF;
				 border-left:0;
			}

			.standardcontent {
				width: 600px;
			}
			
			/**
			* @tab Sidebar
			* @section sidebar text
			* @tip Set the styling for your email's sidebar text. Choose a size and color that is easy to read.
			*/
			.sidebarContent div
			{
				color:#505050;
				 font-family:Arial;
				 font-size:12px;
				 line-height:150%;
				 text-align:left;
			}
			.sidebarContent .bordered{
				 border-bottom:1px solid #DDD;
			}
			
			.sidebarContent div ul
			{
				padding:0;
			}
				.sidebarContent div ul li
				{
					list-style-type:none;
				}
			
			/**
			* @tab Sidebar
			* @section sidebar link
			* @tip Set the styling for your email's sidebar links. Choose a color that helps them stand out from your text.
			*/
			.sidebarContent div a:link, .sidebarContent div a:visited, /* Yahoo! Mail Override */ .sidebarContent div a .yshortcuts /* Yahoo! Mail Override */{
				 /*color:#006DCC;
				 font-weight:normal;
				 text-decoration:none;
				 border-left: 15px solid #006DCC;*/
			}
				
			
			.sidebarContent img{
/*				display:inline;
				height:auto;*/
			}
			
			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */
			
			/**
			* @tab Footer
			* @section footer style
			* @tip Set the background color and top border for your email's footer area.
			* @theme footer
			*/
			#templateFooter{
				width: 600px;
				 background-color:#FFFFFF;
				 border-top:0;
				 box-shadow: 4px 4px 5px 0 rgba(50, 50, 50, 0.15);
			}
			
			/**
			* @tab Footer
			* @section footer text
			* @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
			* @theme footer
			*/
			.footerContent div {
				 color:#707070;
				 font-family:Arial;
				 font-size:12px;
				 line-height:125%;
				 text-align:left;
				 width: 300px;
			}
			
			/**
			* @tab Footer
			* @section footer link
			* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
			*/
			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#046380;
				 font-weight:normal;
				 text-decoration:underline;
			}
			
			.footerContent img{
				display:inline;
			}
			
			/**
			* @tab Footer
			* @section social bar style
			* @tip Set the background color and border for your email's footer social bar.
			* @theme footer
			*/
			#social{
				 background-color:#FAFAFA;
				 border:0;
			}
			
			/**
			* @tab Footer
			* @section social bar style
			* @tip Set the background color and border for your email's footer social bar.
			*/
			#social div{
				 text-align:center;
			}
			
			/**
			* @tab Footer
			* @section utility bar style
			* @tip Set the background color and border for your email's footer utility bar.
			* @theme footer
			*/
			#utility{
				 background-color:#FFFFFF;
				 border:0;
			}

			/**
			* @tab Footer
			* @section utility bar style
			* @tip Set the background color and border for your email's footer utility bar.
			*/
			#utility div{
				 text-align:center;
				 font-size:10px;
			}
			
			#monkeyRewards img{
				max-width:190px;
			}
		</style>
	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
            	<tr>
                	<td align="center" valign="top">
                        <!-- // Begin Template Preheader \\ -->
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">
                            <tr>
                                <td valign="top" class="preheaderContent">
                                
                                	<!-- // Begin Module: Standard Preheader \ -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td valign="top">
                                            	<div class="left">
                                                	 Information from <?php echo site::option('sitename'); ?>
                                                </div>
                                            </td>
                                            <!-- *|IFNOT:ARCHIVE_PAGE|* -->
																			<td valign="top" width="190">
                                            	<div class="right">
                                                	Can't read this e-mail?<br /><a href="<?php echo $mail->url(); ?>" title="Read this e-mail in your browser instead" target="_blank">See it in your browser</a>.
                                                </div>
                                            </td>
											<!-- *|END:IF|* -->
                                        </tr>
                                    </table>
                                	<!-- // End Module: Standard Preheader \ -->
                                
                                </td>
                            </tr>
                        </table>
                        <!-- // End Template Preheader \\ -->
                    	<table border="0" cellpadding="0" cellspacing="0" width="600px" id="templateContainer">
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Header \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width:"580px" id="templateHeader">
                                        <tr>
                                            <td class="headerContent">
                                            	
                                            	<table border="0" width="580px" cellpadding="0" cellspacing="0">
                                            		<tr>
                                            			<td>
                                            				<a href="<?php echo URL::site('', 'http'); ?>" title="<?php echo site::option('sitename'); ?>">
                                            					Morning Pages
			                                            		<?php /*<img src="<?php echo URL::site('media/img/logo.png'); ?>" style="max-width:600px;" id="headerImage campaign-icon" style="border:0;"/> */ ?>
			                                            	</a>
                                            			</td>
                                            		</tr>
                                            	</table>
                                            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Header \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Body \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                    	<tr>
                                        	<td valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td valign="top" class="bodyContent">
                                            
                                              <!-- // Begin Module: Standard Content \\ -->
                                              <table border="0" cellpadding="20" cellspacing="0" width="100%" class="standardcontent">
                                                  <tr>
                                                      <td valign="top">
                                                    <div>
                                                        <?php echo $mail->content?>
                                                    </div>
                                                      </td>
                                                  </tr>
                                              </table>
                                                            <!-- // End Module: Standard Content \\ -->
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        	<!-- // Begin Sidebar \\  -->
                                                    </tr>
                                                </table>
                                            </td>
                                            <!-- // End Sidebar \\ -->
                                        </tr>
                                    </table>
                                    <!-- // End Template Body \\ -->
                                </td>
                            </tr>
                        	<tr>
                        	<td align="center" valign="top">
                                <!-- // Begin Template Footer \\ -->
                            	<table border="0" cellpadding="10" cellspacing="0" width="600px" id="templateFooter">
                                	<tr>
                                    	<td valign="top" class="footerContent">
                                            <!-- // Begin Module: Standard Footer \\ -->
                                          <div class="center">
                                           <a href="<?php echo URL::site('', 'http'); ?>" title="<?php echo site::option('sitename'); ?>"><?php echo site::option('sitename'); ?></a> |
                                           <a href="http://morningpages.net/write" title="<?php echo site::option('sitename'); ?>">Write</a> |
                                           <a href="http://morningpages.net/user" title="<?php echo site::option('sitename'); ?>">Change Options</a> |
                                           <a href="http://morningpages.net/user#info" title="<?php echo site::option('sitename'); ?>">Stop E-mails</a>
                                          </div>
                                            <!-- // End Module: Standard Footer \\ -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // End Template Footer \\ -->
                            </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>