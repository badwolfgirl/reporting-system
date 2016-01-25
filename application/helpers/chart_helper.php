
<?php
/**
 *	Creates the javascript for displaying a chart
 *
 *	@param string $page, int $width, int $height
 */
function output_chart($chart_name, $width, $height){ ?>
		
	<script language="JavaScript" type="text/javascript">
	<!--
	if (AC_FL_RunContent == 0 || DetectFlashVer == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		var hasRightVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
		if(hasRightVersion) { 
			AC_FL_RunContent(
				'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,45,0',
				'width', '<?php echo $width ?>',
				'height', '<?php echo $height ?>',
				'scale', 'noscale',
				'salign', 'TL',
				'bgcolor', '#ffffff',
				'wmode', 'opaque',
				'movie', '/charts/charts',
				'src', '/charts/charts',
				'FlashVars', "library_path=/charts/charts_library&xml_source=<?php echo site_url("admin/analytics/$chart_name")?>", 
				'id', 'my_chart',
				'name', 'my_chart',
				'menu', 'true',
				'allowFullScreen', 'false',
				'allowScriptAccess','sameDomain',
				'quality', 'high',
				'align', 'middle',
				'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
				'play', 'true',
				'devicefont', 'false'
				); 
		} else { 
			var alternateContent = 'This content requires the Adobe Flash Player. '
			+ '<u><a href=http://www.macromedia.com/go/getflash/>Get Flash</a></u>.';
			document.write(alternateContent); 
		}
	}
	// -->
	</script>
	<noscript>
		<P>This content requires JavaScript.</P>
	</noscript>
	
	<?php
}	