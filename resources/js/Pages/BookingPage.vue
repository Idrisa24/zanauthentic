<template>
  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="name" value="Full Name" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.full_name"
          required
          autofocus
          autocomplete="name"
        />
      </div>

      <div class="mt-4">
        <jet-label for="email" value="Email Address" />
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
        />
      </div>

      <div class="mt-4">
        <Listbox as="div" v-model="form.package">
          <ListboxLabel class="block text-sm font-medium text-gray-700">
            Preferrable Package
          </ListboxLabel>
          <div class="mt-1 relative">
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
              <span class="flex items-center">
                <img
                  :src="'/storage/' + form.package.tour_photo_path"
                  alt=""
                  class="flex-shrink-0 h-6 w-6 rounded-full"
                />
                <span class="ml-3 block truncate">{{
                  form.package.tour_name
                }}</span>
              </span>
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
              leave-active-class="transition ease-in duration-100"
              leave-from-class="opacity-100"
              leave-to-class="opacity-0"
            >
              <ListboxOptions
                class="
                  absolute
                  z-10
                  mt-1
                  w-full
                  bg-white
                  shadow-lg
                  max-h-56
                  rounded-md
                  py-1
                  text-base
                  ring-1 ring-black ring-opacity-5
                  overflow-auto
                  focus:outline-none
                  sm:text-sm
                "

                @change.prevent="changeValue(selected)"
              >
                <ListboxOption
                  as="template"
                  v-for="tour in tours"
                  :key="tour.id"
                  :value="tour"
                  v-slot="{ active, selected }"
                >
                  <li
                    :class="[
                      active ? 'text-white bg-green-600' : 'text-gray-900',
                      'cursor-default select-none relative py-2 pl-3 pr-9',
                    ]"
                  >
                    <div class="flex items-center">
                      <img
                        :src="'/storage/' + tour.tour_photo_path"
                        alt=""
                        class="flex-shrink-0 h-6 w-6 rounded-full"
                      />
                      <span
                        :class="[
                          selected ? 'font-semibold' : 'font-normal',
                          'ml-3 block truncate',
                        ]"
                      >
                        {{ tour.tour_name }}
                      </span>
                    </div>

                    <span
                      v-if="selected"
                      :class="[
                        active ? 'text-white' : 'text-green-600',
                        'absolute inset-y-0 right-0 flex items-center pr-4',
                      ]"
                    >
                      <CheckIcon class="h-5 w-5" aria-hidden="true" />
                    </span>
                  </li>
                </ListboxOption>
              </ListboxOptions>
            </transition>
          </div>
        </Listbox>
      </div>
      <div class="mt-4">
        <jet-label for="quantity" value="Number of People" />
        <jet-input
          id="quantity"
          type="number"
          min="1"
          class="mt-1 block w-full"
          v-model="form.quantity"
          required
          autocomplete="new-password"
        />
      </div>
      <div class="mt-4">
        <jet-label for="expected_date" value="Arrival Date" />
        <jet-input
          id="expected_date"
          type="date"
          class="mt-1 block w-full"
          v-model="form.expected_date"
          required
        />
      </div>

      <div class="mt-4">
        <jet-label for="short" value="Short Memo" />
        <textarea
          id="short"
          rows="4"
          class="
            shadow-sm
            focus:ring focus:ring-green-200 focus:ring-opacity-50
            focus:border-green-500
            mt-1
            block
            px-2
            py-2
            w-full
            sm:text-sm
            border border-gray-300
            rounded-md
          "
          v-model="form.short_memo"
        />
      </div>

      <div
        class="mt-4"
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
      >
        <jet-label for="terms">
          <div class="flex items-center">
            <jet-checkbox
              name="terms"
              id="terms"
              v-model:checked="form.terms"
            />

            <div class="ml-2">
              I agree to the
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Terms of Service</a
              >
              and
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Privacy Policy</a
              >
            </div>
          </div>
        </jet-label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
          Sent.
        </jet-action-message>
        <jet-button
          class="group relative w-full flex justify-center"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Book now
        </jet-button>
      </div>
    </form>
  </jet-authentication-card>
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
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetTextArea from "@/Jetstream/TextArea";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
  props: {
    tours: Object,
  },
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetTextArea,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    CheckIcon,
    SelectorIcon,
    JetActionMessage,
  },

  data() {
    return {
      form: this.$inertia.form({
        full_name: "",
        email: "",
        quantity: 1,
        package: "",
        expected_date: "",
        booking_price: this.selected.tour_price,
        short_memo: "",
        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("booking.home"), {
        errorBag: "userBookingInformation",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
      });
    },
    changeValue(value){
      alert(value.tour_name)
    }
  },
  setup(props) {
    const selected = ref(props.tours[0]);
    const tours = props.tours;
    return {
      selected,
      tours,
    };
  },
};
</script>
