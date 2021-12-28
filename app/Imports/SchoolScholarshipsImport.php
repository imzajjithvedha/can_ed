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
        return new SchoolScholarships([
            'user_id' => '1',
            'school_id' => $row['school_id'],
            'name' => $row['name'],
            'summary' => $row['summary'],
            'eligibility' => $row['eligibility'],
            'award' => $row['award'],
            'action' => $row['action'],
            'deadline' => $row['deadline'],
            'availability' => $row['availability'],
            'level_of_study' => $row['level_of_study'],
            'link' => $row['link'],
            'provider' => $row['provider'],
            'amount' => $row['amount'],
            'date_posted' => $row['date_posted'],
            'expiry_date' => $row['expiry_date'],
        ]);
    }
}
