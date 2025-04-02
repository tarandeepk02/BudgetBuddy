<?php
// Prevent direct script access
defined("BASEPATH") or exit("No direct script access allowed");

class Account extends CI_Controller
{
    // Constructor - Ensures user is logged in before accessing any function
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("uid")) {
            redirect("login"); // Redirect to login if user is not authenticated
        }
    }

    // Dashboard function - Fetches and displays various expense reports
    public function dashboard()
    {
        $uid = $this->session->userdata("uid");
        
        // Fetching expense details using Expense_model
        $todayexp = $this->Expense_model->todaysexpenses($uid);
        $yestrdayexp = $this->Expense_model->yesterdayxpenses($uid);
        $last7daysexp = $this->Expense_model->last7daysexpenses($uid);
        $last30daysexp = $this->Expense_model->last30daysexpenses($uid);
        $cyearexp = $this->Expense_model->currentyearsexpenses($uid);
        $totlexp = $this->Expense_model->totalsexpenses($uid);

        // Passing data to the view
        $data = [
            "texp" => $todayexp,
            "yesterdayexpense" => $yestrdayexp,
            "last7daysexpenses" => $last7daysexp,
            "last30daysexpenses" => $last30daysexp,
            "currentyearexpenses" => $cyearexp,
            "totalexpanses" => $totlexp,
        ];
        
        $data["main_content"] = "account/dashboard";
        $this->load->view("includes/template", $data);
    }

    // Profile function - Retrieves user profile details
    public function profile()
    {
        $uid = $this->session->userdata("uid");
        $profiledetails = $this->User_model->getusedetails($uid);
        $data = ["profile" => $profiledetails];
        $data["main_content"] = "account/profile";
        $this->load->view("includes/template", $data);
    }

    // Function to update profile details
    public function updateprofile()
    {
        // Form validation rules
        $this->form_validation->set_rules("fullname", "Full Name", "required|alpha");
        $this->form_validation->set_rules("MobileNumber", "Mobile Number", "required|exact_length[10]");
        
        if ($this->form_validation->run()) {
            // Retrieving input values
            $fname = $this->input->post("fullname");
            $mobno = $this->input->post("MobileNumber");
            $uid = $this->session->userdata("uid");
            
            // Updating profile details in User_model
            $this->User_model->updateprofile($uid, $fname, $mobno);
            
            // Setting success message
            $this->session->set_flashdata("success", "Profile updated successfully");
            redirect("account/profile");
        } else {
            // Setting error message if validation fails
            $this->session->set_flashdata("error", "Something went wrong. Please try again.");
            redirect("account/profile");
        }
    }

    // Function to update user password
    public function password()
    {
        // Form validation rules for password change
        $this->form_validation->set_rules("currentpassword", "Current Password", "required|min_length[6]");
        $this->form_validation->set_rules("newpassword", "New Password", "required|min_length[6]");
        $this->form_validation->set_rules("confirmpassword", "Confirm Password", "required|min_length[6]|matches[newpassword]");
        
        if ($this->form_validation->run()) {
            // Retrieving input values and encrypting passwords
            $currentpassword = md5($this->input->post("currentpassword"));
            $newpassword = md5($this->input->post("newpassword"));
            $uid = $this->session->userdata("uid");
            
            // Fetching stored current password
            $currentpwd = $this->User_model->getcurrentpassword($uid);
            $dbcurrentpwd = $currentpwd->Password;
            
            if ($currentpassword == $dbcurrentpwd) {
                // Updating password if the current password matches
                $this->User_model->updatepassword($uid, $newpassword);
                $this->session->set_flashdata("success", "Password changed successfully");
                redirect("account/password");
            } else {
                // Error message if current password is incorrect
                $this->session->set_flashdata("error", "Current Password is incorrect");
                redirect("account/password");
            }
        } else {
            // Loading the password change view if validation fails
            $data["main_content"] = "account/change-password";
            $this->load->view("includes/template", $data);
        }
    }
}