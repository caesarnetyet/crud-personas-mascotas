<template>
    <h1>Editando a {{persona.name}}</h1>

    <form class="p-3 bg-slate-500 shadow-2xl border-2 border-slate-700 w-1/4 ml-[27.5%]" @submit.prevent="submit">
        <div class="flex flex-col px-3">
            <label class="text-white font-xl font-bold" for="name">Nombre</label>
            <input type="text" v-model="form.name" >
            <div class="font-bold text-md text-red-600" v-if="form.errors.name">{{form.errors.name}}</div>
        </div>
        <div class="flex flex-col px-3">
            <label class="text-white font-xl font-bold"  for="email">Email</label>
            <input type="email" v-model="form.email" >
            <div class="font-bold text-md text-red-600" v-if="form.errors.email">{{form.errors.email}}</div>
        </div>
        <div class="flex flex-col px-3">
            <label  class="text-white font-xl font-bold" for="phone">Numero de telefono</label>
            <input type="text" v-model="form.phone" >
            <div class="font-bold text-md text-red-600" v-if="form.errors.phone">{{form.errors.phone}}</div>
        </div>
        <button class="p-3 bg-green-600 mx-auto block mt-3 text-white font-bold rounded-md hover:bg-green-700" type="submit" :disabled="form.processing">Crear Cliente</button>
    </form>
</template>
<script setup lang="ts">
import {useForm} from "@inertiajs/inertia-vue3";

const {persona} = defineProps({
    persona: Object
})

const form = useForm({
    name: null,
    phone: null,
    email: null
})

const submit = () => {
    form.put(route('vue.persona.update', persona.id))
}

</script>

<script lang="ts">
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>

