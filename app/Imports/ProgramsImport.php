<?php

namespace App\Imports;

use App\Models\Programs;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgramsImport implements ToModel
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
