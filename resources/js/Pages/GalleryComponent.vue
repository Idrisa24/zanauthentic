<template>
  <app-layout-home>
    <section class="py-8 px-4" wfd-id="150">
      <div class="flex flex-wrap -mx-4 -mb-8" wfd-id="151">
        <div class="md:w-1/4 px-4 mb-8" wfd-id="159">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/work.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="158">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/office.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="157">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/work.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="156">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/office.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="155">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/office.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="154">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/work.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="153">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/office.jpg"
            alt=""
          />
        </div>
        <div class="md:w-1/4 px-4 mb-8" wfd-id="152">
          <img
            class="rounded shadow"
            src="placeholders-2-0/pictures/work.jpg"
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