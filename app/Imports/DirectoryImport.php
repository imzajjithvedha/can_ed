<?php

namespace App\Imports;

use App\Models\OnlineBusinessDirectory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DirectoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new OnlineBusinessDirectory([
            'user_id' => '1',
            'name' => $row['name'],
            'description' => $row['description'],
            'category' => $row['category'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'image' => null,
            'url' => $row['url'],
            'status' => 'Approved'
        ]);
    }
}
