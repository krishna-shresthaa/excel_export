<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JsonExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $jsonData;

    public function __construct($jsonData)
    {
        $this->jsonData = collect(json_decode($jsonData, true));
    }

    public function collection()
    {
        return $this->jsonData;
    }

    public function headings(): array
    {
        return array_keys($this->jsonData->first());
    }
}
