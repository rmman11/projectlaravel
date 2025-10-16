  
  
  @extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')
    <style>
 
        input, select, textarea { padding: 8px; width: 100%; margin-bottom: 10px; }
        .item-group { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .add-item { margin-top: 10px; cursor: pointer; background: #28a745; color: white; padding: 8px 12px; border: none; }
    </style>
  <h2>Create New Invoice</h2>






<form method="POST" action="{{ route('invoices.store') }}">
    @csrf

    <label>Invoice Number:</label>
    <input type="text" name="invoice_number" required>

    <label>Customer Name:</label>
    <input type="text" name="customer_name" required>

    <label>Customer Email:</label>
    <input type="email" name="customer_email" required>

    <label>Invoice Date:</label>
    <input type="date" name="invoice_date" required>

    <h3>Invoice Items</h3>
    <table id="items-table" border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Description</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="items-body">
            <!-- JavaScript will insert item rows here -->
        </tbody>
    </table>

    <button type="button" onclick="addItem()">+ Add Item</button>

    <h4 id="grand-total">Total: $0.00</h4>

    <button type="submit">Create Invoice</button>
</form>

<script>
let itemIndex = 0;

function addItem(description = '', quantity = 1, unitPrice = 0.00) {
    const tbody = document.getElementById('items-body');

    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="text" name="items[${itemIndex}][description]" value="${description}" required></td>
        <td><input type="number" name="items[${itemIndex}][quantity]" value="${quantity}" min="1" required oninput="updateRowTotal(this)"></td>
        <td><input type="number" name="items[${itemIndex}][unit_price]" value="${unitPrice}" min="0" step="0.01" required oninput="updateRowTotal(this)"></td>
        <td class="item-total">$0.00</td>
        <td><button type="button" onclick="removeItem(this)">Remove</button></td>
    `;

    tbody.appendChild(row);
    updateRowTotal(row.querySelector('input[name$="[quantity]"]'));

    itemIndex++;
    updateGrandTotal();
}

function removeItem(button) {
    const row = button.closest('tr');
    row.remove();
    updateGrandTotal();
}

function updateRowTotal(input) {
    const row = input.closest('tr');
    const qty = parseFloat(row.querySelector('input[name$="[quantity]"]').value) || 0;
    const price = parseFloat(row.querySelector('input[name$="[unit_price]"]').value) || 0;
    const total = qty * price;

    row.querySelector('.item-total').innerText = `$${total.toFixed(2)}`;

    updateGrandTotal();
}

function updateGrandTotal() {
    let total = 0;
    document.querySelectorAll('#items-body tr').forEach(row => {
        const qty = parseFloat(row.querySelector('input[name$="[quantity]"]').value) || 0;
        const price = parseFloat(row.querySelector('input[name$="[unit_price]"]').value) || 0;
        total += qty * price;
    });

    document.getElementById('grand-total').innerText = `Total: $${total.toFixed(2)}`;
}

// Add first row on page load
window.onload = function() {
    addItem();
};
</script>



@endsection