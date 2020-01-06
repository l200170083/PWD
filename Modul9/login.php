<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost',  'root',  ''));
mysqli_select_db($GLOBALS["___mysqli_ston"], Informatikaa);
$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];
if($submit){
    $sql = "SELECT * FROM user where username='$username' and password='$password'";
    $query = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    $row = mysqli_fetch_array($query);
    if($row['username']!=""){
        //berhasil login
        $_SESSION['username']=$row['username'];
        $_SESSION['status']=$row['status'];
        ?>
        <script language script="JavaScript">
            alert('Anda Login Sebagai <?php 
            echo $row['username']; ?>');
            document.location='hasillogin.php';
            </script>
            <?php
        } else{
            //gagal login
            ?>
            <script language script="JavaScript">
                alert('Gagal Login');
                document.location='login.php';
            </script>
            <?php
            }
            }
            ?>
            <form method='post' action='login.php'>
            <p align ='center'>
            Username : <input type='text' name='username'><br>
            Password : <input type='password' name='password'><br>
            <input type='submit' name='submit'>
        </p>
        </form>