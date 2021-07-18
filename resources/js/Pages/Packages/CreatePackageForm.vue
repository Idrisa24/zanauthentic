<template>
  <jet-form-section @submitted="createnewpackage">
    <template #title> Package Information </template>

    <template #description>
      Fill in all necessary information about the package.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="package_name" value="Package Name" />
        <jet-input
          id="package_name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.package_name"
        />
        <jet-input-error :message="form.errors.package_name" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <Listbox as="div" v-model="form.tour_id">
          <ListboxLabel class="block text-sm font-medium text-gray-700">
            Tour
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
                  :src="'/storage/' + form.tour_id.tour_photo_path"
                  alt=""
                  class="flex-shrink-0 h-6 w-6 rounded-full"
                />
                <span class="ml-3 block truncate">{{
                  form.tour_id.tour_name
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
      <div class="col-span-6 sm:col-span-4">
        <ckeditor
          :editor="editor"
          v-model="form.package_discription"
          :config="editorConfig"
          ref="package_discription"
        ></ckeditor>
        <jet-input-error :message="form.errors.tour_discription" class="mt-2" />

      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="package_price" value="Package Price" />
        <jet-input
          id="package_price"
          type="text"
          class="mt-1 block w-full"
          v-model="form.package_price"
        />
        <jet-input-error :message="form.errors.package_price" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <label class="block text-sm font-medium text-gray-700">
          Cover photo
        </label>
        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="photoPreview">
          <span
            class="block w-20 h-20"
            :style="
              'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
              photoPreview +
              '\');'
            "
          >
          </span>
          <jet-secondary-button
            class="mt-2 mr-2"
            type="button"
            @click.prevent="selectNewPhoto"
          >
            Select A New Photo
          </jet-secondary-button>
        </div>
        <div
          v-show="!photoPreview"
          class="
            mt-1
            flex
            justify-center
            px-6
            pt-5
            pb-6
            border-2 border-gray-300 border-dashed
            rounded-md
          "
        >
          <div class="space-y-1 text-center">
            <svg
              class="mx-auto h-12 w-12 text-gray-400"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 48 48"
              aria-hidden="true"
            >
              <path
                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <div class="flex text-sm text-gray-600">
              <jet-label
                class="
                  relative
                  cursor-pointer
                  bg-white
                  rounded-md
                  font-medium
                  text-indigo-600
                  hover:text-indigo-500
                  focus-within:outline-none
                  focus-within:ring-2
                  focus-within:ring-offset-2
                  focus-within:ring-indigo-500
                "
                for="photo"
                value="Upload a file"
              />
              <input
                ref="photo"
                id="photo"
                @change="updatePhotoPreview"
                type="file"
                class="hidden"
              />
              <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
          </div>
        </div>
        <jet-input-error :message="form.errors.photo" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </jet-action-message>

      <jet-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
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
  props: ["tours"],
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
      form: this.$inertia.form({
        _method: "PUT",
        package_name: "",
        package_price: "",
        tour_id: this.selected,
        package_discription: "<p>Descriptions go here.</p>",
        photo: null,
      }),
      editor: ClassicEditor,
      editorData: "<p>Descriptions go here.</p>",
      editorConfig: {
        // The configuration of the editor.
      },

      photoPreview: null,
    };
  },

  methods: {
    createnewpackage() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      

      this.form.post(route("packages.store"), {
        errorBag: "createnewpackage",
        preserveScroll: true,
        onSuccess: () => {
          this.clearPhotoFileInput();
          this.photoPreview = null;
          this.form.reset();
          this.$message({
          showClose: true,
          message: 'Package! Created successifully.',
          type: 'success'
        });
        },
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const photo = this.$refs.photo.files[0];

      if (!photo) return;

      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(photo);
    },

    deletePhoto() {
      this.$inertia.delete(route("current-user-photo.destroy"), {
        preserveScroll: true,
        onSuccess: () => {
          this.photoPreview = null;
          this.clearPhotoFileInput();
        },
      });
    },

    clearPhotoFileInput() {
      if (this.$refs.photo?.value) {
        this.$refs.photo.value = null;
      }
    },
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

<style>
</style>