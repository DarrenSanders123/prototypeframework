<?php

use DS\Controller;
use DS\ErrorHandling;

class StudentOverviewController extends Controller
{
    public function index()
    {
        $this->view('students.overview'); // Show the view
    }

    public function ApiGetStudents(): string
    {
        $students = $this->getStudents();
        return $this->formatRows($students);
    }

    private function getStudents(): object
    {
        /**
         * select * from students
         * LEFT JOIN addresses a on students.AddressId = a.AddressId
         * LEFT JOIN roles r on students.RoleId = r.RoleId
         */

        global $pdoOne; // Declare the connection

        try {
            // Statement to get all the students and there address and role
            return (object)$pdoOne
                ->select('students.StudentId, StudentName, StudentEmail, StudentMobile, Street, HouseNr, City, State, Country, r.RoleId,  RoleName, IF(r.UpdatedAt > students.UpdatedAt, r.UpdatedAt, students.UpdatedAt) as UpdatedAt')
                ->from('students')
                ->left('addresses a on students.AddressId = a.AddressId')
                ->left('roles r on students.RoleId = r.RoleId')
                ->toList(PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            if (APP_MODE == "DEV") {
                dd($exception); // If running in dev mode display the error else just show error 500
            } else (new ErrorHandling(500))->ShowErrorScreen();
        }
    }

    private function formatRows(object $students): string
    {
        $html = "";

        foreach ($students as $student) {
            $html .= "
        <tr>
          <td>$student->StudentId</td>
          <td>$student->StudentName</td>
          <td>$student->StudentEmail</td>
          <td>$student->StudentMobile</td>
          <td>$student->Street $student->HouseNr</td>
          <td>$student->City</td>
          <td>$student->State</td>
          <td>$student->Country</td>
          <td>$student->RoleName</td>
          <td>$student->UpdatedAt</td>
         </tr>";
        }

        return $html;
    }
}