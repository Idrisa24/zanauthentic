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

        $status = [
            'new' => $new = Booking::where('status', '=', 'new')->count(),
            'completed' => $completed = Booking::where('status', '=', 'completed')->count(),
            'pendding' => $pendding = Booking::where('status', '=', 'pendding')->count(),
            'canceled' => $canceled = Booking::where('status', '=', 'canceled')->count(),
        ];
        
        return Inertia::render('Booking/Index',['bookings' => $bookings,'status' => $status]);
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
            'address' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer'],
            'booking_price' => ['required', 'integer'],
            'package' => ['required','array'],
            'expected_date' => ['required', 'string', 'max:255'],
            'short_memo' => ['required', 'string'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validateWithBag('userBookingInformation');

        $booking = Booking::create([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'quantity' => $request['quantity'],
            'address' => $request['address'],
            'package' => $request['package']['tour_name'],
            'booking_id' => $bookingId,
            'booking_price' => $request['booking_price'],
            'expected_date' => $request['expected_date'],
            'short_memo' => $request['short_memo'],
        ]);

        $sent = Mail::to($booking->email)
                    ->bcc('info@zanauthentic.co.tz')
                    ->send(new TourBooked($booking));

       


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
        $tour = Tour::where('tour_name','=',$booking->package)->with('packages')->get();
        foreach ($tour as $key => $date) 
        {
            $data['id'] = $date->id;
            $data['tour_name'] = $date->tour_name;
            $data['tour_description'] = $date->tour_description;
            $data['tour_price'] = $date->tour_price;
            $data['tour_photo_path'] = $date->tour_photo_path;

            if ($date->packages) {
                foreach ($date->packages as $key => $value) {
                    if ($value->package_status = 'published') {
                        $data['packages'][$key]['id'] = $value->id;
                        $data['packages'][$key]['package_photo_path'] = $value->package_photo_path;
                        $data['packages'][$key]['package_name'] = $value->package_name;
                        $data['packages'][$key]['package_price'] = $value->package_price;
                        $data['packages'][$key]['package_description'] = $value->package_description;
                    }

                }
            }
        }
        // dd($data);
        return Inertia::render('Booking/Edit', ['booking' => $booking, 'packages' => $data]);
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
        Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'booking_email' => ['required', 'string', 'email', 'max:255'],
            'booking_quantity' => ['required', 'integer'],
            'booking_price' => ['required', 'integer'],
            'booking_status' => ['required', 'array'],
            'booking_packages' => ['required', 'array'],
            'booking_expected_date' => ['required', 'string', 'max:255'],
            'booking_description' => ['required', 'string'],
            'booking_address' => ['required', 'string'],
        ])->validateWithBag('updatebooking');

        $book = Booking::findOrFail($booking->id);

        $book->full_name = $request->full_name;
        $book->packages = $request->booking_packages;
        $book->address = $request->booking_address;
        $book->package = $request->booking_package;
        $book->status = $request['booking_status']['value'];
        $book->email = $request->booking_email;
        $book->booking_price = $request->booking_price;
        $book->quantity = $request->booking_quantity;
        $book->short_memo = $request->booking_description;
        $book->expected_date = $request->booking_expected_date;


        if($book->update()){
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $destroy = Booking::findOrFail($booking->id)->delete();
       if ($destroy) {
        return redirect()->back();
       }
    }

    public function home_booking()
    {
        $tours = Tour::all();
        return Inertia::render('BookingPage',['tours' => $tours]);
    }

    public function changeTour(Request $request){
        Validator::make($request->all(), [
            'tour' => ['required','string'],
        ])->validateWithBag('fetchpackages');

        
    }
}
