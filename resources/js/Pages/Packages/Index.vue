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
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <section class="py-8 px-4">
            <div class="flex flex-wrap -mx-4 mb-8">
              <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 white rounded"
                  >
                    
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="p-4 mb-2 rounded"
                  >
                  <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">

                  </div>
                  <div class="w-full lg:w-1/2 px-4 float-right mb-6 lg:mb-0">
                    <Listbox v-model="selectedStatus"
                      >
                        <div class="relative mt-1">
                          <ListboxButton
                            class="relative w-full py-2 pl-3 pr-10 text-left rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm"
                          >
                            <span class="block truncate">{{ selectedStatus.name }}</span>
                            <span
                              class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
                            >
                              <SelectorIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            </span>
                          </ListboxButton>

                          <transition
                            leave-active-class="transition duration-100 ease-in"
                            leave-from-class="opacity-100"
                            leave-to-class="opacity-0"
                          >
                            <ListboxOptions
                              class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            >
                              <ListboxOption
                                v-slot="{ active, selectedStatus }"
                                v-for="statu in status"
                                :key="statu.name"
                                :value="statu"
                                as="template"
                              >
                                <li
                                  :class="[
                                    active ? 'text-amber-900 bg-amber-100' : 'text-gray-900',
                                    'cursor-default select-none relative py-2 pl-10 pr-4',
                                  ]"
                                >
                                  <span
                                    :class="[
                                      selectedStatus ? 'font-medium' : 'font-normal',
                                      'block truncate',
                                    ]"
                                    >{{ statu.name }}</span
                                  >
                                  <span
                                    v-if="selectedStatus"
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 text-amber-600"
                                  >
                                    <CheckIcon class="w-5 h-5" aria-hidden="true" />
                                  </span>
                                </li>
                              </ListboxOption>
                            </ListboxOptions>
                          </transition>
                        </div>
                    </Listbox>
                  </div>
                    
                  </div>
                </div>
              </div>
            </div>
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
                    <span class="leading-none">Total Packages</span>
                  </div>
                </div>
              </div>
              <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
                <div class="h-full">
                  <div
                    class="text-center p-4 mb-2 bg-gray-500 text-white rounded"
                  >
                    <h3
                      class="text-3xl leading-tight font-heading font-semibold"
                    >
                      {{data.unpublished}}
                    </h3>
                    <span class="leading-none">Unpublished</span>
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
                      {{data.published}}
                    </h3>
                    <span class="leading-none">Published</span>
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
                      {{data.expired}}
                    </h3>
                    <span class="leading-none">Expired</span>
                  </div>
                </div>
              </div>
            </div>
            <el-table :data="packages" style="width: 100%">
              <el-table-column fixed prop="id" label="#ID" width="300"/>
              <el-table-column prop="package_name" label="Package Name" width="150" />
              <el-table-column prop="tour.tour_name" label="Belongs To" width="150" />
              <el-table-column label="Description" width="300">
                <template #default="scope">
                  <div v-html="scope.row.package_description"></div>
                </template>
              </el-table-column>
              <el-table-column prop="package_price" label="Price"  />
              <el-table-column label="Status" width="130">
                <template #default="scope">
                  <span
                  v-if="scope.row.package_status == 'published'"
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-green-500
                      rounded-full
                    ">
                    {{scope.row.package_status}}
                    </span>
                    <span
                    v-else-if="scope.row.package_status == 'unpublished'"
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-gray-500
                      rounded-full
                    ">
                    {{scope.row.package_status}}
                    </span>
                    <span
                    v-else
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-gray-800
                      rounded-full
                    ">
                    {{scope.row.package_status}}
                    </span>
                </template>
              </el-table-column>
              <el-table-column label="Image">
                <template #default="scope">
                  <img
                    style="height: 50px; with: 100px"
                    :src="'/storage/' + scope.row.package_photo_path"
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
                    @click="viewPackage(scope.row.id)"
                    circle
                  />
                      <el-button
                        type="danger"
                        size="mini"
                        icon="el-icon-delete"
                        circle
                        @click.prevent="destroyPackage(scope.row.id)"
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
import { ref } from 'vue'
import AppLayout from "@/Layouts/AppLayout";
import { ViewGridAddIcon } from "@heroicons/vue/solid";
import Bookings from "@/Jetstream/Bookings";
import JetButton from "@/Jetstream/Button";
import JetNavLink from "@/Jetstream/NavLink";
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'
import { CheckIcon, SelectorIcon,  PaperClipIcon} from '@heroicons/vue/solid'

export default {
  props: [ 'packages', 'data'],
  data() {
    return {
      classes: "",
      form: this.$inertia.form({
        _method: "PUT",
        package_status: ""
      })
    };
  },
  components: {
    AppLayout,
    Bookings,
    JetButton,
    JetNavLink,
    Listbox,
    ListboxLabel,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    ViewGridAddIcon,
    CheckIcon,
    SelectorIcon,
    PaperClipIcon
  },

  methods:{
    viewPackage(pack){
      this.$inertia.visit(route('packages.show', {package: pack}),{
        methods:'get'
      })
    },

    destroyPackage(pack){
      this.$inertia.delete(route("package.destroy", {package: pack}), {
        preserveScroll: true,
        onSuccess: () => this.$message({
          showClose: true,
          message: 'Package has been deleted successifully.',
          type: 'success'
        }),
      });
    }

  },
  setup() {
    const status = [
      { name: 'All', value: 'all' },
      { name: 'Unpublished', value: 'unpublished' },
      { name: 'Published' , value: 'published'},
      { name: 'Expired' , value: 'expired'}
    ]
    const selectedStatus = ref(status[0])

    return {
      status,
      selectedStatus,
    }
  },
};
</script>
