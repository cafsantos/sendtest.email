const SparkPost = require('sparkpost');
const client = new SparkPost(process.env.SPARKPOST_METRICS_KEY);

const headers = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Methods": "GET",
  "Access-Control-Allow-Headers": "Content-Type"
};

const options = {
  uri: 'metrics/deliverability?from=2018-10-17T00%3A00&metrics=count_sent'
};

exports.handler = function (event, context, callback) {

  if (event.httpMethod !== "GET") {
    return callback(null, {
      statusCode: 405,
      body: JSON.stringify({
        message: 'Method Not Allowed',
      }),
    });
  }

  client.get(options)
    .then(response => response.json())
    .then(data => ({
      statusCode: 200,
      body: data.results[0]
    }))
    .catch(error => ({ statusCode: 422, body: String(error) }))

};
