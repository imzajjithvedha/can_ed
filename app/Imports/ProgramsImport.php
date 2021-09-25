<?php

namespace App\Imports;

use App\Models\Programs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadings;

class ProgramsImport implements ToModel, withHeadingRow
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
            'name' => $row['name'],
            'description' => $row['description'],
            'status' => 'Approved',
        ]);
    }
}
