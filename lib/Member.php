<?php
namespace Phppot;

use nidal\Init;



/**
 * Summary of Member
 */
class Member
{

    private $ds;
    private $init;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
        $this->init = new Init();
    }

    public function print_array($array)
    {
        print("<pre>");
        print_r($array);
        print("</pre>");

    }
    public function getUserInfo($username)
    {

    }
    // public set_user_active($id,$status){
    //     $query = 'update user set user_status = '.$status. ' where user_id = '.$id;
    // }
    public function getAllUsers()
    {
        $query = 'SELECT member.*, user.*
        FROM tender.`member` member, tender.`user` user
        WHERE 
            member.user_id = user.user_id and user.user_type=2 and user.super_admin =0';
        // echo $username;
        $paramType = '';
        $paramValue = array(


        );
        $allUsers = $this->ds->select($query, $paramType, $paramValue);
        return $allUsers;

    }
    public function deleteUser($userID)
    {
        $query = 'delete from user where user_id = ?';
        // $query = 'Delete FROM attachment where member_id = ? and attachment_type = ?';
        echo $query;
        $paramType = 's';
        $paramValue = array(

            $userID,
        );
        return $this->ds->delete($query, $paramType, $paramValue);
    }
    public function deleteMemberByUserID($userID)
    {
        $query = 'delete from member where user_id = ?';
        // $query = 'Delete FROM attachment where member_id = ? and attachment_type = ?';
        echo $query;
        $paramType = 's';
        $paramValue = array(

            $userID,
        );
        return $this->ds->delete($query, $paramType, $paramValue);
    }
    public function getALLMEMBERS()
    {

        $query = 'SELECT * FROM member ';
        // echo $username;
        $paramType = '';
        $paramValue = array(


        );
        $attachmentRecord = $this->ds->select($query, $paramType, $paramValue);
        return $attachmentRecord;

    }
    public function getUserStatus($status_code)
    {
        $query = 'SELECT * FROM user_status_code  where user_status_id = ?';

        // echo $username;
        $paramType = 's';
        $paramValue = array(
            $status_code

        );
        $userStaus = $this->ds->select($query, $paramType, $paramValue);
        return $userStaus;

    }
    public function getUserType($username)
    {

    }
    public function checkIfAdmin($username)
    {

    }
    function checkIfSuperAdmin($username)
    {

    }
    public function getUserAttachment($memberId, $attahcmentType)
    {
        $query = 'SELECT * FROM attachment where member_id = ? and attachment_type = ?';
        // echo $username;
        $paramType = 'ss';
        $paramValue = array(
            $memberId,
            $attahcmentType

        );
        $attachmentRecord = $this->ds->select($query, $paramType, $paramValue);
        return $attachmentRecord;

    }
    public function get_attachment_status($memberID, $fileType)
    {
        return $this->getUserAttachment($memberID, $fileType);
        // if (!empty($attachmentRecord)) {
        //     return intval($attachmentRecord[0]['attachment_status']);
        // }
    }
    public function delete_attachemnt_by_type($memberID, $fileType)
    {
        $query = 'Delete FROM attachment where member_id = ? and attachment_type = ?';
        // echo $username;
        $paramType = 'ss';
        $paramValue = array(
            $memberID,
            $fileType

        );
        return $this->ds->delete($query, $paramType, $paramValue);



    }


    /**
     * Summary of getMember
     * @param mixed $username
     * @return array
     */
    public function getUser($username)
    {
        $query = 'SELECT * FROM user where username = ?';

        $paramType = 's';
        $paramValue = array(
            $username

        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }
    public function getEmail($email)
    {
        $query = 'SELECT * FROM member where email = ? limit 1';
        // echo $username;
        $paramType = 's';
        $paramValue = array(
            $email

        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }
    public function getMemberByUserID($userId)
    {
        $query = 'SELECT * FROM member where user_id = ?';
        // echo $username;
        $paramType = 's';
        $paramValue = array(
            $userId

        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }
    public function getMember($member_id)
    {
        $query = 'SELECT * FROM member where member_id = ?';
        // echo $username;
        $paramType = 's';
        $paramValue = array(
            $member_id

        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }
    public function getRegisteredMember($licence_id)
    {
        $query = 'SELECT * FROM member where licence_id = ?';
        // echo $username;
        $paramType = 's';
        $paramValue = array(
            $licence_id

        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }
    public function validateEmail($memberID, $val)
    {
        $query = 'UPDATE tender.`member` SET verified_email=? WHERE member_id= ?';

        $paramType = "ss";
        $paramValue = array(
            $val,
            $memberID,



        );

        //$this->ds->update($query);
        return $this->ds->update($query, $paramType, $paramValue);

    }
    public function validateMobile($memberID, $val)
    {
        $query = 'UPDATE tender.`member` SET verified_mobile=? WHERE member_id= ?';

        $paramType = "ss";
        $paramValue = array(
            $val,
            $memberID,



        );

        //$this->ds->update($query);
        return $this->ds->update($query, $paramType, $paramValue);

    }
    public function updateUserStatus($userID, $status)
    {
        $query = 'UPDATE tender.`user` SET user_status= ? WHERE user_id= ?';
        $paramType = "ss";
        $paramValue = array(
            $status,
            $userID,


        );

        //$this->ds->update($query);
        return $this->ds->update($query, $paramType, $paramValue);

    }
    public function updateMobile($memberID, $mobile, $otp)
    {
        $query = 'UPDATE tender.`member` SET otp=?, mobile_no = ? WHERE member_id= ?';

        $paramType = "sss";
        $paramValue = array(
            $otp,
            $mobile,
            $memberID,

        );

        //$this->ds->update($query);
        return $this->ds->update($query, $paramType, $paramValue);

    }
    public function updatePassword($userID, $password)
    {
        $query = 'UPDATE tender.`user` SET `password`=?, update_password_time= current_timestamp() WHERE user_id= ?';

        $paramType = "ss";
        $paramValue = array(

            is_null($password) ? "" : password_hash($password, PASSWORD_DEFAULT),
            is_null($userID) ? "" : $userID,

        );

        //$this->ds->update($query);
        return $this->ds->update($query, $paramType, $paramValue);

    }
    public function addAttachment($type, $path, $memberID)
    {
        $query = 'INSERT INTO `tender`.`attachment` (attachment_type, attachment_address, member_id) VALUES (?,?,?) on DUPLICATE KEY UPDATE `update_at` = current_timestamp(),attachment_status=1 ';

        $paramType = "sss";
        $paramValue = array(
            is_null($type) ? 1 : $type,
            is_null($path) ? "" : $path,
            is_null($memberID) ? "" : $memberID,

        );
        return $this->ds->insert($query, $paramType, $paramValue);


    }
    public function createAttachment()
    {
        // $attachmentReco\rd = $this->getUser($_POST["username"]);

    }
    public function addMember($member)
    {

        $query = 'INSERT INTO `tender`.`user`(`username`, `password`, `user_status`,`user_type`, `create_at`, `update_at`) VALUES (?,?,?,?,?,?)';
        $paramType = "ssssss";
        $paramValue = array(
            is_null($member['username']) ? "" : $member['username'],
            is_null($member['password']) ? "" : password_hash($member['password'], PASSWORD_DEFAULT),
            isset($member['user_status']) ? $member['user_status'] : 1,
            isset($member['user_type']) ? $member['user_type'] : 1,
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"),
        );
        $user_id = $this->ds->insert($query, $paramType, $paramValue);
    
        $query = 'INSERT INTO tender.`member`(`name`,  `licence_id`, `email`, `phone_no`, `mobile_no`, `city`, `address`, `user_id`, `company_name` )VALUES (?,?,?,?,?,?,?,?,?)';
        $paramType = 'sssssssss';
        $paramValue = array(
            !isset($member['fname']) ? "" : $member['fname'],
            !isset($member['username']) ? "" : $member['username'],
            !isset($member['email']) ? "" : $member['email'],
            !isset($member['phone']) ? "" : $member['phone'],
            !isset($member['mobile']) ? "" : $member['mobile'],
            !isset($member['city']) ? "" : $member['city'],
            !isset($member['address']) ? "" : $member['address'],
            !isset($user_id) ? "" : $user_id,
            !isset($member['company_name']) ? "" : $member['company_name'],

        );
       
        return $this->ds->insert($query, $paramType, $paramValue);



    }
    // public function createSystemUser(){
    //     $userRecord = $this->getUser($_POST["username"]);
    //     $userArray = array();
    //     $userArray[status]]

    // }
    public function createMember()
    {
        // $init = new Init();
        //echo "ggg";
        session_destroy();
        $userRecord = $this->getUser($_POST["username"]);
        $emailRecord = $this->getUser($_POST["email"]);
        $signUPAr = array();
        $signUPAr['status'] = 1;
        #print_r($userRecord);
        if (!empty($userRecord)) {
            $loginStatus = "هذا الحساب مسجل فعليا  ";
            $signUPAr['status'] = 100;
            //return $loginStatus;
            return $signUPAr;

        } else {
            $member = $_POST;
            $signUPAr['email'] = $member['email'];
            $signUPAr['username'] = $member['username'];
            $signUPAr['fname'] = $member['fname'];
            //$mobile_activation_link = random_int(100000, 999999);
            $otp = "";
            $activation_link = "";
            $member_id = $this->addMember($member);
            if (!empty($member_id)) {
                session_start();
                $_SESSION["member_id"] = $member_id;
                session_write_close();
                $signUPAr['status'] = 0;

            }





            // return $this->init::REGISTRATION_COMPLETED;
            return $signUPAr;

        }





    }

    public function loginMember()
    {
        // print($_POST['password']);
        $memberRecord = $this->getUser($_POST['username']);
        // print("<pre>");
        // print_r($memberRecord);
        // print("</pre>");
        $loginPassword = 0;
        if (!empty($memberRecord)) {
            if (!empty($_POST["password"])) {
                $password = $_POST["password"];
                print($password);
            }
            $hashedPassword = $memberRecord[0]["password"];
            // print("password " . $password);
            // print($hashedPassword);
            // print("<pre>");
            // print_r($_POST);
            // print("</pre>");
            // print($hashedPassword);


            #  $hashedPassword = 1;
            $loginPassword = 0;
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
            // print "loging password " . $loginPassword;
            // print $password;

        } else {
            $loginPassword = 0;
        }
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            if ($memberRecord[0]["user_status"] == 4) {
                $loginStatus = $this->init::STOP_ACCOUNT_MESSAGE;
                return $loginStatus;
            }
            session_destroy();
            session_start();
            $_SESSION["username"] = $memberRecord[0]["username"];
            $_SESSION['user'] = $memberRecord;
            // $_SESSION["userid"] = $memberRecord[0]["user_id"];
            session_write_close();
            // $url = "admin_dashboard/nice-html/ltr/index.html";
            $url = "admin_panel/";
            //require_once __DIR__ . '/admin_panel/index.html';

            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "اسم مستخدم او كلمة مرور غير صحيحة.";
            return $loginStatus;
        }
    }
    // public function registerMember()
// {
//     // print($_POST['password']);
//     $memberRecord = $this->getRegisteredMember($_POST['username']);
//     // print("<pre>");
//     // print_r($memberRecord);
//     // print("</pre>");
//     $loginPassword = 0;
//     if (!empty($memberRecord)) {
//         if (!empty($_POST["password"])) {
//             $password = $_POST["password"];
//             print($password);
//         }
//         $hashedPassword = $memberRecord[0]["password"];
//         // print("password " . $password);
//         // print($hashedPassword);
//         // print("<pre>");
//         // print_r($_POST);
//         // print("</pre>");
//         // print($hashedPassword);


    //         #  $hashedPassword = 1;
//         $loginPassword = 0;
//         if (password_verify($password, $hashedPassword)) {
//             $loginPassword = 1;
//         }
//         // print "loging password " . $loginPassword;
//         // print $password;

    //     } else {
//         $loginPassword = 0;
//     }
//     if ($loginPassword == 1) {
//         // login sucess so store the member's username in
//         // the session

    //         session_start();
//         $_SESSION["username"] = $memberRecord[0]["username"];
//         $_SESSION["userid"] = $memberRecord[0]["user_id"];
//         session_write_close();
//         $url = "home.php";
//         header("Location: $url");
//     } else if ($loginPassword == 0) {
//         $loginStatus = "اسم مستخدم او كلمة مرور غير صحيحة.";
//         return $loginStatus;
//     }
// }
}