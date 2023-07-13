<template>
    <h1>{{ category.name }}</h1>
</template>

<script>
export default {
    name: "Show",
    props: {
        category: {
            type: Object,
            required: true
        }
    }
}
</script>
