<template>
    <div v-if="showModal" class="fixed z-10 left-1/2 bg-green-600 p-3 border-2 border-yellow-200 text-white font-bold">
        {{text}}
        <button @click="toggleModal">X</button>
    </div>
</template>

<script setup lang="ts">
import { ref} from "vue";

let showModal = ref(true)
const toggleModal = () => {
    showModal.value = !showModal.value
}
defineProps({text: String})
</script>
