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
                      448
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
                      81
                    </h3>
                    <span class="leading-none">Canceled</span>
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
                      208
                    </h3>
                    <span class="leading-none">Finished</span>
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
                      159
                    </h3>
                    <span class="leading-none">Peding</span>
                  </div>
                </div>
              </div>
            </div>
            <el-table :data="tours" style="width: 100%">
              <el-table-column fixed prop="id" label="#ID" width="300">
              </el-table-column>
              <el-table-column prop="tour_name" label="Full Name" width="150">
              </el-table-column>
              <el-table-column label="Description" width="500">
                <template #default="scope">
                  <div v-html="scope.row.tour_description"></div>
                </template>
              </el-table-column>
              <el-table-column label="Description" width="500">
                <template #default="scope">
                  <img
                    style="height: 50px; with: 100px"
                    :src="'/storage/' + scope.row.tour_photo_path"
                    alt=""
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
                    circle
                  />

                  <el-popconfirm
                    confirmButtonText="OK"
                    cancelButtonText="No, Thanks"
                    title="Are you sure to delete this?"
                  >
                    <template #reference>
                      <el-button
                        type="danger"
                        size="mini"
                        icon="el-icon-delete"
                        circle
                      />
                      <!-- <el-button type="text" size="small">Edit</el-button> -->
                    </template>
                  </el-popconfirm>
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
  props: { tours: Object },
  components: {
    AppLayout,
    ViewGridAddIcon,
    JetNavLink,
    Tours,
  },
};
</script>
