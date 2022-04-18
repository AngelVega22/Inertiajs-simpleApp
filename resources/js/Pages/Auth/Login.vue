<template>
  <Head title="Login" />

  <main class="grid place-items-center min-h-screen">
    <section class="bg-white p-8 rounded-md max-w-md mx-auto mt-8 border">
      <h1 class="text-3xl mb-5">Login</h1>
      <form @submit.prevent="submit">
        <div class="mb-6">
          <label
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="email"
            >Email
          </label>

          <input
            v-model="form.email"
            type="email"
            class="border rounded p-2 w-full"
            name="email"
            id="email"
            required
          />
          <div
            v-if="form.errors.email"
            v-text="form.errors.email"
            class="text-red-500 text-xs mt-1"
          ></div>
        </div>

        <div class="mb-6">
          <label
            class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="password"
            >password
          </label>

          <input
            v-model="form.password"
            type="password"
            class="border rounded p-2 w-full"
            name="password"
            id="password"
          />
          <div
            v-if="form.errors.password"
            v-text="form.errors.password"
            class="text-red-500 text-xs mt-1"
          ></div>
        </div>

        <div class="mb-6">
          <button
            type="submit"
            class="bg-blue-400 text-white rounder py-2 px-4 hover:bg-blue-500"
            :disabled="form.processing"
          >
            Login
          </button>
        </div>
      </form>
    </section>
  </main>
</template>

<script>
export default {
  layout: null,
};
</script>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  email: "",
  password: "",
});

let submit = () => {
  form.post("/login");
};
</script>

<style>
</style>
