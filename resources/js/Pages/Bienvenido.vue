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


console.log("Me renderice")
</script>
<template>
    <div class="flex h-screen">
        <aside class="bg-gray-800 flex flex-col text-center pt-10 text-3xl md:w-1/4 w-1/2 lg:w-[15%] text-white">

           <Link class=" p-3  hover:border-b-2  border-white" :href="route('vue')">Clientes</Link>
              <Link class="p-3 hover:border-b-2 border-white" :href="route('vue.mascotas')">Mascotas</Link>
        </aside>
        <div class="p-3 bg-gray-200 shadow-lg flex-1">
            <div class="h-[50vh]">
                <TableLayout :models="clientes"/>
            </div>
            <div>
                Hello
            </div>
        </div>
    </div>
</template>
