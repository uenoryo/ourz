<template lang="jade">
  md-list
    md-list-item(v-for='item in data') {{ item.user.name }}
</template>

<script>
  const request = require('superagent');
  export default {
    props: ['teamId'],
    data() {
      return {
        data: [],
      }
    },
    created() {
      request
        .get('/api/v1/team/' + this.teamId + '/members')
        .end((err, res) => this.data = res.body.data);
    }
  }
</script>
