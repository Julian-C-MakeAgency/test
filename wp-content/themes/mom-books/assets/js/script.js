document.querySelector('.search-open').addEventListener(
    'click', function (event) {
        event.preventDefault();
        var searchBlock = document.querySelector('.search-block');
        var searchFullText = document.getElementById('searchFullText');
        if (windowWidth < 1280) {
            searchBlock.classList.toggle('open');
            if (searchBlock.classList.contains('open')) {
                searchFullText.focus();
            } else {
                searchFullText.blur();
            }
        }
    }
);

document.addEventListener(
    "DOMContentLoaded", function () {
        let swiper = new Swiper(
            ".hero-slider", {
                slidesPerView: 1,
                autoHeight: false,
                loop: true,
                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
            }
        );
    }
);

let windowWidth = window.innerWidth;
window.addEventListener(
    'resize', function () {
        windowWidth = window.innerWidth;
        var searchBlock = document.querySelector('.search-block');
        if (searchBlock.classList.contains('open')) {
            searchBlock.classList.remove('open');
        }
    }
);


const navLinks = document.querySelectorAll(".nav-link");

// Add event listeners to each .nav-link element
navLinks.forEach(
    (navLink) => {
    navLink.addEventListener(
            "mouseover", function (event) {
                // Find the closest .nav-block parent
                const navBlock = event.target.closest(".nav-block");

                const navBlocks = document.querySelectorAll(".nav-block");

                // Remove the open class from each .nav-block element
                navBlocks.forEach(
                    (navBlock) => {
                        navBlock.classList.remove("open");
                    }
                );

                // Add the open class to the current .nav-block
            if (navBlock) {
                navBlock.classList.add("open");
            }
        }
        );
    }
);

const header = document.querySelector("header");

// Add a mouseleave event listener to the header
header.addEventListener(
    "mouseleave", function (event) {
        // Select all .nav-block elements
        const navBlocks = document.querySelectorAll(".nav-block");

        // Remove the open class from each .nav-block element
        navBlocks.forEach(
            (navBlock) => {
                navBlock.classList.remove("open");
            }
        );
    }
);

document.querySelectorAll(".dd-menu").forEach(
    (item) => {
        item.addEventListener(
        "click", (event) => {
                item.classList.toggle("active");
        }
    );
    }
);

window.addEventListener(
    "click", function (e) {
        document.querySelectorAll(".dd-menu").forEach(
            (item) => {
                if (!item.contains(e.target)) {
                    item.classList.remove("active");
                }
            }
        );
    }
);

document.querySelectorAll(".carousel").forEach(
    (item) => {
        const container = item.querySelector(".carousel-container");
        container.classList.add("hide-scrollbar");
        // Select .nav-wrap elements within the current carousel item
        const navWraps = item.querySelectorAll(".nav-wrap");
        navWraps.forEach(
        function (navWrap) {
            navWrap.classList.remove("hidden");
        }
    );
    // Select all prev and next buttons within the current carousel
    const prevButtons = item.querySelectorAll(".prev");
    const nextButtons = item.querySelectorAll(".next");
    let width = item.querySelector(".carousel-item").offsetWidth;
    let animating = false;
    const scroll = (direction) => {
        container.scrollBy({ left: width * direction, behavior: "smooth" });
        };
        // Apply click event listeners to all prev buttons
        prevButtons.forEach(
            (prev) => {
                prev.addEventListener("click", () => scroll(-1));
            }
        );
    // Apply click event listeners to all next buttons
    nextButtons.forEach(
        (next) => {
            next.addEventListener("click", () => scroll(1));
        }
    );
    }
);

document.addEventListener(
    "DOMContentLoaded", function () {
        // Check if the form exists
        const form = document.getElementById("book-filters");
        if (form) {
            // Ensure selects exist within the form
            const selects = form.querySelectorAll("select");
            if (selects.length > 0) {
                selects.forEach(
                    (select) => {
                        select.addEventListener(
                        "change", function () {
                                form.submit();
                            }
                    );
                    }
                );
            }
        }
    }
);



document.addEventListener(
    "DOMContentLoaded", function () {
        const editionSelect = document.querySelector(".edition-select");
        if (editionSelect) {
            const editionSelectItems = document.querySelectorAll(".edition-info");
            editionSelect.addEventListener(
                "change", function () {
                    editionSelectItems.forEach(
                        (item) => {
                            item.classList.add("hidden");
                        }
                    );
                    document.querySelector(`.edition-info[data-edition="${editionSelect.value}"]`).classList.remove("hidden");
                    const detailsSection = document.getElementById("details-section");
                    window.scrollTo({ top: detailsSection.offsetTop - 120, behavior: "smooth" });
                    let accord = detailsSection.querySelectorAll(".accord");
                    accord.forEach(
                        (item) => {
                            item.classList.add("open");
                        }
                    );
                }
            );
        }

        const retailerSelect = document.querySelector(".retailer-select");
        if (retailerSelect) {
            retailerSelect.addEventListener(
                "change", function () {
                    if (retailerSelect.value !== "") {
                        window.open(retailerSelect.value, '_blank');
                    }
                }
            );
        }
    }
);




document.addEventListener(
    "DOMContentLoaded", function () {
        const navBlocks = document.querySelectorAll(".nav-block");
        // Remove the open class from each .nav-block element
        navBlocks.forEach(
            (navBlock) => {
                let secondLevelItems = navBlock.querySelectorAll(".second-menu-level");
                let thirdLevelItems = navBlock.querySelectorAll(".third-menu-level");
                secondLevelItems.forEach(
                (item) => {
                        item.addEventListener(
                        "mouseover", function (event) {
                                event.stopPropagation();
                                let dataItemNumber = item.getAttribute("data-item-num");
                                thirdLevelItems.forEach(
                                    (item) => {
                                        item.classList.add("hidden");
                                    if (item.getAttribute("data-item-num") === dataItemNumber) {
                                        item.classList.remove("hidden");
                                    }
                                    }
                                );
                            }
                    );
                }
            );
            }
        );
    }
);




document.addEventListener(
    "DOMContentLoaded", function () {
        let colorHistory = []; // Initialize an array to keep track of color changes


        function attachEventListeners()
        {
            let selectedColor = localStorage.getItem('selectedColor') ?? '#00a3ee';
            let coluringSVG = document.querySelector('.colouring-svg');

            if (coluringSVG) {
                Coloris(
                    {
                        defaultColor: selectedColor,
                        wrap: true,
                        onChange: (color) => {
                            selectedColor = color;
                            localStorage.setItem('selectedColor', selectedColor);
                        }
                    }
                );
            }

            let colourpicker = document.querySelector('.colourpicker');
            if (colourpicker) {
                colourpicker.value = selectedColor;

                // Trigger an 'input' event to notify Coloris of the change
                const event = new Event('input', { bubbles: true });
                colourpicker.dispatchEvent(event);
            }

            document.querySelectorAll('.colouring-svg path').forEach(
                (path, index) => {
                    const savedColor = localStorage.getItem('pathColor' + index);
                    if (savedColor && path.classList.contains('white')) {
                        localStorage.setItem('selectedColor', savedColor);
                        path.style.fill = savedColor;
                    }
                    path.addEventListener(
                    'click', function () {
                            if (this.classList.contains('white')) {
                                // Push current color and index to history before changing
                                colorHistory.push({index: index, color: path.style.fill});
                                this.style.fill = selectedColor;
                                localStorage.setItem('pathColor' + index, selectedColor);

                                // Update the color picker's color to the selected color
                                Coloris.setColor(selectedColor);
                            }
                        }
                );
                }
            );
        }

        // Function to clear all paths and localStorage entries for path colors
        function clearAllPaths()
        {
            document.querySelectorAll('.colouring-svg path').forEach(
                (path, index) => {
                    if (path.classList.contains('white')) {
                        path.style.fill = '#FFFFFF'; // Reset path color to white
                        localStorage.removeItem('pathColor' + index); // Clear stored color
                    }
                }
            );
        }

        function undoLastChange()
        {
            if (colorHistory.length > 0) {
                const lastChange = colorHistory.pop(); // Remove the last change
                const path = document.querySelectorAll('.colouring-svg path')[lastChange.index];
                path.style.fill = lastChange.color; // Apply the last color
                localStorage.setItem('pathColor' + lastChange.index, lastChange.color);
            }
        }


        // function zoomIn() {
        //   const svgElement = document.querySelector('.colouring-svg');
        //   let scale = svgElement.dataset.scale ? parseFloat(svgElement.dataset.scale) : 1;
        //   scale += 0.1; // Increase scale by 0.1
        //   svgElement.style.transform = `scale(${scale})`;
        //   svgElement.dataset.scale = scale; // Store the new scale
        // }
        //
        // function zoomOut() {
        //   const svgElement = document.querySelector('.colouring-svg');
        //   let scale = svgElement.dataset.scale ? parseFloat(svgElement.dataset.scale) : 1;
        //   scale = Math.max(0.1, scale - 0.1); // Decrease scale by 0.1 but not below 0.1
        //   svgElement.style.transform = `scale(${scale})`;
        //   svgElement.dataset.scale = scale; // Store the new scale
        // }
        //
        //
        // document.getElementById('zoom-in-button').addEventListener('click', zoomIn);
        // document.getElementById('zoom-out-button').addEventListener('click', zoomOut);



        // Function to download the SVG
        function downloadImage()
        {
            const svgElement = document.querySelector('.colouring-svg');
            const serializer = new XMLSerializer();
            const svgString = serializer.serializeToString(svgElement);
            const svgData = 'data:image/svg+xml;base64,' + window.btoa(unescape(encodeURIComponent(svgString)));

            // Create an Image object
            const img = new Image();
            img.onload = function () {
                // Once the image is loaded, draw it on a canvas
                const canvas = document.createElement('canvas');
                const svgWidth = svgElement.clientWidth || svgElement.viewBox.baseVal.width;
                const svgHeight = svgElement.clientHeight || svgElement.viewBox.baseVal.height;
                const aspectRatio = img.width / img.height;

                // Determine scaled dimensions while maintaining aspect ratio
                let scaledWidth, scaledHeight;
                if (svgWidth / aspectRatio > svgHeight) {
                    scaledWidth = svgHeight * aspectRatio;
                    scaledHeight = svgHeight;
                } else {
                    scaledWidth = svgWidth;
                    scaledHeight = svgWidth / aspectRatio;
                }

                // Increase canvas dimensions for higher resolution
                const scaleFactor = 2; // Adjust as needed
                canvas.width = scaledWidth * scaleFactor; // Set canvas width
                canvas.height = scaledHeight * scaleFactor; // Set canvas height
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, scaledWidth * scaleFactor, scaledHeight * scaleFactor);
                let svgTitle = document.querySelector('.colouring-svg-title').textContent;
                if (svgTitle === '') {
                    svgTitle = 'colouring';
                }

                // Convert canvas content to a JPEG URL with improved quality
                const jpegUrl = canvas.toDataURL('image/jpeg', 0.9); // Adjust quality as needed (0.0 - 1.0)

                // Trigger the download
                const downloadLink = document.createElement('a');
                downloadLink.href = jpegUrl;
                downloadLink.download = svgTitle + '.jpg';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            };
            img.src = svgData;
        }




        // Example usage: Attach a click event listener to your clear and download buttons
        if (document.getElementById('clear-colouring')) {
            document.getElementById('clear-colouring').addEventListener('click', clearAllPaths);
        }

        if (document.getElementById('download-colouring')) {
            document.getElementById('download-colouring').addEventListener('click', downloadImage);
        }

        if (document.getElementById('undo-colouring')) {
            document.getElementById('undo-colouring').addEventListener('click', undoLastChange);
        }


        // MutationObserver and initialization logic...
        const observer = new MutationObserver(
            function (mutations) {
                mutations.forEach(
                    function (mutation) {
                        if (mutation.addedNodes.length) {
                            attachEventListeners();
                        }
                    }
                );
            }
        );

        const config = { childList: true, subtree: true };
        observer.observe(document.body, config);

        attachEventListeners();
    }
);






document.addEventListener(
    'DOMContentLoaded', function () {
        let currentOpenDropdown = null;
        document.querySelectorAll('select.styled').forEach(
            function (select) {
                select.classList.add('hidden');
                const wrapper = document.createElement('div');
                wrapper.className = 'relative inline-block text-left w-full';
                let bgColour = select.getAttribute('data-bgcolour');
                if (bgColour === null) {
                    bgColour = 'bg-sky-900';
                }

                const button = document.createElement('button');
                button.className = `relative overflow-hidden whitespace-nowrap inline-flex justify-between w-full rounded-lg shadow-sm px-6 py-4 text-lg font-medium text-white ${bgColour}`;
                button.type = 'button';

                // Set the button's initial text to the selected option's text content or the first option if none is selected
                const selectedOptionText = select.options[select.selectedIndex].textContent;
                button.innerHTML = `${selectedOptionText} <div class="${bgColour} absolute w-12 h-full right-0 top-0 flex justify-center items-center"><svg class="h-7 w-7 transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>`;
                wrapper.appendChild(button);

                const dropdown = document.createElement('div');
                dropdown.className = 'dropdown-menu z-50 hidden absolute mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 max-h-64 overflow-y-scroll';
                select.querySelectorAll('option').forEach(
                    function (option) {
                        const link = document.createElement('a');
                        link.href = '#';
                        link.className = 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100';
                        link.textContent = option.textContent;
                        link.addEventListener(
                            'click', function (e) {
                                e.preventDefault();
                                select.value = option.value;
                                button.innerHTML = option.textContent + `<div class="${bgColour} absolute w-12 h-full right-0 top-0 flex justify-center items-center"><svg class="h-7 w-7 transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></div>`;
                                dropdown.classList.add('hidden');
                                currentOpenDropdown = null;
                                const event = new Event('change', { bubbles: true });
                                select.dispatchEvent(event);
                            }
                        );
                        dropdown.appendChild(link);
                    }
                );
                wrapper.appendChild(dropdown);

                button.addEventListener(
                    'click', function () {
                        if (currentOpenDropdown && currentOpenDropdown !== dropdown) {
                            currentOpenDropdown.classList.add('hidden');
                            const openSvg = currentOpenDropdown.previousSibling.querySelector('svg');
                            if (openSvg.classList.contains('rotate-180')) {
                                openSvg.classList.remove('rotate-180');
                            }
                        }

                        dropdown.classList.toggle('hidden');
                        const svg = button.querySelector('svg');
                        if (dropdown.classList.contains('hidden')) {
                            svg.classList.remove('rotate-180');
                            currentOpenDropdown = null;
                        } else {
                            svg.classList.add('rotate-180');
                            currentOpenDropdown = dropdown;
                        }
                    }
                );

                select.parentNode.insertBefore(wrapper, select.nextSibling);
            }
        );
    }
);



document.addEventListener(
    "DOMContentLoaded", function () {
        var toggles = document.querySelectorAll('.accord');
        toggles.forEach(
            function (toggle) {
                toggle.addEventListener(
                    'click', function () {
                        var next = this.nextElementSibling;
                        this.classList.toggle('open');
                        next.classList.toggle('open');
                    }
                );
            }
        );
        var mobMenuToggles = document.querySelectorAll('.mob-menu .has-children');
        mobMenuToggles.forEach(
            function (toggle) {
                toggle.addEventListener(
                    'click', function (e) {
                        e.preventDefault();
                        this.nextElementSibling.classList.toggle('hidden');
                    }
                );
            }
        );
        var mobToggle = document.querySelector('.mob-toggle');
        mobToggle.addEventListener(
            'click', function () {
                document.querySelector('.mob-menu').classList.toggle('hidden');
            }
        );
    }
);


