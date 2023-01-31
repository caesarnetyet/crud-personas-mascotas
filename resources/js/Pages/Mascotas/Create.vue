<template>
    <h1>Formulario persona</h1>

    <form @submit.prevent="submit">
        <div>
            <label for="name">Nombre</label>
            <input type="text" v-model="form.name" >
            <div class="text-md text-red-600" v-if="form.errors.name">{{form.errors.name}}</div>
        </div>
        <div>
            <label for="email">breed</label>
            <input type="text" v-model="form.breed" >
            <div class="text-md text-red-600" v-if="form.errors.breed">{{form.errors.breed}}</div>
        </div>
        <div>
            <label for="phone">Color</label>
            <input type="text" v-model="form.color" >
            <div class="text-md text-red-600" v-if="form.errors.color">{{form.errors.color}}</div>
        </div>
        <div>
            <label for="sex">Sexo</label>
            <select name="sex" v-model="form.sex" id="sex">
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
            <div class="text-md text-red-600" v-if="form.errors.sex">{{form.errors.sex}}</div>
        </div>
        <div>
            <label for="phone">Dueño</label>
            <select v-model="form.persona_id">
                <option v-for="persona in personas" :key="persona.id" :value="persona.id">{{persona.name}}</option>
            </select>
            <div class="text-md text-red-600" v-if="form.errors.persona_id">{{form.errors.persona_id}}</div>
        </div>
        <button type="submit" :disabled="form.processing">Crear mascota</button>
    </form>
</template>
<script setup lang="ts">
import {useForm} from "@inertiajs/inertia-vue3";
import {defineProps} from 'vue'

defineProps({
    personas: Array
})

const form = useForm({
    name: null,
    breed: null,
    color: null,
    sex: null,
    persona_id: null
})

const submit = () => {
    form.post(route('vue.mascotas.store'))
}

</script>

<script lang="ts">
import HomeLayout from "@/Layouts/HomeLayout.vue";

export default {
    "layout": HomeLayout
}
</script>

