<template>
    <Editor
        api-key="xcnykoky7wz5aq4opt33o6n7eng7x7vjjt8qnmfpirm62ovi"
        :init="{
            height: 500,
            menubar:false,
            branding: false,
            plugins: ['wordcount', 'link', 'fullscreen', 'lists'],
            toolbar: ['link | bold italic underline blockquote | bullist numlist | align | formatselect | fullscreen']
        }"
    />
</template>

<script>

import Editor from "@tinymce/tinymce-vue";

export default {
    name: "EditorComponent",
    components: {
        Editor
    }
}
</script>
