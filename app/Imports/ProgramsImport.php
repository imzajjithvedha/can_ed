<?php

namespace App\Imports;

use App\Models\Programs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Programs([
            'user_id' => '1',
            'program_category' => $row['program_category'],
            'name' => $row['name'],
            'description' => $row['description'],
            'status' => 'Approved',
        ]);
    }
}
