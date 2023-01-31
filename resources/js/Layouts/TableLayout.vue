
<template>
    <div class="flex gap-5 align-center mb-5">
        <input v-model="search" type="text" placeholder="Filtrar. . ."/>
    </div>
    <div class="drop-shadow-md relative h-full bg-scroll shadow-md sm:rounded-lg">
        <table class="text-center w-full text-sm text-left text-gray-500 dark:text-white" >
            <thead class="text-md text-gray-800 uppercase bg-gray-50 dark:bg-gray-800 dark:text-white">
            <tr>
                <th class="px-6 py-3" :key="header" v-for="header in headers">
                    {{header}}
                </th>
            </tr>
            </thead>
            <tbody >
            <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-600 hover:bg-gray-700 dark:hover:bg-gray-700" :key="model.id" v-for="model in models">
                <td class="px-6 py-4">{{ model.id }}</td>
                <td class="px-6 py-4" :key="property" v-for="property in model.properties">
                    {{property}}
                </td>
                <td class="text-xl">
                    <Link :href="model.actions.edit_url" class="font-bold text-green-500  px-3 py-2 hover:underline hover:text-green-600">Editar</Link>
                    <button class="text-red-500 font-bold" @click="safeDelete(model.actions.delete_url)">Eliminar</button>

                </td>
            </tr>
            </tbody>
        </table>

    </div>
</template>
<script setup lang="ts">
import {computed, watch, defineProps, ref} from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import MyModal from "@/Components/MyModal.vue";

type actions = {'edit_url': string, 'delete_url': string};
interface Model  {
    id: number;
    properties: object[];
    actions: actions;
}

const {models, url_route} = defineProps<{ models: Model[], url_route}>();

console.log("me renderice tambien")

const headers = computed(() => {
    if (models.length > 0) {
        const properties = Object.keys(models[0].properties);
        return ['id', ...properties, 'acciones'];
    }
    return [];
})

let search = ref('')

let showModal = ref(false)

const safeDelete = (url: string) => {
    if (confirm("Seguro que quieres eliminar este registro?")) {
        Inertia.delete(url, {
            preserveState: true,
            preserveScroll: true,
            replace: true});
    }

}

console.log(showModal.value)

watch(search,  debounce(value => {
    Inertia.get(url_route, {search: value}, {
        preserveState: true,
        preserveScroll: true,
        replace: true});
}, 320))


</script>
