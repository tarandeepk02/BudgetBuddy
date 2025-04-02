<?php
// Prevent direct script access
defined("BASEPATH") or exit("No direct script access allowed");

// User Controller Class
class User extends CI_Controller
{
    // Default function - Loads the login view
    public function index()
    {
        $this->load->view('login');
    }
    
    // Function to handle user signup
    public function signup()
    {
        // Form validation rules
        $this->form_validation->set_rules("fullname", "Full Name", "required|alpha");
        $this->form_validation->set_rules("email", "Email Id", "required|valid_email|is_unique[tbl_user.Email]");
        $this->form_validation->set_rules("mobileno", "Mobile Number", "required|exact_length[10]");
        $this->form_validation->set_rules("newpassword", "Password", "required|min_length[6]");
        $this->form_validation->set_rules("repeatpassword", "Confirm Password", "required|min_length[6]|matches[newpassword]");
        
        // Check if form validation passed
        if ($this->form_validation->run()) {
            // Retrieve form data
            $fname = $this->input->post("fullname");
            $emailid = $this->input->post("email");
            $mobno = $this->input->post("mobileno");
            $password = md5($this->input->post("newpassword")); // Encrypt password
            
            // Call model function to insert user data
            $this->User_model->signup($fname, $emailid, $mobno, $password);
        } else {
            // Reload the signup view with validation errors
            $this->load->view("signup");
        }
    }

    // Function to handle user login
    public function login()
    {
        // Form validation rules
        $this->form_validation->set_rules("email", "Email id", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        
        // Check if form validation passed
        if ($this->form_validation->run()) {
            // Retrieve form data
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $encpass = md5($password); // Encrypt password
            
            // Validate user credentials
            $validate = $this->User_model->login($email, $encpass);
            
            if ($validate) {
                // Set session data upon successful login
                $this->session->set_userdata("uid", $validate->ID);
                $this->session->set_userdata("fname", $validate->FullName);
                redirect("account/dashboard"); // Redirect to dashboard
            } else {
                // Set error message and redirect to login page
                $this->session->set_flashdata("error", "Invalid login details. Please try again.");
                redirect("login");
            }
        } else {
            // Reload the login view with validation errors
            $this->load->view("login");
        }
    }
    
    // Function to handle password reset
    public function resetpassword()
    {
        // Form validation rules
        $this->form_validation->set_rules("email", "Email Id", "required|valid_email");
        $this->form_validation->set_rules("MobileNumber", "Mobile Number", "required|exact_length[10]");
        $this->form_validation->set_rules("newpassword", "New Password", "required|min_length[6]");
        $this->form_validation->set_rules("confirmpassword", "Confirm Password", "required|min_length[6]|matches[newpassword]");
        
        // Check if form validation passed
        if ($this->form_validation->run()) {
            // Retrieve form data
            $emailid = $this->input->post("email");
            $mobno = $this->input->post("MobileNumber");
            $newpwd = md5($this->input->post("newpassword")); // Encrypt new password
            
            // Verify user details in the database
            $validate_details = $this->User_model->verifydata($emailid, $mobno);
            
            if ($validate_details) {
                // Update password in the database
                $this->User_model->updatepassword($emailid, $mobno, $newpwd);
                $this->session->set_flashdata("success", "Password updated successfully.");
                redirect("user/resetpassword");
            } else {
                // Set error message and reload reset password page
                $this->session->set_flashdata("error", "Invalid details. Please try again.");
                redirect("user/resetpassword");
            }
        } else {
            // Reload the reset-password view with validation errors
            $this->load->view("reset-password");
        }
    }

    // Function to handle user logout
    public function logout()
    {
        // Unset session data and destroy session
        $this->session->unset_userdata("uid");
        $this->session->sess_destroy();
        
        // Redirect to login page
        return redirect("user/login");
    }
}
