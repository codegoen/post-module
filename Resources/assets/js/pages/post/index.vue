<template>
  <v-inertable
    :allow-filter="false"
    :filters="inertable.filters"
    :data="inertable.data"
    :columns="inertable.columns"
  >
    <template #attributes>
      <v-app-link
        :href="$route('dashboard.post.post.create')"
        class="btn-purple btn-ring-purple"
      >
        New Post
      </v-app-link>
    </template>
    <template #title="{ item: { title } }">
      <v-app-link href="#" class="text-md text-purple-600">
        {{ title }}
      </v-app-link>
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action="{ item: { id } }">
      <div class="flex space-x-2">
        <v-app-link
          :href="$route('dashboard.post.post.edit', { id })"
          class="
            rounded-md
            bg-yellow-400
            p-2
            focus:outline-none
            focus:ring-2
            focus:ring-yellow-400
            focus:ring-offset-2
          "
        >
          <v-icon name="PencilIcon" type="solid" class="h-3 w-3 text-white" />
        </v-app-link>
        <button
          @click.prevent="destroy(id)"
          type="button"
          class="
            rounded-md
            bg-red-500
            p-2
            focus:outline-none
            focus:ring-2
            focus:ring-red-500
            focus:ring-offset-2
          "
        >
          <v-icon name="TrashIcon" type="solid" class="h-3 w-3 text-white" />
        </button>
      </div>
    </template>
  </v-inertable>
</template>
<script>
export default {
  props: {
    inertable: Object,
  },
  methods: {
    create() {
      this.$modal.open({
        title: "New Post",
        component: require("./create.vue").default,
      });
    },
    destroy(id) {
      this.$modal.destroy({
        title: "Are you sure?",
        message: "This will permanently delete the post from database",
        onCancel: () => this.$modal.close(),
        onAccept: () => {
          this.$inertia.delete(this.$route("dashboard.post.post.destroy", { id }), {
            onSuccess: () => {
              this.$modal.close();
            },
          });
        },
      });
    },
  },
};
</script>
