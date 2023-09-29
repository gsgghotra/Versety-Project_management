<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
        <link rel="stylesheet" type="text/css" href="js/date/jquery.datetimepicker.css"/ >
<script type="text/javascript" src="js/date/jquery.datetimepicker.full.js"></script>

<input type="text" id="datetimepicker"/>
<script type="text/javascript">
jQuery('#datetimepicker').datetimepicker({
    step:10,
    timepicker: true,
    formatDate:'d/m/Y',
 minDate:'01/10/2017',//yesterday is minimum date(for today use 0 or -1970/01/01)
 maxDate:'10/03/2021'
});
</script>
</body>


</html>
