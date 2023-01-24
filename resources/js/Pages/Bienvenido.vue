<script setup lang="ts">

import {defineProps} from 'vue'

import {Link} from '@inertiajs/inertia-vue3'
import TableLayout from "@/Layouts/TableLayout.vue";

type actions = {'edit_url': string, 'delete_url': string, 'show_pets'?: string};
interface Model  {
    id: number;
    properties: object[];
    actions: actions;
}


interface Props {
    clientes: Model[];
}
const { clientes } = defineProps<Props>()

</script>
<template>
    <div class="md:grid grid-cols-8 grid-rows-6">
        <Link class=" text-xl" href="/">Hello World</Link>
        <header class="col-start-4 text-center col-span-2 p-3">
            <h1 class="text-4xl font-bold">Welcome!</h1>
        </header>
    <TableLayout class="col-start-1" :models="clientes"/>
    <div class="bg-slate-600 col-start-6 col-span-2 row-span-4"> </div>

    </div>
</template>
