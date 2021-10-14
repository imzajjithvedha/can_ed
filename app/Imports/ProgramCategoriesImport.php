<?php

namespace App\Imports;

use App\Models\ProgramCategories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramCategoriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProgramCategories([
            'user_id' => '1',
            'name' => $row['name'],
            'status' => 'Approved'
        ]);
    }
}
