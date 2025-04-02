<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Expense_model extends CI_Model
{
    // Adds a new expense entry to the database
    public function add($uid, $edate, $item, $icost)
    {
        $data = [
            "UserId" => $uid,
            "ExpenseDate" => $edate,
            "ExpenseItem" => $item,
            "ExpenseCost" => $icost,
        ];
        $query = $this->db->insert("tbl_expense", $data);
        if ($query) {
            $this->session->set_flashdata("success", "Expense added successfully.");
            redirect("expense/add");
        } else {
            $this->session->set_flashdata("error", "Something went wrong. Please try again.");
            redirect("expense/add");
        }
    }

    // Retrieves all expenses for a given user
    public function manage($uid)
    {
        $query = $this->db
            ->select("ExpenseDate,ExpenseItem,ExpenseCost,NoteDate,ID")
            ->where("UserId", $uid)
            ->get("tbl_expense");
        return $query->result();
    }

    // Deletes an expense by its ID
    public function delete($uid)
    {
        $query = $this->db->where("ID", $uid)->delete("tbl_expense");
    }

    // Generates a date-wise report of expenses
    public function datewisereport($fdate, $tdate, $uid)
    {
        $data = [
            "ExpenseDate>=" => $fdate,
            "ExpenseDate<=" => $tdate,
            "UserId" => $uid,
        ];
        $query = $this->db
            ->select("ExpenseDate, sum(ExpenseCost) as ExpenseCost")
            ->where($data)
            ->group_by("ExpenseDate")
            ->get("tbl_expense");

        return $query->result();
    }

    // Generates a month-wise report of expenses
    public function monthwisereport($fdate, $tdate, $uid)
    {
        $data = [
            "ExpenseDate>=" => $fdate,
            "ExpenseDate<=" => $tdate,
            "UserId" => $uid,
        ];
        $query = $this->db
            ->select("sum(ExpenseCost) as ExpenseCost, month(ExpenseDate) as m, year(ExpenseDate) as y")
            ->where($data)
            ->group_by(["month(ExpenseDate), year(ExpenseDate)"])
            ->get("tbl_expense");
        return $query->result();
    }

    // Generates a year-wise report of expenses
    public function yearwisereport($fdate, $tdate, $uid)
    {
        $data = [
            "ExpenseDate>=" => $fdate,
            "ExpenseDate<=" => $tdate,
            "UserId" => $uid,
        ];
        $query = $this->db
            ->select("sum(ExpenseCost) as ExpenseCost, year(ExpenseDate) as y")
            ->where($data)
            ->group_by("year(ExpenseDate)")
            ->get("tbl_expense");
        return $query->result();
    }

    // Retrieves today's total expenses for a user
    public function todaysexpenses($uid)
    {
        $tdate = date("Y-m-d");
        $data = ["ExpenseDate" => $tdate, "UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }

    // Retrieves yesterday's total expenses for a user
    public function yesterdayxpenses($uid)
    {
        $tdate = date("Y-m-d", strtotime("-1 days"));
        $data = ["ExpenseDate" => $tdate, "UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }

    // Retrieves expenses for the last 7 days for a user
    public function last7daysexpenses($uid)
    {
        $pasttdate = date("Y-m-d", strtotime("-1 week"));
        $cdate = date("Y-m-d");
        $data = ["ExpenseDate>=" => $pasttdate, "ExpenseDate<=" => $cdate, "UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }

    // Retrieves expenses for the last 30 days for a user
    public function last30daysexpenses($uid)
    {
        $pasttdate = date("Y-m-d", strtotime("-1 month"));
        $cdate = date("Y-m-d");
        $data = ["ExpenseDate>=" => $pasttdate, "ExpenseDate<=" => $cdate, "UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }

    // Retrieves the total expenses for the current year for a user
    public function currentyearsexpenses($uid)
    {
        $tdate = date("Y");
        $data = ["year(ExpenseDate)" => $tdate, "UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }

    // Retrieves the total expenses for a user
    public function totalsexpenses($uid)
    {
        $data = ["UserId" => $uid];
        $this->db->select_sum("ExpenseCost");
        $this->db->where($data);
        $result = $this->db->get("tbl_expense")->row();
        return $result->ExpenseCost;
    }
}