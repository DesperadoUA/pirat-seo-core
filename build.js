const fs = require('fs')
const { schemas } = require('./dev/schemes.js')
const { MinifyCss } = require('./dev/MinifyCss')
const typeBuild =
	process.argv.length === 3 && process.argv[2] === 'amp' ? 'amp' : 'default'
const configFileName = { amp: 'amp', default: 'style' }
const PATH_DIST = './webpack_dist'
for (postType in schemas) {
	for (post in schemas[postType]) {
		const { css } = schemas[postType][post]
		const { js } = schemas[postType][post]
		let commonScript = ''
		for (let styleItem of css) {
			commonScript += fs.readFileSync(
				`./components/${styleItem}/${configFileName[typeBuild]}.css`,
				'utf8'
			)
		}
		const fileName =
			typeBuild === 'default'
				? schemas[postType][post]['fileName']
				: `${schemas[postType][post]['fileName']}.amp`
		MinifyCss(commonScript, `${PATH_DIST}/${fileName}.css`)
	}
}
