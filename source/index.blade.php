---
title: SendTest.Email | Test send your HTML email
description: Send your HTML email to a real inbox. Use this free tool to preview and debug your HTML email campaign or newsletter before sending, in a real email client.
---

@extends('_layouts.master')

@section('content')
<div id="app">
    <div class="h-screen">
        <div class="flex w-full bg-swirl">
            <div class="flex items-center justify-between w-1/2 border-b-4 border-transparent py-4">
                <div class="flex items-center">
                    <h1 class="text-lg leading-normal">
                        <a href="{{ $page->baseUrl }}/" class="px-4 text-green-lightest hover:opacity-75 no-underline font-semibold italic">sendtest.email</a>
                    </h1>
                </div>
                <span v-show="message.html" v-cloak class="px-6 text-sm text-white">
                    @{{ formattedFileSizeUnix }}
                    <a href="https://github.com/hteumeuleu/email-bugs/issues/41" target="_blank" rel="nofollow noopener">
                        <svg class="w-4 align-bottom" v-show="fileSizeUnix > 82000 && fileSizeUnix < 104453" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M501.461 383.799L320.501 51.401C306.7 28.6 282.7 14.8 256 14.8s-50.7 13.8-64.501 36.601L10.539 383.799C-3.259 407.501-3.56 435.701 9.941 459.4c13.499 23.699 37.798 37.8 65.099 37.8h361.92c27.301 0 51.601-14.101 65.099-37.8 13.501-23.699 13.2-51.899-.598-75.601z" fill="#495a79"/><path d="M502.059 459.4c-13.499 23.699-37.798 37.8-65.099 37.8H256V14.8c26.7 0 50.7 13.801 64.501 36.601L501.461 383.8c13.798 23.701 14.099 51.901.598 75.6z" fill="#42516d"/><path d="M475.661 399.1L294.699 66.699C286.601 52.9 271.901 44.8 256 44.8s-30.601 8.101-38.699 21.899L36.339 399.1c-8.399 14.101-8.399 31.199-.298 45.3 8.099 14.399 22.798 22.8 39 22.8h361.92c16.201 0 30.901-8.401 39-22.8 8.099-14.101 8.099-31.199-.3-45.3z" fill="#ffde33"/><path d="M475.96 444.4c-8.099 14.399-22.798 22.8-39 22.8H256V44.8c15.901 0 30.601 8.101 38.699 21.899L475.661 399.1c8.399 14.101 8.399 31.199.299 45.3z" fill="#ffbc33"/><g fill="#495a79"><path d="M256 437.2c-16.538 0-30-13.462-30-30s13.462-30 30-30 30 13.462 30 30-13.462 30-30 30zM286 317.2c0 16.538-13.462 30-30 30s-30-13.462-30-30v-150c0-16.538 13.462-30 30-30s30 13.462 30 30v150z"/></g><g fill="#42516d"><path d="M286 407.2c0-16.538-13.462-30-30-30v60c16.538 0 30-13.462 30-30zM286 317.2v-150c0-16.538-13.462-30-30-30v210c16.538 0 30-13.462 30-30z"/></g></svg>
                        <svg class="w-4 align-bottom" v-show="fileSizeUnix > 104453" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999"><path d="M501.449 368.914L320.566 66.207C306.751 43.384 282.728 29.569 256 29.569s-50.752 13.815-64.567 36.638L10.55 368.914c-13.812 23.725-14.113 51.954-.599 75.678 13.513 23.723 37.836 37.838 65.165 37.838h361.766c27.329 0 51.653-14.115 65.165-37.838 13.516-23.724 13.215-51.953-.598-75.678z" fill="#e50027"/><path d="M502.049 444.592c-13.513 23.723-37.836 37.838-65.165 37.838H256V29.57c26.727 0 50.752 13.815 64.567 36.638L501.45 368.915c13.812 23.724 14.113 51.953.599 75.677z" fill="#c1001f"/><path d="M75.109 452.4c-16.628 0-30.851-8.27-39.063-22.669-8.211-14.414-8.065-31.087.469-45.72L217.23 81.549c8.27-13.666 22.816-21.951 38.769-21.951s30.5 8.284 38.887 22.157l180.745 302.49c8.388 14.4 8.534 31.072.322 45.485-8.211 14.4-22.435 22.669-39.063 22.669H75.109v.001z" fill="#fd003a"/><path d="M436.891 452.4c16.628 0 30.851-8.27 39.063-22.669 8.211-14.414 8.065-31.087-.322-45.485L294.886 81.754c-8.388-13.871-22.933-22.157-38.887-22.157V452.4h180.892z" fill="#e50027"/><path d="M286.03 152.095v120.122c0 16.517-13.514 30.03-30.03 30.03s-30.031-13.514-30.031-30.03V152.095c0-16.517 13.514-30.031 30.031-30.031s30.03 13.514 30.03 30.031z" fill="#e1e4fb"/><path d="M286.03 152.095v120.122c0 16.517-13.514 30.03-30.03 30.03V122.064c16.516 0 30.03 13.514 30.03 30.031z" fill="#c5c9f7"/><path d="M256 332.278c-24.926 0-45.046 20.119-45.046 45.046 0 24.924 20.119 45.046 45.046 45.046s45.046-20.121 45.046-45.046c0-24.926-20.121-45.046-45.046-45.046z" fill="#e1e4fb"/><path d="M301.046 377.323c0 24.924-20.119 45.046-45.046 45.046v-90.091c24.925 0 45.046 20.12 45.046 45.045z" fill="#c5c9f7"/></svg>
                    </a>
                </span>
            </div>
            <div class="flex flex-wrap items-center justify-between w-1/2 py-3 px-4 border-b-4 border-transparent">
                <div class="w-4/5 xl:w-1/3 px-1">
                    <input type="text" class="hidden" id="from" value="">
                    <input type="text" id="url" value="https://sendtest.email" v-cloak :class="['hidden']">
                    <input type="email" v-model="message.recipient" class="form-input" :class="{'error' : errors.recipient}" placeholder="To:">
                </div>
                <div class="w-4/5 xl:w-2/5 px-1">
                    <input type="text" v-model="message.subject" class="form-input" :class="{'error' : errors.subject}" placeholder="Subject:">
                </div>
                <div class="flex justify-end w-1/5">
                    <button
                        v-cloak
                        @click="handleSubmit"
                        v-html="buttonText"
                        :class="{'opacity-50 pointer-events-none' : sending}"
                        class="px-4 py-2 xl:px-6 xl:py-3 text-green bg-white shadow hover:shadow-md text-xs uppercase rounded focus:outline-none">
                        Send <span class="hidden xl:inline">Test</span> &rarr;
                    </button>
                </div>
            </div>
        </div>
        <div class="fixed flex flex-wrap h-full w-full">
            <div id="editor" class="w-1/2 h-full">
                <div class="h-full">
                    <codemirror v-model="message.html" :options="options" class="h-full text-sm pb-24 xl:pb-16 bg-cm-black"></codemirror>
                </div>
            </div>
            <div id="preview" class="w-1/2 h-full bg-white">
                <span class="iframe-width" v-cloak :class="{'hidden': !iframeWidth}">@{{ iframeWidth ? iframeWidth + 'px' : '' }}</span>
                <iframe
                    class="iframe w-full h-full pb-16"
                    sandbox="allow-forms allow-modals allow-pointer-lock allow-popups allow-presentation allow-same-origin allow-scripts"
                    allow="geolocation; microphone; camera; midi; vr; accelerometer; gyroscope; payment; ambient-light-sensor"
                    allowtransparency="true"
                    allowpaymentrequest="true"
                    :srcdoc="message.html"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ mix('/js/main.js') }}"></script>
@endpush()
