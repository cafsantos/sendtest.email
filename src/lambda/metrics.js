const SparkPost = require('sparkpost');
const client = new SparkPost(process.env.SPARKPOST_METRICS_KEY);
const options = {
  uri: 'metrics/deliverability?from=2018-10-17T00%3A00&metrics=count_sent'
};

exports.handler = function (event, context, callback) {

  if (event.httpMethod !== "GET") {
    callback(null, {
      statusCode: 405,
      body: JSON.stringify({
        message: 'Method Not Allowed',
      }),
    });
  }

  client.get(options)
    .then(data => {
      return callback(null, {
        statusCode: 200,
        body: JSON.stringify(data),
      });
    })
    .catch(error => ({ statusCode: 422, body: String(error) }))

};
