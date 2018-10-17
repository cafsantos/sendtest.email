window.Vue = require('vue');
let Split = require('split.js');
let ByteSize = require('./bytesize');
let Helpers = require('./helpers');
let VueCodeMirror = require('vue-codemirror-lite');
let Swal = require('sweetalert2');
require('codemirror/mode/htmlmixed/htmlmixed');

Vue.use(VueCodeMirror);

let splitPanes;

new Vue({
  el: "#app",
  data: function () {
    return {
      message: {
        recipient: '',
        subject: '',
        html: '',
      },
      buttonText: 'Send test →',
      errors: {
        recipient: false,
        subject: false
      },
      sending: false,
      iframeWidth: 0
    }
  },
  mounted: function () {
    let $vm = this;
    splitPanes = Split([document.getElementById('editor'), document.getElementById('preview')], {
      minSize: [600, 10],
      gutterSize: 4,
      snapOffset: 0,
      onDrag: function () {
        $vm.iframeWidth = $vm.getIframeWidth();
      },
      onDragEnd: function () {
        $vm.iframeWidth = 0;
      }
    });

    this.resetGutterPosition();
  },
  methods: {
    updateHTML: function (html) {
      this.message.html = html;
      let iframe = document.documentElement.getElementsByClassName('iframe')[0];
      iframe.contentWindow.document.open();
      iframe.contentWindow.document.write(this.message.html);
      iframe.contentWindow.document.close();
    },
    splitReset: function () {
      splitPanes.setSizes([50, 50]);
    },
    resetGutterPosition: function () {
      let gutter = document.getElementsByClassName('gutter');
      gutter[0].addEventListener('dblclick', this.splitReset);
    },
    getIframeWidth: function () {
      return document.documentElement.getElementsByClassName('iframe')[0].clientWidth;
    },
    submitToServer() {
      let $vm = this;
      return new Promise((resolve, reject) => {
        fetch(`/.netlify/functions/sparkpost`, {
          method: "POST",
          body: JSON.stringify($vm.message)
        }).then(response => {
          resolve(response);
        }).catch(err => {
          reject(err);
        });
      })
    },
    handleSubmit() {
      let $vm = this;
      $vm.errors.recipient = false;
      $vm.errors.subject = false;

      if (document.getElementById('from').value || document.getElementById('url').value !== 'https://sendtest.email')
      {
        return;
      }

      if (!Helpers.checkEmail($vm.message.recipient))
      {
        $vm.errors.recipient = true;
        return;
      }

      if (!$vm.message.subject) {
        $vm.errors.subject = true;
        return;
      }

      if ($vm.message.html.length < 1) {
        Swal({
          title: 'Forget something?',
          text: 'There is no HTML in the editor, please add it and try again.',
          type: 'error',
          confirmButtonText: 'Dismiss'
        })
        return;
      }

      $vm.sending = true;
      $vm.buttonText = 'Sending...';

      $vm.submitToServer().then(response => {
        const body = response.json();
        if (Number(response.status) !== 200) {
          console.log(body);
          Swal({
            title: 'Error!',
            text: 'Something went wrong, the email was not sent. Please try again later.',
            type: 'error',
            confirmButtonText: 'Dismiss'
          })
        } else {
          Swal({
            title: 'Success!',
            text: 'Test email sent, go check your inbox.',
            type: 'success',
            confirmButtonText: 'Close'
          })
          $vm.sending = false;
          $vm.errors.subject = false;
          $vm.errors.recipient = false;
          $vm.buttonText = 'Send test →';
        }
      })
    },
  },
  computed: {
    options: function () {
      return {
        mode: 'htmlmixed',
        tabSize: 2,
        lineNumbers: true,
        lineWrapping: true,
        autofocus: true,
        theme: 'material',
      }
    },
    fileSizeUnix: function () {
      return ByteSize.count(this.message.html);
    },
    formattedFileSizeUnix: function () {
      return this.message.html.length > 0 ? '~ ' + ByteSize.format(ByteSize.count(this.message.html)) : '0 KB';
    },
    sizeWarningClasses: function () {
      if (this.fileSizeUnix > 104453) {
        return 'text-white';
      }

      if (this.fileSizeUnix > 82000) {
        return 'text-white';
      }

      return 'text-white';
    }
  }
});
