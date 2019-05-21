<template>
  <div id="app" class="flex h-screen bg-swirl p-4">
    <div class="flex flex-wrap w-full h-app">
      <h1 @click="openAbout()" class="text-xl font-semibold italic text-green-100 mr-4 h-12 cursor-pointer">sendtest.email</h1>
      <div class="w-full h-full">
        <div class="flex">
          <ul class="flex h-10 font-semibold w-1/2 text-cm-black">
            <li @click="switchTab('html')" :class="[activetab == 'html' ? 'bg-cm-black text-green-200 cursor-default' : 'cursor-pointer']" class="inline-block hover:text-green-200 rounded-t py-2 px-6">HTML</li>
            <li @click="switchTab('amp_html')" :class="[activetab == 'amp_html' ? 'bg-cm-black text-green-200 cursor-default' : 'cursor-pointer']" class="inline-block hover:text-green-200 rounded-t py-2 px-6">⚡4email</li>
            <li @click="switchTab('text')" :class="[activetab == 'text' ? 'bg-cm-black text-green-200 cursor-default' : 'cursor-pointer']" class="inline-block hover:text-green-200 rounded-t py-2 px-6">Text</li>
            <li class="w-full flex justify-end">
              <span v-show="message.html" v-cloak class="flex items-center px-6 text-sm text-white">
                {{ formattedFileSizeUnix }}
                <a href="https://github.com/hteumeuleu/email-bugs/issues/41" class="ml-4" target="_blank" rel="nofollow noopener">
                  <svg class="w-4 align-bottom" v-show="fileSizeUnix > 82000 && fileSizeUnix < 104453" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M501.461 383.799L320.501 51.401C306.7 28.6 282.7 14.8 256 14.8s-50.7 13.8-64.501 36.601L10.539 383.799C-3.259 407.501-3.56 435.701 9.941 459.4c13.499 23.699 37.798 37.8 65.099 37.8h361.92c27.301 0 51.601-14.101 65.099-37.8 13.501-23.699 13.2-51.899-.598-75.601z" fill="#495a79"/><path d="M502.059 459.4c-13.499 23.699-37.798 37.8-65.099 37.8H256V14.8c26.7 0 50.7 13.801 64.501 36.601L501.461 383.8c13.798 23.701 14.099 51.901.598 75.6z" fill="#42516d"/><path d="M475.661 399.1L294.699 66.699C286.601 52.9 271.901 44.8 256 44.8s-30.601 8.101-38.699 21.899L36.339 399.1c-8.399 14.101-8.399 31.199-.298 45.3 8.099 14.399 22.798 22.8 39 22.8h361.92c16.201 0 30.901-8.401 39-22.8 8.099-14.101 8.099-31.199-.3-45.3z" fill="#ffde33"/><path d="M475.96 444.4c-8.099 14.399-22.798 22.8-39 22.8H256V44.8c15.901 0 30.601 8.101 38.699 21.899L475.661 399.1c8.399 14.101 8.399 31.199.299 45.3z" fill="#ffbc33"/><g fill="#495a79"><path d="M256 437.2c-16.538 0-30-13.462-30-30s13.462-30 30-30 30 13.462 30 30-13.462 30-30 30zM286 317.2c0 16.538-13.462 30-30 30s-30-13.462-30-30v-150c0-16.538 13.462-30 30-30s30 13.462 30 30v150z"/></g><g fill="#42516d"><path d="M286 407.2c0-16.538-13.462-30-30-30v60c16.538 0 30-13.462 30-30zM286 317.2v-150c0-16.538-13.462-30-30-30v210c16.538 0 30-13.462 30-30z"/></g></svg>
                  <svg class="w-4 align-bottom" v-show="fileSizeUnix > 104453" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999"><path d="M501.449 368.914L320.566 66.207C306.751 43.384 282.728 29.569 256 29.569s-50.752 13.815-64.567 36.638L10.55 368.914c-13.812 23.725-14.113 51.954-.599 75.678 13.513 23.723 37.836 37.838 65.165 37.838h361.766c27.329 0 51.653-14.115 65.165-37.838 13.516-23.724 13.215-51.953-.598-75.678z" fill="#e50027"/><path d="M502.049 444.592c-13.513 23.723-37.836 37.838-65.165 37.838H256V29.57c26.727 0 50.752 13.815 64.567 36.638L501.45 368.915c13.812 23.724 14.113 51.953.599 75.677z" fill="#c1001f"/><path d="M75.109 452.4c-16.628 0-30.851-8.27-39.063-22.669-8.211-14.414-8.065-31.087.469-45.72L217.23 81.549c8.27-13.666 22.816-21.951 38.769-21.951s30.5 8.284 38.887 22.157l180.745 302.49c8.388 14.4 8.534 31.072.322 45.485-8.211 14.4-22.435 22.669-39.063 22.669H75.109v.001z" fill="#fd003a"/><path d="M436.891 452.4c16.628 0 30.851-8.27 39.063-22.669 8.211-14.414 8.065-31.087-.322-45.485L294.886 81.754c-8.388-13.871-22.933-22.157-38.887-22.157V452.4h180.892z" fill="#e50027"/><path d="M286.03 152.095v120.122c0 16.517-13.514 30.03-30.03 30.03s-30.031-13.514-30.031-30.03V152.095c0-16.517 13.514-30.031 30.031-30.031s30.03 13.514 30.03 30.031z" fill="#e1e4fb"/><path d="M286.03 152.095v120.122c0 16.517-13.514 30.03-30.03 30.03V122.064c16.516 0 30.03 13.514 30.03 30.031z" fill="#c5c9f7"/><path d="M256 332.278c-24.926 0-45.046 20.119-45.046 45.046 0 24.924 20.119 45.046 45.046 45.046s45.046-20.121 45.046-45.046c0-24.926-20.121-45.046-45.046-45.046z" fill="#e1e4fb"/><path d="M301.046 377.323c0 24.924-20.119 45.046-45.046 45.046v-90.091c24.925 0 45.046 20.12 45.046 45.045z" fill="#c5c9f7"/></svg>
                </a>
              </span>
            </li>
          </ul>
          <div class="w-1/2 -mt-10">
            <div class="flex flex-wrap items-center h-20">
              <div class="w-2/5">
                <input type="text" class="hidden" id="from" value="">
                <input type="text" id="url" value="https://sendtest.email" class="hidden">
                <div class="relative">
                  <input @input="errors.recipient = isEmail($event.target.value) ? false : true" type="email" name="recipient" placeholder="To:" v-model="message.recipient" class="form-input">
                  <label for="recipient" :class="{'text-red-600': errors.recipient}">To:</label>
                </div>
              </div>
              <div class="w-2/5">
                <div class="relative">
                  <input @input="errors.subject = $event.target.value ? false : true" type="text" name="subject" placeholder="Subject:" v-model="message.subject" class="form-input">
                  <label for="subject" :class="{'text-red-600': errors.subject}">Subject:</label>
                </div>
              </div>
              <div class="w-1/5 flex justify-end px-4 py-2">
                <button @click="handleSubmit" :class="{'cursor-default opacity-50 pointer-events-none' : sending}" class="px-4 py-2 text-green-500 bg-white shadow hover:shadow-md text-xs font-bold uppercase rounded focus:outline-none" v-html="sending ? 'Sending...' : 'Send Test &rarr;'">Send Test &rarr;</button>
              </div>
            </div>
          </div>
        </div>
        <div class="flex h-full w-full">
          <div id="editor" class="h-full bg-cm-black shadow-2xl">
            <codemirror v-model="message[activetab]" ref="codemirror" :options="codemirrorOptions" class="h-full text-sm" />
          </div>
          <div id="preview" class="h-full bg-white shadow-2xl">
            <span class="iframe-width-helper" :class="{'hidden': iframeWidth < 1}">{{ iframeWidth + 'px' }}</span>
            <iframe
                ref="preview"
                title="preview"
                class="w-full h-full"
                sandbox="allow-forms allow-modals allow-pointer-lock allow-popups allow-presentation allow-same-origin allow-scripts"
                allow="geolocation; microphone; camera; midi; vr; accelerometer; gyroscope; payment; ambient-light-sensor"
                allowtransparency="true"
                allowpaymentrequest="true"
                :srcdoc="message[activetab]"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div :class="{'hidden': showAbout}" class="flex items-center justify-center absolute top-0 left-0 w-full h-full z-60">
      <div @click="showAbout = !showAbout" class="fixed top-0 left-0 w-full h-full bg-modal-backdrop"></div>
      <div class="bg-white p-8 text-gray-600 max-w-lg relative shadow-2xl rounded z-10">
        <p>
          <em>Sendtest.email</em> is a free and open-source tool for testing your email campaign's HTML, AMPHTML, and text versions before launch, in a real email client.
        </p>
        <div class="flex flex-col text-center my-12">
          <p class="text-6xl text-green-500">{{ totalSent }}</p>
          <p class="italic">total emails sent</p>
        </div>
        <p class="text-xs text-gray-500 text-center leading-relaxed">
          A project by <a href="https://twitter.com/cossssmin" target="_blank" rel="noopener noreferrer" class="underline hover:no-underline">@cossssmin</a>.
          Source code on <a href="https://github.com/cossssmin/sendtest.email" rel="noopener noreferrer" class="underline hover:no-underline">GitHub</a>.
          <br>
          Powered by <a href="https://www.sparkpost.com/" rel="noopener noreferrer" class="underline hover:no-underline">SparkPost</a>, hosted with <a href="https://www.netlify.com/" rel="noopener noreferrer" class="underline hover:no-underline">Netlify</a>.
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" @click="showAbout = !showAbout" class="w-3 h-3 absolute top-0 right-0 mt-4 mr-4 cursor-pointer opacity-75 hover:opacity-100" viewBox="0 0 64 64"><title>Close</title><path fill="#1D1D1B" d="M28.941 31.786L.613 60.114c-.787.787-.787 2.062 0 2.849.393.394.909.59 1.424.59.516 0 1.031-.196 1.424-.59l28.541-28.541 28.541 28.541c.394.394.909.59 1.424.59.515 0 1.031-.196 1.424-.59.787-.787.787-2.062 0-2.849L35.064 31.786 63.41 3.438c.787-.787.787-2.062 0-2.849-.787-.786-2.062-.786-2.848 0L32.003 29.15 3.441.59C2.654-.196 1.38-.196.593.59c-.787.787-.787 2.062 0 2.849l28.348 28.347z"/></svg>
      </div>
    </div>
  </div>
</template>

<script>
import Split from "split.js"
import Swal from 'sweetalert2'
import ByteSize from './helpers/bytesize'
import checkEmail from './helpers/checkEmail'
import { codemirror } from 'vue-codemirror-lite'
require('codemirror/mode/htmlmixed/htmlmixed')

let splitPanes = null

export default {
  name: 'app',
  components: {
    codemirror
  },
  data: () => {
    return {
      message: {
        recipient: '',
        subject: '',
        html: '',
        amp_html: '<!-- Whitelist tests@mail.sendtest.email in your Gmail settings before sending an ⚡4email test. -->',
        text: '',
      },
      errors: {
        recipient: false,
        subject: false
      },
      activetab: 'html',
      iframeWidth: 0,
      sending: false,
      codemirrorOptions: {
        mode: 'htmlmixed',
        tabSize: 2,
        autofocus: true,
        lineNumbers: true,
        theme: 'material',
      },
      showAbout: true,
      totalSent: '?',
    }
  },
  mounted () {
    const $vm = this
    splitPanes = Split([document.getElementById('editor'), document.getElementById('preview')], {
      minSize: [600, 10],
      gutterSize: 4,
      snapOffset: 0,
      onDrag () {
        $vm.iframeWidth = $vm.getIframeWidth()
      },
      onDragEnd () {
        $vm.iframeWidth = 0
      }
    })

    $vm.resetGutterPosition()
  },
  methods: {
    openAbout () {
      this.showAbout = !this.showAbout
      this.fetchTotalSent()
    },
    switchTab (name) {
      this.activetab = name
      this.$refs.codemirror.editor.focus()
    },
    getIframeWidth () {
      return this.$refs.preview.clientWidth
    },
    splitReset () {
      splitPanes.setSizes([50, 50])
    },
    resetGutterPosition () {
      let gutter = document.getElementsByClassName('gutter')
      gutter[0].addEventListener('dblclick', this.splitReset)
    },
    isEmail (email) {
      return checkEmail(email)
    },
    fetchTotalSent () {
      const $vm = this
      fetch('/.netlify/functions/metrics')
      .then(response => response.json())
      .then(json => $vm.totalSent = json.results[0].count_sent)
      .catch(err => {
        console.log(err)
        $vm.totalSent = '?'
      })
    },
    submitToServer () {
      let $vm = this;
      return new Promise((resolve, reject) => {
        fetch(`/.netlify/functions/send`, {
          method: "POST",
          body: JSON.stringify($vm.message)
        }).then(response => {
          resolve(response);
        }).catch(err => {
          reject(err);
        });
      })
    },
    handleSubmit () {
      const $vm = this
      $vm.errors.recipient = false
      $vm.errors.subject = false

      if (document.getElementById('from').value !== '' || document.getElementById('url').value !== 'https://sendtest.email')
      {
        return
      }

      if (!checkEmail($vm.message.recipient))
      {
        $vm.errors.recipient = true
        return
      }

      if (!$vm.message.subject) {
        $vm.errors.subject = true
        return
      }

      if ($vm.message.html.length < 1 && $vm.message.text.length < 1) {
        Swal.fire({
          title: 'Missing content',
          text: 'Please add at least an HTML version.',
          type: 'error',
          confirmButtonText: 'Dismiss'
        })

        return
      }

      $vm.sending = true

      $vm.submitToServer().then(response => {
        if (Number(response.status) !== 200) {
          Swal.fire({
            title: 'Well, 💩.',
            html: `Something went wrong, the email was not sent.`,
            type: 'error',
            confirmButtonText: 'Dismiss',
            onOpen: () => {
              $vm.sending = false
            },
          })
        } else {
          Swal.fire({
            title: 'Success!',
            text: 'Test email sent, go check your inbox.',
            type: 'success',
            confirmButtonText: 'Close'
          })
          $vm.sending = false;
          $vm.errors.subject = false;
          $vm.errors.recipient = false;
        }
      })
    },
  },
  computed: {
    fileSizeUnix () {
      return ByteSize.count(this.message[this.activetab])
    },
    formattedFileSizeUnix () {
      return this.message[this.activetab].length > 0 ? '~ ' + ByteSize.format(ByteSize.count(this.message[this.activetab])) : '0 KB'
    },
  }
}
</script>

<style>
/*! purgecss start ignore */
@import "tailwindcss/base";
/*! purgecss end ignore */

@import "tailwindcss/components";

@import "codemirror/theme/material";
@import "codemirror/lib/codemirror";
@import "sweetalert2/dist/sweetalert2";

@import "/assets/css/app";

@import "tailwindcss/utilities";
</style>
