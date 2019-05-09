module.exports = {
  publicPath: process.env.NODE_ENV === 'production'
    ? 'https://sendtest.email/'
    : '/'
}
