<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Services\InvoiceService;
use App\Events\NewInvoiceCreatedEvent;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\InvoiceByYearRequest;
use App\Infrastructure\Eloquent\EloquentInvoice;

class InvoiceController extends Controller
{
    private $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }
    public function getInvoiceInformation(InvoiceByYearRequest $request)
    {
        $userId = $request->header('x-user-id');
        $year = $request->year;
        $invoices = $this->invoiceService->getInvoicesByYear($year, $userId);
        return response()->json($invoices, 200);
    }
    public function storeInvoiceInformation(StoreInvoiceRequest $request)
    {
    try {
        $this->invoiceService->storeInvoicesToDb($request);
        return response()->json(['message' => 'successfully added'], 200);
    }
    catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
    }
}
