<template>
  <div>
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      :autocomplete-items="filteredItems">
    </vue-tags-input>
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input'

export default {
  components: {
    VueTagsInput,
  },
  props: [
    'filmId'
  ],
  data () {
    return {
      tag: '',
      tags: [],
      autocompleteItems: [],
    }
  },
  computed: {
    filteredItems () {
      return this.autocompleteItems.filter(i => new RegExp(this.tag, 'i').test(i.text))
    },
  },
  mounted () {
    this.getTags()
  },
  watch: {},
  methods: {
    getTags () {
      axios.post('/film/get-tags', {
        filmId: this.filmId
      }).then((responce) => {
        const arr = responce.data
        JSON.stringify(arr)
        this.tags = arr
      })
    },
    updateTags () {
      axios.post('/film/update-tags', {
        filmId: this.filmId,
        tags: this.tags
      }).then((responce) => {
        console.log(responce.data)
      })
    }
  },
}
</script>
