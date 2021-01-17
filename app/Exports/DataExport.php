<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\ExportModel;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function headings(): array
    {
        return [
            'Nomer Hp',
        ];
    }

    public function collection()
    {
        return Post::select('phone')->get();
    }
}
