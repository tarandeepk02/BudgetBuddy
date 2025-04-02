<?php
// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

class User_model extends CI_Model
{
    // Function to handle user signup
    public function signup($fname, $emailid, $mobno, $password)
    {
        $data = [
            "FullName" => $fname,
            "Email" => $emailid,
            "MobileNumber" => $mobno,
            "Password" => $password,
        ];
        
        // Insert user data into the database
        $query = $this->db->insert("tbl_user", $data);
        
        if ($query) {
            // Set success message and redirect to signup page
            $this->session->set_flashdata(
                "success",
                "Your account has been created successfully. You can login now. "
            );
            redirect("signup");
        } else {
            // Set error message and redirect to signup page
            $this->session->set_flashdata(
                "error",
                "Something went wrong. Please try again."
            );
            redirect("user/signup");
        }
    }

    // Function to handle user login
    public function login($email, $encpass)
    {
        $data = [
            "Email" => $email,
            "Password" => $encpass,
        ];
        
        // Query the database for user credentials
        $query = $this->db->where($data);
        $login = $this->db->get("tbl_user");
        
        if ($login != null) {
            return $login->row(); // Return user details if found
        }
    }

    // Function to verify if email and mobile exist in the database
    public function verifydata($emailid, $mobno)
    {
        $data = [
            "Email" => $emailid,
            "MobileNumber" => $mobno,
        ];

        // Fetch the user ID if email and mobile exist
        $resetpwd = $this->db
            ->where($data)
            ->get("tbl_user")
            ->row();
        
        if ($resetpwd != null) {
            return $resetpwd->ID; // Return user ID
        }
    }

    // Function to reset user password
    public function resetpassword($emailid, $mobno, $newpwd)
    {
        $data = ["Password" => $newpwd];
        
        // Update password in the database
        return $this->db
            ->where(["Email" => $emailid, "MobileNumber" => $mobno])
            ->update("tbl_user", $data);
    }

    // Function to fetch user details by user ID
    public function getusedetails($uid)
    {
        $query = $this->db
            ->select("FullName,Email,MobileNumber,RegDate")
            ->where("ID", $uid)
            ->from("tbl_user")
            ->get();
        
        return $query->row(); // Return user details
    }

    // Function to update user profile details
    public function updateprofile($uid, $fname, $mobno)
    {
        $data = [
            "FullName" => $fname,
            "MobileNumber" => $mobno,
        ];
        
        // Update user details in the database
        $query = $this->db->where("ID", $uid)->update("tbl_user", $data);
    }

    // Function to get the current password of a user
    public function getcurrentpassword($uid)
    {
        $query = $this->db->where("ID", $uid)->get("tbl_user");
        
        if ($query->num_rows() > 0) {
            return $query->row(); // Return current password details
        }
    }

    // Function to update user password
    public function updatepassword($uid, $newpassword)
    {
        $data = ["Password" => $newpassword];
        
        // Update password in the database
        return $this->db->where(["ID" => $uid])->update("tbl_user", $data);
    }
}
