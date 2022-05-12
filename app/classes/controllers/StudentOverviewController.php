<?php

class StudentOverviewController extends \DS\Controller
{
    public function studentsOverview()
    {
        $students = $this->getStudents(); // Load the students
        $this->view('students.overview', array('students' => $students)); // Show the view
    }

    private function getStudents() : object|null
    {
        /**
         * select * from students
         * LEFT JOIN addresses a on students.AddressId = a.AddressId
         * LEFT JOIN roles r on students.RoleId = r.RoleId
         */

        global $pdoOne; // Declare the connection

        try {
            // Statement to get all the students and there address and role
            return $pdoOne
                ->select('students.StudentId, StudentName, StudentEmail, StudentMobile, Street, HouseNr, City, State, Country, r.RoleId,  RoleName, IF(r.UpdatedAt > students.UpdatedAt, r.UpdatedAt, students.UpdatedAt) as UpdatedAt')
                ->from('students')
                ->left('addresses a on students.AddressId = a.AddressId')
                ->left('roles r on students.RoleId = r.RoleId')
                ->toList(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            if (APP_MODE == "DEV") {
                dd($exception); // If running in dev mode display the error else just show error 500
            } else (new \DS\ErrorHandling(500))->ShowErrorScreen();
        }
    }
}