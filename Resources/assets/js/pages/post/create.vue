<template>
  <div class="mb-[100px] grid grid-cols-12 gap-4">
    <div class="col-span-12 min-h-screen lg:col-span-8">
      <v-editor
        v-model="form.content"
        @input="
          (value) => {
            form.content = value;
          }
        "
      />
    </div>
    <div class="col-span-12 lg:col-span-4">
      <div class="flex flex-col space-y-4 rounded bg-gray-300 p-4 shadow">
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
      this.form.post(`/post`);
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
