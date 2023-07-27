<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\InvoicesService;
use App\Http\Requests\StoreInvoiceRequest;
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

    public function store(StoreInvoiceRequest $request)
    {
        try {

            $this->invoiceService->create($request);
            return response()->json(['Invoice created successfully', 201]);
        }
        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
