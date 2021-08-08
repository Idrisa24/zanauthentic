<template>
  <app-layout-home>
    <section class="bg-white">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
          <article class="py-12 px-4">
            <h1 class="text-4xl text-center mb-4 font-heading font-semibold">
              {{ tour.tour_name }}
            </h1>
            <div class="my-10">
              <img
                class="rounded mx-auto"
                :src="'/storage/' + tour.tour_photo_path"
                alt=""
              />
            </div>
            <div v-html="tour.tour_description" class="max-w-3xl mx-auto"></div>

          </article>
        </div>
      </div>
    </section>
    <section class="py-20">
  <div class="container px-4 mx-auto" v-show="tour.packages">
    <div class="max-w-lg mb-16">
      <h2 class="mb-4 text-3xl lg:text-4xl font-bold font-heading">
        <span>The following are included packages of a tour</span>
      </h2>
    </div>
    <div class="bg-white border rounded shadow">
      <div class="border-b" v-for="pack in tour.packages" :key="pack.id">
        <div class="flex flex-wrap p-6 -mx-3">
          <div class="w-full lg:w-1/6 text-center lg:text-left text-lg lg:text-base font-semibold lg:font-normal mb-2 lg:mb-0 px-3">{{pack.package_name}}</div>
          <div class="w-full lg:w-4/6 mb-6 lg:mb-0 px-3">
            <p class="mb-4 lg:mb-6 leading-loose" v-html="pack.package_description" /> 
          </div>
          <div class="w-full lg:w-1/6 self-center text-xs px-3">
            <a v-if="pack.package_price >  0" class="block mb-2 py-4 text-center hover:text-white font-semibold bg-blue-200 hover:bg-blue-600 rounded" :href="route('packages.details',{package:pack.id})">Price ${{pack.package_price}}</a>
            <a v-else class="block mb-2 py-4 text-center hover:text-white font-semibold bg-blue-200 hover:bg-blue-600 rounded" :href="route('packages.details',{package:pack.id})">Free</a>
            <p class="text-center text-blue-400">per person</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";

export default {
  props: ["tour"],
  components: {
    AppLayoutHome,
  },
};
</script>

<style>
</style>