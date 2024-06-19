<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Clean column names by removing trailing single quotes
        $cleanedRow = [];
        foreach ($row as $key => $value) {
            $cleanedKey = rtrim($key, "'");
            $cleanedRow[$cleanedKey] = $value;
        }

        // Log the cleaned row for debugging
        Log::info('Imported Row: ', $cleanedRow);

        // Check if required keys exist and are not null
        $requiredKeys = ['name', 'student_id', 'class', 'birth_date', 'address', 'phone_number'];
        foreach ($requiredKeys as $key) {
            if (!isset($cleanedRow[$key]) || is_null($cleanedRow[$key])) {
                Log::error("Missing or null field '{$key}' in row: ", $cleanedRow);
                return null; // Skip this row if any required field is missing or null
            }
        }

        return new Students([
            'name' => $cleanedRow['name'],
            'student_id' => $cleanedRow['student_id'],
            'class' => $cleanedRow['class'],
            'birth_date' => $cleanedRow['birth_date'],
            'address' => $cleanedRow['address'],
            'phone_number' => $cleanedRow['phone_number'],
        ]);
    }
}
