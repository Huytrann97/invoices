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

    public function getAll()
    {
        $invoices = $this->invoiceService->getAll();
        return response()->json($invoices, 200);
    }

    public function getById(int $id)
    {
        $invoice = $this->invoiceService->getById($id);
        return response()->json($invoice, 200);
    }

    public function create(Request $request)
    {
        $invoice = $this->invoiceService->create($request->all());
        return response()->json($invoice, 201);
    }

    public function update(int $id, Request $request)
    {
        $updated = $this->invoiceService->update($id, $request->all());
        return response()->json(['updated' => $updated], 200);
    }

    public function delete(int $id)
    {
        $deleted = $this->invoiceService->delete($id);
        return response()->json(['deleted' => $deleted], 200);
    }
}
