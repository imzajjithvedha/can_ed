<?php

namespace App\Imports;

use App\Models\DegreeLevels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DegreeLevelsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DegreeLevels([
            'user_id' => '1',
            'name' => $row['name'],
            'description' => $row['description'],
            'orders' => $row['order'],
            'status' => 'Approved',
            'slug' => $row['slug'],
        ]);
    }
}
