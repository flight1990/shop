<template>
    <h1>{{ category ? 'Редактировать' : 'Создать' }} категорию</h1>

    <form>
        <div>
            <label for="parent_id">Родительская категория</label>
            <select id="parent_id" v-model="form.parent_id">
                <option value="">Корень</option>
                <option :value="parent.id" v-for="(parent, index) in parentCategories.data" :key="index">{{ parent.name }}</option>
            </select>
        </div>

        <div>
            <label for="name">Название категории</label>
            <input type="text" id="name" v-model="form.name">
            <small v-if="form.errors.name">{{ form.errors.name }}</small>
        </div>

        <div>
            <inertia-link href="/admin/categories">Вернуться к списку</inertia-link>
            <button @click.prevent="submit" :disabled="form.processing">{{ category ? 'Обновить' : 'Сохранить' }}</button>
        </div>
    </form>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useForm} from "@inertiajs/vue3";

export default {
    name: "Modify",
    layout: AdminLayout,
    props: {
        category: {
            type: Object,
            required: false
        },
        parentCategories: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            form: useForm({
                name: this.category?.name ?? "",
                parent_id: this.category?.parent_id ?? ""
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/categories')
        },
        update() {
            this.form.patch(`/admin/categories/${this.category.id}`)
        },
        submit() {
            this.category ? this.update() : this.create()
        }
    }
}
</script>
