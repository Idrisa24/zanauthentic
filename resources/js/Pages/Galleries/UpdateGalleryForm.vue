<template>
  <jet-form-section @submitted="updategallery(gallery.id)">
    <template #title> Gallery Information </template>

    <template #description>
      Fill in all necessary information about the gallery.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="gallery_title" value="Gallery Title" />
        <jet-input
          id="gallery_title"
          type="text"
          class="mt-1 block w-full"
          v-model="form.gallery_title"
        />
        <jet-input-error :message="form.errors.gallery_title" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <Listbox as="div" v-model="form.gallery_status">
          <ListboxLabel class="block text-sm font-medium text-gray-700">
            Gallery Status
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
              <span class="block truncate">{{ form.gallery_status.name }}</span>
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
        <jet-input-error :message="form.errors.gallery_status" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <label class="block text-sm font-medium text-gray-700">
          Gallery Image
        </label>
        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="!photoPreview">
          <img
            :src="'/storage/' + gallery.gallery_photo_path"
            :alt="gallery.gallery_title"
            class="rounded-full h-20 w-20 object-cover"
          />
        </div>
       
        <div class="mt-2" v-show="photoPreview != null">
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
          v-show="photoPreview != null || gallery.gallery_photo_path != null"
        >
          Select A New Photo
        </jet-secondary-button>

        <jet-secondary-button
          type="button"
          class="mt-2"
          @click.prevent="deletePhoto(gallery.id)"
          v-if="gallery.gallery_photo_path != null"
        >
          Remove Photo
        </jet-secondary-button>
        </div>
        <div
          v-show="photoPreview != null && !gallery.gallery_photo_path"
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

export default {
  props:['gallery'],
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
        _method:"PUT",
        gallery_title: this.gallery.gallery_title,
        gallery_status: this.selectedStatus,
        photo: null,
      }),

      photoPreview: null,
    };
  },

  methods: {
    updategallery(gallery) {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      

      this.form.post(route("galleries.update",{gallery}), {
        errorBag: "updategallery",
        preserveScroll: true,
        onSuccess: () => {
          this.clearPhotoFileInput();
          this.photoPreview = null;
          this.$message({
          showClose: true,
          message: 'Gallery! Updated successifully.',
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
    let selectedStatus;

    const status = [
      { name: 'Unpublished', value: 'unpublished' },
      { name: 'Published' , value: 'published'},
    ]

    for (let index = 0; index < status.length; index++) {
      if (status[index].value == props.gallery.gallery_status) {
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

<style>
</style>