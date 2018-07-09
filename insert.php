<?php
$connect = mysqli_connect("localhost", "root", "", "vocational training institute");
$data=json_decode(file_get_contents("php://input"));
if(count($data) > 0)
{
    $full_name = mysqli_real_escape_string($connect, $data->fullname);
    $name = mysqli_real_escape_string($connect, $data->name);
    $email = mysqli_real_escape_string($connect, $data->email);
    $mobile_num = mysqli_real_escape_string($connect, $data->mobile);
    $birthday = mysqli_real_escape_string($connect, $data->birthday);
    $address = mysqli_real_escape_string($connect, $data->address);
    $gender = mysqli_real_escape_string($connect, $data->gender);
    $maths = mysqli_real_escape_string($connect, $data->maths);
    $science = mysqli_real_escape_string($connect, $data->science);
    $english = mysqli_real_escape_string($connect, $data->english);
    $query = "INSERT INTO registration(full_name, name, email, mobile, birthday, address, gender, maths, science, english) VALUES ('$full_name', '$name' ,'$email', '$mobile_num', '$birthday', '$address', '$gender', '$maths', '$science', '$english')";

    if(mysqli_query($connect, $query))
    {
        echo "<script>alert('Data inserted');</script>";
    }
    else
    {
        echo 'ERROR';
    }
}


?>