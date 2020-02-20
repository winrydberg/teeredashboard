<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


use Auth;
use App\Applicant;


class ApplicantsExport implements FromArray , WithHeadings,ShouldAutoSize, WithEvents
{
   
    protected $applicants;

    public function __construct(array $users)
    {
        $this->applicants = $users;
        // dd($this->applicants);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:AA1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('assets/images/logo.jpeg'));
    //     $drawing->setHeight(90);
    //     $drawing->setCoordinates('A1');

    //     return $drawing;
    // }

    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Email Address',
            'Phone Number',
            'Requested Amount',
            'Gender',
            'Date Of Birth',
            'Marital Status',
            'ID Type',
            'ID Number',
            'Is GFD Member',
            'Disability Type',
            'Community',
            'Postal Address',
            'House No',
            'Street Name',
            'Business Location',
            'Education',
            'Occupation',
            'Years In Business',
            'Dependants',
            'How You Intent to Use Fund',
            'Total Requested Amount',
            // 'Approved Amount',
            'Areas To Use Fund',
            'Group Members',
            'Fund Usage Breakdown',
            'Approved'

        ];
    }

    public function array(): array
    {
        return $this->applicants;
    }


    // public function view(): View
    // {
    //     $admin = Auth::guard('admin')->user();
    //     $applicants = Applicant::all();
    //     // dd($applicants);
    //     return view('exports.approved', [
    //         'applicants' => $applicants
    //     ]);
    // }
}
