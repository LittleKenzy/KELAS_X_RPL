<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactReceived;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle incoming contact form submission.
     * POST /api/contact
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        // Persist to database
        $contact = Contact::create($request->validated());

        // Send notification email
        try {
            Mail::to(config('mail.from.address'))->send(
                new ContactReceived($contact)
            );
        } catch (\Exception $e) {
            // Log but don't fail the request — message is already saved
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'data'    => $contact,
            'message' => 'Pesan berhasil dikirim. Terima kasih telah menghubungi!',
        ], 201);
    }
}
