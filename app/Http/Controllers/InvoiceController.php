<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Leads;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('admin.invoices.index',compact('invoices'))->with('i',1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Leads::get();
        return view('admin.invoices.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $totalPrice = $this->calculateTotalPrice($request->input('quantities'), $request->input('unit_prices'));
        $invoice = new Invoice();
    $invoice->customer_id = $request->input('customer_id');
    $invoice->item_detail = json_encode($this->buildItemDetail($request->input('items'), $request->input('quantities'), $request->input('unit_prices')));
    $invoice->total_price = $totalPrice;
    $invoice->save();
    
    return redirect()->route('invoices.index');
    }

    private function calculateTotalPrice($quantities, $unitPrices)
{
    $totalPrice = 0;
    
    foreach ($quantities as $index => $quantity) {
        $totalPrice += $quantity * $unitPrices[$index];
    }
    
    return $totalPrice;
}

    private function buildItemDetail($items, $quantities, $unitPrices)
{
    $itemDetail = [];
    
    foreach ($items as $index => $item) {
        $itemDetail[] = [
            'item_id' => $item,
            'quantity' => $quantities[$index],
            'unit_price' => $unitPrices[$index]
        ];
    }
    
    return $itemDetail;
}

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
