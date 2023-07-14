<template>
    <h1>Управление товарами</h1>

    <div>
        <inertia-link href="/admin/products/create">Создать товар</inertia-link>
    </div>

    <div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>URI</th>
                <th>Цена</th>
                <th>Цена со скидкой</th>
                <th>Категория</th>
                <th>Операции</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(product, index) in products.data" :key="index">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.slug }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.discount_price }}</td>
                <td>{{ product.category.name }}</td>
                <td>
                    <inertia-link :href="`/admin/products/${product.id}/edit`">Редактировать</inertia-link>
                    <inertia-link :href="`/admin/products/${product.id}`" method="DELETE" as="button">Удалить</inertia-link>
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
        products: {
            type: Object,
            required: true
        }
    }
}
</script>
