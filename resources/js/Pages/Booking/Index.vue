<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Booking</h2>
    </template>

    <div class="py-12">
      <bookings />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Bookings from "@/Jetstream/Bookings";

export default {
  components: {
    AppLayout,
    Bookings,
    JetButton,
  },
};
</script>
