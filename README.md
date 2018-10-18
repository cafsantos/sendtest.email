<p align="center">
    <a href="https://sendtest.email/" target="_blank">
        <img width="400" src="https://sendtest.email/assets/img/ste-github.jpg" alt="SendTest.Email">
    </a>
    <br>
    Send a test email to your inbox
</p>

------

Source code of [sendtest.email](https://sendtest.email) - a simple tool for sending HTML email tests to your inbox.

## Features

#### ✍ Code Editor

Paste in your HTML email code, or write from scratch. Uses [vue-codemirror-lite](https://github.com/cnu4/vue-codemirror-lite) with the Material theme.

#### 📱 Responsive Preview

Preview your HTML live, in a resizable iframe.

- Drag the handle to horizontally-resize the preview.
- While dragging, the iframe shows a viewport width indicator.
- Double-clicking the handle resets the panes to their original widths.

#### ⚠ HTML Size Indicator

Shows your approximate HTML file size, updated as-you-type.
When you're getting close to [Gmail's clipping limit](https://github.com/hteumeuleu/email-bugs/issues/41), it'll show a warning icon linked to a GitHub issue that discusses this in detail.

#### 🔒 Privacy

On sendtest.email you will find:

- No website analytics
- No sign-up required
- No email tracking
- No advertisement
- No cookies

## Tooling

This app is built with great open source software:

- [Jigsaw](https://jigsaw.tighten.co)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vue.js](https://vuejs.org/)

... and is powered by awesome free services:

- [Netlify](https://www.netlify.com/), with [Functions](https://www.netlify.com/features/functions/)
- [SparkPost](https://www.sparkpost.com/)

## Usage Limits

The web app is hosted on a free Netlify plan, and uses a free (legacy) SparkPost account.

Therefore, the following limitations apply:

**Netlify**

- Network Bandwidth : 100GB/month
- Lambda Functions* : 125k requests or 100 hours runtime / month

**SparkPost**

- 10k emails/day or 100k emails/month

\* There's currently only one Lambda Function being used: a Node.js script that makes a call to SparkPost's API. It's run each time the app *attempts* to send an email (so, even when it might fail).

## Contributing

If you have ideas for new features, or you found a bug and want to squash it, PRs are welcome!

However, nobody likes working hard just to see their PR being rejected.
So, before starting any significant work, please [open an issue](https://github.com/hellocosmin/sendtest.email/issues/new) so we can discuss it.

Also, note that Netlify CI is being used. When you open a PR, it'll automatically deploy a public build preview.
