<template lang="jade">
  div
    md-button.md-fab.md-fab-bottom-right.md-primary(@click='showModal = true')
      md-icon add
    transition(name='modal')
      div.modal-mask(v-if='showModal' @click='close')
        div.modal-wrapper
          div.modal-container(v-on:click.stop='')
            div.modal-header
              slot(name='header') タイトル
            div.modal-body
              slot(name='body') default body
            div.modal-footer
              slot(name='footer')
                md-button.md-raised.md-primary.modal-default-button(@click='save') 作成
</template>

<script>
  const request = require('superagent');
  export default {
    props: ['teamId'],
    data() {
      return {
        showModal: false,
      }
    },
    methods: {
      save() {
        request
          .post('/api/v1/team/' + this.teamId + '/document')
          .send({
            _token: window.Laravel.csrfToken,
            title: 'title',
            body: 'body',
          })
          .end();
        this.showModal = false;
      },
      close() {
        this.showModal = false;
      },
    }
  }
</script>
