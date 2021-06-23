<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Enqueries
      </h2>
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
                    <span class="leading-none">Total enqueries</span>
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
            <el-table :data="enqueries" style="width: 100%">
              <el-table-column fixed prop="id" label="#ID" width="300">
              </el-table-column>
              <el-table-column prop="full_name" label="Full Name" width="150">
              </el-table-column>
              <el-table-column prop="email" label="Email" width="180">
              </el-table-column>
              <el-table-column prop="status" label="Status" width="120">
              </el-table-column>
              <el-table-column prop="message" label="Message" width="500">
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
                    @confirm=""
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
import JetEnqueries from "@/Jetstream/Enqueries";

export default {
  props: { enqueries: Object },
  components: {
    AppLayout,
    JetEnqueries,
  },

  data() {
    return {
      form: this.$inertia.form({
        enquery_id: "",
      }),
    };
  },

  methods: {
    viewEnquery() {
      this.form.post(this.route("enqueries.show"), {
        errorBag: "userEnqueryHalndleInformation",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
      });
    },
  },
};
</script>
