<template>
  <app-layout-home>
    <section>
      <div class="skew skew-top mr-for-radius" wfd-id="288">
        <svg
          class="h-8 md:h-12 lg:h-20 w-full text-gray-50"
          viewBox="0 0 10 10"
          preserveAspectRatio="none"
        >
          <polygon fill="currentColor" points="0 0 10 10 0 10"></polygon>
        </svg>
      </div>
      <div class="skew skew-top ml-for-radius" wfd-id="287">
        <svg
          class="h-8 md:h-12 lg:h-20 w-full text-gray-50"
          viewBox="0 0 10 10"
          preserveAspectRatio="none"
        >
          <polygon fill="currentColor" points="0 10 10 0 10 10"></polygon>
        </svg>
      </div>
      <div class="py-20 bg-gray-50 radius-for-skewed" wfd-id="258">
        <div class="container mx-auto px-4" wfd-id="259">
          <div class="mb-12" wfd-id="286">
            <h2 class="text-4xl lg:text-5xl font-bold font-heading">Contact</h2>
            <p class="text-gray-500 leading-loose">
              Got any question? Let’s talk about it.
            </p>
          </div>
          <div class="flex flex-wrap" wfd-id="260">
            <div class="w-full lg:w-1/2 mb-16 lg:mb-0" wfd-id="280">
              <div class="flex flex-wrap" wfd-id="281">
                <div class="mb-12 w-full md:w-1/2 lg:w-1/2" wfd-id="285">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Office</h3>
                  <p class="text-gray-400">359 Hidden Valley</p>
                  <p class="text-gray-400">Road, NY</p>
                </div>
                <div class="mb-12 w-full md:w-1/2" wfd-id="284">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Contacts</h3>
                  <p class="text-gray-400">hallo@gamil.com</p>
                </div>
                <div class="w-full md:w-1/3 lg:w-full" wfd-id="282">
                  <h3 class="mb-2 text-3xl lg:text-4xl font-bold">Socials</h3>
                  <div class="flex" wfd-id="283">
                    <a class="mr-3" href="#">
                      <img
                        src="atis-assets/social/facebook-purple.svg"
                        alt=""
                      />
                    </a>
                    <a class="mr-3" href="#">
                      <img src="atis-assets/social/twitter-purple.svg" alt="" />
                    </a>
                    <a href="#">
                      <img
                        src="atis-assets/social/instagram-purple.svg"
                        alt=""
                      />
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-1/2" wfd-id="261">
              <div class="max-w-md lg:mx-auto" wfd-id="262">
                <form action="" wfd-id="263">
                  <div class="mb-4 text-sm">
                    <span class="mr-4 font-semibold">Department:</span>
                    <label class="mr-4">
                      <input
                        class="mr-1"
                        type="radio"
                        name="department"
                        value="1"
                        checked=""
                      />
                      <span>Support</span>
                    </label>
                    <label>
                      <input
                        class="mr-1"
                        type="radio"
                        name="department"
                        value="2"
                      />
                      <span>Booking</span>
                    </label>
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
                      v-model="form.name"
                      required
                      autofocus
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
                      placeholder="Message..."
                    ></textarea>
                  </div>
                  <div class="flex justify-between items-center">
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
      <div class="skew skew-bottom mr-for-radius" wfd-id="257">
        <svg
          class="h-8 md:h-12 lg:h-20 w-full text-gray-50"
          viewBox="0 0 10 10"
          preserveAspectRatio="none"
        >
          <polygon fill="currentColor" points="0 0 10 0 0 10"></polygon>
        </svg>
      </div>
      <div class="skew skew-bottom ml-for-radius" wfd-id="256">
        <svg
          class="h-8 md:h-12 lg:h-20 w-full text-gray-50"
          viewBox="0 0 10 10"
          preserveAspectRatio="none"
        >
          <polygon fill="currentColor" points="0 0 10 0 10 10"></polygon>
        </svg>
      </div>
    </section>
  </app-layout-home>
</template>

<script>
import AppLayoutHome from "@/Layouts/AppLayoutHome";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

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
    JetValidationErrors,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        message: "",
      }),
      newsletter: this.$inertia.form({
        email: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
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