<?php

    $con = mysqli_connect("localhost", "root", "", "prodiku");
    
        if($con === false)
            die ("Error iki: ".mysqli_connect_error());
    
            // Ambil Data yang Dikirim dari Form
            $nid = $_POST['nid'] ;
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = crypt($_POST['password']);
            $type = $_POST['type'];
            // $updated_at = now();
            // $created_at = now();
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $address = $_POST['address'];
            //$waktu = $_POST['_token'];
 
            $query1 = "INSERT INTO user(id, nid, email, username, password, type, remember_token, updated_at, created_at) VALUES('', '$nid', '$email', '$username', '$password', '$type', '$name', now(), now())";

            $query2 = "INSERT INTO identity(nid, name, sex, address, updated_at, created_at) VALUES('$nid', '$name', '$sex', '$address', now(), now())";

            /*$query = "INSERT INTO user(id, nid, email, username, password, type, remember_token, updated_at, created_at) VALUES('', '$nid', '$email', '$username', '$password', '$type', '$name', now(), now())";
            
            $query .= "INSERT INTO identity(nid, name, sex, address, updated_at, created_at) VALUES('$nid', '$name', '$sex', '$address', now(), now())";

            if(mysqli_multi_query($con, $query))
            {   
                do
                {
                // Store first result set
                if ($result=mysqli_store_result($con)) {
                  // Fetch one and one row
                  while ($row=mysqli_fetch_row($result))
                    {
                        printf("%s\n",$row[0]);
                    }
                  // Free result set
                  mysqli_free_result($result);
                  }
                } while (mysqli_next_result($con));
                echo 'suskse';
            } else
            {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }*/
             
            if(mysqli_query($con, $query1)){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                //header("location:index.php"); // Redirectke halaman index.php
            }else{
                //echo "1. Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }

            if(mysqli_query($con, $query2)){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                //header("location:index.php"); // Redirectke halaman index.php
            }else{
                //echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            }
?>