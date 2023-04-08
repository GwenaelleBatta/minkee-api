<?php

namespace App\Http\Uploads;
use Barryvdh\DomPDF\PDF;
use Symfony\Component\Console\Input\Input;

trait HandlesPDFUploads
{
    public function save($uploaded_pdf)
    {
        $name = $uploaded_pdf->getClientOriginalName();
        $filepath = 'offer/pdf/'.$name;

        \Storage::disk('public')->put($filepath, file_get_contents($uploaded_pdf));

        return $filepath;
    }
}
