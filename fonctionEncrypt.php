<?php
   function simple_encrypt($text, $cle="fgvhjgsxuhbikwkjk JHIUkjidfnc")
   {
    $ciphering = "AES-256-CTR";
    $options = 0;
    $encryption_iv = '1234567891011121';
      return trim(openssl_encrypt($text, $ciphering, $cle, $options, $encryption_iv));
      //return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $cle, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));     
   }

   
   function simple_decrypt($text, $cle="fgvhjgsxuhbikwkjk JHIUkjidfnc")
   {
    $ciphering = "AES-256-CTR";
    $options = 0;
    $encryption_iv = '1234567891011121';
    return trim(openssl_decrypt($text, $ciphering, $cle, $options, $encryption_iv));
    //return trim(base64_decode(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $cle, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_ECB), MCRYPT_RAND))));
   }
?>