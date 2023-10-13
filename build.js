const fs = require('fs')
const { schemas } = require('./dev/schemes.js')
const { Minify } = require('./dev/Minify')
const typeBuild =
	process.argv.length === 3 && process.argv[2] === 'amp' ? 'amp' : 'default'
const configFileName = {
	css: { amp: 'amp', default: 'style' },
	js: { amp: 'amp', default: 'script' }
}
const PATH_DIST = './webpack_dist'
const getCommonScriptForPostType = (arr, fileExtension) => {
	let commonScript = ''
	for (let dir of arr) {
		commonScript += fs.readFileSync(
			`./components/${dir}/${configFileName[fileExtension][typeBuild]}.${fileExtension}`,
			'utf8'
		)
	}
	return commonScript
}
for (postType in schemas) {
	for (post in schemas[postType]) {
		const { css } = schemas[postType][post]
		const { js } = schemas[postType][post]
		let commonStyle = getCommonScriptForPostType(css, 'css')
		let commonScript = getCommonScriptForPostType(js, 'js')
		const fileName =
			typeBuild === 'default'
				? schemas[postType][post]['fileName']
				: `${schemas[postType][post]['fileName']}.amp`
		Minify(commonStyle, `${PATH_DIST}/${fileName}.css`)
		Minify(commonScript, `${PATH_DIST}/${fileName}.js`)
	}
}
