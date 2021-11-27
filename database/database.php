<?php
include_once('connection.php');

if(isset($_POST['btnLogin'])){
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];

    $loginQuery = "SELECT * FROM officials where email = '$adminUsername' AND officialPassword = '$adminPassword';";
    $login = mysqli_query($conn, $loginQuery);

    if(mysqli_num_rows($login) == 1){
        $residentsQuery = "SELECT * FROM residents";
        $officialsQuery = "SELECT * FROM officials";

        $getResidents = mysqli_query($conn, $residentsQuery);
        $getOfficials = mysqli_query($conn, $officialsQuery);
        if(mysqli_num_rows($getResidents) > 0){
            
        }

        if(mysqli_num_rows($getOfficials) != 0){
            while($row = mysqli_fetch_assoc($getOfficials)){
            $dashboardName = $row['nameAlias'];
            $dashboardPosition = $row['position'];
            $dashboardPurok = $row['purok'];
            $showPosition = $row['position'];
            $showLastName = $row['nameLast'];
            $showFirstName = $row['nameFirst'];
            $showMiddleName = $row['nameMiddle'];
        }
        }
        
        session_start();
        $_SESSION['name'] = $dashboardName;
        $_SESSION['position'] = $dashboardPosition;
        $_SESSION['purok'] = $dashboardPurok;
        $_SESSION['position'] = $showPosition;
        $_SESSION['lastName'] = $showLastName;
        $_SESSION['firstName'] = $showFirstName;
        $_SESSION['middleName'] = $showMiddleName;
        header("Location: ../dashboard.php");
    }

    elseif($adminUsername == "admin" && $adminPassword == "admin"){
        $name = "ADMIN NAME";
        $purok = "ADMIN PUROK";
        $position = "ADMIN POSITION";
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['purok'] = $purok;
        $_SESSION['position'] = $position;
        header("Location: ../registerOfficial.php");
    }
}

if(isset($_POST['btnRegisterResident'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $alias = $_POST['alias'];
    $birthMonth = $_POST['bMonth'];
    $birthDay = $_POST['bDay'];
    $birthYear = $_POST['bYear'];
    $placeOfBirth = $_POST['pob'];
    $gender = $_POST['gender'];
    $civilStatus = $_POST['cStatus'];
    $voterStatus = $_POST['vStatus'];
    $ifActive = $_POST['voteActive'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $occupation = $_POST['occupation'];
    $sector = $_POST['sector'];
    $cityAddress = $_POST['cityAdd'];
    $provAddress = $_POST['provAdd'];
    $purok = $_POST['purok'];
    $email = $_POST['email'];
    $mobileNumberA = $_POST['mNumOne'];
    $mobileNumberB = $_POST['mNumTwo'];
    $houseNumberA = $_POST['hNumOne'];
    $houseNumberB = $_POST['hNumTwo'];
    $residentType = $_POST['resType'];
    $residentStatus = $_POST['resStat'];
    $residentID = date("Y");
    $encoder = $_SESSION['name'];
    $encoderPostion = $_SESSION['position'];
    $insertToResident = "INSTER INTO residents (residentID, nameFirst, nameMiddle, nameLast, nameAlias, birthMonth, birthDay, birthYear, placeOB, gender, civilStatus, voterStatus, ifActive, religion, nationality, occupation, sector, cityAddress, provAddress, purok, email, mobileNumberA, mobileNumberB, homeNumberA, homeNumberB, residentType, residentStatus, encoder, encoderPosition)
        VALUES ('$residentID','$firstName', '$middleName', '$lastName', '$alias', '$birthMonth', '$birthDay', '$birthYear', '$placeOfBirth', '$gender', '$civilStatus', '$voterStatus', '$ifActive', '$religion', '$nationality', '$occupation', '$sector', '$cityAddress', '$provAddress', '$purok', '$email', '$mobileNumberA', '$mobileNumberB', '$houseNumberA', '$houseNumberB', '$residentType', '$residentStatus', '$encoder', '$encoderPosition');";
    mysqli_query($conn, $insertToResident);
    header("Location: ../registration.php");
}

if(isset($_POST['btnRegisterOfficial'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $alias = $_POST['alias'];
    $birthMonth = $_POST['bMonth'];
    $birthDay = $_POST['bDay'];
    $birthYear = $_POST['bYear'];
    $placeOfBirth = $_POST['pob'];
    $gender = $_POST['gender'];
    $civilStatus = $_POST['cStatus'];
    $position = $_POST['brgyPosition'];
    $cityAddress = $_POST['cityAdd'];
    $provAddress = $_POST['provAdd'];
    $purok = $_POST['purok'];
    $email = $_POST['email'];
    $password = "testofficials";
    $mobileNumberA = $_POST['mNumOne'];
    $mobileNumberB = $_POST['mNumTwo'];
    $houseNumberA = $_POST['hNumOne'];
    $houseNumberB = $_POST['hNumTwo'];

    $insertToOfficials = "INSERT INTO officials (nameLast, nameFirst, nameMiddle, nameAlias, birthMonth, birthDay, birthYear, placeOB, gender, civilStatus, position, cityAddress, provAddress, purok, email, officialPassword, mobileNumberA, mobileNumberB, homeNumberA, homeNumberB) 
    VALUES ('$lastName','$firstName','$middleName','$alias','$birthMonth','$birthDay','$birthYear','$placeOfBirth','$gender','$civilStatus','$position','$cityAddress','$provAddress','$purok','$email','$password','$mobileNumberA','$mobileNumberB','$houseNumberA','$houseNumberB');";

    mysqli_query($conn, $insertToOfficials);
    header("Location: ../dashboard.php");
}
?>