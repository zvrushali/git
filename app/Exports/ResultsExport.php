<?php

namespace App\Exports;

use App\Result;
use App\Question;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResultsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
          $data = Result::with('Question')->where('user_id',4)->get();
          return $data;
    }
}
