<script setup lang="ts">
import {computed , defineProps} from 'vue'

interface Props {
    data: string
    type: string
    placeholder?: string
}

const props = withDefaults(defineProps<Props>(), {
    placeholder: "Ingrese el"
})

const placeholder = computed(() => `${props.placeholder} ${props.data}`)

const vmodel = computed(()=> `form.${props.data}`)
</script>

<template>
    <div class="flex flex-col">
        <label for="{{data}}">{{data}}</label>
        <input type="{{type}}" v-model="vmodel" placeholder="{{placeholder}}" class="border-2 border-gray-300 p-2 rounded-md">
    </div>
</template>
