<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Booking</h2>
    </template>

    <div class="py-12">
      <section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex flex-wrap -mx-4 mb-5">
            <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
              <div class="h-full bg-white border rounded shadow">
                <div
                  class="flex items-center justify-between py-3 px-4 border-b"
                >
                  <h3 class="text-lg font-semibold font-heading">Bookings</h3>
                  <span
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-blue-500
                      rounded-full
                    "
                    wfd-id="102"
                    >New</span
                  >
                </div>
                <div class="flex flex-col p-4">
                  <h3 class="text-3xl mb-3 font-heading font-semibold">
                    {{status.new}}
                  </h3>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
              <div class="h-full bg-white border rounded shadow">
                <div
                  class="flex items-center justify-between px-4 py-3 border-b"
                  wfd-id="94"
                >
                  <h3 class="text-lg font-semibold font-heading">Bookings</h3>
                  <span
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-green-500
                      rounded-full
                    "
                    >Completed</span
                  >
                </div>
                <div class="flex flex-col p-4">
                  <h3 class="text-3xl mb-3 font-heading font-semibold">
                    {{status.completed}}
                  </h3>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
              <div class="h-full bg-white border rounded shadow" wfd-id="83">
                <div
                  class="flex items-center justify-between px-4 py-3 border-b"
                  wfd-id="87"
                >
                  <h3 class="text-lg font-semibold font-heading">Bookings</h3>
                  <span
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-yellow-500
                      rounded-full
                    "
                    >Pendding</span
                  >
                </div>
                <div class="flex flex-col p-4" wfd-id="84">
                  <h3 class="text-3xl mb-3 font-heading font-semibold">
                    {{status.pendding}}
                  </h3>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
              <div class="h-full bg-white border rounded shadow">
                <div
                  class="flex items-center justify-between px-4 py-3 border-b"
                  
                >
                  <h3 class="text-lg font-semibold font-heading">Bookings</h3>
                  <span
                    class="
                      py-1
                      px-3
                      text-sm text-white
                      font-semibold
                      bg-red-500
                      rounded-full
                    "
                    >Canceled</span
                  >
                </div>
                <div class="flex flex-col p-4">
                  <h3 class="text-3xl mb-3 font-heading font-semibold">{{status.canceled}}</h3>
                </div>
              </div>
            </div>
          </div>
          <el-table :data="bookings" style="width: 100%">
            <el-table-column fixed prop="id" label="#ID" width="290" />
            <el-table-column prop="full_name" label="Full Name" width="150" />
            <el-table-column prop="email" label="Email" width="180" />
            <el-table-column prop="package" label="Tour's name" width="130" />
            <el-table-column prop="quantity" label="People" />
            <el-table-column prop="status" label="Status" width="120" />
            <el-table-column prop="booking_price" label="Price" />
            <el-table-column
              prop="expected_date"
              width="140"
              label="Tour's Date"
            />
            <el-table-column prop="created_at" label="Date" width="170" />
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
                  @click="viewBooking(scope.row.id)"
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
                  </template>
                </el-popconfirm>
              </template>
            </el-table-column>
          </el-table>
        </div>
      </section>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Bookings from "@/Jetstream/Bookings";
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    bookings: Object,
    status: Array,
  },
  components: {
    AppLayout,
    Bookings,
    JetButton,
  },
  data() {
    return {
      form: this.$inertia.form({
        booking_id: "",
      }),
    };
  },

  methods: {
    viewBooking(booking) {
      this.$inertia.visit(route("booking.show", { booking }), {
        method: "get",
      });
    },
  },
};
</script>
