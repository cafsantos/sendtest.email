const SparkPost = require('sparkpost');
const client = new SparkPost(process.env.SPARKPOST_API_KEY);

const headers = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Methods": "POST",
  "Access-Control-Allow-Headers": "Content-Type"
};

exports.handler = function (event, context, callback) {

  if (event.headers.origin !== process.env.SPARKPOST_SECRET) {
    return callback(null, {
      statusCode: 404,
      body: JSON.stringify({
        message: 'Resource not found',
        event: event,
      }),
    });
  }

  if (event.httpMethod !== "POST") {
    return callback(null, {
      statusCode: 405,
      body: JSON.stringify({
        message: 'Method Not Allowed',
      }),
    });
  }

  const payload = JSON.parse(event.body);

  if (
    !payload.subject ||
    !payload.recipient ||
    !payload.html
  ) {
    return callback(null, {
      statusCode: 422,
      headers,
      body: JSON.stringify({
        message: 'Required information is missing.',
      }),
    });
  }

  client.transmissions.send({
    options: {
      open_tracking: false,
      click_tracking: false
    },
    content: {
      from: {
        name: 'SendTest.Email',
        email: 'tests@mail.sendtest.email'
      },
      subject: payload.subject,
      html: payload.html,
      amp_html: payload.amp_html,
      text: payload.text,
    },
    recipients: [
      {address: payload.recipient}
    ]
  })
  .then(data => {
    return callback(null, {
      statusCode: 200,
      headers,
      body: JSON.stringify({
        data: data
      }),
    });
  })
  .catch(err => {
    return callback(null, {
      statusCode: 500,
      body: JSON.stringify({
        data: err,
      })
    });
  });

};
