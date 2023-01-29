<template>
  <aside class="flex-col flex align-center p-5 text-3xl text-white text-xl place-center w-[16%] bg-slate-700 gap-5">


    <Link class="border-b-2 border-white text-end hover:underline" :href="route('vue')">Clientes</Link>


    <Link class="border-b-2 border-white text-end hover:underline" :href="route('vue.mascotas')">Mascotas</Link>

  </aside>
</template>


<script lang="ts">
import {Link} from "@inertiajs/inertia-vue3";

export default {
  name: 'AsideComponent',
    components: {
        Link
    }
}
</script>
