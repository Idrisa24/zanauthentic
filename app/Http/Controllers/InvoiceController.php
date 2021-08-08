<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
// use PDF;

class InvoiceController extends Controller
{
    public function show(Booking $invoice)
    {  
        // dd($invoice);
        // dd(json_decode($invoice->packages));
        $price = 0;
        $packages = json_decode($invoice->packages);
        $count = 0;

        foreach ($packages as $key => $value) {
            $count++;
            $price += $value->package_price;
        }

        // dd($price);
        return view('invoices.invoice', ['booking' => $invoice, 'packages' => $packages, 'price' => $price,'count' =>$count]);

    }

    public function download(Booking $invoice)
    {
        $price = 0;
        $packages = json_decode($invoice->packages);
        $count = 0;

        foreach ($packages as $key => $value) {
            $count++;
            $price += $value->package_price;
        }
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('invoices.invoice', ['booking' => $invoice, 'packages' => $packages, 'price' => $price,'count' =>$count]);

        return $pdf->download($invoice->id.'.pdf');

    }
}
