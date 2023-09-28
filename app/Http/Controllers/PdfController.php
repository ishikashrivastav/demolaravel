<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marks;
use App\Models\Student;
use Barryvdh\DomPDF\PDF;

class PdfController extends Controller
{
    public function generatePDF($studentId, PDF $pdf)
{
    // Fetch result and student details based on $request or any other criteria
    $results =  Marks::where('student_id', $studentId)->get();
    $student = Student::findOrFail($studentId);
// dd($result);
    // Pass data to the view
    $pdf->loadView('result-pdf', compact('results', 'student'));
// dd($pdf);
    // Generate the PDF
    $pdfFileName = 'result_' . time() . '.pdf';
    return $pdf->stream($pdfFileName); // Open the PDF in a new tab
}
}
