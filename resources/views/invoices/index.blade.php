@extends('layouts.app')

@section('title', 'Invoice')

@section('content')

   <style>
 

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-top: 40px;
        }
    </style>

 <div class="container-fluid">
    
   <div class="row">
    <div class="col-md-12">

<a href="{{ route('invoices.create') }}">Create new Invoice</a>

    <div class="title">Invoice List</div>



  <table class="invoice-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Invoice Number</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Invoice Date</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->customer_name }}</td>
                    <td>{{ $invoice->customer_email }}</td>
                    <td>{{ $invoice->invoice_date->format('Y-m-d') }}</td>
                    <td>${{ number_format($invoice->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
  </div>
    </div>



                            
@endsection
