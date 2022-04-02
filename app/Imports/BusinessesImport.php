<?php

namespace App\Imports;

use App\Models\Businesses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BusinessesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        return new Businesses([
            'user_id' => '1',
            'name' => $row['name'],
            'category_1' => $row['category_1'],
            'category_2' => $row['category_2'],
            'category_3' => $row['category_3'],
            'description' => $row['description'],
            'contact_name' => $row['contact_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'facebook' => $row['facebook'],
            'twitter' => $row['twitter'],
            'you_tube' => $row['you_tube'],
            'linked_in' => $row['linked_in'],
            'package' => $row['package'],
            'url' => $row['url'],
            'status' => 'Approved',
            'featured' => 'No',
            'student_service' => 'No',
            'advertised' => 'No',
        ]);
    }
}
