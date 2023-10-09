const querystring = require('querystring')
const https = require('https')
const fs = require('fs')
const MinifyJs = (str, path) => {
	const query = querystring.stringify({
		input: str
	})
	const req = https.request(
		{
			method: 'POST',
			hostname: 'www.toptal.com',
			path: '/developers/javascript-minifier/api/raw'
		},
		resp => {
			if (resp.statusCode !== 200) {
				console.log('StatusCode=' + resp.statusCode)
				return
			}
			const writable = fs.createWriteStream(path, { flags: 'w' })
			resp.pipe(writable)
		}
	)
	req.on('error', function (err) {
		throw err
	})
	req.setHeader('Content-Type', 'application/x-www-form-urlencoded')
	req.setHeader('Content-Length', query.length)
	req.end(query, 'utf8')
}
module.exports.MinifyJs = MinifyJs
