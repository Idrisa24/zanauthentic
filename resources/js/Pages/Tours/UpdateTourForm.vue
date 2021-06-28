<template>
  <jet-form-section @submitted="updatetourinformation">
    <template #title> Tour Information </template>

    <template #description>
      Fill in all necessary information about the Tour.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="tour_name" value="Tour Name" />
        <jet-input
          id="tour_name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.tour_name"
        />
        <jet-input-error :message="form.errors.tour_name" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <ckeditor
          :editor="editor"
          v-model="form.tour_discription"
          :config="editorConfig"
        />
        <jet-input-error :message="form.errors.tour_discription" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="tour_price" value="Tour Price" />
        <jet-input
          id="tour_price"
          type="text"
          class="mt-1 block w-full"
          v-model="form.tour_price"
        />
        <jet-input-error :message="form.errors.tour_price" class="mt-2" />
      </div>
      <div class="col-span-6 sm:col-span-4">
        <label class="block text-sm font-medium text-gray-700">
          Cover photo
        </label>
        <!-- Current Profile Photo -->
        <div class="mt-2" v-show="!photoPreview">
          <img
            :src="'/storage/' + tour.tour_photo_path"
            :alt="tour.tour_name"
            class="rounded-full h-20 w-20 object-cover"
          />
        </div>
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
          <jet-secondary-button
            type="button"
            class="mt-2"
            @click.prevent="deletePhoto"
            v-if="'/storage/' + tour.profile_photo_path"
          >
            Remove Photo
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
        <jet-input-error :message="form.errors.tour_photo" class="mt-2" />
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
  props: ["tour"],
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetSectionBorder,
  },
  data() {
    return {
      form: this.$inertia.form({
        _method: "PUT",
        tour_name: this.tour.tour_name,
        tour_price: this.tour.tour_price,
        tour_discription: this.tour.tour_discription,
        tour_photo: null,
      }),
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },

      photoPreview: null,
    };
  },
  methods: {
    updatetourinformation() {
      if (this.$refs.photo) {
        this.form.tour_photo = this.$refs.photo.files[0];
      }

      this.form.post(route("tours.update"), {
        errorBag: "updatetourinformation",
        preserveScroll: true,
        onSuccess: () => {
          this.clearPhotoFileInput();
          this.form.reset();
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
};
</script>

<style>
</style>