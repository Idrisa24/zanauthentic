<template>
  <app-layout-home>
    <section class="py-10 xl:bg-contain bg-top bg-no-repeat">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4 text-center">
          <div
            v-for="tour in tours"
            :key="tour.id"
            class="w-full md:w-1/5 py-5 mx-5 mb-4 md:mt-0 bg-white rounded shadow"
          >

            <img class="px-2 rounded" :src="'/storage/' + tour.tour_photo_path" :alt="tour.tour_name">
           
            <span class="uppercase font-semibold">{{ tour.tour_name }}</span>
            <p
              v-html="tour.tour_description"
              class="line-clamp-2 mt-4 mb-6 text-gray-400 text-small leading-relaxed"
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
                  mx-1
                "
                href="javascript(0);"
                @click.prevent="navigateTo(tour.id)"
                >Detail</a
              >
              <a
                class="
                  inline-block
                py-4
                px-6
                lg:mt-0
                leading-none
                text-white
                bg-green-600
                hover:bg-green-700
                font-semibold
                rounded
                shadow
                mx-1
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
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    tours: Object,
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
      
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },

    navigateTo(tour){
      this.$inertia.visit(route('tours.details', { tour }))
    },
  },
  setup() {
    return {};
  },
};
</script>

<style>
</style>