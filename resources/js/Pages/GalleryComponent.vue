<template>
  <app-layout-home>
    <section class="pt-8 px-4 bg-white">
      <div class="flex flex-wrap -mx-4 -mb-8" wfd-id="151">
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/backgrounds/DSC_0035.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/backgrounds/DSC_0110.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/backgrounds/DSC_0208.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/backgrounds/DSC_0234.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/packages/DSC_0002.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/packages/DSC_0062.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/packages/DSC_0103.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            src="/assets/packages/DSC_0133.jpg"
            alt=""
          />
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

<style>
</style>