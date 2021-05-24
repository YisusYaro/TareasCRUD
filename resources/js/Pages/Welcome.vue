<template>
  <section>
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <inertia-link
        v-if="$page.props.user"
        href="/dashboard"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </inertia-link>

      <template v-else>
        <!-- <inertia-link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </inertia-link> -->

        <inertia-link
          v-if="canRegister"
          :href="route('login')"
          :active="route().current('dashboard')"
          class="bg-white hover:bg-yellow-200 text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent"
        >
          Iniciar sesión</inertia-link
        >

        <inertia-link
          v-if="canRegister"
          :href="route('register')"
          :active="route().current('dashboard')"
          class="bg-white hover:bg-yellow-200 text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent"
        >
          Registrarse</inertia-link
        >

        <!-- <inertia-link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </inertia-link> -->
      </template>
    </div>
    <div class="bg-white text-black py-20">
      <div
        class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24"
      >
        <div
          class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8"
        >
          <h1 class="text-3xl md:text-5xl p-2 text-yellow-500 tracking-loose">
            MI TAREA PRIORITARIA
          </h1>
          <h2 class="text-3xl md:text-5xl leading-relaxed md:leading-snug mb-2">
            ¿Procrastinas?
          </h2>
          <p class="text-sm md:text-base mb-4 text-black">
            Carga tus tareas, elige la más importante y trabaja en ella.
          </p>
          <inertia-link
            :href="route('dashboard')"
            :active="route().current('dashboard')"
            class="bg-yellow-500 hover:bg-yellow-600 text-black rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent"
          >
            Entra ahora</inertia-link
          >
        </div>
        <div
          class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3 justify-center"
        >
          <div class="h-48 flex flex-wrap content-center">
            <div>
              <img
                class="inline-block mt-28 hidden xl:block"
                src="https://user-images.githubusercontent.com/54521023/116969935-c13d5b00-acd4-11eb-82b1-5ad2ff10fb76.png"
              />
            </div>
            <div>
              <img
                class="inline-block mt-24 md:mt-0 p-8 md:p-0"
                src="https://user-images.githubusercontent.com/54521023/116969931-bedb0100-acd4-11eb-99a9-ff5e0ee9f31f.png"
              />
            </div>
            <div>
              <img
                class="inline-block mt-28 hidden lg:block"
                src="https://user-images.githubusercontent.com/54521023/116969939-c1d5f180-acd4-11eb-8ad4-9ab9143bdb50.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>



<script>
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
};
</script>
