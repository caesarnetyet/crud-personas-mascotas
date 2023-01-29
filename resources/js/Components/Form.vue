<template>
<form @submit.prevent="computedRoute">

</form>
</template>

<script setup lang="ts">
import {defineProps} from "vue";
import {useForm} from "@inertiajs/inertia-vue3";
import {computed} from "vue";

const computedRoute = computed(() => {
    if (method.toLowerCase() === 'post') {
        return form.post(route)
    }
    else{
        return form.put(route)
    }
})

const { model, method, route } = defineProps({
    model: Object,
    method: String,
    route: String
})

const form = useForm(model)
</script>
