<?php
if(isset($_POST['name'])){

    $name=$_POST['name'];
    $g_resp=$_POST['g-recaptcha-response'];

    $secret="your-secret-key"; // Secret key provided by google

    $postdata="secret=".$secret."&response=".$g_resp; // we will post the data to the google

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch); // response from the google
    $out=json_decode($server_output);
    curl_close ($ch);

    if($out->success ==1){
        // after success
        // place your code here what you want to do.
        echo "capcha sucess <br>";
        echo $name;

    }else{
        // failure
        // place the fail code.
        echo "captcha failure try again";
    }
}


?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<form method="post" >

    name <input type="" name="name" />
    <!-- insert the sitekey provided by google -->
    <div class="g-recaptcha" data-sitekey="your-site-key"></div>
    <input type="submit" >

</form>