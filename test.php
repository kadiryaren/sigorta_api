<?php
include("./db/db.php");
// $simple_string = "adim kadir";

// // Store the cipher method
// $ciphering = "AES-128-CTR";
  
// // Use OpenSSl Encryption method
// $iv_length = openssl_cipher_iv_length($ciphering);
// $options = 0;
  
// // Non-NULL Initialization Vector for encryption
// $encryption_iv = '1234567891011121';

// // Store the encryption key
// $encryption_key = "sigorta";
  
// // Use openssl_encrypt() function to encrypt the data
// $encryption = openssl_encrypt($simple_string, $ciphering,
//             $encryption_key, $options, $encryption_iv);
  
// // Display the encrypted string
// echo "Encrypted String: " . $encryption . "\n";
  
// // Non-NULL Initialization Vector for decryption
// $decryption_iv = '1234567891011121';
  
// // Store the decryption key
// $decryption_key = "sigorta";
  
// // Use openssl_decrypt() function to decrypt the data
// $decryption=openssl_decrypt ($encryption, $ciphering, 
//         $decryption_key, $options, $decryption_iv);
  
// // Display the decrypted string
// echo "Decrypted String: " . $decryption;

// function encode($stringValue){
//     $ciphering = "AES-128-CTR";

//     // Use OpenSSl Encryption method
//     $iv_length = openssl_cipher_iv_length($ciphering);
//     $options = 0;
    
//     // Non-NULL Initialization Vector for encryption
//     $encryption_iv = '1234567891011121';

//     // Store the encryption key
//     $encryption_key = "sigorta";
    
//     // Use openssl_encrypt() function to encrypt the data
//     $encryption = openssl_encrypt($stringValue, $ciphering,
//                 $encryption_key, $options, $encryption_iv);
    
//     return $encryption;
// }

// function decode($encodedString){
//     $ciphering = "AES-128-CTR";
//     $decryption_iv = '1234567891011121';
//     $options = 0;

//     // Store the decryption key
//     $decryption_key = "sigorta";
    
//     // Use openssl_decrypt() function to decrypt the data
//     $decryption=openssl_decrypt ($encodedString, $ciphering, 
//             $decryption_key, $options, $decryption_iv);
    
//     return $decryption;
// }


// function alreadyLoggedIn($encodedToken){
//     $decodedToken = decode($encodedToken);
//     $time = intval(explode("/", $decodedToken)[2]);
//     if($time > time()){
//         return true;
//     }else{
//         return false;
//     }

    
// }
// // $future_time = 1664812643;

// // $test_creditials  = "kadir/yaren/812643";
// // echo $test_creditials;
// // echo "<br>";
// // $encoded = encode($test_creditials);
// // echo $encoded;
// // echo "<br>";
// $decoded = decode("JcPe3kKanev2tHRuMFOxA4YYdI7gAw==");
// echo $decoded;
// echo time();
// echo "<br>";



// include("db/db.php");

// function login($database, $username, $password){
//     $query = $database->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
//     $query->bindParam(":username", $username);
//     $query->bindParam(":password", $password);
//     $query->execute();
//     $result = $query->fetchAll();
//     return $result;
// }

// $result = login($database, "kadir", "ssad");

// print_r($result);


// $sql = "SELECT * FROM kayitlar WHERE musteri_id = 1  AND iptal_durum = 0 ";
// $result = $database->prepare($sql);
// $result->execute();
// print_r($result->fetchAll());
$sql = "SELECT * FROM musteri_tipi";
$result = $database->query($sql);
$result->execute();
print_r($result->fetchAll());

if(array() == false){
    echo "test";
}

?>










