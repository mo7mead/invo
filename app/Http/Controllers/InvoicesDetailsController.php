<?php

namespace App\Http\Controllers;

use App\Models\invoices_details;
use Illuminate\Http\Request;
use App\Models\invoices;
use App\Models\invoice_attachments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoices = invoices::where('id', $id)->first();
        $details  = invoices_Details::where('id_Invoice', $id)->get();
        $attachments  = invoice_attachments::where('invoice_id', $id)->get();

        return view('invoices.show', compact('invoices', 'details', 'attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices_details $invoices_details)
    {
        //
    }

        // public function get_file($invoice_number,$file_name)

        // {
        //     $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        //     return response()->download( $contents);
        // }


        // public function open_file($invoice_number, $file_name)
        // {
        //     try {
        //         // Construct the full path of the file
        //         $file_path = Storage::disk('public')->path($invoice_number . '/' . $file_name);
                
        //         // Check if the file exists
        //         if (!Storage::disk('public')->exists($invoice_number . '/' . $file_name)) {
        //             return response()->json(['error' => 'File not found'], 404);
        //         }
        
        //         // Return the file
        //         return response()->file($file_path);
        //     } catch (\Exception $e) {
        //         // Handle the exception (e.g., log it, return an error response, etc.)
        //         Log::error('Error opening file: ' . $e->getMessage());
        //         return response()->json(['error' => 'Internal server error'], 500);
        //     }
        // }

    }
