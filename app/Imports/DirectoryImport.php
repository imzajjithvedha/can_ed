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
            'address' => $row['address'],
            'city' => $row['city'],
            'province' => $row['province'],
            'postal_code' => $row['postal_code'],
            'phone' => $row['phone'],
            'fax' => $row['fax'],
            'industry' => $row['industry'],
            'status' => 'Approved'
        ]);
    }
}
