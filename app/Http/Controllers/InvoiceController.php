<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Services\InvoiceService;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\InvoiceByYearRequest;

class InvoiceController extends Controller
{
    private $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index(InvoiceByYearRequest $request)
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
            return response()->json(['message' => 'successfully added'], 200);
        }
        catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
