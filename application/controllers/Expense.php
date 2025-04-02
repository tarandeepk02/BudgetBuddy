<?php
// Prevent direct script access
defined("BASEPATH") or exit("No direct script access allowed");

class Expense extends CI_Controller
{
    /**
     * Constructor to validate user login session.
     * Redirects to login if the user is not logged in.
     */
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("uid")) {
            redirect("user/login");
        }
    }

    /**
     * Adds a new expense record.
     * Validates form inputs before inserting data into the database.
     */
    public function add()
    {
        // Form validation rules
        $this->form_validation->set_rules("expensedate", "Expense date", "required");
        $this->form_validation->set_rules("item", "Item", "required");
        $this->form_validation->set_rules("costitem", "Item Cost", "required|numeric");
        
        // If validation passes, insert data
        if ($this->form_validation->run()) {
            $edate = $this->input->post("expensedate");
            $item = $this->input->post("item");
            $icost = $this->input->post("costitem");
            $uid = $this->session->userdata("uid");
            $this->Expense_model->add($uid, $edate, $item, $icost);
        } else {
            // Load the add-expense view with errors
            $data["main_content"] = "expense/add-expense";
            $this->load->view("includes/template", $data);
        }
    }
    
    /**
     * Retrieves and displays the user's expense records.
     */
    public function manage()
    {
        $uid = $this->session->userdata("uid");
        $expdetails = $this->Expense_model->manage($uid);
        $data["expensedetails"] = $expdetails;
        $data["main_content"] = "expense/manage-expense";
        $this->load->view("includes/template", $data);
    }

    /**
     * Deletes an expense record by user ID and redirects to the manage expenses page.
     * @param int $uid The user ID whose expense record will be deleted.
     */
    public function delete($uid)
    {
        $this->Expense_model->delete($uid);
        $this->session->set_flashdata("success", "Expense Record deleted");
        redirect("expense/manage");
    }

    /**
     * Generates a date-wise report of expenses.
     */
    public function datewiserport()
    {
        $this->load->library("form_validation");
        
        // Validation rules
        $this->form_validation->set_rules("fromdate", "From Date", "required");
        $this->form_validation->set_rules("todate", "To Date", "required");
        
        // Load the default report view
        $data["main_content"] = "expense/expense-datewise-reports";
        
        if ($this->form_validation->run()) {
            $fdate = $this->input->post("fromdate");
            $tdate = $this->input->post("todate");
            $uid = $this->session->userdata("uid");
            
            // Fetch report data
            $rdetails = $this->Expense_model->datewisereport($fdate, $tdate, $uid);
            $data["reportdetails"] = !empty($rdetails) ? $rdetails : [];
            $data["fromdate"] = $fdate;
            $data["todate"] = $tdate;
        }
        
        $this->load->view("includes/template", $data);
    }

    /**
     * Generates a month-wise report of expenses.
     */
    public function monthwiserport()
    {
        $this->form_validation->set_rules("fromdate", "From Date", "required");
        $this->form_validation->set_rules("todate", "To Date", "required");
        
        $data["main_content"] = "expense/expense-monthwise-reports";
        
        if ($this->form_validation->run()) {
            $fdate = $this->input->post("fromdate");
            $tdate = $this->input->post("todate");
            $uid = $this->session->userdata("uid");
            
            $rdetails = $this->Expense_model->monthwisereport($fdate, $tdate, $uid);
            $data["reportdetails"] = !empty($rdetails) ? $rdetails : [];
            $data["fromdate"] = $fdate;
            $data["todate"] = $tdate;
        }
        
        $this->load->view("includes/template", $data);
    }

    /**
     * Generates a year-wise report of expenses.
     */
    public function yearwiserport()
    {
        $this->form_validation->set_rules("fromdate", "From Date", "required");
        $this->form_validation->set_rules("todate", "To Date", "required");
        
        $data["main_content"] = "expense/expense-yearwise-reports";
        
        if ($this->form_validation->run()) {
            $fdate = $this->input->post("fromdate");
            $tdate = $this->input->post("todate");
            $uid = $this->session->userdata("uid");
            
            $rdetails = $this->Expense_model->yearwisereport($fdate, $tdate, $uid);
            $data["reportdetails"] = !empty($rdetails) ? $rdetails : [];
            $data["fromdate"] = $fdate;
            $data["todate"] = $tdate;
        }
        
        $this->load->view("includes/template", $data);
    }
}
