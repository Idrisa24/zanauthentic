<template>
  <app-layout-home>
    <section class="bg-white">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
          <article class="py-12 px-4">
            <h1 class="text-4xl text-center mb-4 font-heading font-semibold">
              {{ packa.package_name }}
            </h1>
            <div class="my-10">
              <img
                class="rounded mx-auto"
                :src="'/storage/' + packa.package_photo_path"
                alt=""
              />
            </div>
            <div v-html="packa.package_description" class="max-w-3xl mx-auto"></div>

          </article>
        </div>
      </div>
    </section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";

export default {
  props: ["packa"],
  components: {
    AppLayoutHome,
  },
};
</script>

<style>
</style>