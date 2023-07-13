<template>
    <h1>Управление страницами</h1>

    <div>
        <inertia-link href="/admin/pages/create">Создать страницу</inertia-link>
    </div>

    <div>
        <table>
            <thead>
            <th>ID</th>
            <th>Название</th>
            <th>URI</th>
            <th>Операции</th>
            </thead>
            <tbody>
            <tr v-for="(page, index) in pages.data" :key="index">
                <td>{{ page.id }}</td>
                <td>{{ page.name }}</td>
                <td>{{ page.slug }}</td>
                <td>
                    <inertia-link :href="`/admin/pages/${page.id}/edit`">Редактировать</inertia-link>
                    <inertia-link :href="`/admin/pages/${page.id}`" as="button" method="delete">Удалить</inertia-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";

export default {
    name: "Index",
    layout: AdminLayout,
    props: {
        pages: {
            type: Object,
            required: true
        }
    }
}
</script>
