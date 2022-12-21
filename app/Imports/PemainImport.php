<?php

namespace App\Imports;

use App\Models\Pemain;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemainImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pemain([
            'nama_team' => $row['nama_team'],
            'goal_cleansheet' => $row['goal_cleansheet'],
            'assist_save' => $row['assist_save'],
            'red_card' => $row['red_card'],
            'yellow_card' => $row['yellow_card'],
            'position' => $row['position'],
            'nama' => $row['nama'],
            'nomor_punggung' => $row['nomor_punggung'],
            'usia' => $row['usia'],
        ]);
    }
}
