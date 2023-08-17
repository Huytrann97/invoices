<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\InvoicesService;
use App\Http\Requests\InvoicesByYearRequest;
class InvoicesController extends Controller
{
    private $invoiceService;

    public function __construct(InvoicesService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index(InvoicesByYearRequest $request)
    {
        $userId = $request->header('x-user-id');
        $year = $request->year;
        $invoices = $this->invoiceService->listInvoicesByYear($year, $userId);
        return response()->json($invoices, 200);
    }
    
    public function searchByPrice(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
        ]);
    
        $price = $request->price;
        $invoices = $this->invoiceService->searchByPrice($price);
        return response()->json($invoices, 200);
    }
}
