<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Galleries
      </h2>
    </template>

    <div class="py-12">
      <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <section class="py-8 px-4">
            <el-table :data="galleries" style="width: 100%">
              <el-table-column fixed prop="id" label="#ID" width="300"/>
              <el-table-column prop="gallery_title" label="Gallery Title" width="150" />
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
                    :src="'/storage/' + scope.row.gallery_photo_path"
                    :alt="scope.row.gallery_title"
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
      </div> -->
      <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
        <header class="flex items-center justify-between">
          <h2 class="text-lg leading-6 font-medium text-black">Galleries</h2>
          <button class="hover:bg-light-blue-200 hover:text-light-blue-800 group flex items-center rounded-md bg-light-blue-100 text-light-blue-600 text-sm font-medium px-4 py-2">
            <svg class="group-hover:text-light-blue-600 text-light-blue-500 mr-2" width="12" height="20" fill="currentColor">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
            New
          </button>
        </header>
        <form class="relative">
          <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
          </svg>
          <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="Filter projects" placeholder="Filter projects" />
        </form>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
          <li v-for="gallery in galleries" :key="gallery.id">
            <a :href="route('galleries.show', {gallery: gallery.id})" class="hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group block rounded-lg p-4 border border-gray-200">
              <dl class="grid sm:block lg:grid xl:block grid-cols-2 grid-rows-2 items-center">
                <div>
                  <dt class="sr-only">Title</dt>
                  <dd class="group-hover:text-white leading-6 font-medium text-black">
                    {{gallery.gallery_title}}
                  </dd>
                </div>
                <div>
                  <dt class="sr-only">status</dt>
                  <dd class="group-hover:text-light-blue-200 text-sm font-medium sm:mb-4 lg:mb-0 xl:mb-4">
                    {{gallery.gallery_status}}
                  </dd>
                </div>
                <div class="col-start-2 row-start-1 row-end-3">
                  <dt class="sr-only">Gallery Image</dt>
                  <dd class="flex justify-end sm:justify-start lg:justify-end xl:justify-start -space-x-2">
                    <!-- <img x-for="user in item.users" src="" alt="" width="48" height="48" class="w-7 h-7 rounded-full bg-gray-100 border-2 border-white" /> -->
                    <img :src="'/storage/'+gallery.gallery_photo_path" :alt="'gallery.gallery_title'"  class="w-7 h-7 rounded bg-gray-100 border-2 border-white" />
                  </dd>
                </div>
              </dl>
            </a>
          </li>
          <li class="hover:shadow-lg flex rounded-lg">
            <a :href="route('galleries.create')" class="hover:border-transparent hover:shadow-xs w-full flex items-center justify-center rounded-lg border-2 border-dashed border-gray-200 text-sm font-medium py-4">
              New Gallery 
            </a>
          </li>
        </ul>
      </section>

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

export default {
  props: [ 'galleries', 'data'],
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
    ViewGridAddIcon,
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
