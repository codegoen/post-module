import { createStore } from "vuex";

import category from "./modules/category";

export default createStore({
  modules: {
    category: category,
  },
});
