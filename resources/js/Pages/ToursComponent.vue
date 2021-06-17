<template>
  <app-layout-home>
    <div>
      <h1>This is Tours page</h1>
    </div>
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