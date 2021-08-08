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
              width="130"
              class="text-center"
            >
              <template #default="scope">
                <el-button
                  type="warning"
                  size="mini"
                  icon="el-icon-edit"
                  @click="editBooking(scope.row.id)"
                  circle
                />

                <el-button
                  type="info"
                  size="mini"
                  icon="el-icon-view"
                  @click="viewBooking(scope.row.id)"
                  circle
                />

                    <el-button
                      type="danger"
                      size="mini"
                      icon="el-icon-delete"
                      circle
                      @click.prevent="openModal(scope.row.id)"
                    />
                    
              </template>
            </el-table-column>
          </el-table>
        </div>
      </section>

      <!-- <TransitionRoot   as="template">
        <Dialog as="div" @close="closeModal">
          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="min-h-screen px-4 text-center">
              <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
              >
                <DialogOverlay class="fixed inset-0" />
              </TransitionChild>

                            <span class="inline-block h-screen align-middle" aria-hidden="true">
                              &#8203;
                            </span>

                        <TransitionChild
                          as="template"
                          enter="duration-300 ease-out"
                          enter-from="opacity-0 scale-95"
                          enter-to="opacity-100 scale-100"
                          leave="duration-200 ease-in"
                          leave-from="opacity-100 scale-100"
                          leave-to="opacity-0 scale-95"
                        >
                          <div
                            class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
                          >
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                              <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                  <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                  <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    Deactivate account
                                  </DialogTitle>
                                  <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                      Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                              Deactivate
                            </button>
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false" ref="cancelButtonRef">
                              Cancel
                            </button>
                          </div>
                  </div>
                </TransitionChild>
              </div>
           </div>
        </Dialog>
      </TransitionRoot> -->
      <TransitionRoot as="template" :show="isOpen">
        <Dialog as="div" static class="fixed z-10 inset-0 overflow-y-auto" @close="open = false" :open="open">
          <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
              <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                      <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                      <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                        Delete booking record
                      </DialogTitle>
                      <div class="mt-2">
                        <p class="text-sm text-gray-500">
                          Are you sure you want to delete your booking record? All of your data assocciate with this booking, will be permanently removed. This action cannot be undone.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click.prevent="deleteBooking">
                    Delete
                  </button>
                  <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="setIsOpen(false)" ref="cancelButtonRef">
                    Cancel
                  </button>
                </div>
              </div>
            </TransitionChild>
          </div>
        </Dialog>
      </TransitionRoot>
    </div>
  </app-layout>
</template>

<script>
import { ref } from "vue";
  import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogOverlay,
    DialogTitle,
    DialogDescription,
  } from "@headlessui/vue";
  import { ExclamationCircleIcon, ExclamationIcon } from '@heroicons/vue/outline'
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
    TransitionRoot,
    TransitionChild,
    Dialog, 
    DialogOverlay, 
    DialogTitle, 
    DialogDescription,
    ExclamationCircleIcon, 
    ExclamationIcon,
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

    

    editBooking(booking){
      this.$inertia.visit(route("booking.edit", { booking }),{
        method: "get",
      });
    },

    deleteBooking()
    {
      const booking = this.book;

      // alert(this.book)
      this.$inertia.delete(route("booking.destroy", {booking}), {
        preserveScroll: true,
        onSuccess: () => {
          this.setIsOpen(false),
          this.$message({
          showClose: true,
          message: 'Booking has been deleted successifuly.',
          type: 'success'
        })
        },
      });
    }
  },
  setup() {
    let isOpen = ref(false);
    let book = ref("");

    return {
      isOpen,
      book,
      openModal(value) {
        book.value = value;
        isOpen.value = true
      },
      setIsOpen(value) {
          isOpen.value = value;
      },
    };
  },

};
</script>
