document.addEventListener("DOMContentLoaded", () => {
	const gallery = document.querySelector(".simplecharm-single-container");
	const zoomOverlay = document.querySelector("#simplecharm-zoom-overlay");
	const zoomedImage = document.querySelector(
		"#simplecharm-zoom-overlay #zoomed-image",
	);
	const closeBtn = document.querySelector(
		"#simplecharm-zoom-overlay #close-btn",
	);

	gallery.addEventListener("click", (event) => {
		if (event.target.tagName === "IMG") {
			zoomedImage.src = event.target.src;
			zoomOverlay.classList.add("active");
		}
	});
	const closeZoom = () => {
		zoomOverlay.classList.remove("active");
		setTimeout(() => {
			zoomedImage.src = "";
		}, 300);
	};
	zoomOverlay.addEventListener("click", (event) => {
		if (event.target === zoomOverlay) {
			closeZoom();
		}
	});
	closeBtn.addEventListener("click", closeZoom);
	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape") {
			closeZoom();
		}
	});
});
