<?php

namespace App\Imports;

use App\Contracts\Interfaces\RegulationInterface;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class RegulationImport implements ToCollection
{
    private RegulationInterface $regulation;
    public $existingViolations = [];

    public function __construct(RegulationInterface $regulation)
    {
        $this->regulation = $regulation;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if (in_array($row[0], ['NAMA PELANGGARAN', 'Rambut Panjang (Jangan Dihapus)']) || $row[0] == null) {
                continue;
            }

            $regulation = $this->regulation->where($row[0]);

            if ($regulation) {
                $this->existingViolations[] = $row[0];
            } else {
                $data = [
                    'violation' => $row[0],
                    'point' => $row[1],
                ];
                $this->regulation->store($data);
            }
        }
    }
}
