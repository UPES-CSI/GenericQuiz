<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<title>ABC</title>
<style>
.hide {
  display: none;
}
</style>
</head>
<body>
Office:<br>
<input type="checkbox" name="office" value="singapore"> Singapore<br>
<input type="checkbox" name="office" value="kuala lampur"> Kuala Lampur<br>
<input type="checkbox" name="office" value="other"> Other <br>
<span class="other-txt hide">
  <input type="textbox" name="Other_Text"/>
</span>
</body>
<script>
$(':checkbox[name=office]').on('change', function() {
    if( $(':checkbox[value=other]').is(':checked') ) {
        $('span.other-txt').removeClass( 'hide' );
    } else {
        $('span.other-txt').addClass( 'hide' );
    }
});
</script>