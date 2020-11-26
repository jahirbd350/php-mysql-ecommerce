<?php


class Login
{
    protected $link;

    public function __construct(){
      $this->link = mysqli_connect('localhost', 'root', '', 'isd_ecommerce');
    }

    public function userRegistration(){
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $message = "Password and Confirm Password Does not Match!!";
            return $message;
        } else {
            $sql = "SELECT * FROM users WHERE email_address='$_POST[email]'";
            if (mysqli_query($this->link, $sql)) {
                $queryResult = mysqli_query($this->link, $sql);
                if (mysqli_num_rows($queryResult)>0) {
                    $message = "User email address already used!";
                    return $message;
                } else {
                    $sql = "INSERT INTO users(first_name,last_name,gender,date_of_birth,email_address,phone_no,address,city,division,post_code,password)
                          VALUES ('$_POST[firstName]','$_POST[lastName]','$_POST[gender]','$_POST[dateOfBirth]','$_POST[email]','$_POST[phoneNo]','$_POST[address]','$_POST[city]','$_POST[division]','$_POST[postCode]','$_POST[password]')";
                    if (mysqli_query($this->link, $sql)) {
                        $message = "User Registration success. Please Login.";
                        return $message;
                    } else {
                        die('User Registration Query Error : ' . mysqli_error($this->link));
                    }
                }
            } else {
                die('User Check Error : ' . mysqli_error($this->link));
            }
        }
    }

    public function loginCheck(){
        $email = $_POST['email'];
        $password = $_POST['password'];;
        $sql = "SELECT * FROM users WHERE email_address='$email'";
        if (mysqli_query($this->link, $sql)) {
            $queryResult = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($queryResult) > 0) {
                $userInfo = mysqli_fetch_assoc($queryResult);
                if ($password == $userInfo['password']) {
                    session_start();
                    $_SESSION['user_id'] = $userInfo['id'];
                    $_SESSION['email'] = $userInfo['email_address'];
                    $_SESSION['name'] = $userInfo['first_name'].' '.$userInfo['last_name'];
                    $_SESSION['user_role'] = $userInfo['user_role'];
                    if ($userInfo['user_role']=='admin'){
                        header('url: admin/dashboard.php');
                    } elseif ($userInfo['user_role']=='user') {
                        header('location: index.php');
                    }
                }
                else {
                    $message = "Password is not correct!<br> Please reset your password.";
                }
            }
            else{
                $message = "You are not registered! <br> Please register";
            }
        }
        else {
            die('Login Query Problem : ' . mysqli_error($this->link));
        }
        return $message;
    }

    public function resetPassword(){
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $sql = "SELECT * FROM users WHERE email_address='$email' && date_of_birth='$dob'";
        if (mysqli_query($this->link, $sql)) {
            $queryResult = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($queryResult) > 0) {
                if ($_POST['password'] == $_POST['cf_password']) {
                    $sqlUpdate = "UPDATE users set password = '$_POST[password]'";
                    if (mysqli_query($this->link,$sqlUpdate)){
                        $message = "Password reset Successful please login";
                    } else {
                        die('Password reset Query Problem : ' . mysqli_error($this->link));
                    }
                } else {
                    $message = "Password and Confirm Password does not match!";
                }
            }
            else{
                $message = "Please enter correct email address and date of birth!";
            }
        }
        else {
            die('user exists Check Query Problem : ' . mysqli_error($this->link));
        }
        return $message;
    }

    public function userLogout()
    {
        session_destroy();
        header('location: index.php');
        $message = "Logged out successfully.";
        return $message;
    }

}