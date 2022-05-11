<?php

class StudentOverviewController
{
    function getStudents()
    {
        /**
         * select * from students
         * LEFT JOIN addresses a on students.AddressId = a.AddressId
         * INNER JOIN students_roles sr on students.StudentId = sr.StudentId
         * WHERE students.StudentId = :id
         */
        global $pdoOne; // Declare the connection

        try {
            $pdoOne
                ->select('*')
                ->left('addresses a on students.AddressId = a.AddressId')
                ->left('students_roles sr on students.StudentId = sr.StudentId')
                ->where('students.StudentId = :id')
                ->toList();
        } catch (Exception $exception) {
            if (APP_MODE == "DEV") {
                dd($exception);
            } else return;

        }


    }
}