<?php include("keys.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }
    </script>
</head>
<body>
    <form action="form.php" method="post">
        <input type="text" name="nombre" id="nombre">
        <?php echo $reCAPTCHA_site_key;?>
        <div class="g-recaptcha" data-sitekey="<?php echo $reCAPTCHA_site_key;?>"></div>
        <button class="g-recaptcha" 
        data-sitekey="<?php echo $reCAPTCHA_site_key;?>" 
        data-callback='onSubmit' 
        data-action='submit'>Enviar</button>
    </form>
</body>
</html>