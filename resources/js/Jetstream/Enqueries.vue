<template>
  <section class="py-8 px-4">
    <div class="flex flex-wrap -mx-4 mb-8">
      <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
        <div class="h-full">
          <div class="text-center p-4 mb-2 bg-blue-500 text-white rounded">
            <h3 class="text-3xl leading-tight font-heading font-semibold">
              448
            </h3>
            <span class="leading-none">Total enqueries</span>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
        <div class="h-full">
          <div class="text-center p-4 mb-2 bg-red-500 text-white rounded">
            <h3 class="text-3xl leading-tight font-heading font-semibold">
              81
            </h3>
            <span class="leading-none">Canceled</span>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/4 px-4 mb-6 lg:mb-0">
        <div class="h-full">
          <div class="text-center p-4 mb-2 bg-green-500 text-white rounded">
            <h3 class="text-3xl leading-tight font-heading font-semibold">
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
            <h3 class="text-3xl leading-tight font-heading font-semibold">
              159
            </h3>
            <span class="leading-none">Peding</span>
          </div>
        </div>
      </div>
    </div>
    <table class="w-full table-auto">
      <thead>
        <tr>
          <th class="border-t px-2 py-2" scope="col">ID #</th>
          <th class="border-t px-2 py-2" scope="col">Full Name</th>
          <th class="border-t px-2 py-2" scope="col">Cust. Email</th>
          <th class="border-t px-2 py-2" scope="col">Message</th>
          <th class="text-center border-t px-2 py-2" scope="col">Status</th>
          <th class="text-center border-t px-2 py-2" scope="col">Date</th>
          <th class="text-center border-t px-2 py-2" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in enqueris" :key="item">
          <td class="border-t px-2 py-2">348</td>
          <td class="border-t px-2 py-2">lauren@gmail.com</td>
          <td class="border-t px-2 py-2">Where are my files?</td>
          <td class="text-center border-t px-2 py-2">
            <span
              class="
                inline-block
                text-sm
                py-1
                px-3
                rounded-full
                text-white
                bg-yellow-500
              "
              wfd-id="87"
              >New</span
            >
          </td>
          <td class="text-center border-t px-2 py-2">Kelly Kapoor</td>
          <td class="text-center border-t px-2 py-2">18-11-2018</td>
          <td class="text-center border-t px-2 py-2">
            <a class="text-indigo-600 hover:underline" href="#">edit</a>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</template>

<script>
// import JetApplicationLogo from "@/Jetstream/ApplicationLogo";

export default {
  prop: ["enqueris"],
  components: {
    // JetApplicationLogo,
  },
};
</script>
