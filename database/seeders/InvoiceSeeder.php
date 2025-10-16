<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Invoice::create([
    'invoice_number' => 'INV-002',
    'customer_name' => 'Jane Smith',
    'customer_email' => 'jane@example.com',
    'invoice_date' => now(),
    'total' => 300.00,
])->items()->createMany([
    ['description' => 'Product A', 'quantity' => 2, 'unit_price' => 50.00, 'total' => 100.00],
    ['description' => 'Service B', 'quantity' => 4, 'unit_price' => 50.00, 'total' => 200.00],
]);

    }
}
