<template>
  <nav>
    <ul class="flex space-x-10">
      <li>
        <NavLink href="/" :active="$page.component === 'Inicio'">
          Inicio
        </NavLink>
      </li>
      <li>
        <NavLink href="/usuarios" :active="$page.component === 'Users'">
          Usuarios
        </NavLink>
      </li>
      <li>
        <NavLink
          href="/configuracion"
          :active="$page.component === 'Configuracion'"
        >
          Configuración
        </NavLink>
      </li>
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink.vue";
export default {
  components: { NavLink },
};
</script>

<style>
</style>
