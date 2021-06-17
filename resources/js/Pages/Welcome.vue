<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <app-layout-home>
    <section class="bg-white">
      <div class="container px-4 mx-auto">
        <el-carousel :interval="4000" type="card" height="450px">
          <el-carousel-item class="text-center" v-for="item in 6" :key="item">
            <img
              src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
              class="w-full mx-auto"
            />
          </el-carousel-item>
        </el-carousel>
      </div>
    </section>

    <section
      class="py-20 xl:bg-contain bg-top bg-no-repeat"
      style="background-image: url('assets/backgrounds/intersect.svg')"
    >
      <div class="container px-4 mx-auto">
        <div class="text-center mb-8">
          <h2 class="max-w-lg mx-auto mb-4 text-4xl font-bold font-heading">
            <span wfd-id="164">Start saving time today and</span>
            <span class="text-green-600">choose</span>
            <span wfd-id="162">your best package</span>
          </h2>
          <p class="max-w-sm mx-auto text-lg text-greenGray-400">
            Best for the family or studying tour's group
          </p>
        </div>
        <div class="flex flex-wrap sm:justify-center mb-10">
          <label class="flex items-center mr-8 mb-2">
            <span class="mx-2 font-semibold">Full package</span>
            <span
              class="
                inline-flex
                items-center
                justify-center
                w-12
                h-10
                bg-green-600
                text-white
                font-semibold
                rounded
              "
              >$59</span
            >
          </label>
        </div>
        <div class="flex flex-wrap bg-white rounded shadow">
          <div class="w-full md:w-1/2 lg:w-2/5 px-3">
            <div class="p-8 text-center">
              <span class="text-greenGray-400">Fill in the form below</span>
              <h4 class="mb-6 text-2xl">To make your Booking</h4>
              <div class="flex mb-4 px-4 rounded">
                <jet-input
                  id="fullname"
                  type="text"
                  class="
                    block
                    w-full
                    pl-3
                    py-4
                    text-xs text-green-400
                    font-semibold
                    leading-none
                    bg-greenGray-100
                    outline-none
                    rounded
                  "
                  placeholder="Full name"
                  v-model="form.email"
                  required
                  autofocus
                />
              </div>
              <div class="flex mb-4 px-4 rounded">
                <jet-input
                  id="email"
                  class="
                    block
                    w-full
                    pl-3
                    py-4
                    text-xs text-green-400
                    font-semibold
                    leading-none
                    bg-greenGray-100
                    outline-none
                    rounded
                  "
                  type="email"
                  placeholder="name@email.com"
                  v-model="form.email"
                  required
                  autofocus
                />
              </div>
              <div class="flex mb-6 px-4 rounded">
                <textarea
                  class="
                    w-full
                    h-24
                    p-4
                    text-xs
                    font-semibold
                    leading-none
                    resize-none
                    bg-white
                    outline-none
                    border-gray-300
                    rounded-md
                    shadow-sm
                    focus:border-green-300
                    focus:ring focus:ring-green-200 focus:ring-opacity-50
                  "
                  type="text"
                  placeholder="Message..."
                ></textarea>
              </div>
              <div class="flex mb-4 px-4 rounded">
                <jet-button
                  class="inline-block w-full py-3 px-5 leading-none text-center"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Book now
                </jet-button>
              </div>
            </div>
          </div>
          <div
            class="
              relative
              w-full
              md:w-1/2
              lg:w-3/5
              px-3
              rounded-r
              overflow-hidden
            "
          >
            <div class="p-8 text-center">
              <el-carousel height="350px">
                <el-carousel-item v-for="item in 4" :key="item">
                  <img
                    src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
                    class="w-full mx-auto"
                  />
                </el-carousel-item>
              </el-carousel>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4 text-center">
          <div class="w-full md:w-1/3 p-4 mb-4 md:mb-0">
            <svg
              class="text-green-600 w-10 h-10 mx-auto mb-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
              ></path>
            </svg>
            <span class="uppercase font-semibold">Dunder cousin</span>
            <p class="mt-4 mb-6 text-gray-400 leading-relaxed">
              Just enough paper for small business. Not enough to waste it on
              fluffy animals photos.
            </p>
            <h3 class="text-4xl mb-6 font-heading font-semibold">$9 / mo</h3>
            <a
              class="
                inline-block
                py-4
                px-8
                leading-none
                text-green-600
                bg-green-50
                hover:
                font-semibold
                rounded
                shadow
              "
              href="#"
              >Book now</a
            >
          </div>
          <div class="w-full md:w-1/3 p-4 mb-4 md:mb-0 md:border-l" wfd-id="39">
            <svg
              class="text-green-600 w-10 h-10 mx-auto mb-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
              ></path>
            </svg>
            <span class="uppercase font-semibold" wfd-id="40">Dunder son</span>
            <p class="mt-4 mb-6 text-gray-400 leading-relaxed">
              That’s what we’re talking about! More reams of paper is a really
              reamful choice.
            </p>
            <h3 class="text-4xl mb-6 font-heading font-semibold">$49 / mo</h3>
            <a
              class="
                inline-block
                py-4
                px-8
                leading-none
                text-white
                bg-green-600
                hover:bg-green-700
                font-semibold
                rounded
                shadow
              "
              href="#"
              >Book now</a
            >
          </div>
          <div class="w-full md:w-1/3 p-4 mb-4 md:mb-0 md:border-l" wfd-id="37">
            <svg
              class="text-green-600 w-10 h-10 mx-auto mb-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
              ></path>
            </svg>
            <span class="uppercase font-semibold" wfd-id="38"
              >Dunder mother</span
            >
            <p class="mt-4 mb-6 text-gray-400 leading-relaxed">
              Big business needs big amount of paper. The best quality comes
              with Dunder Mifflin paper.
            </p>
            <h3 class="text-4xl mb-6 font-semibold font-heading">$99 / mo</h3>
            <a
              class="
                inline-block
                py-4
                px-8
                leading-none
                text-green-600
                bg-green-50
                hover:
                font-semibold
                rounded
                shadow
              "
              href="#"
              >Book now</a
            >
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-center items-center -mx-3">
          <div class="w-full lg:w-1/2 mb-8 text-center lg:text-left">
            <h2 class="text-3xl mb-4 lg:text-4xl font-bold font-heading">
              <span wfd-id="22">Subscribe To Our</span>
              <span class="text-green-600"> Mailing List</span>
              <span> to get, latest news about our offers.</span>
            </h2>
          </div>
          <div class="w-full lg:w-1/2 px-3" wfd-id="16">
            <div class="flex flex-wrap max-w-lg mx-auto">
              <div
                class="
                  flex
                  w-full
                  md:w-2/3
                  px-3
                  mb-3
                  md:mb-0
                  md:mr-6
                  bg-greenGray-100
                  rounded
                "
              >
                <jet-input
                  id="email"
                  type="email"
                  class="
                    block
                    w-full
                    pl-3
                    py-4
                    text-xs text-greenGray-400
                    font-semibold
                    leading-none
                    bg-greenGray-100
                    outline-none
                    rounded
                  "
                  placeholder="Type your e-mail"
                  v-model="form.email"
                  required
                  autofocus
                />
              </div>
              <jet-button
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Sign Up
              </jet-button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  components: {
    AppLayoutHome,
    JetApplicationLogo,
    JetButton,
    JetInput,
    JetValidationErrors,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        message: "",
      }),
      newsletter: this.$inertia.form({
        email: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
  setup() {
    return {};
  },
};
</script>