<template>

    <header>
        <nav class="bg-slate-500 text-center  p-2 text-white">
            <h1 class="font-bold text-3xl">Crud Vue - Inertia</h1>
        </nav>

    </header>
    <div class="flex bg-slate-200 h-screen">
        <AsideComponent/>
        <main class="flex-1 mx-20 my-10">
                <slot/>
        </main>
    </div>
</template>

<script setup lang="ts">
import AsideComponent from "@/Layouts/AsideComponent.vue";


console.log("HomeLayout");
</script>
