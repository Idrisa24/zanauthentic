<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <section wfd-id="137">
    <div class="container px-4 mx-auto" wfd-id="139">
      <nav class="flex justify-between items-center py-6">
        <a class="text-3xl font-semibold leading-none" href="#"
          ><img
            class="h-10"
            src="metis-assets/logos/metis/metis.svg"
            alt=""
            width="auto"
        /></a>
        <div class="lg:hidden" wfd-id="146">
          <button
            class="
              navbar-burger
              flex
              items-center
              py-2
              px-3
              text-blue-600
              hover:text-blue-700
              rounded
              border border-blue-200
              hover:border-blue-300
            "
            wfd-id="148"
          >
            <svg
              class="fill-current h-4 w-4"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <title>Mobile menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
          </button>
        </div>
        <ul
          class="hidden lg:flex lg:items-center lg:w-auto lg:space-x-12"
          wfd-id="141"
        >
          <li wfd-id="145">
            <a
              class="text-sm text-blueGray-400 hover:text-blueGray-500"
              :href="route('nyumbani')"
              >Home</a
            >
          </li>
          <li wfd-id="144">
            <a
              class="text-sm text-blueGray-400 hover:text-blueGray-500"
              :href="route('contact-us')"
              >Contact</a
            >
          </li>

          <li wfd-id="143">
            <a
              class="text-sm text-blueGray-400 hover:text-blueGray-500"
              :href="route('about-us')"
              >About Us</a
            >
          </li>
          <li wfd-id="142">
            <a
              class="text-sm text-blueGray-400 hover:text-blueGray-500"
              :href="route('our-tours')"
              >Tours</a
            >
          </li>
          <li wfd-id="144">
            <a
              class="text-sm text-blueGray-400 hover:text-blueGray-500"
              :href="route('our-gallery')"
              >Gallery</a
            >
          </li>
        </ul>
        <!-- <div class="hidden lg:block" wfd-id="140">
          <a
            class="
              mr-2
              inline-block
              px-4
              py-3
              text-xs text-blue-600
              hover:text-blue-700
              font-semibold
              leading-none
              border border-blue-200
              hover:border-blue-300
              rounded
            "
            href="#"
            >Log In</a
          ><a
            class="
              inline-block
              px-4
              py-3
              text-xs
              font-semibold
              leading-none
              bg-blue-600
              hover:bg-blue-700
              text-white
              rounded
            "
            href="#"
            >Sign Up</a
          >
        </div> -->
      </nav>
    </div>
    <div class="hidden navbar-menu relative z-50" wfd-id="138">
      <div
        class="navbar-backdrop fixed inset-0 bg-blueGray-800 opacity-25"
      ></div>
      <nav
        class="
          fixed
          top-0
          left-0
          bottom-0
          flex flex-col
          w-5/6
          max-w-sm
          py-6
          px-6
          bg-white
          border-r
          overflow-y-auto
        "
      >
        <div class="flex items-center mb-8">
          <a class="mr-auto text-3xl font-semibold leading-none" href="#"
            ><img
              class="h-10"
              src="metis-assets/logos/metis/metis.svg"
              alt=""
              width="auto"
          /></a>
          <button class="navbar-close" wfd-id="147">
            <svg
              class="
                h-6
                w-6
                text-blueGray-400
                cursor-pointer
                hover:text-blueGray-500
              "
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              ></path>
            </svg>
          </button>
        </div>
        <div>
          <ul>
            <li class="mb-1">
              <a
                class="
                  block
                  p-4
                  text-sm text-blueGray-500
                  hover:bg-blue-50
                  hover:text-blue-600
                "
                href="#"
                >Product</a
              >
            </li>
            <li class="mb-1">
              <a
                class="
                  block
                  p-4
                  text-sm text-blueGray-500
                  hover:bg-blue-50
                  hover:text-blue-600
                "
                href="#"
                >Company</a
              >
            </li>
            <li class="mb-1">
              <a
                class="
                  block
                  p-4
                  text-sm text-blueGray-500
                  hover:bg-blue-50
                  hover:text-blue-600
                "
                href="#"
                >About Us</a
              >
            </li>
            <li class="mb-1">
              <a
                class="
                  block
                  p-4
                  text-sm text-blueGray-500
                  hover:bg-blue-50
                  hover:text-blue-600
                "
                href="#"
                >Features</a
              >
            </li>
          </ul>
          <div class="mt-4 pt-6 border-t border-blueGray-100">
            <a
              class="
                block
                px-4
                py-3
                mb-3
                text-xs text-center
                font-semibold
                leading-none
                bg-blue-600
                hover:bg-blue-700
                text-white
                rounded
              "
              href="#"
              >Sign Up</a
            ><a
              class="
                block
                px-4
                py-3
                mb-2
                text-xs text-center text-blue-600
                hover:text-blue-700
                font-semibold
                leading-none
                border border-blue-200
                hover:border-blue-300
                rounded
              "
              href="#"
              >Log In</a
            >
          </div>
        </div>
        <div class="mt-auto">
          <p class="my-4 text-xs text-blueGray-400">
            <span>Get in Touch</span>
            <a class="text-blue-600 hover:text-blue-600 underline" href="#"
              >info@example.com</a
            >
          </p>
          <a class="inline-block px-1" href="#"
            ><img src="metis-assets/icons/facebook-blue.svg" alt="" /></a
          ><a class="inline-block px-1" href="#"
            ><img src="metis-assets/icons/twitter-blue.svg" alt="" /></a
          ><a class="inline-block px-1" href="#"
            ><img src="metis-assets/icons/instagram-blue.svg" alt=""
          /></a>
        </div>
      </nav>
    </div>
  </section>
  <section>
    <el-carousel :interval="4000" type="card" height="450px">
      <el-carousel-item v-for="item in 6" :key="item">
        <h3 class="medium text-center">{{ item }}</h3>
      </el-carousel-item>
    </el-carousel>
  </section>
  <section
    class="py-20 xl:bg-contain bg-top bg-no-repeat"
    style="background-image: url('metis-assets/backgrounds/intersect.svg')"
    wfd-id="137"
  >
    <div class="container px-4 mx-auto" wfd-id="138">
      <div class="text-center mb-8" wfd-id="161">
        <h2 class="max-w-lg mx-auto mb-4 text-4xl font-bold font-heading">
          <span wfd-id="164">Start saving time today and</span>
          <span class="text-blue-600" wfd-id="163">choose</span>
          <span wfd-id="162">your best plan</span>
        </h2>
        <p class="max-w-sm mx-auto text-lg text-blueGray-400">
          Best for freelance developers who need to save their time
        </p>
      </div>
      <div class="flex flex-wrap sm:justify-center mb-10" wfd-id="154">
        <label class="flex items-center mr-8 mb-2" wfd-id="158">
          <input type="radio" name="billing" value="1" wfd-id="169" />
          <span class="mx-2 font-semibold" wfd-id="160">Monthly Billing</span>
          <span
            class="
              inline-flex
              items-center
              justify-center
              w-12
              h-10
              bg-blue-600
              text-white
              font-semibold
              rounded
            "
            wfd-id="159"
            >$59</span
          >
        </label>
        <label class="flex items-center mb-2" wfd-id="155">
          <input type="radio" name="billing" value="2" wfd-id="168" />
          <span class="mx-2 font-semibold" wfd-id="157">Annual Billing</span>
          <span
            class="
              inline-flex
              items-center
              justify-center
              w-12
              h-10
              bg-blue-600
              text-white
              font-semibold
              rounded
            "
            wfd-id="156"
            >$99</span
          >
        </label>
      </div>
      <div class="flex flex-wrap bg-white rounded shadow" wfd-id="139">
        <div class="w-full md:w-1/2 lg:w-2/5 px-3" wfd-id="146">
          <div class="p-8 text-center" wfd-id="147">
            <span class="text-blueGray-400" wfd-id="153">Sign In</span>
            <h4 class="mb-6 text-2xl">Finish your payment</h4>
            <div class="flex mb-4 px-4 bg-blueGray-100 rounded" wfd-id="152">
              <input
                class="
                  w-full
                  py-4
                  text-xs
                  placeholder-blueGray-400
                  font-semibold
                  leading-none
                  bg-blueGray-100
                  outline-none
                "
                type="email"
                placeholder="name@email.com"
                wfd-id="167"
              />
              <svg
                class="h-6 w-6 ml-4 my-auto text-blueGray-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                ></path>
              </svg>
            </div>
            <div class="flex mb-6 px-4 bg-blueGray-100 rounded" wfd-id="151">
              <input
                class="
                  w-full
                  py-4
                  text-xs
                  placeholder-blueGray-400
                  font-semibold
                  leading-none
                  bg-blueGray-100
                  outline-none
                "
                type="password"
                placeholder="Enter your password"
                wfd-id="166"
              />
              <button class="ml-4" wfd-id="175">
                <svg
                  class="h-6 w-6 my-auto text-blueGray-300"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                  ></path>
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                  ></path>
                </svg>
              </button>
            </div>
            <div class="text-left mb-5 text-sm text-blueGray-400" wfd-id="148">
              <label wfd-id="149">
                <input type="checkbox" name="terms" value="1" wfd-id="165" />
                <span class="ml-1" wfd-id="150"
                  >I agree to terms and conditions.</span
                >
              </label>
            </div>
            <button
              class="
                block
                w-full
                p-4
                text-center text-xs text-white
                font-semibold
                leading-none
                bg-blue-600
                hover:bg-blue-700
                rounded
              "
              wfd-id="174"
            >
              Purchase now
            </button>
          </div>
        </div>
        <div
          class="
            relative
            w-full
            md:w-1/2
            lg:w-3/5
            px-3
            bg-blue-500
            rounded-r
            overflow-hidden
          "
          wfd-id="140"
        >
          <el-carousel height="350px">
            <el-carousel-item v-for="item in 4" :key="item">
              <h3 class="small text-center">{{ item }}</h3>
            </el-carousel-item>
          </el-carousel>
        </div>
      </div>
    </div>
  </section>
  <section
    class="py-20 xl:bg-contain bg-top bg-no-repeat"
    style="background-image: url('metis-assets/backgrounds/intersect.svg')"
    wfd-id="23"
  >
    <div class="container px-4 mx-auto" wfd-id="24">
      <div class="text-center mb-16" wfd-id="68">
        <h2 class="max-w-lg mx-auto mb-4 text-4xl font-bold font-heading">
          <span wfd-id="71">Start saving time today and</span>
          <span class="text-blue-600" wfd-id="70">choose</span>
          <span wfd-id="69">your best plan</span>
        </h2>
        <p class="max-w-sm mx-auto text-lg text-blueGray-400">
          Best for freelance developers who need to save their time
        </p>
      </div>
      <div class="flex flex-wrap -mx-3" wfd-id="25">
        <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6" wfd-id="54">
          <div
            class="pt-16 pb-8 px-4 text-center bg-white rounded shadow"
            wfd-id="55"
          >
            <img
              class="h-20 mb-6 mx-auto"
              src="metis-assets/illustrations/people.png"
              alt=""
            />
            <h3 class="mb-2 text-4xl font-bold font-heading">Begginer</h3>
            <span
              class="text-4xl text-blue-600 font-bold font-heading"
              wfd-id="67"
              >$32.99</span
            >
            <p class="mt-2 mb-8 text-blueGray-400">user per month</p>
            <div class="flex flex-col items-center mb-8" wfd-id="57">
              <ul class="text-blueGray-400" wfd-id="58">
                <li class="flex mb-3" wfd-id="65">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="66">3 Emails</span>
                </li>
                <li class="flex mb-3" wfd-id="63">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="64">1 Datebases</span>
                </li>
                <li class="flex mb-3" wfd-id="61">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="62">Unlimited Domains</span>
                </li>
                <li class="flex" wfd-id="59">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="60">10 GB Storage</span>
                </li>
              </ul>
            </div>
            <div wfd-id="56">
              <a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  mb-4
                  sm:mb-0
                  sm:mr-3
                  text-xs text-white text-center
                  font-semibold
                  leading-none
                  bg-blue-600
                  hover:bg-blue-700
                  rounded
                "
                href="#"
                >Start Free Trial</a
              ><a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  text-xs text-blueGray-500
                  hover:text-blueGray-600
                  text-center
                  font-semibold
                  leading-none
                  bg-white
                  border border-blueGray-200
                  hover:border-blueGray-300
                  rounded
                "
                href="#"
                >Purchase</a
              >
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6" wfd-id="40">
          <div
            class="
              pt-16
              pb-8
              px-4
              text-center text-white
              bg-blue-600
              rounded
              shadow
            "
            wfd-id="41"
          >
            <img
              class="h-20 mb-6 mx-auto"
              src="metis-assets/illustrations/job-interview.png"
              alt=""
            />
            <h3 class="mb-2 text-4xl font-bold font-heading">Intermediate</h3>
            <span class="text-4xl font-bold font-heading" wfd-id="53"
              >$55.99</span
            >
            <p class="mt-2 mb-8">user per month</p>
            <div class="flex flex-col items-center mb-8" wfd-id="43">
              <ul wfd-id="44">
                <li class="flex items-center mb-3" wfd-id="51">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="52">6 Emails</span>
                </li>
                <li class="flex items-center mb-3" wfd-id="49">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="50">4 Datebases</span>
                </li>
                <li class="flex items-center mb-3" wfd-id="47">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="48">Unlimited Domains</span>
                </li>
                <li class="flex items-center" wfd-id="45">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="46">35 GB Storage</span>
                </li>
              </ul>
            </div>
            <div wfd-id="42">
              <a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  mb-4
                  sm:mb-0
                  sm:mr-3
                  text-xs text-blue-600
                  font-semibold
                  leading-none
                  bg-white
                  hover:bg-blueGray-50
                  rounded
                "
                href="#"
                >Start Free Trial</a
              ><a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  text-xs
                  font-semibold
                  leading-none
                  border border-blue-500
                  hover:border-blue-400
                  rounded
                "
                href="#"
                >Purchase</a
              >
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/3 px-3 mb-6" wfd-id="26">
          <div
            class="pt-16 pb-8 px-4 text-center bg-white rounded shadow"
            wfd-id="27"
          >
            <img
              class="h-20 mb-6 mx-auto"
              src="metis-assets/illustrations/team-management.png"
              alt=""
            />
            <h3 class="mb-2 text-4xl font-bold font-heading">Professional</h3>
            <span
              class="text-4xl text-blue-600 font-bold font-heading"
              wfd-id="39"
              >$62.99</span
            >
            <p class="mt-2 mb-8 text-blueGray-400">user per month</p>
            <div class="flex flex-col items-center mb-8" wfd-id="29">
              <ul class="text-blueGray-400" wfd-id="30">
                <li class="flex mb-3" wfd-id="37">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="38">12 Emails</span>
                </li>
                <li class="flex mb-3" wfd-id="35">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="36">8 Datebases</span>
                </li>
                <li class="flex mb-3" wfd-id="33">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="34">Unlimited Domains</span>
                </li>
                <li class="flex" wfd-id="31">
                  <svg
                    class="w-6 h-6 mr-2 text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                  <span wfd-id="32">50 GB Storage</span>
                </li>
              </ul>
            </div>
            <div wfd-id="28">
              <a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  mb-4
                  sm:mb-0
                  sm:mr-3
                  text-xs text-white text-center
                  font-semibold
                  leading-none
                  bg-blue-600
                  hover:bg-blue-700
                  rounded
                "
                href="#"
                >Start Free Trial</a
              ><a
                class="
                  block
                  sm:inline-block
                  py-4
                  px-6
                  text-xs text-blueGray-500
                  hover:text-blueGray-600
                  text-center
                  font-semibold
                  leading-none
                  bg-white
                  border border-blueGray-200
                  hover:border-blueGray-300
                  rounded
                "
                href="#"
                >Purchase</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-20" wfd-id="13">
    <div class="container px-4 mx-auto" wfd-id="14">
      <div class="flex flex-wrap justify-center items-center -mx-3" wfd-id="15">
        <div class="w-full lg:w-1/2 mb-8 text-center lg:text-left" wfd-id="19">
          <h2 class="text-3xl mb-4 lg:text-4xl font-bold font-heading">
            <span wfd-id="22">Lorem ipsum</span>
            <span class="text-blue-600" wfd-id="21">dolor sit</span>
            <span wfd-id="20">amet, consectetur adipiscing.</span>
          </h2>
          <p class="text-blueGray-400">
            Integer felis tellus, rhoncus ac pulvinar vitae.
          </p>
        </div>
        <div class="w-full lg:w-1/2 px-3" wfd-id="16">
          <div class="flex flex-wrap max-w-lg mx-auto" wfd-id="17">
            <div
              class="
                flex
                w-full
                md:w-2/3
                px-3
                mb-3
                md:mb-0
                md:mr-6
                bg-blueGray-100
                rounded
              "
              wfd-id="18"
            >
              <svg
                class="h-6 w-6 my-auto text-blueGray-500"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                ></path>
                <path
                  d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                ></path>
              </svg>
              <input
                class="
                  w-full
                  pl-3
                  py-4
                  text-xs text-blueGray-400
                  font-semibold
                  leading-none
                  bg-blueGray-100
                  outline-none
                "
                type="text"
                placeholder="Type your e-mail"
                wfd-id="111"
              />
            </div>
            <button
              class="
                w-full
                md:w-auto
                py-4
                px-8
                text-xs text-white
                font-semibold
                leading-none
                bg-blue-600
                hover:bg-blue-700
                rounded
              "
              type="submit"
              wfd-id="122"
            >
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-20" wfd-id="4">
    <div class="container px-4 mx-auto" wfd-id="5">
      <div
        class="flex flex-wrap mb-12 lg:mb-20 -mx-3 text-center lg:text-left"
        wfd-id="8"
      >
        <div class="w-full lg:w-1/5 px-3 mb-6 lg:mb-0" wfd-id="12">
          <a
            class="
              inline-block
              mx-auto
              lg:mx-0
              text-3xl
              font-semibold
              leading-none
            "
            href="#"
            ><img
              class="h-10"
              src="metis-assets/logos/metis/metis.svg"
              alt=""
              width="auto"
          /></a>
        </div>
        <div class="w-full lg:w-2/5 px-3 mb-8 lg:mb-0" wfd-id="11">
          <p
            class="
              max-w-md
              mx-auto
              lg:max-w-full
              lg:mx-0
              lg:pr-32
              lg:text-lg
              text-blueGray-400
              leading-relaxed
            "
          >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus
            eget justo.
          </p>
        </div>
        <div class="w-full lg:w-1/5 px-3 mb-8 lg:mb-0" wfd-id="10">
          <p
            class="
              mb-2
              lg:mb-4
              lg:text-lg
              font-bold font-heading
              text-blueGray-800
            "
          >
            Office
          </p>
          <p class="lg:text-lg text-blueGray-400">359 Hidden Valley Road, NY</p>
        </div>
        <div class="w-full lg:w-1/5 px-3" wfd-id="9">
          <p
            class="
              mb-2
              lg:mb-4
              lg:text-lg
              font-bold font-heading
              text-blueGray-800
            "
          >
            Contacts
          </p>
          <p class="lg:text-lg text-blueGray-400">hello@gmail.com</p>
        </div>
      </div>
      <div
        class="flex flex-col lg:flex-row items-center lg:justify-between"
        wfd-id="6"
      >
        <p class="text-xs text-blueGray-400">© 2020. All rights reserved.</p>
        <div class="order-first lg:order-last -mx-2 mb-4 lg:mb-0" wfd-id="7">
          <a class="inline-block px-2" href="#"
            ><img src="metis-assets/icons/facebook-blue.svg" alt="" /></a
          ><a class="inline-block px-2" href="#"
            ><img src="metis-assets/icons/twitter-blue.svg" alt="" /></a
          ><a class="inline-block px-2" href="#"
            ><img src="metis-assets/icons/instagram-blue.svg" alt=""
          /></a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import {
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from "@headlessui/vue";
import {
  BookmarkAltIcon,
  ChartBarIcon,
  CursorClickIcon,
  MenuIcon,
  PhoneIcon,
  PlayIcon,
  SupportIcon,
  XIcon,
} from "@heroicons/vue/outline";
import { ChevronDownIcon } from "@heroicons/vue/solid";

const solutions = [
  {
    name: "Analytics",
    description:
      "Get a better understanding of where your traffic is coming from.",
    href: "#",
    icon: ChartBarIcon,
  },
  {
    name: "Engagement",
    description: "Speak directly to your customers in a more meaningful way.",
    href: "#",
    icon: CursorClickIcon,
  },
];
const callsToAction = [
  { name: "Watch Demo", href: "#", icon: PlayIcon },
  { name: "Contact Sales", href: "#", icon: PhoneIcon },
];
const resources = [
  {
    name: "Help Center",
    description:
      "Get all of your questions answered in our forums or contact support.",
    href: "#",
    icon: SupportIcon,
  },
  {
    name: "Guides",
    description:
      "Learn how to maximize our platform to get the most out of it.",
    href: "#",
    icon: BookmarkAltIcon,
  },
];
const recentPosts = [
  { id: 1, name: "Boost your conversion rate", href: "#" },
  {
    id: 2,
    name: "How to use search engine optimization to drive traffic to your site",
    href: "#",
  },
  { id: 3, name: "Improve your customer experience", href: "#" },
];

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  components: {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    ChevronDownIcon,
    MenuIcon,
    XIcon,
  },
  setup() {
    return {
      solutions,
      callsToAction,
      resources,
      recentPosts,
    };
  },
};
</script>