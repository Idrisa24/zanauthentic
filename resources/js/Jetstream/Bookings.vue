<template>
  <section class="py-2 px-4">
    <div class="container px-4 mx-auto">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
          <div class="h-full bg-white border rounded shadow">
            <div class="flex items-center justify-between py-3 px-4 border-b">
              <h3 class="text-lg font-semibold font-heading">Income</h3>
              <span
                class="
                  py-1
                  px-3
                  text-sm text-white
                  font-semibold
                  bg-green-500
                  rounded-full
                "
                wfd-id="102"
                >Monthly</span
              >
            </div>
            <div class="flex flex-col p-4" wfd-id="98">
              <h3 class="text-3xl mb-3 font-heading font-semibold">108,200</h3>
              <span wfd-id="100">Total income</span>
              <span class="text-green-500" wfd-id="99">82%</span>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
          <div class="h-full bg-white border rounded shadow" wfd-id="90">
            <div
              class="flex items-center justify-between px-4 py-3 border-b"
              wfd-id="94"
            >
              <h3 class="text-lg font-semibold font-heading">Orders</h3>
              <span
                class="
                  py-1
                  px-3
                  text-sm text-white
                  font-semibold
                  bg-green-500
                  rounded-full
                "
                wfd-id="95"
                >Monthly</span
              >
            </div>
            <div class="flex flex-col p-4" wfd-id="91">
              <h3 class="text-3xl mb-3 font-heading font-semibold">128,430</h3>
              <span wfd-id="93">New orders</span>
              <span class="text-green-500" wfd-id="92">32%</span>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
          <div class="h-full bg-white border rounded shadow" wfd-id="83">
            <div
              class="flex items-center justify-between px-4 py-3 border-b"
              wfd-id="87"
            >
              <h3 class="text-lg font-semibold font-heading">Visits</h3>
              <span
                class="
                  py-1
                  px-3
                  text-sm text-white
                  font-semibold
                  bg-green-500
                  rounded-full
                "
                wfd-id="88"
                >Monthly</span
              >
            </div>
            <div class="flex flex-col p-4" wfd-id="84">
              <h3 class="text-3xl mb-3 font-heading font-semibold">81,248</h3>
              <span wfd-id="86">New visits</span>
              <span class="text-green-500" wfd-id="85">24%</span>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-1/4 px-4 mb-4 lg:mb-0">
          <div class="h-full bg-white border rounded shadow" wfd-id="76">
            <div
              class="flex items-center justify-between px-4 py-3 border-b"
              wfd-id="80"
            >
              <h3 class="text-lg font-semibold font-heading">Conversions</h3>
              <span
                class="
                  py-1
                  px-3
                  text-sm text-white
                  font-semibold
                  bg-red-500
                  rounded-full
                "
                wfd-id="81"
                >Today</span
              >
            </div>
            <div class="flex flex-col p-4" wfd-id="77">
              <h3 class="text-3xl mb-3 font-heading font-semibold">7%</h3>
              <span wfd-id="79">Purchased more than once</span>
              <span class="text-red-500">82%</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <jet-table /> -->
</template>

<script>
import JetTable from "@/Jetstream/Table";

export default {
  components: {
    JetTable,
  },
  props: {
    Bookings: Object,
    status: String,
  },
};
</script>
