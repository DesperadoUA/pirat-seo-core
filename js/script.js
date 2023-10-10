{
	const nodeList = document.querySelectorAll('.managerCard')
	if (nodeList.length) {
		nodeList.forEach(item => {
			item.addEventListener('click', () => {
				item.classList.toggle('fadeIn')
			})
		})
	}
}
