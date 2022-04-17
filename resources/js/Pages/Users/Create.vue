<template>
  <Head title="Crear usuario" />
  <h1 class="text-3xl">Crear nuevo usuario</h1>

  <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
        >Nombre
      </label>

      <input
        v-model="form.name"
        type="text"
        class="border border-gray-400 p-2 w-full"
        name="name"
        id="name"
        required
      />
      <div
        v-if="form.errors.name"
        v-text="form.errors.name"
        class="text-red-500 text-xs mt-1"
      ></div>
    </div>

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="email"
        >Email
      </label>

      <input
        v-model="form.email"
        type="email"
        class="border border-gray-400 p-2 w-full"
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
        class="border border-gray-400 p-2 w-full"
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
        Enviar
      </button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  //   processing.value = true;
  form.post("/usuarios");
};
</script>

<style>
</style>
