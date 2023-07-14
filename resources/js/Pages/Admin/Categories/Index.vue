<template>
    <h1>Управление категориями</h1>

    <div>
        <inertia-link href="/admin/categories/create">Создать категорию</inertia-link>
    </div>

    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>URI</th>
                <th>Родительская категория</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(category, index) in categories.data" :key="index">
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>{{ category.slug }}</td>
                <td>{{ category.parent?.name }}</td>
                <td>
                    <inertia-link :href="`/admin/categories/${category.id}/edit`">Редактировать</inertia-link>
                    <inertia-link :href="`/admin/categories/${category.id}`"  method="DELETE" as="button">Удалить</inertia-link>
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
        categories: {
            type: Object,
            required: true
        }
    }
}
</script>
