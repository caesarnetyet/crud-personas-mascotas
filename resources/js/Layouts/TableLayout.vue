<script setup lang="ts">
import {computed, reactive, defineProps} from 'vue'
import { Link } from '@inertiajs/inertia-vue3'


type actions = {'edit_url': string, 'delete_url': string};
interface Model  {
    id: number;
    properties: object[];
    actions: actions;
}

const {models} = defineProps<{ models: Model[] }>();

console.log("me renderice tambien")

const headers = computed(() => {
    if (models.length > 0) {
        const properties = Object.keys(models[0].properties);
        return ['id', ...properties, 'acciones'];
    }
    return [];
})


</script>

<template>

    <div class="drop-shadow-md relative h-full bg-scroll shadow-md sm:rounded-lg">
        <table class="text-center w-full text-sm text-left text-gray-500 dark:text-white" >
            <thead class="text-md text-gray-800 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
            <tr>
                <th class="px-6 py-3" v-for="header in headers">
                    {{header}}
                </th>
            </tr>
            </thead>
            <tbody >
            <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-600 hover:bg-gray-700 dark:hover:bg-gray-700" v-for="model in models">
                <td class="px-6 py-4">{{ model.id }}</td>
                <td class="px-6 py-4" v-for="property in model.properties">
                    {{property}}
                </td>
                <td class="text-xl">
                    <Link :href="model.actions.edit_url" class="font-bold text-green-500  px-3 py-2 hover:underline hover:text-green-600">Editar</Link>
                    <Link :href="model.actions.delete_url" class="font-bold text-red-500 px-3 py-2 hover:underline hover:text-red-600">Eliminar</Link>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</template>
