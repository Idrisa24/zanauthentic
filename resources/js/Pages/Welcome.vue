<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <app-layout-home>
    <section class="bg-white">
      <div class="container px-4 mx-auto">
        <el-carousel :interval="4000" type="card">
          <el-carousel-item
            class="text-center"
            v-for="main in mains"
            :key="main.id"
          >
            <img :src="'/storage/'+main.slide_photo_path" class="w-full mx-auto" />
          </el-carousel-item>
        </el-carousel>
      </div>
    </section>

    <section
      class="py-10 xl:bg-contain bg-top bg-no-repeat"
      style="background-image: url('assets/backgrounds/intersect.svg')"
    >
      <div class="container px-4 mx-auto">
        <div class="text-center mb-8">
          <h2 class="max-w-lg mx-auto mb-4 text-4xl font-bold font-heading">
            <span>Start saving time today and</span>
            <span class="text-green-600"> choose </span>
            <span>your best package</span>
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
              >$55</span
            >
          </label>
        </div>
        <div class="flex flex-wrap bg-white rounded shadow">
          <div class="w-full md:w-1/2 lg:w-2/5 px-3">
            <div class="p-8 text-center">
              <span class="text-greenGray-400">Fill in the form below</span>
              <h4 class="mb-6 text-2xl">Want to know more about us ?</h4>
              <form @submit.prevent="submit">
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
                    v-model="form.full_name"
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
                    placeholder="name@example.com"
                    v-model="form.email"
                    required
                    autofocus
                  />
                </div>
                <div class="flex mb-6 px-4 rounded">
                  <textarea
                    v-model="form.message"
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
                  />
                </div>

                <div class="flex mb-4 px-4 rounded">
                  <jet-button
                    class="group relative w-full flex justify-center"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                  >
                    Enquiry
                  </jet-button>
                </div>
                <div class="flex px-4 rounded">
                  <jet-action-message
                    :on="form.recentlySuccessful"
                    class="mr-3"
                  >
                    Enquery Sent.
                  </jet-action-message>
                </div>
              </form>
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
                <el-carousel-item v-for="sub in subs" :key="sub.id">
                  <img :src="'/storage/'+sub.slide_photo_path" class="w-full mx-auto" />
                </el-carousel-item>
              </el-carousel>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pb-10 xl:bg-contain bg-top bg-no-repeat">
      <div class="container  mx-auto">
        <div class="flex flex-wrap mx-2 text-center">
          <div
            v-for="tour in tours"
            :key="tour.id"
            class="w-full md:w-1/3 py-5 mb-4 md:mt-0 bg-white rounded shadow"
          >
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
            <span class="uppercase font-semibold">{{ tour.tour_name }}</span>
            <p
              v-html="tour.tour_description"
              class="line-clamp-2 mt-4 mx-3 mb-6 text-gray-400 leading-relaxed"
            ></p>
            <h3 class="text-4xl mb-6 font-heading font-semibold">
              ${{ tour.tour_price }}
            </h3>
            <div>
              <a
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
                  mx-2
                "
                href="javascript(0);"
                @click.prevent="navigateTo(tour.id)"
                >Detail</a
              >
              <a
                class="
                inline-block
                py-3
                px-6
                mt-4
                lg:mt-0
                leading-none
                text-white
                bg-green-600
                hover:bg-green-700
                font-semibold
                rounded
                shadow
                "
                :href="route('booking.now')"
                >Book Now</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetInputError from "@/Jetstream/InputError";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    tours: Object,
    subs: Object,
    mains: Object,
  },
  components: {
    AppLayoutHome,
    JetButton,
    JetInput,
    JetValidationErrors,
    JetActionMessage,
    JetInputError,
  },
  data() {
    return {
      form: this.$inertia.form({
        full_name: "",
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
      this.form.post(this.route("enquery.store"), {
        errorBag: "userEnqueryInformation",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
      });
    },

    navigateTo(tour){
      this.$inertia.visit(route('tours.details', { tour }))
    }
  },
  setup() {
    const items = [
      { id: 1, img: "/assets/packages/DSC_0002.jpg" },
      { id: 2, img: "/assets/packages/DSC_0103.jpg" },
      { id: 3, img: "/assets/packages/DSC_0062.jpg" },
      { id: 4, img: "/assets/packages/DSC_0133.jpg" },
    ];
    const packages = [
      { id: 1, img: "/assets/backgrounds/DSC_0110.jpg" },
      { id: 2, img: "/assets/backgrounds/DSC_0208.jpg" },
      { id: 3, img: "/assets/backgrounds/DSC_0219.jpg" },
      { id: 4, img: "/assets/backgrounds/DSC_0234.jpg" },
    ];
    return {
      items,
      packages,
    };
  },
};
</script>