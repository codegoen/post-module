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
          v-model="form.category"
          :options="
            async function (query) {
              return await fetchLanguages(query); // check JS block for implementation
            }
          "
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
<script setup>
import { watch } from "vue";
import { slugable } from "~/utils/helper";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  title: null,
  slug: null,
  category: null,
  content: null,
});

const save = () => {
  console.log(form);
};

watch(
  () => form.title,
  (newValue) => {
    form.slug = slugable(newValue);
  },
);

const fetchLanguages = async (query) => {
  // From: https://www.back4app.com/database/paul-datasets/list-of-all-programming-languages/get-started/javascript/rest-api/fetch?objectClassSlug=dataset

  let where = "";

  if (query) {
    where =
      "&where=" +
      encodeURIComponent(
        JSON.stringify({
          ProgrammingLanguage: {
            $regex: `${query}|${query.toUpperCase()}|${
              query[0].toUpperCase() + query.slice(1)
            }`,
          },
        }),
      );
  }

  const response = await fetch(
    "https://parseapi.back4app.com/classes/All_Programming_Languages?order=ProgrammingLanguage&keys=ProgrammingLanguage" +
      where,
    {
      headers: {
        "X-Parse-Application-Id": "XpRShKqJcxlqE5EQKs4bmSkozac44osKifZvLXCL", // This is the fake app's application id
        "X-Parse-Master-Key": "Mr2UIBiCImScFbbCLndBv8qPRUKwBAq27plwXVuv", // This is the fake app's readonly master key
      },
    },
  );

  const data = await response.json(); // Here you have the data that you need

  return data.results.map((item) => {
    return { value: item.ProgrammingLanguage, label: item.ProgrammingLanguage };
  });
};
</script>
