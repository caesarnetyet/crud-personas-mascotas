<template>
    <h1>Editando a {{mascota.name}}</h1>

    <form class="p-3 bg-slate-500 shadow-2xl border-2 border-slate-700 w-1/4 ml-[27.5%]" @submit.prevent="submit">
        <div class="flex flex-col px-3">
            <label class="text-white font-xl font-bold" for="name">Nombre</label>
            <input type="text" v-model="form.name" >
            <div class="text-md text-red-600" v-if="form.errors.name">{{form.errors.name}}</div>
        </div>
        <div class="flex flex-col px-3">
            <label  class="text-white font-xl font-bold" for="email">breed</label>
            <input type="text" v-model="form.breed" >
            <div class="text-md text-red-600" v-if="form.errors.breed">{{form.errors.breed}}</div>
        </div>
        <div class="flex flex-col px-3">
            <label class="text-white font-xl font-bold" for="phone">Color</label>
            <input type="text" v-model="form.color" >
            <div class="text-md text-red-600" v-if="form.errors.color">{{form.errors.color}}</div>
        </div>
        <div class="flex flex-col px-3">
            <label class="text-white font-xl font-bold" for="sex">Sexo</label>
            <select name="sex" v-model="form.sex" id="sex">
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
            <div class="text-md text-red-600" v-if="form.errors.sex">{{form.errors.sex}}</div>
        </div>
        <button class="p-3 bg-green-600 mx-auto block mt-3 text-white font-bold rounded-md hover:bg-green-700" type="submit" :disabled="form.processing">Crear mascota</button>
    </form>
</template>
<script setup lang="ts">

import {useForm} from "@inertiajs/inertia-vue3";
import {defineProps} from 'vue'


const form = useForm({
    name: null,
    breed: null,
    color: null,
    sex: null,
})

const {mascota} = defineProps({
    mascota: Object
})


const submit = () => {
    form.put('/vue/mascota/modificar/'+mascota.id)
}

</script>

<script lang="ts">
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>

