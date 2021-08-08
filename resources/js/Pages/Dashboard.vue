<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <dashboard :details="$page.props.details" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Dashboard from "@/Jetstream/Dashboard";

export default {
  components: {
    AppLayout,
    Dashboard,
  },
};
</script>
