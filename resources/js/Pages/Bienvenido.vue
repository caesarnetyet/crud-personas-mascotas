<template>
<div>
    <div class="py-5">

        <Link class="mb-5 p-3 block w-[20ch] text-white text-xl text-center bg-green-600" :href="route('vue.persona.create')">Agregar Cliente</Link>
        <TableLayout :models="clientes" :url_route="current_url"/>
    </div>
</div>
</template>

<script setup lang="ts">
import {defineProps} from "vue";
import { Link } from '@inertiajs/inertia-vue3'
import TableLayout from "@/Layouts/TableLayout.vue";
const {clientes, current_url} = defineProps({clientes: Array, current_url: String})

</script>


<script lang="ts">
import HomeLayout from "@/Layouts/HomeLayout.vue";
// noinspection JSUnusedGlobalSymbols

export default {
    "layout": HomeLayout
}
</script>
