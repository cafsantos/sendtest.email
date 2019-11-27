<p align="center">
    <a href="https://sendtest.email/" target="_blank">
        <img width="400" src="https://res.cloudinary.com/cossssmin/image/upload/v1554371926/os/sendtest.email/ste-github.jpg" alt="SendTest.Email">
    </a>
    <br>
    Send a test email to your inbox
</p>

------

Source code of [sendtest.email](https://sendtest.email) - a simple tool for sending HTML email tests to your inbox.

[![Netlify Status](https://api.netlify.com/api/v1/badges/3e40d277-84a6-42aa-86a7-724a3fbbef1e/deploy-status)](https://app.netlify.com/sites/send-test-email/deploys)

## Getting Started

### Clone this repository:

```
git clone https://github.com/cossssmin/sendtest.email.git
```

### Install dependencies:

```sh
# Navigate to project directory
cd sendtest.email

# Install dependencies with NPM
npm install
```

### SparkPost API keys

> This is required for local development

Create a `.env.local` file in the project's root, for your SparkPost and reCAPTCHA keys:

```
SPARKPOST_API_KEY=
SPARKPOST_METRICS_KEY=
RECAPTCHA_SECRET=
```

In SparkPost Settings, when generating your keys, you only need the following permissions:

- `SPARKPOST_API_KEY` : Transmissions (both Read-only and Read/Write)
- `SPARKPOST_METRICS_KEY` : Metrics: Read-only

#### Netlify Environment

When using Netlify, make sure to add these environment variables in your admin, under *Build & Deploy &rarr; Continuous Deployment &rarr; Environment*.

### Development

As with any Vue CLI app, `npm run serve` will start a development server.

In our case, it will also start a server for testing Netlify Lambda functions locally, using [`vue-cli-plugin-netlify-lambda`](https://github.com/netlify/vue-cli-plugin-netlify-lambda).

***

## Features

#### ✍ Code Editor

Paste in your email code, or write from scratch. Uses [vue-codemirror-lite](https://github.com/cnu4/vue-codemirror-lite) with the Material theme.

#### 🎭 Multiple MIME-parts

The following MIME-parts are supported:

- HTML
- ⚡4email
- Text

#### 📱 Responsive Preview

Preview your HTML live, in a resizable iframe:

- drag the handle to horizontally-resize the preview
- while dragging, the iframe shows a viewport pixel width indicator
- double-clicking the handle resets the panes to their original widths

#### ⚠ HTML Size Indicator

Shows your _approximate_ HTML file size, updated as-you-type.
When you're getting close to [Gmail's clipping limit](https://github.com/hteumeuleu/email-bugs/issues/41), it'll show a warning icon linked to a GitHub issue that discusses this in detail.

#### 🔒 Privacy

On SendTest.Email there are no website analytics, emails are not tracked, and you don't need to sign up in order to use the tool.

## Tooling

This app is built with great open source software:

- [Vue CLI](https://cli.vuejs.org/)
- [Tailwind CSS](https://tailwindcss.com/)

... and is powered by these awesome services:

- [Netlify](https://www.netlify.com/), with [Functions](https://www.netlify.com/features/functions/)
- [SparkPost](https://www.sparkpost.com/)

## Contributing

Have ideas for new features? Found a bug and want to squash it?

Pull requests are welcome!

However, nobody likes working hard just to see their PR rejected.
So, before starting any *significant* work, please [open an issue](https://github.com/cossssmin/sendtest.email/issues/new) and describe your idea.

### Build previews

When you open a PR, Netlify CI will automatically deploy a public build preview of your branch.
