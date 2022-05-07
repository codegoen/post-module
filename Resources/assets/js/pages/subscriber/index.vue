<template>
  <v-inertable
    :allow-filter="false"
    :filters="inertable.filters"
    :data="inertable.data"
    :columns="inertable.columns"
  >
    <template #description="{ item: { description } }">
      <v-nullable :value="description" />
    </template>
    <template #subscribe_at="{ item: { subscribe_at } }">
      <span v-if="subscribe_at">{{ $helper.formatDate(subscribe_at) }}</span>
      <span v-else>NULL</span>
    </template>
    <template #unsubscribe_at="{ item: { unsubscribe_at } }">
      <span v-if="unsubscribe_at">{{ $helper.formatDate(unsubscribe_at) }}</span>
      <span v-else>NULL</span>
    </template>
    <template #created_at="{ item: { created_at } }">
      <span>{{ $helper.formatDate(created_at) }}</span>
    </template>
    <template #action="{ item: { id } }">
      <div class="flex space-x-2">
        <button
          @click.prevent="edit(id)"
          type="button"
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
        </button>
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
    //
  },
};
</script>
