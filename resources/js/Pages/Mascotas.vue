<template>
    <div>
        <h1>Mascotas</h1>
        <div class="py-5 px-5">
            <Link class="mb-5 p-3 block w-[20ch] text-white text-xl text-center bg-green-600" :href="route('vue.mascotas.create')">Agregar Mascota</Link>

            <TableLayout :models="mascotas" :url_route="current_url"/>
        </div>
    </div>
</template>
<script setup>

import {defineProps} from 'vue'
import {Link} from '@inertiajs/inertia-vue3'
import TableLayout from "@/Layouts/TableLayout.vue";

const {mascotas, current_url} = defineProps({mascotas: Array, current_url: String})

</script>


<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>
