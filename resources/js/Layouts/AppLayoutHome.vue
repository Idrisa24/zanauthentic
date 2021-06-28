<template>
  <div>
    <nav>
      <div class="text-right py-2 px-4">
        <inertia-link
          v-if="$page.props.user"
          :href="route('dashboard')"
          class="
            lg:inline-block
            mr-6
            lg:mt-0
            text-sm text-green-900
            hover:text-green-600
          "
        >
          Dashboard
        </inertia-link>

        <template v-else>
          <inertia-link
            :href="route('login')"
            class="
              lg:inline-block
              mr-6
              lg:mt-0
              text-sm text-green-900
              hover:text-green-600
            "
          >
            Log in
          </inertia-link>
        </template>
      </div>
      <div
        class="flex flex-wrap items-center justify-between p-4 border-t"
        wfd-id="136"
      >
        <div class="flex flex-shrink-0 mr-6">
          <a class="text-xl text-green-600 font-semibold font-heading" href="#">
            <img
              class="block h-20 max-w-md"
              src="/assets/logo/ZAN-AUTHENTIC-01.png"
            />
          </a>
        </div>
        <div class="block lg:hidden">
          <button
            class="
              navbar-burger
              flex
              items-center
              py-2
              px-3
              text-green-500
              rounded
              border border-green-500
            "
          >
            <svg
              class="fill-current h-3 w-3"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
          </button>
        </div>
        <div
          class="
            navbar-menu
            hidden
            lg:flex lg:flex-grow
            lg:items-center
            w-full
            lg:w-auto
          "
          wfd-id="137"
        >
          <div class="lg:ml-auto">
            <a
              class="
                block
                lg:inline-block
                mt-4
                lg:mt-0
                mr-12
                text-green-900
                hover:text-green-600
              "
              :href="route('nyumbani')"
            >
              <span wfd-id="145">Home</span>
              <span class="block text-sm text-gray-400"></span>
            </a>
            <a
              class="
                block
                lg:inline-block
                mt-4
                lg:mt-0
                mr-12
                text-green-900
                hover:text-green-600
              "
              :href="route('aboutus')"
            >
              <span wfd-id="141">About us</span>
              <span class="block text-sm text-gray-400"></span>
            </a>
            <a
              class="
                block
                lg:inline-block
                mt-4
                lg:mt-0
                mr-12
                text-green-900
                hover:text-green-600
              "
              :href="route('ourtours')"
            >
              <span wfd-id="141">Tours</span>
              <span class="block text-sm text-gray-400"></span>
            </a>
            <a
              class="
                block
                lg:inline-block
                mt-4
                lg:mt-0
                mr-12
                text-green-900
                hover:text-green-600
              "
              :href="route('ourgallery')"
            >
              <span wfd-id="141">Gallary</span>
              <span class="block text-sm text-gray-400"></span>
            </a>
            <a
              class="
                block
                lg:inline-block
                mt-4
                lg:mt-0
                mr-12
                text-green-900
                hover:text-green-600
              "
              :href="route('contactus')"
            >
              <span wfd-id="143">Contact us</span>
              <span class="block text-sm text-gray-400"></span>
            </a>
          </div>
          <div wfd-id="138">
            <a
              target="_blank"
              class="
                inline-block
                py-3
                px-6
                mt-4
                lg:mt-0
                leading-none
                text-white
                bg-green-600
                hover:bg-green-700
                font-semibold
                rounded
                shadow
              "
              :href="route('booking.now')"
              >Book now</a
            >
          </div>
        </div>
      </div>
    </nav>
    <div class="min-h-screen bg-gray-100">
      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header"></slot>
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
    </div>
    <section class="py-20">
      <div class="container px-4 mx-auto">
        <div
          class="flex flex-wrap mb-12 lg:mb-20 -mx-3 text-center lg:text-left"
        >
          <div class="w-full lg:w-1/5 px-3 mb-6 lg:mb-0">
            <inertia-link :href="route('nyumbani')">
              <jet-authentication-card-logo class="h-2" />
            </inertia-link>
          </div>
          <div
            class="
              w-full
              lg:w-2/5
              px-3
              mb-8
              lg:mb-0
              prose prose-sm
              sm:prose
              lg:prose-lg
              xl:prose-xl
            "
          >
            <p
              class="
                line-clamp-5
                max-w-md
                mx-auto
                lg:max-w-full
                lg:mx-0
                lg:pr-32
                lg:text-lg
                text-greenGray-400
                leading-relaxed
              "
            >
              Zan authentic, Pete eco & cultural tourism is a part of community
              based tourism program in Pete village about 33 km south – east of
              Zanzibar Township in Zanzibar’s central region, it lies
              approximately 60 12‟ -60 17‟S and 390 24‟ -390 26‟E, at south it
              boundary Uzi island, at east it boundary Muungoni and Kitogani, at
              weast Unguja ukuu and north boundary Jozani National Park it about
              1kilometer.We are aiming environmental economy and social
              sustainability together with provide memorable visitor experience.
            </p>
          </div>
          <div class="w-full lg:w-1/5 px-3 mb-8 lg:mb-0">
            <p
              class="
                mb-2
                lg:mb-4
                lg:text-lg
                font-bold font-heading
                text-greenGray-800
              "
            >
              Office
            </p>
            <p class="lg:text-lg text-greenGray-400">Pete Zanzibar, TZ</p>
          </div>
          <div class="w-full lg:w-1/5 px-3">
            <p
              class="
                mb-2
                lg:mb-4
                lg:text-lg
                font-bold font-heading
                text-greenGray-800
              "
            >
              Contacts
            </p>
            <p class="lg:text-lg text-greenGray-400">info@zanauthentic.co.tz</p>
          </div>
        </div>
        <div
          class="flex flex-col lg:flex-row items-center lg:justify-between"
          wfd-id="6"
        >
          <p class="text-md text-green-400">
            &copy; 2021. All rights reserved made with
            <span class="text-red-600"> &hearts; </span>
            By
            <a href="https://msungi.com" class="text-blue-400" target="_blank">
              Msungi Tech</a
            >.
          </p>
          <div class="order-first lg:order-last -mx-2 mb-4 lg:mb-0" wfd-id="7">
            <!-- <a class="inline-block px-2" href="#"
              ><img src="/assets/icons/facebook-green.svg" alt="" /></a
            ><a class="inline-block px-2" href="#"
              ><img src="/assets/icons/twitter-green.svg" alt="" /></a
            ><a class="inline-block px-2" href="#"
              ><img src="/assets/icons/instagram-green.svg" alt=""
            /></a> -->
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },

  components: {
    JetAuthenticationCardLogo,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
