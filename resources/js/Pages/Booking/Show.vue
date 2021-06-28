<template>
  <app-layout>
    <template #header>
      <div class="px-4 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Booking Information
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          Personal details and application.
        </p>
      </div>
    </template>
    <div class="py-12">
      <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <BookingView :detail="booking" />
        </div>
      </section>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BookingView from "./View";

export default {
  props: ["booking"],
  components: {
    AppLayout,
    BookingView,
  },
};
</script>
