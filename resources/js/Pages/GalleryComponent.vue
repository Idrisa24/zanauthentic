<template>
  <app-layout-home>
    <section class="pt-8 px-4 bg-white">
      <div class="flex flex-wrap -mx-4 -mb-8">
        <div v-for="gallery in galleries"  :key="gallery" class="md:w-1/4 px-4 mb-8">
          <img
            class="rounded shadow"
            :src="'/storage/'+gallery.gallery_photo_path"
            :alt="gallery.gallery_title"
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
    galleries: Object
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