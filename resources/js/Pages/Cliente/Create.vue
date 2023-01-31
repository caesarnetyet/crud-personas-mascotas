<template>
    <h1>Formulario persona</h1>

    <form @submit.prevent="submit">
        <div>
            <label for="name">Nombre</label>
            <input type="text" v-model="form.name" >
            <div v-if="form.errors.name">{{form.errors.name}}</div>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" v-model="form.email" >
            <div v-if="form.errors.email">{{form.errors.email}}</div>
        </div>
        <div>
            <label for="phone">Numero de telefono</label>
            <input type="text" v-model="form.phone" >
            <div v-if="form.errors.phone">{{form.errors.phone}}</div>
        </div>
        <button type="submit" :disabled="form.processing">Crear Cliente</button>
    </form>
</template>
<script setup lang="ts">
import {useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    phone: null,
    email: null
})

const submit = () => {
    form.post(route('vue.persona.store'))
}

</script>

<script lang="ts">
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>

