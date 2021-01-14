document.addEventListener('DOMContentLoaded', () => {
	let button = document.querySelectorAll('.follow');
	button.forEach(element => {
		element.addEventListener('click', () => {
			let a = element.getAttribute('user'),
				b = element.innerText,
				c = 'Unfollow',
				d = 'Follow';
			if (b == c) {
				button.forEach(element => {
					if (element.getAttribute('user') == a) {
						element.innerHTML = d;
					}
				});
			} else if (b == d) {
				button.forEach(element => {
					if (element.getAttribute('user') == a) {
						element.innerHTML = c;
					}
				});
			}
		});
	});
});