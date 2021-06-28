<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Inertia\Inertia;
use App\Models\Booking;
use App\Mail\TourBooked;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    public $bookingId = 00001;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return Inertia::render('Booking/Index',['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prefix = "ZAN-";
        $char = rand(1,1000);
        $bookingId = $prefix . strval($char);

        Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'quantity' => ['required', 'integer'],
            'booking_price' => ['required', 'integer'],
            'package' => ['required', 'string', 'max:255'],
            'expected_date' => ['required', 'string', 'max:255'],
            'short_memo' => ['required', 'string'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validateWithBag('userBookingInformation');

        $booking = Booking::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'quantity' => $request['quantity'],
            'package' => $request['package'],
            'booking_id' => $bookingId,
            'booking_price' => $request['booking_price'],
            'expected_date' => $request['expected_date'],
            'short_memo' => $request['short_memo'],
        ]);

        $sent = Mail::to($booking->email)
                    // ->bcc('info@zanauthentic.co.tz')
                    ->send(new TourBooked($booking));

        // if ($sent) {
            
        // }


        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return Inertia::render('Booking/Show',['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function home_booking()
    {
        $tours = Tour::all();
        return Inertia::render('BookingPage',['tours' => $tours]);
    }
}
