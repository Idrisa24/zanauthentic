<template>
  <app-layout-home>
    <section>
      <div class="py-20 bg-gray-50 radius-for-skewed">
        <div class="container mx-auto px-4">
          <div class="mb-12">
            <h2 class="text-4xl lg:text-5xl font-bold font-heading">Contact</h2>
            <p class="text-gray-500 leading-loose">
              Got any question? Let’s talk about it.
            </p>
          </div>
          <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 mb-16 lg:mb-0">
              <div class="flex flex-wrap">
                <div class="mb-12 w-full md:w-1/2 lg:w-1/2">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Office</h3>
                  <p class="text-gray-400">Pete Zanzibar</p>
                  <p class="text-gray-400">Tanzania, TZ</p>
                </div>
                <div class="mb-12 w-full md:w-1/2">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Contacts</h3>
                  <p class="text-gray-400">info@zanauthentic.co.tz</p>
                  <p class="text-gray-400">Tel:+2556579192024</p>
                </div>
                <div class="w-full md:w-1/3 lg:w-full">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Socials</h3>
                  <div class="flex">
                    <a class="mr-3" href="#">
                      <img src="/assets/social/facebook-purple.svg" alt="" />
                    </a>
                    <a class="mr-3" href="#">
                      <img src="/assets/social/twitter-purple.svg" alt="" />
                    </a>
                    <a href="#">
                      <img src="/assets/social/instagram-purple.svg" alt="" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/2">
              <div class="max-w-md lg:mx-auto">
                <form @submit.prevent="submit">
                  <div class="mb-4 text-sm">
                    <span class="mr-4 font-semibold">Department:</span>
                    <label class="mr-4">
                      <input
                        class="mr-1"
                        type="radio"
                        value="support"
                        checked
                        v-model="form.department"
                      />
                      <span>Support</span>
                    </label>
                    <label>
                      <input
                        class="mr-1"
                        type="radio"
                        value="booking"
                        v-model="form.department"
                      />
                      <span>Booking</span>
                    </label>

                    <jet-input-error
                      :message="form.errors.department"
                      class="mt-2"
                    />
                  </div>
                  <div class="mb-4">
                    <jet-input
                      id="subject"
                      type="text"
                      class="
                        block
                        w-full
                        pl-3
                        py-4
                        text-xs text-greenGray-400
                        font-semibold
                        leading-none
                        bg-greenGray-100
                        outline-none
                        rounded
                      "
                      placeholder="Subject"
                      v-model="form.subject"
                      required
                      autofocus
                    />
                    <jet-input-error
                      :message="form.errors.subject"
                      class="mt-2"
                    />
                  </div>
                  <div class="mb-4">
                    <jet-input
                      id="name"
                      type="text"
                      class="
                        block
                        w-full
                        pl-3
                        py-4
                        text-xs text-greenGray-400
                        font-semibold
                        leading-none
                        bg-greenGray-100
                        outline-none
                        rounded
                      "
                      placeholder="Full name"
                      v-model="form.full_name"
                      required
                      autofocus
                    />
                    <jet-input-error
                      :message="form.errors.full_name"
                      class="mt-2"
                    />
                  </div>
                  <div class="mb-4">
                    <jet-input
                      id="email"
                      type="email"
                      class="
                        block
                        w-full
                        pl-3
                        py-4
                        text-xs text-greenGray-400
                        font-semibold
                        leading-none
                        bg-greenGray-100
                        outline-none
                        rounded
                      "
                      placeholder="Type your e-mail"
                      v-model="form.email"
                      required
                      autofocus
                    />
                    <jet-input-error
                      :message="form.errors.email"
                      class="mt-2"
                    />
                  </div>
                  <div class="mb-4">
                    <textarea
                      class="
                        w-full
                        h-24
                        p-4
                        text-xs
                        font-semibold
                        leading-none
                        resize-none
                        bg-white
                        outline-none
                        border-gray-300
                        rounded-md
                        shadow-sm
                        focus:border-green-300
                        focus:ring focus:ring-green-200 focus:ring-opacity-50
                      "
                      type="text"
                      v-model="form.message"
                      placeholder="Message..."
                    />
                    <jet-input-error
                      :message="form.errors.message"
                      class="mt-2"
                    />
                  </div>
                  <div class="flex justify-between items-center">
                    <jet-action-message
                      :on="form.recentlySuccessful"
                      class="mr-3"
                    >
                      Sent.
                    </jet-action-message>
                    <jet-button
                      class="ml-4"
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing"
                    >
                      Send now
                    </jet-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetInputError from "@/Jetstream/InputError";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  components: {
    AppLayoutHome,
    JetApplicationLogo,
    JetButton,
    JetInput,
    JetInputError,
    JetActionMessage,
  },
  data() {
    return {
      form: this.$inertia.form({
        full_name: "",
        email: "",
        subject: "",
        department: "support",
        message: "",
      }),
      newsletter: this.$inertia.form({
        email: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("contactus.send"), {
        errorBag: "userContactInformation",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
      });
    },
  },
  setup() {
    return {};
  },
};
</script>

<style>
</style>