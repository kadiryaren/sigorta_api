<?php

class Login{
    // there is no logout! 
    // if you want to log out, you can delete the token

    public function encode($stringValue){
        $ciphering = "AES-128-CTR";
  
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "sigorta";
        
        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($stringValue, $ciphering,
                    $encryption_key, $options, $encryption_iv);
        
        return $encryption;
    }

    public function decode($encodedString){
        $ciphering = "AES-128-CTR";
        $decryption_iv = '1234567891011121';
        $options = 0;
  
        // Store the decryption key
        $decryption_key = "sigorta";
        
        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encodedString, $ciphering, 
                $decryption_key, $options, $decryption_iv);
        
        return $decryption;
    }


    public function alreadyLoggedIn($encodedToken){
        $decodedToken = $this->decode($encodedToken);
        $time = intval(explode("/", $decodedToken)[2]);
        if($time > time()){
            return true;
        }else{
            return false;
        }        
    }

    /**
     * Undocumented function
     *
     * @param [PDO object] $database
     * @param [string] $username
     * @param [string] $password
     * @param [integer] $howMuchTime // minute
     * @return Token or false
     */
    public function login($database, $username, $password, $howMuchTime, $token=false){
        if($token != false){
            $loggedIn = $this->alreadyLoggedIn($token);
            if($loggedIn){
                return $token;
            }
        }
        $query = $database->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->execute();
        $result = $query->fetchAll();

        if(count($result) > 0){
            $generatedToken = $username."/".$password."/".(time() + $howMuchTime * 60);
            $encodedToken = $this->encode($generatedToken);
            return $encodedToken;
        }else{
            return false;    
        } 
    }




        

    

}



