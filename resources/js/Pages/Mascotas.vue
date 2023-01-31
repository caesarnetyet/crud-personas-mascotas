<template>
    <div>
        <h1>Mascotas</h1>
        <MyModal v-if="success" :text="success"/>
        <div class="py-5 px-5">
            <div class="flex justify-between">
                <Link class="mb-5 p-3 block w-[20ch] text-white text-xl text-center bg-green-600" :href="route('vue.mascotas.create')">Agregar Mascota</Link>
                <div v-if="clientes.length > 0" class="p-3 text-center bg-green-600 font-bold text-md text-white">
                    <h1>Preleccionar un dueño?</h1>
                   <div class="flex mt-2">
                       <select v-model="selected" class="p-2 text-green-700 w-40 block py-0">

                           <option v-for="cliente in clientes" :key="cliente.id" :value="cliente.id">{{cliente.name}}</option>
                       </select>
                       <button @click="agregarMascota" class="p-3 bg-white text-green-600 border-2 border-green-700 py-0">Agregar mascota</button>
                   </div>
                </div>

            </div>
            <TableLayout v-if="mascotasexists" :models="mascotas" :url_route="current_url"/>
        </div>
    </div>
</template>
<script setup>

import {defineProps, ref} from 'vue'
import {Link} from '@inertiajs/inertia-vue3'
import TableLayout from "@/Layouts/TableLayout.vue";
import {Inertia} from "@inertiajs/inertia";
import {computed} from "vue";
import MyModal from "@/Components/MyModal.vue";

const {mascotas, current_url, clientes, success} = defineProps({mascotas: Array, current_url: String, clientes: Array, success: String})

const mascotasexists = computed(() => mascotas.length > 0)
let selected = ref(clientes[0].id)
const agregarMascota = () => {
    Inertia.get(route('vue.mascotas.create'), {cliente_id: selected.value})
}


</script>


<script>
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>
