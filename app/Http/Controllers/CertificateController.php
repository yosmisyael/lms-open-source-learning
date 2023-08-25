<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class CertificateController extends Controller
{
    public function fillPDF($file, $outputFile, $name, $course, $score)
    {
        $fpdi = new Fpdi;

        $fpdi->setSourceFile($file);

        $template = $fpdi->importPage(1);

        $size = $fpdi->getTemplateSize($template);

        $pageWidth = $size['width'];
        
        $pageHeight = $size['height'];

        $fpdi->AddPage($size['orientation'], array($pageWidth, $pageHeight));

        $fpdi->useTemplate($template);

        $fpdi->SetFont('Helvetica', '', 20);
        
        $fpdi->SetTextColor(84, 84, 84);

        $fpdi->Text(151, 82.2, $name);

        $fpdi->Text(151, 95.3, $course);

        $fpdi->Text(151, 109, $score);

        return $fpdi->Output($outputFile, 'F');
    }

    public function process(Request $request)
    {
        $user_status = UserCourse::where('user_id', $request->user_id)->where('course_id', $request->course_id)->first();

        if (!$user_status || $user_status->is_completed == 0) {
            return redirect('/users/'.auth()->user()->username.'/dashboard/courses');
        }

        $name = $request->name;

        $course = $request->course;

        $score = $request->score;

        $outputFile = public_path().'certificate.pdf';

        $this->fillPDF(public_path().'/master/certificate.pdf', $outputFile, $name, $course, $score);
        
        return response()->file($outputFile);
    }
}
