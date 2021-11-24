<?php

namespace App\Imports;

use App\Models\SchoolPrograms;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolProgramsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SchoolPrograms([
            'user_id' => '1',
            'school_id' => $row['school_id'],
            'degree_level' => $row['degree_level'],
            'program_id' => $row['program_id'],
            'sub_title' => $row['description'],
        ]);
    }
}
