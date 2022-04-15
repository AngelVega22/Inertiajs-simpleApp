<template>
  <Head title="Usuarios" />

  <div class="flex justify-between mb-10">
    <h1 class="text-3xl">Usuarios</h1>
    <input
      v-model="search"
      type="text"
      placeholder="search..."
      class="border px-2 rounded-lg"
    />
  </div>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table
      class="
        w-full
        text-sm text-left text-gray-500
        dark:text-gray-400
        table-fixed
      "
    >
      <thead
        class="
          text-xs text-gray-700
          uppercase
          bg-gray-50
          dark:bg-gray-700 dark:text-gray-400
        "
      >
        <tr>
          <th class="px-6 py-3">Nombre</th>
          <th class="px-6 py-3">Correo</th>
          <th class="px-6 py-3">Acción</th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
          v-for="user in users.data"
          :key="user.id"
        >
          <td class="px-6 py-4">
            {{ user.name }}
          </td>
          <td class="px-6 py-4">
            {{ user.email }}
          </td>
          <td class="px-6 py-4">
            <Link
              :href="`/users/${user.id}/edit`"
              class="text-indigo-600 hover:text-indigo-900"
              >Edit
            </Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!--Paginator-->
  <Pagination :links="users.links" class="mt-6" />
</template>

<script setup>
import Pagination from "../Shared/Pagination.vue";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";

let props = defineProps({
  users: Object,
  filters: Object,
});

let search = ref(props.filters.search);

watch(search, (value) => {
  Inertia.get(
    "/usuarios",
    { search: value },
    {
      preserveState: true,
      replace: true,
    }
  );
});
</script>

<style>
</style>
