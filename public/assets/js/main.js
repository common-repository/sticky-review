let options = {
	'speed': 3000,
	'pause': true,
}

window.addEventListener('DOMContentLoaded', function () {
	let slider = document.querySelector('.srs-review-slider');
	let slides = slider.querySelectorAll('.srs-review');
	let total = slides.length;
	let pause = false;

	if (total < 2) return;

	function pauseSlide() {
		slider.onmouseleave = function () { pause = false; };
		slider.onmouseenter = function () { pause = true; };
		return pause;
	}

	function slide() {
		if (options.pause && pauseSlide()) return;

		let activeSlide = document.querySelector('.srs-review-slider .srs-review.srs-curr');
		let prev, curr, next, soon;

		curr = activeSlide;
		if (!activeSlide) {
			return false;
		}

		prev = activeSlide.previousElementSibling;
		next = activeSlide.nextElementSibling;

		if (next != null) {
			soon = next.nextElementSibling == null ? slides[0] : next.nextElementSibling;
		} else {
			next = slides[0];
			soon = slides[1];
		}

		if (prev != null) prev.classList.remove('srs-prev', 'srs-curr', 'srs-next');
		if (curr != null) curr.classList.remove('srs-prev', 'srs-curr', 'srs-next'); curr.classList.add('srs-prev');
		if (next != null) next.classList.remove('srs-prev', 'srs-curr', 'srs-next'); next.classList.add('srs-curr');
		if (soon != null) soon.classList.remove('srs-prev', 'srs-curr', 'srs-next'); soon.classList.add('srs-next');
	}

	let slideTimer = setInterval(function () {
		slide();
	}, options.speed);
}, true);

// Clos button.
(function ($) {
	$(document).ready(function () {
		$('.close_btn').on('click', function () {
			$(this).parents('.srs-core-ui').fadeOut(500);
			setTimeout(() => {
				$(this).parents('.srs-core-ui').remove();
			}, 3000);
		});

		$(window).on('scroll', function () {
			const pageOffset = $(window).scrollTop();

			if (pageOffset > 400) {
				$('.srs-core-ui').fadeIn(500);
			} else {
				$('.srs-core-ui').fadeOut(500);
			}
		});
	})
})(jQuery);