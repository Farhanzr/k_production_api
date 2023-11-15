<?php

use App\Models\Employee;

function generateStaffID($department)
{
    $max_staff_id = Employee::where('DEPARTMENT_CODE', $department)->max('STAFF_ID');

    if(isset($max_staff_id))
    {
        return $max_staff_id + 1;
    }
    else
    {
        if($department == 1)
        {
            $designation = 10000;
        }
        else if($department == 2)
        {
            $designation = 20000;
        }
        elseif($department == 3)
        {
            $designation = 30000;
        }
        else
        {
            $designation = 40000;
        }

        return $designation + 1;
    }
}
?>