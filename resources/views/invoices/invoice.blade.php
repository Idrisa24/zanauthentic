<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">

    <title>Invoice</title>
  </head>
  <body>
    <div id="invoice">

        <div class="toolbar hidden-print">
            <div class="text-right">
                <button onclick="printContent(document.getElementById('printhere'))" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                <button class="btn btn-info"><a href="{{route('download.invoice', ['invoice' => $booking->id])}}"><i class="fa fa-file-pdf-o"></i> Export as PDF</a></button>
            </div>
            <hr>
        </div>
        <div  id="printhere" class="printhere invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col">
                            <a target="_blank" href="{{route('nyumbani')}}">
                                <img src="{{asset('assets/logo/ZAN-AUTHENTIC-01.png')}}" height="90" width="120" data-holder-rendered="true" />
                            </a>
                        </div>
                        <div class="col company-details" >
                            <h2 class="name">
                            <a target="_blank" href="{{route('nyumbani')}}">
                                Zan Authentic
                            </a>
                            </h2>
                            <div>Pete Zanzibar, TZ</div>
                            <div>+255(0) 679-192-024</div>
                            <div>+255(0) 652-971-375</div>
                            <div>info@zanauthentic.co.tz</div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to">{{$booking->full_name}}</h2>
                            <div class="address">{{$booking->address}}</div>
                            <div class="email"><a href="mailto:{{$booking->email}}">{{$booking->email}}</a></div>
                        </div>
                        <div class="col invoice-details">
                            <h1 class="invoice-id">INVOICE</h1>
                            <div class="date">Date of Invoice: {{$booking->updated_at}}</div>
                            <div class="date">Due Date: {{$booking->created_at}}</div>
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left">PACKAGE'S NAME && DESCRIPTION</th>
                                <th class="text-right">PRICE</th>
                                <th class="text-right"></th>
                                <th class="text-right">PEOPLE</th>
                                <th class="text-right">DATE</th>
                                <th class="text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $c = 1; ?>
                           
                            @foreach ($packages as $package)
                                <tr>
                                    <td class="no"><?php echo $c++?></td>
                                    <td class="text-left"><h3>
                                        <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                        {{$package->package_name}}
                                        </a>
                                        </h3>
                                    {!! $package->package_description !!}
                                    </td>
                                    <td class="unit">${{$package->package_price}}</td>
                                    <td class="qty">X</td>
                                    <td class="qty">{{$booking->quantity}}</td>
                                    <td class="qty">{{$booking->expected_date}}</td>
                                    <td class="total">${{$package->package_price * $booking->quantity}}</td>
                                </tr> 
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr >
                                <td colspan="2"></td>
                                <td colspan="2">SUBTOTAL</td>
                                <td>${{$price * $booking->quantity}}</td>
                            </tr>
                            {{-- <tr>
                                <td colspan="2"></td>
                                <td colspan="2">TAX 25%</td>
                                <td>$1,300.00</td>
                            </tr> --}}
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">GRAND TOTAL</td>
                                <td>${{$price}}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">We are so glady for choosing, we will make sure you will have a worderful tour.</div>
                    </div>
                </main>
                <footer>
                    {{-- Invoice was created on a computer and is valid without the signature and seal. --}}
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div>
                
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{asset('js/invoice.js')}}"></script>
  </body>
</html>
