<template>
  <Head>
    <title>My App</title>
    <meta
      type="descripcion"
      content="info about my app"
      head-key="description"
    />
  </Head>

  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p v-if="username" class="text-sm ml-4">
          Welcome Back, {{ username }}!
        </p>
      </div>
      <Nav />
    </header>
  </section>
  <section class="p-6">
    <div class="max-w-7xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "../Shared/Nav.vue";
import { Head, head } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Nav,
    Head,
  },
  computed: {
    username() {
      return this.$page.props.auth ? this.$page.props.auth.user.username : null;
    },
  },
};
</script>

<style>
</style>
