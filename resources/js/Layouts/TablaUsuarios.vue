<script setup lang="ts">
import {defineProps} from "vue";

interface Cliente {
    id: number;
    name: string;
    email: string;
    phone: string;
    mascotas_count: number;
    edit_url: string;
    delete_url: string;
}


interface Props {
    clientes: Cliente[];
}

const props = defineProps<Props>();

</script>
<template>
    <table>

    </table>
</template>
