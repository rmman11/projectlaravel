<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Validator, Redirect;
use File;
use Carbon\Carbon;
use Illuminate\Support;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    //
    public function index(){


      $invoices = Invoice::with('items')->get();

        return view('invoices.index', compact('invoices'));
    }


    public function create()
{
    return view('invoices.create');
}

public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'invoice_number' => 'required|unique:invoices',
        'customer_name' => 'required',
        'customer_email' => 'required|email',
        'invoice_date' => 'required|date',
        'items.*.description' => 'required|string',
        'items.*.quantity' => 'required|integer|min:1',
        'items.*.unit_price' => 'required|numeric|min:0',
    ]);

    // Calculate total
    $total = 0;
    foreach ($validated['items'] as $item) {
        $total += $item['quantity'] * $item['unit_price'];
    }

    // Create invoice
    $invoice = Invoice::create([
        'invoice_number' => $validated['invoice_number'],
        'customer_name' => $validated['customer_name'],
        'customer_email' => $validated['customer_email'],
        'invoice_date' => $validated['invoice_date'],
        'total' => $total,
    ]);

    // Create invoice items
    foreach ($validated['items'] as $item) {
        $invoice->items()->create([
            'description' => $item['description'],
            'quantity' => $item['quantity'],
            'unit_price' => $item['unit_price'],
            'total' => $item['quantity'] * $item['unit_price'],
        ]);
    }


    // Reload invoice with items for PDF
    $invoice->load('items');

    // Generate PDF
    $pdf = PDF::loadView('invoices.pdf', compact('invoice'));

    // Return PDF download
    return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');

    //return redirect()->route('invoices.create')->with('success', 'Invoice created successfully!');
}


public function downloadPDF()
{
    $invoices = Invoice::with('items')->get();
    $pdf = PDF::loadView('invoices.index', compact('invoices'));
    return $pdf->download('invoices.pdf');
}

}
