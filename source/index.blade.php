---
title: SendTest.Email | Test send your HTML email
description: Send your HTML email to a real inbox. Use this free tool to preview and debug your HTML email campaign or newsletter before sending, in a real email client.
---

@extends('_layouts.master')

@section('content')

<div class="bg-swirl">
    <div class="container h-screen flex items-center justify-center">
        <div class="text-center">
            <a href="{{ $page->baseUrl }}/">
                <svg class="w-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280.115 280.115">
                    <path d="M139.979 205.146l-38.136-16.95-23.295 52.426 61.431-35.476z" fill="#b7bbbd"/>
                    <path d="M280.027 13.17L0 151.784l78.915 34.12-.026 53.31 28.493-38.39 101.064 66.121L280.027 13.17z" fill="#efefef"/>
                    <path d="M280.115 13.17L108.651 203.807 78.845 240.64l-.193-51.989L280.115 13.17z" fill="#d1d5d7"/>
                </svg>
            </a>
            <h1 class="pt-8 pb-2">
                <a href="{{ $page->baseUrl }}/" class="text-white text-3xl md:text-5xl font-bold italic no-underline">sendtest.email</a>
            </h1>
            <p class="text-green-lightest text-lg mb-12 mt-2">Send a test email to your inbox</p>
            <a href="/editor/" class="mt-4 text-white hover:text-green font-semibold bg-transparent hover:bg-white hover:shadow-lg text-base py-3 px-6 border-2 border-white rounded no-underline inline-block">Send a test &rarr;</a>
        </div>
    </div>
</div>
@endsection
