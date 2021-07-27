<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="border-t border-gray-200">
      <dl>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Full name</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ detail.full_name }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Application for</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ detail.package }}
          </dd>
        </div>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Email address</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ detail.email }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Payment expectation</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            ${{ detail.booking_price }}
          </dd>
        </div>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Status</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <Listbox v-model="selectedStatus"
            >
              <div class="relative mt-1">
                <ListboxButton
                  class="relative w-full py-2 pl-3 pr-10 text-left bg-white rounded-lg shadow-md cursor-default focus:outline-none focus-visible:ring-2 focus-visible:ring-opacity-75 focus-visible:ring-white focus-visible:ring-offset-orange-300 focus-visible:ring-offset-2 focus-visible:border-indigo-500 sm:text-sm"
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
                  @change.prevent="changeStatus"
                    class="absolute w-full py-1 mt-1 overflow-auto text-base bg-white rounded-md shadow-lg max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                  >
                    <ListboxOption
                      v-slot="{ active, selected }"
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
                            selected ? 'font-medium' : 'font-normal',
                            'block truncate',
                          ]"
                          >{{ statu.name }}</span
                        >
                        <span
                          v-if="selected"
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
          </dd>
        </div>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Short memo</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ detail.short_memo }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Attachment</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <ul
              class="border border-gray-200 rounded-md divide-y divide-gray-200"
            >
              <li
                class="pl-3 pr-4 py-3 flex items-center justify-between text-sm"
              >
                <div class="w-0 flex-1 flex items-center">
                  <PaperClipIcon
                    class="flex-shrink-0 h-5 w-5 text-gray-400"
                    aria-hidden="true"
                  />
                  <span class="ml-2 flex-1 w-0 truncate">
                    resume_back_end_developer.pdf
                  </span>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <a
                    href="#"
                    class="font-medium text-indigo-600 hover:text-indigo-500"
                  >
                    Download
                  </a>
                </div>
              </li>
            </ul>
          </dd>
        </div>
        
      </dl>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import JetButton from "@/Jetstream/Button";
import JetActionMessage from "@/Jetstream/ActionMessage";

import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from '@headlessui/vue'
import { CheckIcon, SelectorIcon,  PaperClipIcon} from '@heroicons/vue/solid'

export default {
  props: ["detail"],
  data() {
    return {
      form: this.$inertia.form({
        booking_status:""
      })
    }
  },
  components: {
    Listbox,
    ListboxLabel,
    ListboxButton,
    ListboxOptions,
    ListboxOption,
    CheckIcon,
    SelectorIcon,
    PaperClipIcon,
    JetButton,
    JetActionMessage,
  },
  methods:{
    changeStatus:() =>{
      alert('changed');
    }
  },
  setup(props) {
    let selectedStatus;

    const status = [
      { name: 'New', value: 'new' },
      { name: 'Pendding' , value: 'pendding'},
      { name: 'Completed' , value: 'completed'},
      { name: 'Canceled' , value: 'canceled'}
    ]

    for (let index = 0; index < status.length; index++) {
      if (status[index].value == props.detail.status) {
        selectedStatus = status[index];
      }
    }

    return {
      status,
      selectedStatus,
    }
  },
};
</script>