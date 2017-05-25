<?php
    $con = mysqli_connect("localhost", "root", "", "prodiku");
    
        if($con === false)
            die ("Error iki: ".mysqli_connect_error());
    
            // Ambil Data yang Dikirim dari Form
            $nid = $_POST['nid'] ;
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = bycript($_POST['password']);
            $updated_at = now();
            $created_at = now();
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $address = $_POST['address'];
            //$waktu = $_POST['_token'];
 
            $query1 = "INSERT INTO user(id, nid, email, username, password, type, remember_token, updated_at, created_at) VALUES('','$nid','$username','$password', 'xxx', now(), now())";

            $query2 = "INSERT INTO identity(nid, name, sex, address, updated_at, created_at) VALUES('$nid', '$name', '$sex', '$address', now(), now())";

            if(mysqli_query($con, $query1))
            {   
                //return 'sukses';
            } else
            {
                //echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }

            if(mysqli_query($con, $query2))
            {   
                //return 'sukses';
            } else
            {
                //echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }
?>