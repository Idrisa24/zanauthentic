<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Packages
      </h2>
      <div class="font-semibold text-xl leading-tight float-right -mt-8">
        <!-- <jet-button> Create </jet-button> -->
        <jet-nav-link :href="route('packages.create')">
          Create a Package &nbsp;
          <ViewGridAddIcon class="h-5 w-5 text-gray-600" />
        </jet-nav-link>
      </div>
    </template>

    <div class="py-12">
      <!-- <bookings /> -->
      <jet-table />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { ViewGridAddIcon } from "@heroicons/vue/solid";
import Bookings from "@/Jetstream/Bookings";
import JetButton from "@/Jetstream/Button";
import JetNavLink from "@/Jetstream/NavLink";
import JetTable from "@/Jetstream/Table";

export default {
  data() {
    return {
      classes: "",
    };
  },
  components: {
    AppLayout,
    Bookings,
    JetButton,
    JetNavLink,
    ViewGridAddIcon,
    JetTable,
  },
};
</script>
