<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tours</h2>
      <div class="font-semibold text-xl leading-tight float-right -mt-8">
        <!-- <jet-button> Create </jet-button> -->
        <jet-nav-link :href="route('tours.create')">
          Create a Tour &nbsp;
          <ViewGridAddIcon class="h-5 w-5 text-gray-600" />
        </jet-nav-link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <section class="py-8 px-4">
            <div class="flex flex-wrap -mx-4 mb-8">
              <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 bg-blue-500 text-white rounded"
                  >
                    <h3
                      class="text-3xl leading-tight font-heading font-semibold"
                    >
                      {{data.total}}
                    </h3>
                    <span class="leading-none">Total Tours</span>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 bg-red-500 text-white rounded"
                  >
                    <h3
                      class="text-3xl leading-tight font-heading font-semibold"
                    >
                      {{data.ended}}
                    </h3>
                    <span class="leading-none">Ended</span>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 bg-green-500 text-white rounded"
                  >
                    <h3
                      class="text-3xl leading-tight font-heading font-semibold"
                    >
                      {{data.active}}
                    </h3>
                    <span class="leading-none">Active</span>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 bg-gray-800 text-white rounded"
                    wfd-id="91"
                  >
                    <h3
                      class="text-3xl leading-tight font-heading font-semibold"
                    >
                      {{data.inactive}}
                    </h3>
                    <span class="leading-none">Inactive</span>
                  </div>
                </div>
              </div>
            </div>
            <el-table :data="tours" style="width: 100%">
              <el-table-column fixed prop="id" label="#ID" width="300"/>
              <el-table-column prop="tour_name" label="Tour's Name" width="150" />
              <el-table-column label="Description" width="300">
                <template #default="scope">
                  <div class="line-clamp-3" v-html="scope.row.tour_description"></div>
                </template>
              </el-table-column>
              <el-table-column prop="tour_price" label="Price"  />
              <el-table-column label="Status">
                <template #default="scope">
                  <span
                  v-if="scope.row.tour_status == 'active'"
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-green-500
                      rounded-full
                    ">
                    {{scope.row.tour_status}}
                    </span>
                    <span
                    v-else-if="scope.row.tour_status == 'inactive'"
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-gray-800
                      rounded-full
                    ">
                    {{scope.row.tour_status}}
                    </span>
                    <span
                    v-else
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-red-500
                      rounded-full
                    ">
                    {{scope.row.tour_status}}
                    </span>
                </template>
              </el-table-column>
              <el-table-column label="Image">
                <template #default="scope">
                  <img
                    style="height: 50px; with: 100px"
                    :src="'/storage/' + scope.row.tour_photo_path"
                    :alt="scope.row.tour_name"
                  />
                </template>
              </el-table-column>
              <el-table-column
                fixed="right"
                label="Operations"
                width="120"
                class="text-center"
              >
                <template #default="scope">
                  <el-button
                    type="warning"
                    size="mini"
                    icon="el-icon-view"
                    @click="viewTour(scope.row.id)"
                    circle
                  />
                      <el-button
                        type="danger"
                        size="mini"
                        icon="el-icon-delete"
                        circle
                        @click.prevent="destroyTour(scope.row.id)"
                      />
                </template>
              </el-table-column>
            </el-table>
          </section>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Tours from "@/Jetstream/Tours";
import { ViewGridAddIcon } from "@heroicons/vue/solid";
import JetNavLink from "@/Jetstream/NavLink";

export default {
  props: [ 'tours', 'data' ],
  components: {
    AppLayout,
    ViewGridAddIcon,
    JetNavLink,
    Tours,
  },
  methods:{
    viewTour(tour){
      this.$inertia.visit(route("tour.show", { tour }), {
        method: "get",
      });
    },

    destroyTour(tour){
      this.$inertia.delete(route("tour.destroy", {tour}), {
        preserveScroll: true,
        onSuccess: () => this.$message({
          showClose: true,
          message: 'Congrats, this is a success message.',
          type: 'success'
        }),
      });
    }
  }
};
</script>
