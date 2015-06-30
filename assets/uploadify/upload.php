<!DOCTYPE html>
<html>
<head>
    <title>My Uploadify Implementation</title>
    <link rel="stylesheet" type="text/css" href="uploadify.css">
    <script type="text/javascript" src="jQuery-2.1.3.min.js"></script>
    <script type="text/javascript" src="jquery.uploadify-3.1.js"></script>
    <script type="text/javascript">
    $(function() {
        $('#file_upload').uploadify({
            'swf'      : 'uploadify.swf',
            'uploader' : 'uploadify.php',
			'fileSizeLimit' : '100KB',
			'multi'    : false,
			'uploadLimit' : 1
        });
    });
    </script>
</head>
<body>
<input type="file" name="file_upload" id="file_upload" />
</body>
</html>