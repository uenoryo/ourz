<template lang="jade">
  div.container
    div.row
      div.col-md-8.col-md-offset-2
        div.panel.panel-default
          div.panel-heading Example Component!
          div.panel-body {{ message }}
</template>

<script>
  export default {
    data() {
      return {
        message: 'Hello Vue!'
      }
    },
    ready() {
      console.log('Component ready.')
    }
  }
</script>
