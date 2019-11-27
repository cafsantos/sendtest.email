const axios = require('axios')

const headers = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Methods": "POST",
  "Access-Control-Allow-Headers": "Content-Type"
};

exports.handler = function (event, context, callback) {

  if (event.httpMethod !== "POST") {
    callback(null, {
      statusCode: 405,
      body: JSON.stringify({
        message: 'Method Not Allowed',
      }),
    })
  }

  const token = JSON.parse(event.body)

  axios.post(`https://www.google.com/recaptcha/api/siteverify?secret=${process.env.RECAPTCHA_SECRET}&response=${token}`, {})
    .then(res => {
      return callback(null, {
        statusCode: res.status,
        headers,
        body: JSON.stringify({
          data: res.data
        }),
      })
    })
    .catch(error => {
      return callback(null, {
        statusCode: error.status,
        body: JSON.stringify({
          data: error,
        })
      })
    })
}
