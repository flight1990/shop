<template>
    <h1>{{ page ? 'Редактировать' : 'Создать' }} страницу</h1>

    <form>
        <div>
            <label for="name">Название страницы</label>
            <input type="text" id="name" v-model="form.name">
            <small v-if="form.errors.name">{{ form.errors.name }}</small>
        </div>

        <div>
            <label for="body">Содержимое страицы</label>
            <EditorComponent
                id="body" v-model="form.body"
            />
            <small v-if="form.errors.body">{{ form.errors.body }}</small>
        </div>

        <div>
            <inertia-link href="/admin/pages">Вернуться к списку</inertia-link>
            <button @click.prevent="submit" :disabled="form.processing">{{ page ? 'Обновить' : 'Сохранить' }}</button>
        </div>
    </form>

</template>

<script>

import AdminLayout from "@/Layouts/AdminLayout.vue";
import EditorComponent from "@/Components/EditorComponent.vue";
import {useForm} from "@inertiajs/vue3";


export default {
    name: "Modify",
    layout: AdminLayout,
    components: {
        EditorComponent
    },
    props: {
        page: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            form: useForm({
                name: this.page?.name ?? "",
                body: this.page?.body ?? ""
            })
        }
    },
    methods: {
        create() {
            this.form.post('/admin/pages')
        },
        update() {
            this.form.patch(`/admin/pages/${this.page.id}`)
        },
        submit() {
            this.page ? this.update() : this.create()
        }
    }
}
</script>
