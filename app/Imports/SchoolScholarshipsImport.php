<?php

namespace App\Imports;

use App\Models\SchoolScholarships;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolScholarshipsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        return new SchoolScholarships([
            'user_id' => '1',
            'school_id' => $row['school_id'],
            'school_name' => $row['school_name'],
            'province' => $row['province'],
            'name' => $row['name'],
            'award' => $row['awarded_to'],
            'summary' => $row['summary'],
            'amount' => $row['amount'],
            'eligibility' => $row['eligibility'],
            'action' => $row['action'],
            'date_posted' => $row['date_posted'],
            'expiry_date' => $row['expiry_date'],
            'deadline' => $row['deadline'],
            'availability' => $row['availability'],
            'level_of_study' => $row['level_of_study'],
            'duration' => $row['full_time_part_time'],
            'more_info' => $row['more_info'],
            'link' => $row['apply_now'],
            'featured' => 'No',
        ]);
    }
}
