<?php

namespace App\Imports;

use App\Models\Teachers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class TeachersImport implements ToModel, WithHeadingRow
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
        $requiredKeys = ['name', 'teacher_id', 'specialization', 'phone_number', 'address', 'email'];
        foreach ($requiredKeys as $key) {
            if (!isset($cleanedRow[$key]) || is_null($cleanedRow[$key])) {
                Log::error("Missing or null field '{$key}' in row: ", $cleanedRow);
                return null; // Skip this row if any required field is missing or null
            }
        }

        return new Teachers([
            'name' => $cleanedRow['name'],
            'teacher_id' => $cleanedRow['teacher_id'],
            'specialization' => $cleanedRow['specialization'],
            'phone_number' => $cleanedRow['phone_number'],
            'address' => $cleanedRow['address'],
            'email' => $cleanedRow['email'],
        ]);
    }
}
