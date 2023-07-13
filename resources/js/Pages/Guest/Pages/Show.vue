<template>
    <h1>{{ page.name }}</h1>
    <div v-html="page.body"></div>
</template>

<script>

import GuestLayout from "@/Layouts/GuestLayout.vue";

export default {
    name: "Show",
    layout: GuestLayout,
    props: {
        page: {
            type: Object,
            required: true
        }
    }
}
</script>
