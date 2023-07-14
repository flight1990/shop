<template>
    <h1>{{ product ? 'Редактировать' : 'Создать' }} товар</h1>

    <form>
        <div>
            <inertia-link href="/admin/products">Вернуться к списку</inertia-link>
        </div>
    </form>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Modify",
    layout: AdminLayout,
    props: {
        product: {
            type: Object,
            required: false
        }
    }
}
</script>
