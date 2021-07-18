<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tours / Update
      </h2>
      <div class="font-semibold text-xl leading-tight float-right -mt-8">
        <jet-nav-link :href="route('tours.index')">
          <ArrowLeftIcon class="h-5 w-5 text-gray-600" /> Back Back
        </jet-nav-link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-24 md:gap-6">
          <update-tour-form :tour="$page.props.tour" />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { ArrowLeftIcon } from "@heroicons/vue/solid";
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetNavLink from "@/Jetstream/NavLink";
import JetTable from "@/Jetstream/Table";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import UpdateTourForm from "./UpdateTourForm.vue";

export default {
  components: {
    AppLayout,
    JetButton,
    JetNavLink,
    JetSectionBorder,
    JetTable,
    ArrowLeftIcon,
    UpdateTourForm,
  },
};
</script>
