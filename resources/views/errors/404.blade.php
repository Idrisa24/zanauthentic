<!DOCTYPE html>
<html lang="en">
  <head>
    <title>404 page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/tailwind/tailwind.min.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-tailwind.png">
    <script src="{{asset('js/main.js')}}"></script>
  </head>
  <body class="antialiased bg-body text-body font-body">
    <div class=""> 
    
      <section>
        <div class="skew skew-top mr-for-radius">
          <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
            <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
          </svg>
        </div>
        <div class="skew skew-top ml-for-radius">
          <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
            <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
          </svg>
        </div>
        <div class="py-20 bg-gray-50 radius-for-skewed">
          <div class="container mx-auto px-4">
            <img class="mx-auto" style="height: 40vh" src="{{asset('atis-assets/illustrations/pablo.png')}}" alt="">
            <div class="text-center">
              <span class="mb-6 text-4xl text-green-600 font-bold">Whoops!</span>
              <h3 class="mb-2 text-4xl font-bold">Something went wrong!</h3>
              <p class="mb-8 text-gray-400">Sorry, but we are unable to open this page</p>
              <div><a class="w-full lg:w-auto mb-2 lg:mb-0 lg:mr-4 inline-block py-2 px-6 rounded-l-xl rounded-t-xl font-bold leading-loose text-gray-50 bg-green-600 hover:bg-green-700" href="/">Go back to Homepage</a><a class="w-full lg:w-auto inline-block py-2 px-6 rounded-l-xl rounded-t-xl font-bold leading-loose bg-white hover:bg-gray-50" href="#">Try Again</a></div>
            </div>
          </div>
        </div>
        <div class="skew skew-bottom mr-for-radius">
          <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
            <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
          </svg>
        </div>
        <div class="skew skew-bottom ml-for-radius">
          <svg class="h-8 md:h-12 lg:h-20 w-full text-gray-50" viewbox="0 0 10 10" preserveaspectratio="none">
            <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
          </svg>
        </div>
      </section>
    </div>
  </body>
</html>

