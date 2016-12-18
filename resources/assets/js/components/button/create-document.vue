<template lang="jade">
  div
    md-button.md-fab.md-fab-bottom-right.md-primary(@click='showModal = true')
      md-icon add
    transition(name='modal')
      div.modal-mask(v-if='showModal' @click='close')
        div.modal-wrapper
          div.modal-container(v-on:click.stop='')
            div.modal-header
              slot(name='header')
                md-input-container
                  md-input(v-model='data.title' placeholder='タイトルを入力' required)
            div.noren.noren-gl-oneline
              div.modal-body.g-1
                slot(name='body')
                  textarea(:value='data.body' @input='update' placeholder='# 見出し' required)
              div.modal-preview.g-1
                slot(name='preview')
                  div(v-html='markdown')
            div.modal-footer
              slot(name='footer')
                md-button.md-raised.md-primary.modal-default-button(@click='save') 作成
</template>

<script>
  const marked = require('marked');
  const request = require('superagent');
  export default {
    props: ['teamId'],
    data() {
      return {
        data: {
          title: null,
          body: '',
        },
        showModal: false,
      }
    },
    computed: {
      markdown: function() {
        return marked(this.data.body, {sanitize: true});
      },
    },
    methods: {
      update: _.debounce(function(e) {
        this.data.body = e.target.value;
      }, 300),
      save() {
        request
          .post('/api/v1/team/' + this.teamId + '/document')
          .set('X-CSRF-TOKEN', window.Laravel.csrfToken)
          .send({
            _token: window.Laravel.csrfToken,
            title: this.data.title,
            body: this.data.body,
          })
          .end((err, res) => {
            if (res.body.status === 'OK') {
              this.showModal = false;
            }
          });
      },
      close() {
        this.showModal = false;
      },
    },
    filters: {
      marked: marked,
    },
  }
</script>
