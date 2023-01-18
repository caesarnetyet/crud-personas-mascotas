<script setup lang="ts">

import {defineProps} from 'vue'
interface Clientes {
    id: number;
    name: string;
    email: string;
    phone: string;
    mascotas_count: number;
    edit_url: string;
    delete_url: string;
}
interface Props{
    clientes: Clientes[];
}

const clientes = defineProps<Props>();

</script>
<template>
    <Head title="Welcome!"/>
    <div class="grid grid-cols-6">
        <header class="col-start-2 col-span-4 text-center p-3">
            <h1 class="text-4xl font-bold">Welcome!</h1>
        </header>

    </div>
</template>
