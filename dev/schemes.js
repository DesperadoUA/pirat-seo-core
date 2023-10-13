const cssDI = ['common', 'content']
const jsDI = ['common', 'content']
const defaultDI = { DEFAULT: { js: jsDI, css: cssDI, fileName: 'default' } }
module.exports.schemas = {
	PAGES: {
		FRONT_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq']),
			fileName: 'front'
		},
		PRIVACY_POLICY_PAGE: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq']),
			fileName: 'private-policy-page'
		},
		...defaultDI
	},
	POSTS: {
		BLOG: {
			js: jsDI.concat(['faq', 'blog']),
			css: cssDI.concat(['faq', 'blog']),
			fileName: 'blog'
		},
		GAME: {
			js: jsDI.concat(['faq']),
			css: cssDI.concat(['faq']),
			fileName: 'game'
		},
		...defaultDI
	},
	CATEGORY: {
		...defaultDI
	},
	TAX: {
		...defaultDI
	}
}
