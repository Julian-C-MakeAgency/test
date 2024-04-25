const defaultTheme = require( "tailwindcss/defaultTheme" );

module.exports = {
	content: [
		"../*.php",
		"../template-parts/**/*.php",
		"../assets/js/script.js",
		"../blocks/**/*.php",
		"../inc/**/*.php",
	],
	safelist: [
		'bg-[#003367]',
		'bg-[#6E97C8]',
		'bg-[#FEF8ED]',
		'bg-[#FFFFFF]',
		'bg-[#00A3EE]',
		'bg-[#7649F3]',
		'bg-[#355666]',
		'bg-[#6E8B99]',
		'bg-[#a3becc]',
		'bg-[#CEE1EB]',
		'bg-[#f0f6fa]',
		'bg-[#F7FBFC]',
		'bg-[#FBFDFE]',
	],
	theme: {
		extend: {
			fontFamily: {
				sans: ['"Avenir"', ...defaultTheme.fontFamily.sans],
			},
			maxWidth: {
				"8xl": "90rem",
			},
			colors: {
				"sky-900": "#003367",
				"sky-500": "#00A3EE",
				"violet-600": "#7649F3",
				"slate-100": "#F0F6FA",
				"slate-500": "#6E8B99",
				"slate-600": "#355666",
				"yellow-400": "#FBC912",
			},
			screens: {
				xxxl: '94rem',
				xxl: "90rem",
				xs: "28rem",
			},
			translate: {
				carousel: "calc((100vw - 83rem) / 2)",
			},
		},
	},
	plugins: [
		require( "@tailwindcss/typography" ),
		function ({addUtilities}) {
			const newUtilities = {
				".hide-scrollbar::-webkit-scrollbar": {
					display: "none",
				},
				".hide-scrollbar": {
					"-ms-overflow-style": "none",
					"scrollbar-width": "none",
				},
			};
			addUtilities( newUtilities );
		},
	],
};
