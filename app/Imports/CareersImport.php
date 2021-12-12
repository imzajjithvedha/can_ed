<?php

namespace App\Imports;

use App\Models\AllCareers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CareersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AllCareers([
            'user_id' => '1',
            'level' => $row['level'],
            'hierarchical' => $row['hierarchical'],
            'code' => $row['code'],
            'title' => $row['class'],
            'definition' => $row['definition'],
            'status' => 'Approved',
            'featured' => 'No',
        ]);
    }
}
