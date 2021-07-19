<template>
  <app-layout-home>
    <div>
      <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
        <img class="w-32 h-32 md:w-52 md:pt-10 md:h-52 md:rounded-none rounded-full mx-auto" src="/assets/logo/ZAN-AUTHENTIC-01.png" alt="" width="384" height="512">
        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
          <blockquote>
            <p class="text-lg text-justify font-semibold">
              Zan authentic, Pete eco & cultural tourism is a part of community based tourism program in Pete village about 33 km south – east of Zanzibar Township in Zanzibar’s central region, it lies approximately 60 12‟ -60 17‟S and 390 24‟ -390 26‟E, at south it boundary Uzi island, at east it boundary Muungoni and Kitogani, at weast Unguja ukuu and north boundary Jozani National Park it about 1kilometer.We are aiming environmental economy and social sustainability together with provide memorable visitor experience. <br/><br/>
              ZAN AUTHENTIC COMMUNITY BASE TOURISM PROGRAM AT PETE VILLAGE <br/>
              Pete village is located 33km south east from Zanzibar town, it lies between Jozani Chwaka Bay National Park and Minai Bay Conservation area about 1km. Pete village is 5 in wildlife and cultural heritage that perform potential to eco and cultural tourism.
              Visitors at Pete village experience the authenticity of indigenous community from their life style and natural resources found at the village.
              <br/><br/>
              Zan authentic eco & cultural tourism enterprise is much concern with conservation and preservation of natural environment, local culture, and fulfil visitor’s expectations based on authentic of Zanzibar in collaboration with village development and conservation committee in Pete. Visitor with special interest in trees planting program particular in Mangrove trees and other social work   are welcomed in join hand, and can book in advance. 

            </p>
          </blockquote>
        </div>
      </figure>
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
     
    }
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