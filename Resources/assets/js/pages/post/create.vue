<template>
  <div class="grid grid-cols-12 gap-4 mb-[100px]">
    <div class="col-span-12 lg:col-span-8 min-h-screen">
      <v-quill-editor
        theme="snow"
        toolbar="full"
        class="h-full"
        ref="quillEditor"
        content-type="html"
        v-model:content="form.content"
      />
    </div>
    <div class="col-span-12 lg:col-span-4">
      <div class="flex flex-col space-y-4 bg-gray-300 shadow p-4 rounded">
        <v-text
          label="Title"
          :required="true"
          v-model="form.title"
          :error="form.errors.title"
        />
        <v-text
          label="Slug"
          :required="true"
          v-model="form.slug"
          :error="form.errors.slug"
        />
        <v-multi-select
          label="Category"
          :required="true"
          :create-option="true"
          url="select/category"
          v-model="form.category"
          :error="form.errors.category"
        />
        <div class="flex flex-row space-x-2">
          <v-loading-button2 text="Preview" />
          <v-loading-button2
            text="Save"
            @click.prevent="save"
            :loading="form.processing"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: this.$inertia.form({
        title: null,
        slug: null,
        category: null,
        content: null,
      }),
    };
  },
  methods: {
    save() {
      this.form.post(`/post`, {
        onSuccess: () => {
          this.form.reset();
          this.$refs.quillEditor.setHTML(null);
        },
      });
    },
  },
  watch: {
    "form.title": {
      handler: function (value) {
        if (value) {
          this.form.slug = this.$helper.convertToSlug(value);
        }
      },
    },
  },
};
</script>
