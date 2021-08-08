<template>
  <jet-form-section @submitted="updatebooking(booking.id)">
    <template #title> booking Information </template>

    <template #description>
      Fill in all necessary information about the booking.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="full_name" value="Booking Name" />
        <jet-input
          id="full_name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.full_name"
          disabled="disabled"
          readonly
        />
        <jet-input-error :message="form.errors.full_name" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_email" value="Booking Email" />
        <jet-input
          id="booking_email"
          type="text"
          class="mt-1 block w-full"
          v-model="form.booking_email"
          disabled="disabled"
          readonly
        />
        <jet-input-error :message="form.errors.booking_email" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_package" value="Tour Booked" />
        <jet-input
          id="booking_package"
          type="text"
          class="mt-1 block w-full"
          v-model="form.booking_package"
          disabled="disabled"
          readonly
        />
        <jet-input-error :message="form.errors.booking_package" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_address" value="Booking Address" />
        <jet-input
          id="booking_address"
          type="text"
          class="mt-1 block w-full"
          v-model="form.booking_address"
        />
        <jet-input-error :message="form.errors.booking_address" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="expected_date" value="Expected Date" />
        <jet-input
          id="expected_date"
          type="date"
          class="mt-1 block w-full"
          v-model="form.booking_expected_date"
        />
        <jet-input-error :message="form.errors.expected_date" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <Listbox as="div" v-model="form.booking_status" :updated="update(form.booking_status)">
          <ListboxLabel class="block text-sm font-medium text-gray-700">
            Booking Status
          </ListboxLabel>
          <div class="relative mt-1">
            <ListboxButton
              class="
                relative
                w-full
                bg-white
                border border-gray-300
                rounded-md
                shadow-sm
                pl-3
                pr-10
                py-2
                text-left
                cursor-default
                focus:outline-none
                focus:ring-1 focus:ring-green-200
                focus:border-green-200
                sm:text-sm
              "
            >
              <span class="block truncate">{{ form.booking_status.name }}</span>
              <span
                class="
                  ml-3
                  absolute
                  inset-y-0
                  right-0
                  flex
                  items-center
                  pr-2
                  pointer-events-none
                "
              >
                <SelectorIcon
                  class="h-5 w-5 text-gray-400"
                  aria-hidden="true"
                />
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
                                    active ? 'text-white bg-green-600' : 'text-gray-900',
                                    'cursor-default select-none relative py-2 pl-3 pr-9',
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
                              :class="[
                                active ? 'text-white' : 'text-green-600',
                                'absolute inset-y-0 right-0 flex items-center pr-4',
                              ]"
                                >
                      <CheckIcon class="w-5 h-5" aria-hidden="true" />
                    </span>
                  </li>
                </ListboxOption>
              </ListboxOptions>
            </transition>
          </div>
        </Listbox>
        <jet-input-error :message="form.errors.booking_status" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_description" value="Booking Descriptions" />
        <ckeditor
          :editor="editor"
          v-model="form.booking_description"
          :config="editorConfig"
          ref="booking_description"
        ></ckeditor>
        <jet-input-error :message="form.errors.tour_discription" class="mt-2" />

      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_quantity" value="Number of People" />
        <jet-input
          id="booking_quantity"
          type="text"
          class="mt-1 block w-full"
          v-model="form.booking_quantity"
        />
        <jet-input-error :message="form.errors.booking_quantity" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <el-checkbox-group v-model="form.booking_packages">

          <el-checkbox-button v-for="pack in packages.packages" :key="pack.id" :label="pack" name="type">{{pack.package_name}}</el-checkbox-button>
        </el-checkbox-group>
        <jet-input-error :message="form.errors.booking_packages" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="booking_price" value="booking Price" />
        <jet-input
          id="booking_price"
          type="text"
          class="mt-1 block w-full"
          v-model="form.booking_price"
        />
        <jet-input-error :message="form.errors.booking_price" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Updated.
      </jet-action-message>

      <jet-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Update
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import { ref } from "vue";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, SelectorIcon } from "@heroicons/vue/solid";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import ClassicEditor from "@ckeditor/ckeditor5-build-balloon";

export default {
  props: ["booking","packages"],
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetSectionBorder,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    CheckIcon,
    SelectorIcon,
  },
  data() {
    return {
      options: [{
          value: 'HTML',
          label: 'HTML'
        }, {
          value: 'CSS',
          label: 'CSS'
        }, {
          value: 'JavaScript',
          label: 'JavaScript'
        }],
      form: this.$inertia.form({
        _method: "PUT",
        full_name: this.booking.full_name,
        booking_price: this.booking.booking_price,
        booking_email: this.booking.email,
        booking_address: this.booking.address,
        booking_package: this.booking.package,
        booking_quantity: this.booking.quantity,
        booking_expected_date: this.booking.expected_date,
        booking_description: this.booking.short_memo,
        booking_status: this.selectedStatus,
        booking_packages: [],
      }),
      editor: ClassicEditor,
      editorData: "<p>Descriptions go here.</p>",
      editorConfig: {
        // The configuration of the editor.
      },

      // search: this.$inertia.form({})

      photoPreview: null,
    };
  },

  methods: {
    updatebooking(booking) {

      this.form.post(route("booking.update",{ booking }), {
        errorBag: "updatebooking",
        preserveScroll: true,
        onSuccess: () => {
          this.$message({
          showClose: true,
          message: 'booking! Updated successifully.',
          type: 'success'
        });
        },
      });
    },
    update(value){
      // alert(value.name);
    },
  },

  setup(props) {
    let selectedStatus;
    let selectedTours;
    const status = [
      { name: 'New', value: 'new' },
      { name: 'Pendding' , value: 'pendding'},
      { name: 'Completed' , value: 'completed'},
      { name: 'Canceled' , value: 'canceled'}
    ]

    for (let index = 0; index < status.length; index++) {
      if (status[index].value == props.booking.status) {
        
        selectedStatus = status[index];

      }
    }
    for (let index = 0; index < status.length; index++) {
      if (status[index].value == props.booking.status) {
        
        selectedStatus = status[index];

      }
    }

    return {
      status,
      selectedStatus,
    };
  },
};
</script>

<style>
</style>