<?php

namespace App\Imports;

use App\Models\SchoolTypes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolTypesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SchoolTypes([
            'user_id' => '1',
            'name' => $row['name'],
            'description' => $row['description'],
            'status' => 'Approved',
        ]);
    }
}
