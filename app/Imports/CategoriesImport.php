<?php

namespace App\Imports;

use App\Models\BusinessCategories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BusinessCategories([
            'user_id' => '1',
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => null,
            'status' => 'Approved'
        ]);
    }
}
