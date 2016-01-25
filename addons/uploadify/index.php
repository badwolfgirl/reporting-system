<link href="uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#logoUpload').uploadify({
    'uploader'  : 'uploadify.swf',
    'script'    : 'uploadify.php',
    'cancelImg' : 'cancel.png',
    'folder'    : '/uploads/testimonials/logos',
    'auto'      : true,
		'onComplete'  : function(event, ID, fileObj, response, data) {
			$('#logoHid').val(fileObj.name);			
    }
  });
  $('#signUpload').uploadify({
    'uploader'  : 'uploadify.swf',
    'script'    : 'uploadify.php',
    'cancelImg' : 'cancel.png',
    'folder'    : '/uploads/testimonials/signatures',
    'auto'      : true,
		'onComplete'  : function(event, ID, fileObj, response, data) {
			$('#signHid').val(fileObj.name);			
    }
    });
});
</script>
Upload the logo:<br />
<input id="logoUpload" name="logoUpload" type="file" /><br /><br />
Upload the signature:<br />
<input id="signUpload" name="signUpload" type="file" />

<input type="hidden" name="logoHid" id="logoHid"/>
<input type="hidden" name="signHid" id="signHid"/>

